<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: login.php
## Created: 9-17-2010
## Updated: --
####

	require_once("inc/config.php");
	
	// Prevent the user from visiting this page if logged in
	if(isUserLoggedIn()) { header("Location: account.php"); die(); }

// Forms posted
if(!empty($_POST))
{
		$errors = array();
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
	
		// Perform some validation
		// Probably expand some here..???
		if($username == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_USERNAME");
		}
		if($password == "")
		{
			$errors[] = lang("ACCOUNT_SPECIFY_PASSWORD");
		}
		
		// End data validation
		if(count($errors) == 0)
		{
			if(!usernameExists($username))
			{
				$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
			}
			else
			{
				$userdetails = fetchUserDetails($username);
			
				// See if the user's account is active
				if($userdetails["Active"]==0)
				{
					$errors[] = lang("ACCOUNT_INACTIVE");
				}
				else
				{
					//Hash the password and use the salt from the database to compare the password.
					$entered_pass = generateHash($password,$userdetails["Password"]);

					if($entered_pass != $userdetails["Password"])
					{
						$errors[] = lang("ACCOUNT_USER_OR_PASS_INVALID");
					}
					else
					{
						// Passwords match! we're good to go'
						
						// Construct a new logged in user object
						// Transfer some db data to the session object
						$loggedInUser = new loggedInUser();
						$loggedInUser->email = $userdetails["Email"];
						$loggedInUser->user_id = $userdetails["User_ID"];
						$loggedInUser->hash_pw = $userdetails["Password"];
						$loggedInUser->display_username = $userdetails["Username"];
						$loggedInUser->clean_username = $userdetails["Username_Clean"];
						
						// Update last sign in
						$loggedInUser->updateLastSignIn();
		
						$_SESSION["privUser"] = $loggedInUser;
						
						// Redirect to user account page
						header("Location: index.php");
						die();
					}
				}
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<div id="content">

        <div id="left-nav">
        <?php include("inc/nav.php"); ?>
            <div class="clear"></div>
        </div>

        <div id="main">
        
        <h1>Login</h1>
        
        <?php
        if(!empty($_POST))
        {
        	if(count($errors) > 0)
        	{
        ?>
        	<div id="errors"><?php errorBlock($errors); ?></div>     
        <?php
        	}
		}
        ?> 
        
            <div id="regbox">
                <form name="newUser" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <p>
                    <label>Username:</label>
                    <input type="text" name="username" />
                </p>
                
                <p>
                     <label>Password:</label>
                     <input type="password" name="password" />
                </p>
                
                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Login" class="submit" />
                </p>

                </form>
                
            </div>
        </div>
        
            <div class="clear"></div>
        </div>
</div>
</body>
</html>


