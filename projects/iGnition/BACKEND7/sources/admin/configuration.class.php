<?php

class Module
{

	/**
	* Save configuration data
	*
	*/
	function saveConfig( $key, $value='' )
	{
		global $db;
		$db->Execute( "UPDATE sp_configuration SET `value` = '$value' WHERE `key` = '$key'" );
	}


	/**
	* Module Header
	*
	*/
	function printHeader()
	{
		do_form_header( 'configuration.php' );
		do_table_header( 'Settings' );
		echo '
			<tr>
				<td class="formlabel" align="right"><strong>iGaming CMS Options:&nbsp;&nbsp;</strong>
					<select name="setting">
					<option value="global">Global Settings</option>
					</select>
				</td>
			</tr>';
		do_submit_row( 'Go' );
		do_table_footer();
		do_form_footer();
	}


	/**
	* Edit global settings
	*
	*/
	function editGlobal()
	{
		global $db, $spconfig;
		do_form_header( 'configuration.php' );
		do_table_header( 'Global Settings' );
		do_text_row( 'Website Title', 'site_title', clean($spconfig['site_title']) );
		do_text_row( 'Meta Description', 'meta_description', clean($spconfig['meta_description']) );
		do_text_row( 'Meta Keywords', 'meta_keywords', clean($spconfig['meta_keywords']) );
		do_text_row( 'Date Format', 'date_format', clean($spconfig['date_format']) );
		$options = array (
			2 => "User's Browser Does not Cache Pages.  Content Always Updated From Server",
			1 => "User's Browser Caches Pages.  Page Updaed From Server Each Reload",
			0 => "User's Browser Caches Pages.  Page Not Updaed From Server Each Reload"
		);
		do_select_row( 'True Refresh<br /></b><small><i>Forces user\'s browser to fetch new content on each reload</i></small>', 'true_refresh', $options, clean($spconfig['true_refresh']));
		do_submit_row( 'Save Configuration' );
		do_table_footer();
		echo '<input type="hidden" name="do" value="global_save">';
		do_form_footer();
	}


	/**
	* Save global settings to db
	*
	*/
	function saveGlobal()
	{
		global $db;
		$this->saveConfig( 'site_title', $_REQUEST['site_title'] );
		$this->saveConfig( 'meta_description', $_REQUEST['meta_description'] );
		$this->saveConfig( 'meta_keywords', $_REQUEST['meta_keywords'] );
		$this->saveConfig( 'date_format', $_REQUEST['date_format'] );
		$this->saveConfig( 'true_refresh', $_REQUEST['true_refresh'] );
		SPMessage( 'Success | Changes have been saved.', 'configuration.php' );

	}
}

?>