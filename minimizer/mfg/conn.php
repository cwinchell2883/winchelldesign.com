<?php

function conn($do)
{
	switch($do)
	{
		case "open":
			$connect = mysql_connect("mysql.winchelldesign.com","cwinchell","ky0t1c") or die("Couldn't Connect to DB");
			mysql_select_db("minimizer") or die("Couldn't find the DB");
			break;
		case "close":
			mysql_close();
			break;
	}
}
?>