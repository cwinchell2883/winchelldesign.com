<?php

class Module
{

	function header()
	{
		$links = "<a href=cheats.php>Manage Cheats</a>";
		do_module_header('Cheats',$links);
	}

	function main()
	{

		global $db;

		do_table_header('Cheats');

		echo "<tr><td class=\"formlabel\"><b>";
		$alpha = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');
		foreach($alpha AS $value)
		{
			echo "<a href=\"cheats.php?browse=$value\">$value</a> &nbsp;";
		}
		echo "</b></td></tr>";

		if (empty($_REQUEST['browse']))
		{
			$browse = 'A';
		}
		else
		{
			$browse = $_REQUEST['browse'];
		}

		$sections = FetchSections('sp_games_sections');

		$result = $db->Execute("SELECT id,title,section
					FROM `sp_games`
					WHERE `title` LIKE '" . $browse . "%'
					ORDER BY `title`;") or die($db->ErrorMsg());

		while ($row = $result->FetchNextObject())
		{
			echo '<tr><td style="font-size: 8pt;" class="formlabel">';
			echo '<a href="cheats.php?do=add&id='.$row->ID.'">[add cheat]</a> ';
			echo '<a href="cheats.php?do=manage&id='.$row->ID.'">[manage cheats]</a> &nbsp; &nbsp;';
			echo ' <b>'.clean($row->TITLE).'</b> ('.$sections["$row->SECTION"].')';
			echo '</td></tr>';
		}

		do_table_footer();
	}

	function manage()
	{
		global $db;

		$result = $db->Execute("SELECT id,title
					FROM `sp_games`
					WHERE `id` = '{$_REQUEST['id']}';");

		do_table_header("Cheats: " . clean($result->fields['title']));

		$result = $db->Execute("SELECT id,title,gameid
					FROM `sp_cheats`
					WHERE `gameid` = '{$_REQUEST['id']}'
					ORDER BY `title`;");

		echo '<tr><td style="font-size: 8pt;" class="formlabel">';
		if ( $result->RecordCount() == 1 )
		{
			echo '<b>There is 1 cheat for this game.</b>';
		}
		else
		{
			echo '<b>There are ' . $result->RecordCount() . ' cheats for this game.</b>';
		}
		echo '</td></tr>';

		while ($row = $result->FetchNextObject())
		{
			echo "<tr>
					<td style='font-size: 8pt;' class='formlabel'>
					<a href=\"cheats.php?do=edit&id=$row->ID\">[edit cheat]</a>
					<a href=\"cheats.php?do=delete&id=$row->ID\">[delete]</a> &nbsp;
					" . clean($row->TITLE) . "
					</td>
				</tr>";
		}
	}

	function delete()
	{
		global $db;

		$db->Execute("DELETE FROM `sp_cheats`
				WHERE `id` = '{$_REQUEST['id']}';");

		SPMessage('Success: Cheat has been deleted.',"cheats.php?do=manage&id={$_REQUEST['id']}");
	}

	function edit()
	{
		global $db;

		$result = $db->Execute("SELECT * FROM `sp_cheats`
					WHERE `id` = '{$_REQUEST['id']}';");

		$formdata = array(

			'1' => array(

				'type' => 'text',
				'title' => 'Cheat Title',
				'name' => 'title',
				'value' => clean($result->fields['title'])

				),

			'2' => array(

				'type' => 'textarea',
				'title' => 'Cheat Text',
				'name' => 'cheat',
				'value' => clean($result->fields['cheat'])

				),

			'3' => array(

				'type' => 'submit',
				'title' => 'Save Changes'

				)
			);

		$hidden = array(
			'id' => $_REQUEST['id']
			);

		GenerateForm('cheats.php','Edit Cheat','edit_confirm',$formdata,$hidden);
	}

	function add()
	{
		global $db;

		$formdata = array(

			'1' => array(

				'type' => 'text',
				'title' => 'Cheat Title',
				'name' => 'title',

				),

			'2' => array(

				'type' => 'textarea',
				'title' => 'Cheat Text',
				'name' => 'cheat'

				),

			'3' => array(

				'type' => 'submit',
				'title' => 'Add Cheat'

				)
			);

		$hidden = array(
			'gameid' => $_REQUEST['id']
			);

		GenerateForm('cheats.php','Add Cheat','add_confirm',$formdata,$hidden);
	}

	function add_confirm()
	{
		global $db;

		$rs = $db->Execute("SELECT * FROM `sp_cheats`
					WHERE `id` = '0';");
		$record = array(

			'gameid' => $_REQUEST['gameid'],
			'title' => $_REQUEST['title'],
			'cheat' => $_REQUEST['cheat'],

			);

		$sql = $db->GetInsertSQL($rs, $record);
		$db->Execute($sql);

		SPMessage('Success: Cheat has been added.','cheats.php');
	}

	function edit_confirm()
	{
		global $db;

		$rs = $db->Execute("SELECT * FROM `sp_cheats`
					WHERE `id` = '{$_REQUEST['id']}';");

		$record = array(

			'title' => $_REQUEST['title'],
			'cheat' => $_REQUEST['cheat'],

			);

		$sql = $db->GetUpdateSQL($rs, $record);
		$db->Execute($sql);

		SPMessage('Success: Changes have been saved.','cheats.php');
	}


}

?>