<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showNav(); ?>
</div>
<div id="col2">
	<h2>History</h2>
		<?php
		mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
		mysql_select_db($mysql_db) or die(mysql_error()); 
		$result = mysql_query("SELECT * FROM bcs_history WHERE id=1")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{
			$history=$r["history"];
		}
		echo '<p>';
		parse($history);
		echo '</p>';
		?>
</div>
<div id="footer"><?php echo $release; ?></div>