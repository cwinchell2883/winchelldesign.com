<?php

class AdminCP
{

	function header()
	{
		global $refresh;

		echo '	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
				<HTML>
				<HEAD>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
				<script language="JavaScript" type="text/javascript" src="../sources/admin_templates/richtext.js"></script>
				';

		if (isset($refresh))
		{
			echo '<meta http-equiv="refresh" content="3;url=',$refresh,'">';
		}

		echo '	<title>iGaming CMS - Logged in as ',$_SESSION['pwzlogin'],'</title>
				<LINK REL="stylesheet" HREF="../templates/admin_css.css" TYPE="text/css">
				</head>
				<body>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
					<tr>
					   <td class="header"><img src="../images/admin/logo.jpg"></td>
						<td class="header_right" valign="bottom" width="100%">
						<font class="header_title">iGaming CMS Admin Control Panel</font><br />

						<a href="index2.php">Control Panel Home</a> |
						<a href="profile.php">Edit Profile</a> |
						<a href="logout.php">Log out</a>

						</td>
					</tr>
				</table>
				<table border="0" cellspacing="0" cellpadding="0" width="100%">
					<tr>
					  <td class="border">
					  <table border="0" cellspacing="0" cellpadding="0" width="100%">
						 <tr>
							<td style="padding-top: 10px; padding-left: 10px;" valign="top">
							<table border="0" cellspacing="0" cellpadding="0" width="160">
							   <tr>
								  <td style="width: 100%; border: 1px solid #00248C; background-color: #FFF;">
								  <table cellpadding="5" cellspacing="0" width="100%">
								  <tr><td style="color: #FFFFFF; font-size: 11px; font-weight: bold;" background="../images/admin/gradient.jpg">Modules</td></tr>
								  </table>
								  <div class="menu">
								  <table cellpadding="0" cellspacing="0" class="menu">
								  ' . ListModules() . '
								  </table>
								  </div>
			';

		if (defined('SUPERADMIN_MODE'))
		{
			echo '

					<table cellpadding="5" cellspacing="0" width="100%">
					<tr><td style="color: #FFFFFF; font-size: 11px; font-weight: bold;" background="../images/admin/gradient.jpg">Administration Tools</td></tr>
					</table>
					<div class="menu">
					<table cellpadding="0" cellspacing="0" class="menu">
					<tr>
						<td><img src="../images/admin/iconSettings.jpg" hspace="5"></td>
						<td class="menu"><a href="configuration.php">Settings</a></td>
					</tr>
					<tr>
						<td><img src="../images/admin/iconMenus.jpg" hspace="5"></td>
						<td class="menu"><a href="menu_manager.php">Menu Manager</a></td>
					</tr>
					<tr>
						<td><img src="../images/admin/iconModules.jpg" hspace="5"></td>
						<td class="menu"><a href="modules.php">Module Manager</a></td>
					</tr>
					<tr>
						<td><img src="../images/admin/iconTemplates.jpg" hspace="5"></td>
						<td class="menu"><a href="template_editor.php">Template Editor</a></td>
					</tr>
					<tr>
						<td><img src="../images/admin/iconUsers.jpg" hspace="5"></td>
						<td class="menu"><a href="users.php">User Manager</a></td>
					</tr>
					<tr>
						<td><img src="../images/admin/iconDatabase.jpg" hspace="5"></td>
						<td class="menu"><a href="dbtools.php">Database Tools</a></td>
					</tr>
					<tr>
						<td><img src="../images/admin/iconUpdates.jpg" hspace="5"></td>
						<td class="menu"><a href="ver_check.php">Download Updates</a></td>
					</tr>
					</table>
					</div>
				';
		}

		echo '	</td></tr></table>
				</td>
				<td width="100%" valign="top" class="main">
				';
	}

	function footer()
	{
		global $db;
		echo '</td></tr></table></td></tr></table><br />

			<table border="0" cellspacing="0" cellpadding="0" width="98%" align="center" style="border: 1px solid #1D6AA0;">
				<tr>
					<td class="formlabel" align="center" background="../images/admin/moduleMenu.jpg">
					<a href="http://www.igamingcms.com/" target="_blank">
					iGaming CMS - Copyright &copy; 2004-2007
					</a>
					</td>
				</tr>
			</table><br />

			  </body>
			  </html>';
		$db->Close();
	}

}

?>