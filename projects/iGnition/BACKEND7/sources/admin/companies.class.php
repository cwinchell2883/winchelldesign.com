<?php

class Module
{

	function header()
	{
		global $db;

		$links = '<a href="companies.php">Manage Companies</a> | '
			. '<a href="companies.php?do=add_company">Add Company</a>';

		do_module_header('Companies',$links,'Companies');
	}

	function delete()
	{
		global $db;

		$db->Execute("DELETE FROM `sp_companies`
				WHERE `id` = '$_REQUEST[id]';
				");

		SPMessage("Success | Company has been deleted.","companies.php");
	}

	function add()
	{
		$formdata = array(

			'field1' => array(

				'type' 	=> 	'text',
				'title' => 	'Title',
				'name' 	=> 	'title'

				),

			'field2' => array(

				'type' 	=> 	'text',
				'title' => 	'Homepage',
				'name'	=>	'homepage'

				),

			'field3' => array(

				'type'	=>	'text',
				'title'	=>	'Logo',
				'name'	=>	'logo'

				),

			'field4' => array(

				'type'	=>	'textarea',
				'title'	=>	'Description',
				'name'	=>	'description'

				),

			'field5' => array(

				'type'	=>	'submit',
				'title'	=>	'Add Company'

				)

			);

		GenerateForm('companies.php','Add Company','add_confirm',$formdata);
	}

	function add_confirm()
	{
		global $db;

		$record = array(

			'title' => $_REQUEST['title'],
			'homepage' => $_REQUEST['homepage'],
			'description' => $_REQUEST['description'],
			'logo' => $_REQUEST['logo']

			);

		$db->AutoExecute('sp_companies',$record,'INSERT');
		SPMessage("Success | Company has been added","companies.php");
	}

	function view_matrix()
	{
		SPMessage('Loading content matrix...',"rcm_matrix.php?do=viewmatrix&type=companies&id=" . $_REQUEST[id]);
	}

	function edit()
	{
		global $db;

		$company = $db->Execute("SELECT * FROM `sp_companies`
						WHERE `id` = '" . $_REQUEST['id'] . "';
						");

		$result = $db->GetRow("SELECT sp_companies.id,sp_companies.title,sp_companies.homepage,sp_companies.description,sp_companies.logo
					FROM sp_companies
					WHERE sp_companies.id = " . $_REQUEST[id] . ";
					");

		$formdata = array(

			'field1' => array(
				'type' 	=> 	'text',
				'title' => 	'Title',
				'name' 	=> 	'title',
				'value'	=>	clean($result['title'])

				),

			'field2' => array(

				'type' 	=> 	'text',
				'title' => 	'Homepage',
				'name'	=>	'homepage',
				'value'	=>	clean($result['homepage'])

				),

			'field3' => array(

				'type'	=>	'text',
				'title'	=>	'Logo',
				'name'	=>	'logo',
				'value'	=>	clean($result['logo'])

				),

			'field4' => array(

				'type'	=>	'textarea',
				'title'	=>	'Description',
				'name'	=>	'description',
				'value'	=>	clean($result['description'])

				),

			'field5' => array(

				'type'	=>	'submit',
				'title'	=>	'Save Company'

				)

			);

		$hidden = array(
			'id' => $_REQUEST['id']
			);

		GenerateForm('companies.php','Edit Company','edit_confirm',$formdata,$hidden);
	}

	function save()
	{
		global $db;

		$record = array(

			'title' => $_REQUEST['title'],
			'homepage' => $_REQUEST['homepage'],
			'description' => $_REQUEST['description'],
			'logo' => $_REQUEST['logo']

			);

		$db->AutoExecute('sp_companies',$record,'UPDATE',"id = '" . $_REQUEST[id] . "'");

		SPMessage('Success | Company has been updated.','companies.php');
	}

	function main()
	{
		global $db;

		$sections = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','1','2','3','4','5','6','7','8','9','0');

		do_table_header('View all companies by title');

		echo "<tr><td class=\"formlabel\">";
		foreach ($sections AS $key => $value) {
		  echo "<b><a href=\"companies.php?s=$value\">$value</a></b> &nbsp;";
		}
		echo "</td></tr>";

		do_table_footer();

		do_form_header('companies.php');

		do_table_header('All Companies');

		if (isset($_REQUEST['s']))
		{
			$where = "WHERE sp_companies.title LIKE '" . $_REQUEST[s] . "%'";
		}

		$result = $db->Execute("SELECT sp_companies.id,sp_companies.title,sp_companies.homepage
						FROM sp_companies
						$where
						ORDER BY sp_companies.title;");
		echo '<tr>';
		echo '<td bgcolor="#DDDDDD" style="border-bottom: 1px solid #808080; border-top: 1px solid #808080;"><b>Title</b></td>';
		echo '<td bgcolor="#DDDDDD" style="border-bottom: 1px solid #808080; border-top: 1px solid #808080;"><b>Homepage</b></td>';
		echo '</tr>';

		while ($row = $result->FetchNextObject())
		{
			$bgcolor = ($bgcolor == "#FFFFFF" ? "#F1EFE2" : "#FFFFFF");
			echo '<tr><td bgcolor="' . $bgcolor . '">';
			echo '<label for="id' . $row->ID. '">';
			echo '<input type="radio" id="id' . $row->ID . '" name="id" VALUE="' . $row->ID . '">' . stripslashes($row->TITLE);
			echo '</label>';
			echo '</td>';
			echo '<td bgcolor="' . $bgcolor . '">' . stripslashes($row->HOMEPAGE) . '</td>';
			echo '</tr>';
		}

		echo '<tr><td colspan="2" bgcolor="#FFFFFF">';
		echo '<input type="submit" name="do" value="Edit Company">';
		echo '<input type="submit" name="do" value="Delete Company">';
		echo '<input type="submit" name="do" value="View Matrix">';
		echo '</tr></td>';

		do_table_footer();

		do_form_footer();

	}


}

?>