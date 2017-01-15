<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/


$lang['translator'] = ""; // <-- Put this in here  "<p>- Translated by Andrew Fenn</p>"   replace Andrew Fenn with your name

$lang['title'] = 'Pro Clan Manager - Installer 0.4.1';

$lang['complete'] = '<p>Your website is now ready to use. Please:</p><p>- Delete the &quot;install&quot; folder from your webserver.</p><p>- CHMOD your &quot;configure.php&quot; file to read only. (555)</p>';
$lang['pcmhome'] = 'Go to my new clan site';


$lang['part4_empty'] = 'The username and password fields are required. Please fill them in.';
$lang['part4_not_match'] = 'Your passwords do not match.';
$lang['part4_alpha_num'] = 'You can only have numbers and letter in your username and password';
$lang['part4_reminder'] = 'Please remember your username and password as you will need it to login to your website.';
$lang['part4'] = 'To finish the installation of Pro Clan Manager you must set up your account with a user name and password. The user name will be the same one that you will be using on your new website.';
$lang['part4_username'] = 'User Name';
$lang['part4_password'] = 'Password';
$lang['part4_password2'] = 'Password Again';
$lang['part4_email'] = 'Email';


$lang['part3dbfail'] = 'An attempt to select your database has failed. You may have entered the wrong MySQL database name.';
$lang['part4_connect_fail'] = 'The connection to your database has failed. You may have entered the wrong MySQL address, username or password.';
$lang['part4_error'] = 'The error given was: ';
$lang['part4_continue'] = 'Continue to step 4';

$lang['part3_written'] = 'Your MySQL details were written to the configure file. Now lets check that they work and install the MySQL tables that Pro Clan Manager needs to work.';
$lang['part3_not_written'] = 'There was a problem writing to configure.php. Copy and paste from the textbox below into the &quot;configure.php&quot; file. This file is located in the &quot;includes&quot; folder.';
$lang['part3_continue'] = 'Continue to step 3';

$lang['part2'] = 'Your MySQL details should be avalible to you from your web host. If you do not know them try getting them from your webhost.';
$lang['part2_address'] = 'MySQL Address';
$lang['part2_database'] = 'MySQL Database';
$lang['part2_username'] = 'MySQL Username';
$lang['part2_password'] = 'MySQL Password';
$lang['part2_prefix'] = 'Table Prefix';
$lang['part2_goback'] = 'Please go back and try again.';

$lang['part2_refresh'] = 'Refresh the page';
$lang['part2_contiue'] = 'Continue to step 2';

$lang['part1'] = 'This installer has to check that it can write to the files on your web server. If it can not, you will have to change the permissions on some files and folders so that you can continue the install.';
$lang['part1_image_writable'] = 'The &quot;images&quot; folder is writable.';
$lang['part1_image_not_writable'] = 'Please CHMOD the &quot;images&quot; directory as well as the folders inside it to 666 if this fails try 777.';

$lang['part1_files_writable'] = 'The &quot;files&quot; folder is writable.';
$lang['part1_files_not_writable'] = 'The "files" folder is not writable. Please CHMOD the directory to 666 if this fails try 777.';

$lang['part1_config_writable'] = 'The &quot;configure.php&quot; file is writable.';
$lang['part1_config_not_writable'] = 'The &quot;configure.php&quot; file is not writable. &quot;configure.php&quot; exists in the &quot;includes&quot; folder. Please CHMOD it to 666 if this fails try 777.';
$lang['part1_config_not_there'] = 'The file &quot;configure.php&quot; could not be found. It should be in the &quot;includes&quot; folder. ';

$lang['part1_compiled_writable'] = 'The &quot;compiled&quot; folder is writable.';
$lang['part1_compiled_not_writable'] = 'The &quot;compiled&quot; folder is not writable. The &quot;compiled&quot; folder exists in the &quot;includes/libs&quot; directory. Please CHMOD it to 666 if this fails try 777.';

$lang['part0_title'] = 'Welcome';
$lang['part0'] = '<p>Thank you for downloading Pro Clan Manager this page will guide you through the installation stage. If at any time you get stuck move your mouse cursor on the question marks which will offer you a better explanation of what all the options mean.</p><p>Please remember to read these instructions carefully so that you do not make a mistake.</p><p>If you get stuck at any time you can visit the website at <a href="http://www.proclanmanager.com">www.proclanmanager.com</a></p><p>Good luck and I hope you enjoy your new website.</p><br /><p>- Andrew Fenn</p>';


$lang['filelocked'] = 'The install folder has been locked. To unlock the installer delete the folder.lock file located in the install directory.';

$lang['install'] = 'Install';
$lang['upgrade_done'] = '<p>The upgrade was successful. Please now delete the &quot;install&quot; directory.</p>';
$lang['upgrade'] = 'Upgrade from';
$lang['continue'] = 'Continue';

/* Below is the data that will go into the site */

$lang['install_email_1_subject'] = 'Welcome to our site!';
$lang['install_email_1_text'] = 'To login please use the details shown below!\r\n\r\nUsername: [username]\r\nPassword: [password]'; // [username] and [password] <-- Leave these words alone.
$lang['install_email_2_subject'] = 'Your new password';
$lang['install_email_2_text'] = 'Your new password is below.\r\n\r\nPassword: [password]'; // [password] <-- leave this word alone


$lang['install_menu_1'] = 'User Settings';
$lang['install_menu_2'] = 'User Password';
$lang['install_menu_3'] = 'Control Panel';
$lang['install_menu_4'] = 'Logout';
$lang['install_menu_5'] = 'News';
$lang['install_menu_6'] = 'Archives';
$lang['install_menu_7'] = 'Roster';
$lang['install_menu_8'] = 'Polls';
$lang['install_menu_9'] = 'Downloads';
$lang['install_menu_10'] = 'Screenshots';
$lang['install_menu_11'] = 'Events';

$lang['install_module1'] = 'Site Admin';
$lang['install_module2'] = 'Member Area';
$lang['install_module3'] = 'News';
$lang['install_module4'] = 'Polls';
$lang['install_module5'] = 'Member Ranks';
$lang['install_module6'] = 'Downloads';
$lang['install_module7'] = 'Screenshots';
$lang['install_module8'] = 'Member Management';
$lang['install_module9'] = 'Events';
$lang['install_module10'] = 'Site chat';

$lang['install_rank1'] = 'Admin';
$lang['install_rank2'] = 'Member';

/* Below is the language for describing what all the textboxes mean */

$lang['desc_mysql_address'] = '<p>Your MySQL address is the location of your MySQL database.</p><p>If you do not know what your MySQL address is try localhost. If this does not work contact your web-hosting provider.</p>';
$lang['desc_mysql_database']= '<p>Your MySQL database is the name of the database you wish to store the table information in.</p><p> If you do not know the name of the database then attempt to use your web hosting username.</p><p>If this is unsuccessful try to get in contact with your web-hosting provider and ask for details on your MySQL settings.</p>';
$lang['desc_mysql_username']= '<p>Your MySQL username is your login name used to gain access to your MySQL Database.</p><p> If you do not know your MySQL username then try using your webhosting username. If this doesn&lsquo;t work then ask your web-hosting provider for details.</p>';
$lang['desc_mysql_password']= '<p>Your MySQL password is used to login to your MySQL database.</p><p> If you do not know your MySQL password then try your webhosting password. If this doesn&lsquo;t then please get in contact with your web hosting provider.</p>';
$lang['desc_mysql_prefix']  = '<p>The table prefix is what the first part of the table name in your MySQL Database will be saved as for example &ldquo;pcm_news&rdquo;.</p><p>If you are only installing one copy of Pro Clan Manager then you can save this as anything without much bother.</p><p>If you are a multi-gaming clan and wish to install more then one copy you must change the name of this with every new copy or Pro Clan Manager may not install correctly.</p>';

$lang['desc_user_name'] = '<p>This is your new username which is displayed on your website.</p><p>This will also be the name that you will use to login to Pro Clan Manager.</p>';
$lang['desc_user_pass'] = '<p>This is the password you will use to login to your new Pro Clan Manager website.</p>';
$lang['desc_user_email'] = '<p>This is the email that will be displayed on your new website under your username.</p><p>You can leave this box blank.</p>'
?>
