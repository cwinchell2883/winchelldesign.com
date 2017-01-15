<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showNav(); ?>
    <div style="visibility:hidden;">
	<br/>
	<h2>Top Recruiters</h2>
	<table id="recruiters">
		<tr>
			<th>Rank</th>
			<th>Member Name</th>
			<th>Recruits</th>
		</tr>
		<?php
		mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
		mysql_select_db($mysql_db) or die(mysql_error()); 
		$sql = 'SELECT id, name, countrecruit FROM bcs_members, (SELECT recruit, COUNT( recruit ) AS countrecruit '
			. 'FROM bcs_members WHERE recruit != \'\' GROUP BY recruit ORDER BY countrecruit DESC) AS results '
			. 'WHERE results.recruit = bcs_members.id LIMIT 10';
		$result = mysql_query($sql)  or die(mysql_error());
		$i = 1;
		while($r=mysql_fetch_array($result))
		{
			$name=$r["name"];
			$count=$r["countrecruit"];
			echo "<tr>";
			echo "<td>" . $i . "</td>";
			echo '<td><a href="?page=members&showmember=' . $name . '">' . $name . '</a></td>';
			echo  "<td class=\"center\">" . $count . "</td>";
			echo "</tr>";
			$i = $i + 1;
		}
		?>
	</table>
    </div>
</div>
<div id="col2">
	<h2>News</h2>
	<?php
	mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
	mysql_select_db($mysql_db) or die(mysql_error()); 
	$result = mysql_query("SELECT * FROM bcs_news ORDER BY date DESC")  or die(mysql_error());
	while($r=mysql_fetch_array($result))
	{
		$id=$r["id"];
		$title=$r["title"];
		$news=$r["news"];
		$date=$r["date"];
		$name=$r["name"];
		echo '<div class="news"><span class="news_title">'.$title.'</span> <span class="news_date">'. date("F d, Y g:i a", strtotime($date)) .'</span><br />';
		echo '<span class="news_news">';
		parse($news);
		echo '</span><br />';
		echo '<span class="news_submittedby">Submitted by:  </span><span class="news_name">'.$name.'</span></div>';
	}
	?>
</div>
<div id="footer"><?php echo $release; ?></div>