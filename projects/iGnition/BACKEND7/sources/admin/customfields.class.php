<?php

class Module
{
	/**
	* List all current custom fields
	*
	*/
	function main()
	{
		global $db;
		
		$result = $db->Execute("SELECT * FROM sp_customfields ORDER BY module;");
		while ($row = $result->FetchNextObject())
		{
			$customfields .= '<tr><td class="formlabel">'
				. '<input type="radio" name="id" value="' . $row->ID . '"> '
				. stripslashes($row->TITLE) . '</td><td class="formlabel">'
				. stripslashes($row->MODULE) . '</td></tr>';
		}
		
		do_form_header('customfields.php');
		do_table_header('Custom Fields');
		echo $customfields;
		echo '<tr>'
			. '<td class="formlabel" colspan="2">'
			. '<input type="submit" name="do" value="Edit Field"> '
			. '<input type="submit" name="do" value="Delete Field"> '
			. '</td>'
			. '</tr>';
		do_table_footer();
		do_form_footer();
	}
	
	
	/*
	* Add a new custom field
	*
	*/
	function add()
	{
		global $db;
		
		do_form_header('customfields.php');
		do_table_header('Add Custom Field');
		do_text_row('Field Name','title');
		
		echo '<tr>'
			. '<td class="formlabel" align="right"><b>Module</b></td>'
			. '<td class="formlabel">'
			. '<select name="module">'
			. '<option value="games">Games Manager</option>'
			. '</select>'
			. '</td></tr>';
			
		echo '<tr>'
			. '<td class="formlabel" align="right"><b>Field Type</b></td>'
			. '<td class="formlabel">'
			. '<select name="type">'
			. '<option value="text">Single-Line Text Box</option>'
			. '<option value="textarea">WYSIWYG Editor</option>'
			. '</select>'
			. '</td></tr>';
			
		do_submit_row('Add Field');
		do_table_footer();
		echo '<input type="hidden" name="do" value="add_confirm">';
		do_form_footer();
	}
	
	
	/*
	* Add custom field to database
	*
	*/
	function add_confirm()
	{
		global $db;
		
		$record = array(
			'title' => $_REQUEST['title'],
			'module' => $_REQUEST['module'],
			'type' => $_REQUEST['type'] );
			
		$db->AutoExecute('sp_customfields',$record,'INSERT');
		SPMessage('Success | Field has been created.','customfields.php');
	}
	
	
	/*
	* Save changes to custom field
	*
	*/
	function edit_confirm()
	{
		global $db;
		
		$record = array(
			'title' => $_REQUEST['title'],
			'module' => $_REQUEST['module'],
			'type' => $_REQUEST['type'] );
			
		$db->AutoExecute('sp_customfields',$record,'UPDATE',"id = $_REQUEST[id]");
		SPMessage('Success | Changes have been saved.','customfields.php');
	}
	
	
	/*
	* Edit custom field
	*
	*/
	function edit()
	{
		global $db;
		
		$result = $db->Execute("SELECT * FROM sp_customfields WHERE id = $_REQUEST[id];");
		$field = $result->FetchRow();
		
		do_form_header('customfields.php');
		do_table_header('Edit Custom Field');
		do_text_row('Field Name','title',stripslashes($field['title']));
		
		echo '<tr>'
			. '<td class="formlabel" align="right"><b>Module</b></td>'
			. '<td class="formlabel">'
			. '<select name="module">';
			
			if ($field['module'] == 'games')
			{
				echo '<option value="games" selected>Games Manager</option>';
			} else {
				echo '<option value="games">Games Manager</option>';
			}
			
			echo '</select>'
			. '</td></tr>';
			
		echo '<tr>'
			. '<td class="formlabel" align="right"><b>Field Type</b></td>'
			. '<td class="formlabel">'
			. '<select name="type">';
			
			if ($field['type'] == 'text')
			{
				echo '<option value="text" selected>Single-Line Text Box</option>';
			} else {
				echo '<option value="text">Single-Line Text Box</option>';
			}
			
			if ($field['type'] == 'textarea')
			{
				echo '<option value="textarea" selected>WYSIWYG Editor</option>';
			} else {
				echo '<option value="textarea">WYSIWYG Editor</option>';
			}
			
			echo '</select>'
			. '</td></tr>';
			
		do_submit_row('Update');
		do_table_footer();
		echo '<input type="hidden" name="do" value="edit_confirm">';
		echo '<input type="hidden" name="id" value="' . $_REQUEST['id'] . '">';
		do_form_footer();
	}
	
	
	/*
	* Delete custom field and print confirmation message
	*
	*/
	function delete()
	{
		global $db;
		
		$db->Execute("DELETE FROM sp_customfields WHERE id = $_REQUEST[id];");
                $db->Execute("DELETE FROM sp_games_customdata WHERE fieldid = $_REQUEST[id];");
		SPMessage('Success | Field has been removed.','customfields.php');
	}
}
?>