<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: newUsers.php
## Created: 9-17-2010
## Updated: 10-5-2010
####

	require_once("inc/inc.config.php");
	
	// Prevent the user visiting the logged in page if not logged in
	if(!isUserLoggedIn()) { header("Location: login.php"); die(); }

	// Prevent the user visiting the page if inproper access level
	// List group levels that DO NOT have access
	if($loggedInUser->isGroupMember(1) || $loggedInUser->isGroupMember(2)) { header("Location: account.php"); die(); }

//Forms posted
if(!empty($_POST))
{
		$errors = array();
		$email = trim($_POST["email"]);
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		$confirm_pass = trim($_POST["passwordc"]);
		$group = trim($_POST["groupid"]);
		
	
		// Perform some validation
		$min_num = 5;
		$max_num = 25;
		
		if(minMaxRange($min_num,$max_num,$username))
		{
			$errors[] = "Your username must be no fewer than ".$min_num." characters or greater than ".$max_num;
		}
		if(minMaxRange($min_num,$max_num,$password) && minMaxRange($min_num,$max_num,$confirm_pass))
		{
			$errors[] = "Your password must be no fewer than ".$min_num." characters or greater than ".$max_num;
		}
		else if($password != $confirm_pass)
		{
			$errors[] = "Passwords must match";
		}
		if(!isValidEmail($email))
		{
			$errors[] = "Invalid email address";
		}
		// End data validation
		if(count($errors) == 0)
		{	
				// Construct a user object
				$user = new User($username,$password,$email,$group);
				
				// Checking this flag tells us whether there were any errors such as possible data duplication occured
				if(!$user->status)
				{
					if($user->username_taken) $errors[] = "Username ".$username." is already in use";
					if($user->email_taken) 	  $errors[] = "Email ".$email." is already in use";		
				}
				else
				{
					// Attempt to add the user to the database, carry out finishing tasks like emailing the user (if required)
					if(!$user->addUser())
					{
						if($user->mail_failure) $errors[] = "Fatal error attempting to send mail, contact your server administrator";
						if($user->sql_failure)  $errors[] = "Fatal SQL error";
					}
				}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome <?php echo $loggedInUser->display_username; ?></title>
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
			
            <h1><a href="admin.php">Admin Settings</a> - Create New User</h1>
            

			<?php
            if(!empty($_POST))
            {
				if(count($errors) > 0)
				{
            ?>
            <div id="errors">
            <?php errorBlock($errors); ?>
            </div>     
            <?php
           		 } else {
          
            	$message = "You have successfully registered the account.";
        ?> 
        <div id="success">
        
           <p><?php echo $message ?></p>
           
        </div>
        <? } }?>

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
                    <label>Confirm:</label>
                    <input type="password" name="passwordc" />
                </p>
                
                <p>
                    <label>Email:</label>
                    <input type="text" name="email" />
                </p>
                
                <p>
                    <label>Group:</label>
                    <select name="groupid">
                    <?php
						$sql = "SELECT * FROM ".$db_table_prefix."Groups";
						$groups = $db->sql_query($sql);

						while ($row = $db->sql_fetchrow($groups))
						{
							if($row['Group_ID'] == 0)
							{
								echo "";
							}
							elseif ($row['Group_ID'] == 1)
							{
								echo "<option selected value=\"".$row['Group_ID']."\">".$row['Group_Name']."</option>";
							}	
							else 
							{
								echo "<option value=\"".$row['Group_ID']."\">".$row['Group_Name']."</option>";
							}
						}
                    ?>
                    </select>
                </p>

                <p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Create"/>
                </p>
                
                </form>
            </div>

			<div class="clear"></div>
	 	</div>
	</div>
</div>
</body>
</html>