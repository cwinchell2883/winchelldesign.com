<?php 
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: manageUsers.php
## Created: 9-17-2010
## Updated: 10-5-2010
####

	require_once("inc/inc.config.php");

	// Prevent the user visiting the logged in page if not logged in
	if(!isUserLoggedIn()) { header("Location: login.php"); die(); }

	// Prevent the user visiting the page if inproper access level
	// List group levels that DO NOT have access
	if($loggedInUser->isGroupMember(1)) { header("Location: account.php"); die(); }
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
        	
            <?php
            if($_POST && $_POST['key'] == "search") { echo "<h1><a href=\"admin.php\">Admin Settings</a> - Results</h1>"; } 
            elseif($_POST && $_POST['key'] == "edit") { echo "<h1><a href=\"admin.php\">Admin Settings</a> - <a href=\"javascript:history.go(-1)\">Results</a> - Editing User</h1>"; } 
			else { echo "<h1><a href=\"admin.php\">Admin Settings</a> - Search</h1>"; }
			echo "<br />";
			
			$search_bar = ("
					<form name=\"search\" action=".$_SERVER['PHP_SELF']." method=\"post\">
						Search: 
						<input type=\"text\" name=\"find\" />
						by 
						<select name=\"term\">
							<option value=\"Name\" selected>Display Name</option>
							<option value=\"Username_Clean\">User Login</option>
							<option value=\"Email\">Email Address</option>
						</select>
						<input type=\"hidden\" name=\"key\" value=\"search\" />
						<input type=\"submit\" name=\"submit\" value=\"Search\" />
					</form>
					<br />
					");

			if(!empty($_POST))
			{
				if($_POST['key'] == "search")
				{
					$find = $_POST['find'];
					$term = $_POST['term'];
					switch($term)
					{
						case 'Name':
						$clean_term = "Display Name's";
						break;
						case 'Username_Clean':
						$clean_term = "User Login's";
						break;
						case 'Email':
						$clean_term = "Email Addresses";
						break;
					}
					
					echo $search_bar;
					
					echo "<i>Searched: <u>".$clean_term."</u> for <b>".$find."</b></i><br /><br />";
					
					$sql = "SELECT * FROM ".$db_table_prefix."Users WHERE $term LIKE '%$find%'";
					$result = $db->sql_query($sql);
					$sql = "SELECT * FROM ".$db_table_prefix."Groups";
					$groups = $db->sql_query($sql);
					
					echo "<form name=\"edit\" action=".$_SERVER['PHP_SELF']." method=\"post\">";
					echo "<table><center>";
					echo "<tr><td>&nbsp;</td><td>Username</td><td>Name</td><td>E-mail</td><td>Group</td></tr>";
					
					while($row = $db->sql_fetchrow($result))
					{
						if($row['Username'] == "admin")
						{
							echo "";
						}
						else
						{
							echo "<tr>";
							echo "<td><input type=\"radio\" name=\"edit_user\" value=".$row['User_ID']." /></td>";
							echo "<td>".$row['Username_Clean']."</td>";
							echo "<td>".$row['Name']."</td>";
							echo "<td>".$row['Email']."</td>";
							echo "<td>";
							while($row2 = $db->sql_fetchrow($groups))
							{
								if ($row['Group_ID'] == $row2['Group_ID'])
								{
									echo $row2['Group_Name'];
								}
							}
							mysql_data_seek($groups,0);
							echo "</td>";
							echo "</tr>";
						}
					}

					echo "</center></table>";
					echo "<br /><br />";
					echo "<input type=\"hidden\" name=\"key\" value=\"edit\" />";
					echo "<input type=\"submit\" name=\"submit\" value=\"Edit\" />";
					echo "</form>";
				}
				elseif($_POST['key'] == "edit")
				{
					if($_POST['edit_user'] == NULL)
					{
						$errors[] = "You must select a user to continue. <a href=\"javascript:history.go(-1)\">Go Back</a>.";
						echo "<div id=\"errors\">".errorBlock($errors)."</div>";
					}
					else
					{
						$find = $_POST['edit_user'];
						
						$sql = "SELECT * FROM ".$db_table_prefix."Users WHERE User_ID='$find'";
						$result = $db->sql_query($sql);
						$sql = "SELECT * FROM ".$db_table_prefix."Groups";
						$groups = $db->sql_query($sql);
						
						echo "<form name=\"update\" action=".$_SERVER['PHP_SELF']." method=\"post\">";
						
						while($row = $db->sql_fetchrow($result))
						{
							echo "User Name: <input type=\"text\" name=\"name".$row['User_ID']."\" value=\"".$row['Name']."\" />";
							echo "<br />";
							echo "User Email: <input type=\"text\" name=\"email".$row['User_ID']."\" value=\"".$row['Email']."\" />";
							echo "<br />";
							echo "Group: <select name=\"group_id".$row['User_ID']."\">";
							while($row2 = $db->sql_fetchrow($groups))
							{
								if ($row['Group_ID'] == $row2['Group_ID'])
								{
									echo "<option selected value=\"".$row2['Group_ID']."\">".$row2['Group_Name']."</option>";
								}
								elseif($row2['Group_ID'] == "0")
								{
									echo "";
								}
								else
								{
									echo "<option value=\"".$row2['Group_ID']."\">".$row2['Group_Name']."</option>";
								}
							}
							echo "</select>";
							echo "<br />";
							echo "Delete? <input type=\"checkbox\" name=\"delete".$row['User_ID']."\" value=\"delete\">";
							echo "<br /><br />";
						}
						
						echo "<input type=\"hidden\" name=\"key\" value=\"update\" />";
						echo "<input type=\"hidden\" name=\"userID\" value=\"".$find."\" />";
						echo "<input type=\"submit\" name=\"submit\" value=\"Update\" />";
						echo "</form>";
					}
				}
				elseif($_POST['key'] == "update")
				{
					$sql = "SELECT * FROM ".$db_table_prefix."Users WHERE User_ID='".$_POST['userID']."'";
					$user = $db->sql_query($sql);
					$sql = "SELECT * FROM ".$db_table_prefix."Groups";
					$groups = $db->sql_query($sql);
					$errors = array();
					
					while($row = $db->sql_fetchrow($user)) 
					{
						$deleteID = "delete" . $row['User_ID'];
						$delete=($_POST[$deleteID])?"Yes":"No";
						$usernameID = "name" . $row['User_ID'];
						$newusername = $_POST[$usernameID];
						$newusername = strip_tags($newusername);
						$emailID = "email" . $row['User_ID'];
						$newemail = $_POST[$emailID];
						$groupID = "group_id" . $row['User_ID'];
						$newgroup = $_POST[$groupID];
						if ($delete == "Yes") 
						{
							$sql = "DELETE from ".$db_table_prefix."Users WHERE User_ID='".$row['User_ID']."'";
							$db->sql_query($sql);
						}
						elseif($newusername == $row['Name'] && $newemail == $row['Email'] && $newgroup == $row['Group_ID'])
						{
							$errors[] = "You have not made any changes to the account. <a href=\"javascript:history.go(-1)\">Go Back</a>.";
						}
						else 
						{
							if($newusername != $row['Name'])
							{
								if(minMaxRange(2,100,$newusername))
								{
									$errors[] = "Unable to update ".$row['Username']."'s name because the selected name is not between 2 and 100 characters.";
								}
								else
								{
									$sql = "UPDATE ".$db_table_prefix."Users SET Name = '".$newusername."' WHERE User_ID='".$row['User_ID']."'";
									$db->sql_query($sql);
								}
							}
							if ($newemail != $row['Email']) 
							{
								if(trim($newemail) == "")
								{
									$errors[] = "Unable to update ".$row['Username']."'s email because no address was entered.";
								}
								else if(!isValidEmail($newemail))
								{
									$errors[] = "Unable to update ".$row['Username']."'s email because address is invalid.";
								}
								else if(emailExists($newemail))
								{
									$errors[] = "Unable to update ".$row['Username']."'s email because address is already in use.";		
								}
								else 
								{
									$sql = "UPDATE ".$db_table_prefix."Users SET Email = '".$newemail."' WHERE User_ID='".$row['User_ID']."'";
									$db->sql_query($sql);
								}
							}
							if ($newgroup != $row['Group_ID'])
							{
								$sql = "UPDATE ".$db_table_prefix."Users SET Group_ID = '".$newgroup."' WHERE User_ID='".$row['User_ID']."'";
								$db->sql_query($sql);	
							}
						}
					}
					
					if(count($errors) > 0)
					{
						echo "<div id=\"errors\">".errorBlock($errors)."</div>";
					}
					else
					{
						echo $search_bar;
						
						echo "<div><i><b>Your user has been updated successfully.</b></i></div>";
						echo "<div>User Name: ".$newusername."</div>";
						echo "<div>Email: ".$newemail."</div>";
						while($row2 = $db->sql_fetchrow($groups))
						{
							if ($newgroup == $row2['Group_ID'])
							{
								echo "<div>Group: ".$row2['Group_Name']."</div>";
							}
						}
					}
				}
				else
				{
					echo "How did you get here?";
				}
			}
			else
			{
				echo $search_bar;
			}
			?>
            <div class="clear"></div>
        </div>

   </div>
</div>
</body>
</html>