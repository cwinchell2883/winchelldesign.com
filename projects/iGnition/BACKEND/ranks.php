<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showNav(); ?>
</div>
<div id="col2">
	<h2>Ranks</h2>
	<table id="members">
		<tr>
			<th>Order</th>
			<th>Rank</th>
		</tr>
		<?php
		mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
		mysql_select_db($mysql_db) or die(mysql_error());
		$alt = 0;
		$result = mysql_query("SELECT * FROM bcs_ranks ORDER BY `order`")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{
			$id=$r["id"];
			$order=$r["order"];
			$name=$r["name"];
			if ($alt % 2 == 0) { echo '<tr class="altrow">' . "\n"; }
			else {  echo '<tr>' . "\n"; }
			echo "<td>" . $order . "</td><td>" . $name . "</td>\n";
			echo "</tr>\n";
			$alt = $alt + 1;
		}
		?>
	</table>
</div>
<div id="footer"><?php echo $release; ?></div>