<?php

require_once("global.php");
do_header();

if (isset($_REQUEST[id])) {

   $result = $db->Execute("SELECT * FROM `sp_screenshots` WHERE `id` = '$_REQUEST[id]' LIMIT 1");
   echo $start_table . '<b>',stripslashes($result->fields['title']),'</b>' . $end_table . '<br />';
   echo '<center><img src="',$result->fields['screen'],'" border="0" alt="',stripslashes($result->fields['title']),'"></center>';

   }

do_footer();
?>