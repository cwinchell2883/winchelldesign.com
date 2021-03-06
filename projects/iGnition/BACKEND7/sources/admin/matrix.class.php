<?php

function do_news_row()
{
	global $db;
	$result = $db->Execute("SELECT id,title FROM sp_news ORDER BY title;");
	while ($row = $result->FetchNextObject())
	{
		$options .= "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . "</option>\n";
	}

echo <<<EOF
	<tr>
		<td class="formlabel" align="right"><b>Article</b></td>
		<td class="formlabel">
			<select name="relid">
			$options
			</select>
		</td>
	</tr>
EOF;
}



function do_games_row()
{
	global $db;
	$result = $db->Execute("SELECT id,title FROM sp_games ORDER BY title");
	while ($row = $result->FetchNextObject())
	{
		$options .= "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . "</option>\n";
	}

echo <<<EOF
	<tr>
		<td class="formlabel" align="right"><b>Game</b></td>
		<td class="formlabel">
			<select name="relid">
			$options
			</select>
		</td>
	</tr>
EOF;
}



function do_pages_row()
{
	global $db;
	$result = $db->Execute("SELECT id,title FROM sp_pages ORDER BY title");
	while ($row = $result->FetchNextObject())
	{
		$options .= "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . "</option>\n";
	}

echo <<<EOF
	<tr>
		<td class="formlabel" align="right"><b>Pages</b></td>
		<td class="formlabel">
			<select name="relid">
			$options
			</select>
		</td>
	</tr>
EOF;
}



function do_reviews_row()
{
	global $db;
	$result = $db->Execute("SELECT id,title FROM sp_reviews ORDER BY title");
	while ($row = $result->FetchNextObject())
	{
		$options .= "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . "</option>\n";
	}

echo <<<EOF
	<tr>
		<td class="formlabel" align="right"><b>Reviews</b></td>
		<td class="formlabel">
			<select name="relid">
			$options
			</select>
		</td>
	</tr>
EOF;
}



function do_previews_row()
{
	global $db;
	$result = $db->Execute("SELECT id,title FROM sp_previews ORDER BY title");
	while ($row = $result->FetchNextObject())
	{
		$options .= "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . "</option>\n";
	}

echo <<<EOF
	<tr>
		<td class="formlabel" align="right"><b>Previews</b></td>
		<td class="formlabel">
			<select name="relid">
			$options
			</select>
		</td>
	</tr>
EOF;
}



function do_companies_row()
{
   global $db;
   $result = $db->Execute("SELECT id,title FROM sp_companies ORDER BY title");
   while ($row = $result->FetchNextObject())
   {
	   $options .= "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . "</option>\n";
   }

echo <<<EOF
	<tr>
		<td class="formlabel" align="right"><b>Companies</b></td>
		<td class="formlabel">
			<select name="relid">
			$options
			</select>
		</td>
	</tr>
EOF;
}



function do_screenshots_row()
{
	global $db;
	$result = $db->Execute("SELECT id,title FROM sp_screenshots ORDER BY title");
	while ($row = $result->FetchNextObject())
	{
		$options .= "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . "</option>\n";
	}

echo <<<EOF
	<tr>
		<td class="formlabel" align="right"><b>Screenshots</b></td>
		<td class="formlabel">
			<select name="relid">
			$options
			</select>
		</td>
	</tr>
EOF;
}

// This function generates the content matrix listing overview for any piece of content.

function generate_matrix($type) {
	global $db;

	// Related News
	$result = $db->Execute("
		SELECT * FROM `sp_matrix`
		WHERE `ctype` = '$type' AND `cid` = '{$_REQUEST['id']}' AND `reltype` = 'news';");

	do_table_header( "Related News" );
	echo '<TR><TD CLASS="formlabel">';
	while ($row = $result->FetchNextObject())
	{
		$article = $db->Execute("
			SELECT id,title
			FROM `sp_news`
			WHERE `id` = '$row->RELID';");
		echo '<a href="rcm_matrix.php?type=news&do=viewmatrix&id=' . $article->fields['id'] . '">';
		echo stripslashes($article->fields['title']);
		echo '</a>';
		echo " ( <A HREF=\"rcm_matrix.php?do=delete_resource&did=$row->ID&type=$type&id=$_REQUEST[id]\">Delete</A> )<BR />";
	}
	echo '<b><a href="rcm_matrix.php?do=create&type=' . $type . '&reltype=news&id=' . $_REQUEST['id'] . '">Create New Link</a></b>';
	echo '</TD></TR>';
	do_table_footer();


	do_table_header( "Related Games" );
    echo '<TR><TD CLASS="formlabel">';

	$result = $db->Execute("
		SELECT * FROM `sp_matrix`
		WHERE `ctype` = '$type' AND `cid` = '$_REQUEST[id]' AND `reltype` = 'games'
	");

	while ($row = $result->FetchNextObject())
	{
		$game = $db->Execute("SELECT id,title FROM `sp_games` WHERE `id` = '$row->RELID'");
		echo '<a href="rcm_matrix.php?type=games&do=viewmatrix&id=', $game->fields['id'], '">', stripslashes($game->fields['title']), '</a>';
		echo ' (<a href="rcm_matrix.php?do=delete_resource&did='.$row->ID.'&type='.$type.'&id='.$_REQUEST[id].'">Delete</a>)<br />';
	}

	echo '<b><a href="rcm_matrix.php?do=create&type=', $type, '&reltype=games&id=', $_REQUEST[id], '">Create New Link</a></b>';
	echo '</td></tr>';

	do_table_footer();

	do_table_header( "Related Pages" );

	$result = $db->Execute("SELECT * FROM `sp_matrix` WHERE `ctype` = '$type' AND `cid` = '$_REQUEST[id]' AND `reltype` = 'pages'");
	echo '<tr><td class="formlabel" colspan="2">';
	while ($row = $result->FetchNextObject()) {
	 $game = $db->Execute("SELECT id,title FROM `sp_pages` WHERE `id` = '$row->RELID'");
	 echo '<a href="rcm_matrix.php?type=pages&do=viewmatrix&id=', $game->fields['id'], '">', stripslashes($game->fields['title']), '</a>';
	 echo ' (<a href="rcm_matrix.php?do=delete_resource&did='.$row->ID.'&type='.$type.'&id='.$_REQUEST[id].'">Delete</a>)<br />';
	 }
	echo '<b><a href="rcm_matrix.php?do=create&type=', $type, '&reltype=pages&id=', $_REQUEST[id], '">Create New Link</a></b>';
	echo '</td></tr>';
	do_table_footer();

	do_table_header('Related Reviews');
	echo "<tr><td class=\"formlabel\" colspan=\"2\">";
	$result = $db->Execute("SELECT * FROM `sp_matrix` WHERE `ctype` = '$type' AND `cid` = '$_REQUEST[id]' AND `reltype` = 'reviews'");
	while ($row = $result->FetchNextObject()) {
		$game = $db->Execute("SELECT id,title FROM `sp_reviews` WHERE `id` = '$row->RELID'");
		echo '<a href="rcm_matrix.php?type=reviews&do=viewmatrix&id=', $game->fields['id'], '">', stripslashes($game->fields['title']), '</a>';
		echo ' (<a href="rcm_matrix.php?do=delete_resource&did='.$row->ID.'&type='.$type.'&id='.$_REQUEST[id].'">Delete</a>)<br />';
		}
	echo '<b><a href="rcm_matrix.php?do=create&type=', $type, '&reltype=reviews&id=', $_REQUEST[id], '">Create New Link</a></b>';
	echo '</td></tr>';
	do_table_footer();


	do_table_header('Related Previews');
	$result = $db->Execute("SELECT * FROM `sp_matrix` WHERE `ctype` = '$type' AND `cid` = '$_REQUEST[id]' AND `reltype` = 'previews'");
	echo '<tr><td class="formlabel" colspan="2">';
	while ($row = $result->FetchNextObject())
	{
		$game = $db->Execute("SELECT id,title FROM `sp_previews` WHERE `id` = '$row->RELID'");
		echo '<a href="rcm_matrix.php?type=previews&do=viewmatrix&id=', $game->fields['id'], '">', stripslashes($game->fields['title']), '</a>';
		echo ' (<a href="rcm_matrix.php?do=delete_resource&did='.$row->ID.'&type='.$type.'&id='.$_REQUEST[id].'">Delete</a>)<br />';
	}
	echo '<b><a href="rcm_matrix.php?do=create&type=', $type, '&reltype=previews&id=', $_REQUEST[id], '">Create New Link</a></b>';
	echo '</td></tr>';
	do_table_footer();

	do_table_header('Related Companies');
	$result = $db->Execute("SELECT * FROM `sp_matrix` WHERE `ctype` = '$type' AND `cid` = '$_REQUEST[id]' AND `reltype` = 'companies'");
	echo '<tr><td class="formlabel" colspan="2">';
	while ($row = $result->FetchNextObject())
	{
		$game = $db->Execute("SELECT id,title FROM `sp_companies` WHERE `id` = '$row->RELID'");
		echo '<a href="rcm_matrix.php?type=companies&do=viewmatrix&id=', $game->fields['id'], '">', stripslashes($game->fields['title']), '</a>';
		echo ' (<a href="rcm_matrix.php?do=delete_resource&did='.$row->ID.'&type='.$type.'&id='.$_REQUEST[id].'">Delete</a>)<br />';
	}
	echo '<b><a href="rcm_matrix.php?do=create&type=', $type, '&reltype=companies&id=', $_REQUEST[id], '">Create New Link</a></b>';
	echo '</td></tr>';
	do_table_footer();

	do_table_header('Related Screenshots');
	$result = $db->Execute("SELECT * FROM `sp_matrix` WHERE `ctype` = '$type' AND `cid` = '$_REQUEST[id]' AND `reltype` = 'screenshots'");
	echo '<tr><td class="formlabel" colspan="2">';
	while ($row = $result->FetchNextObject())
	{
		$game = $db->Execute("SELECT id,title FROM `sp_screenshots` WHERE `id` = '$row->RELID'");
		echo '<a href="rcm_matrix.php?type=screenshots&do=viewmatrix&id=', $game->fields['id'], '">', stripslashes($game->fields['title']), '</a>';
		echo ' (<a href="rcm_matrix.php?do=delete_resource&did='.$row->ID.'&type='.$type.'&id='.$_REQUEST[id].'">Delete</a>)<br />';
	}
	echo '<b><a href="rcm_matrix.php?do=create&type=', $type, '&reltype=screenshots&id=', $_REQUEST[id], '">Create New Link</a></b>';
	echo '</td></tr>';
	do_table_footer();
   }
?>