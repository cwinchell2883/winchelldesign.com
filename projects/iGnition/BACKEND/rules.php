<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showNav(); ?>
</div>
<div id="col2">
	<h2>Rules</h2>
		<?php
		mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
		mysql_select_db($mysql_db) or die(mysql_error()); 
		$result = mysql_query("SELECT num, rule, id FROM bcs_rules ORDER BY num + 0")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{	
			$id=$r["id"];
			$num=$r["num"];
			$rule=$r["rule"];
			echo "<p><b>#$num</b>&nbsp;&nbsp; $rule<p>";
		}
		?>
</div>
<div id="footer"><?php echo $release; ?></div>