<?php

class Module
{

	function sql_query()
	{
		do_form_header("dbtools.php");
		do_table_header("SQL Query Tool");
		echo '<tr><td class="formlabel"><textarea name="query" rows="5" cols="50"></textarea><br />';
		echo 'Please do not enter more than one query at a time.</td></tr>';
		do_submit_row("Go");
		do_table_footer();
		echo '<input type="hidden" name="do" value="run_query">';
		do_form_footer();
	}

	function run_query()
	{
		global $db;
		do_table_header("Query Results");
		echo "<tr><td class='formlabel'>";

		$db->debug = 1;
		$db->Execute(stripslashes($_REQUEST['query']));
		$db->debug = 0;

		echo "</td></tr>";
		do_table_footer();
	}
	
	function viewStatistics()
	{
		global $db;
		
		$result = $db->Execute( "SELECT id FROM sp_cheats" );
		$totalCheats = $result->RecordCount();
		
		$result = $db->Execute( "SELECT id FROM sp_companies" );
		$totalCompanies = $result->RecordCount();
		
		$result = $db->Execute( "SELECT id FROM sp_downloads" );
		$totalDownloads = $result->RecordCount();
		
		$result = $db->Execute( "SELECT id FROM sp_games" );
		$totalGames = $result->RecordCount();
		
		$result = $db->Execute( "SELECT id FROM sp_news" );
		$totalNews = $result->RecordCount();
		
		$result = $db->Execute( "SELECT id FROM sp_previews" );
		$totalPreviews = $result->RecordCount();
		
		$result = $db->Execute( "SELECT id FROM sp_reviews" );
		$totalReviews = $result->RecordCount();
		
		$result = $db->Execute( "SELECT id FROM sp_screenshots" );
		$totalScreenshots = $result->RecordCount();
		
		do_table_header( 'Database Statistics' );
		echo '
			<tr>
				<td class="formlabel">';
				
		echo '
			<table border="0" cellspacing="0" cellpadding="5" width="100%">
			<tr>
			<td align="center"><strong>Total Cheats</strong><br />'.$totalCheats.'</td>
			<td align="center"><strong>Total Companies</strong><br />'.$totalCompanies.'</td>
			<td align="center"><strong>Total Downloads</strong><br />'.$totalDownloads.'</td>
			</tr>
			<tr>
			<td align="center"><strong>Total Games</strong><br />'.$totalGames.'</td>
			<td align="center"><strong>Total Articles</strong><br />'.$totalNews.'</td>
			<td align="center"><strong>Total Previews</strong><br />'.$totalPreviews.'</td>
			</tr>
			<tr>
			<td align="center"><strong>Total Reviews</strong><br />'.$totalReviews.'</td>
			<td align="center"><strong>Total Screenshots</strong><br />'.$totalScreenshots.'</td>
			<td align="center"></td>
			</tr>
			</table>';
				
		echo '
				</td>
			</tr>';
		do_table_footer();
	}

}

?>