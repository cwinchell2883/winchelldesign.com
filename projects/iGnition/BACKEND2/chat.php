<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/
require('includes/application_top.php');

// check out the module status.
$sql = "SELECT `m_status` FROM ".MYSQL_PREFIX."_modules WHERE `m_id`='10'";
$query = mysql_query($sql, CONNECT) or die(mysql_error());
$row = mysql_fetch_assoc($query);

if (!empty($_POST['chat']) && $row['m_status'] > 0) {
		$chat->postChat($_POST['text'], $user);
}

header('Location:'.$_POST['chat']);

?>
