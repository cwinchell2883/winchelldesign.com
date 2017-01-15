<?php

class Module
{

	function header()
	{
		$links = 	'<a href="users.php?do=add_user">Add User</a> | '
				   .'<a href="users.php">Manage Users</a>';
		do_module_header('User Manager',$links);
	}

	function delete_user()
	{
		global $db;
		$db->Execute("DELETE FROM `sp_members` WHERE `ID` = '$_REQUEST[id]'");
		echo '<center>Admin account has been removed, <a href="users.php">click here to continue</a>.</center>';
	}

	function add_confirm()
	{
		global $db;
		$rs = $db->Execute("SELECT * FROM `sp_members` WHERE `ID` = '-1'");
		$record = array(
			'PSEUDO' => $_REQUEST['pseudo'],
			'PASS' => md5($_REQUEST['password']),
			'EMAIL' => $_REQUEST['email'],
			'ACTIF' => '1',
			'NOM' => 'Administrateur',
			'fname' => $_REQUEST['fname'],
			'lname' => $_REQUEST['lname']
			);
		$rssql = $db->GetInsertSQL($rs, $record);
		$db->Execute($rssql);
		echo '<center>Admin account has been created, <a href="users.php">click here to continue</a>.</center>';
	}

	function reset_confirm()
	{
		global $db;
		$rs = $db->Execute("SELECT * FROM `sp_members` WHERE `ID` = '$_REQUEST[id]'");
		$record = array(
			'PASS' => md5($_REQUEST['password']),
			);
		$rssql = $db->GetUpdateSQL($rs, $record);
		$db->Execute($rssql);
		echo '<center>Password has been updated, <a href="users.php">click here to continue</a>.</center>';
	}

	function edit_confirm()
	{
		global $db;
		$rs = $db->Execute("SELECT * FROM `sp_members` WHERE `ID` = '$_REQUEST[id]'");
		$record = array(
			'PSEUDO' => $_REQUEST['pseudo'],
			'EMAIL' => $_REQUEST['email'],
			'fname' => $_REQUEST['fname'],
			'lname' => $_REQUEST['lname']
			);
		$rssql = $db->GetUpdateSQL($rs, $record);
		$db->Execute($rssql);
		echo '<center>Admin account has been updated, <a href="users.php">click here to continue</a>.</center>';
	}

	function add_user()
	{
		global $db;
		do_form_header('users.php');
		do_table_header('Add Admin');
		do_text_row('Username:','pseudo');
		do_text_row('E-mail address:','email');
		do_text_row("First Name","fname");
		do_text_row("Last Name","lname");
		do_text_row('Password:','password');
		do_submit_row('Confirm');
		do_table_footer();
		echo "<input type=\"hidden\" name=\"do\" value=\"add_confirm\">";
		echo "</form>";
	}

	function edit_user()
	{
		global $db;
		$result = $db->Execute("SELECT * FROM `sp_members` WHERE `id` = '$_REQUEST[id]'");
		do_form_header('users.php');
		do_table_header('Edit Admin');
		do_text_row('User name:', 'pseudo', stripslashes($result->fields['PSEUDO']));
		do_text_row('E-mail address:', 'email', stripslashes($result->fields['EMAIL']));
		do_text_row("First Name","fname",stripslashes($result->fields['fname']));
		do_text_row("Last Name","lname",stripslashes($result->fields['lname']));
		do_submit_row('Save Changes');
		do_table_footer();
		echo '<input type="hidden" name="do" value="edit_confirm">';
		echo '<input type="hidden" name="id" value="'.$_REQUEST['id'].'">';
		echo '</form>';
	}

	function reset_password()
	{
		global $db;
		do_form_header('users.php');
		do_table_header('Change Password');
		do_text_row("New Password:","password");
		do_submit_row('Save Changes');
		do_table_footer();
		echo '<input type="hidden" name="do" value="reset_confirm">';
		echo '<input type="hidden" name="id" value="'.$_REQUEST['id'].'">';
		echo '</form>';
	}

	function manage_users()
	{
		global $db;
		do_form_header('users.php');
		do_table_header('Manage Users');
		$result = $db->Execute("SELECT * FROM `sp_members` ORDER BY `PSEUDO`");
		while ($row = $result->FetchNextObject()) {
			echo "<tr><td class=\"formlabel\"><input type=\"checkbox\" name=\"id\" value=\"$row->ID\"></td>"
				 . "<td class=\"formlabel\" width=\"100%\"><b>$row->PSEUDO</b></td></tr>";
			}
		echo "<tr><td colspan=\"2\" class=\"formlabel\">"
			 . "<input type=\"submit\" name=\"do\" value=\"Edit User\"> "
			 . "<input type=\"submit\" name=\"do\" value=\"Delete User\"> "
			 . "<input type=\"submit\" name=\"do\" value=\"Reset Password\"> "
			 . "</td></tr>";
		do_table_footer();
		echo "</form>";
	}
}

?>