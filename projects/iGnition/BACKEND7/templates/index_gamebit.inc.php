<?php

// Template Information
// ======================================================================
// This template displays a table of the newest games that
// have been added to the site.
//
// You can alter the number of games displayed by changing
// the limit in the SQL statement. The default limit is 10.
// ======================================================================

?>

<div style="border: 1px solid #324596;">

	<div style="background: url(images/gradient_1.jpg); border-bottom: 1px solid #324596; color: #ffffff; font-weight: bold; padding: 3px;">
	Latest Games
	</div>

	<?php
	$sections = FetchSections('sp_games_sections');
	$result = $db->Execute("
		SELECT id,title,section
		FROM `sp_games`
		WHERE `published` = '1'
		ORDER BY `id` DESC
		LIMIT 0,10;");

	while ($row = $result->FetchNextObject()) {
		// Alternating background colors
		$bgcolor = ($bgcolor == "#ffffff" ? "#e9e9e9" : "#ffffff");
		echo '<div style="padding: 3px; background: ' . $bgcolor . ';">';
		echo $sections["$row->SECTION"];
		echo ': <a href="gamedetails.php?id='.$row->ID.'">'.stripslashes($row->TITLE).'</a>';
		echo '</div>';
		}
	?>

	<div style="padding: 3px; text-align: center;">
		<a href="games.php">Browse Games</a> |
    	<a href="search.php">Search Games</a>
    </div>

</div>