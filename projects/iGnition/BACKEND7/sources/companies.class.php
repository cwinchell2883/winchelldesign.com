<?php

class Module
{
	function main()
	{
		global $db;

		$result = $db->Execute("SELECT id, title FROM sp_companies ORDER BY title;");

		while ($row = $result->FetchNextObject())
		{
			$companies_list .= '<a href="companies.php?do=view&id='.$row->ID.'">'.clean($row->TITLE).'</a><br />';
		}

		include "templates/companies_list.inc.php";
	}

	function view()
	{
		global $db;

		if ( !is_numeric($_REQUEST['id']) )
		{
			die("Critical Error: Aborting script operations.");
		}

		$result = $db->Execute("SELECT * FROM sp_companies WHERE id = $_REQUEST[id] LIMIT 1");

		$company = array();

		$company['title'] = stripslashes($result->fields['title']);
		$company['description'] = clean($result->fields['description']);

		if ( !empty($result->fields['homepage']) )
		{
			$company['homepage'] = '<a href="' . stripslashes($result->fields['homepage']) . '" target="_blank">'
										. stripslashes($result->fields['homepage']) . '</a>';
		}

		if ( !empty($result->fields['logo']) )
		{
			$company['logo'] .= "<img src=\"";
			$company['logo'] .= stripslashes($result->fields['logo']);
			$company['logo'] .= "\" alt=\"" . $company['title'] . " align=\"right\" hspace=\"2\" vspace=\"2\">";
		}

		$result = $db->Execute("
			SELECT id, title, section, developer
			FROM sp_games
			WHERE developer = " . $_REQUEST['id'] . "
			ORDER BY title;");

		while ( $row = $result->FetchNextObject() )
		{
			$company['dev_links'] .= '<a href="gamedetails.php?id='.$row->ID.'">'.stripslashes($row->TITLE).'</a><br />';
		}

		$result = $db->Execute("
			SELECT id, title, section, publisher
			FROM sp_games
			WHERE publisher = " . $_REQUEST['id'] . "
			ORDER BY title;");

		while ( $row = $result->FetchNextObject() )
		{
			$company['pub_links'] .= '<a href="gamedetails.php?id='.$row->ID.'">'.stripslashes($row->TITLE).'</a><br />';
		}


		include "templates/companies_details.inc.php";
	}
}

?>