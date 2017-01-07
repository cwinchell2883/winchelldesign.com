<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showNav(); ?>
</div>
<div id="col2">
	<h2>Diplomacy</h2>
	<table id="members">
		<tr>
			<th>Clan</th>
			<th>Channel</th>
			<th>Status</th>
		</tr>
		<?php
		mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
		mysql_select_db($mysql_db) or die(mysql_error());
		$alt = 0;
		$result = mysql_query("SELECT * FROM bcs_diplomacy")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{	
			$id=$r["id"];
			$clan=$r["clan"];
			$channel=$r["channel"];
			$status=$r["status"];
			if ($alt % 2 == 0) { echo '<tr class="altrow">' . "\n"; }
			else {  echo '<tr>' . "\n"; }
			echo "<td>" . $clan . "</td>\n";
			echo "<td>" . $channel . "</td>\n";
			echo "<td>" . $status . "</td>\n";
			echo "</tr>\n";
			$alt = $alt + 1;
		}
		?>
       </table>
</div>
<div id="footer"><?php echo $release; ?></div>