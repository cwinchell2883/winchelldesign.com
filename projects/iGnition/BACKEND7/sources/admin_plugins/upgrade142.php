<?php

do_table_header("Database Upgrade");
print "<tr><td bgcolor=\"#ffffff\">";
print "Upgrading your iGaming database to version 1.4.2<br /><br />";

$db->Execute("ALTER TABLE `sp_games` CHANGE `release` `release_date` TEXT;") or die($db->ErrorMsg());

print "Success! <b>DELETE THIS FILE</b>";
print "</td></tr>";
do_table_footer();

?>