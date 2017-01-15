<?php

/*
##############################################################
 iGaming CMS Content Management System
 Copyright (C) 2004  Joshua Kimbrel

 This program is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
##############################################################
*/


error_reporting(E_ALL ^ E_NOTICE);

switch ($_REQUEST['do'])
{
	case 'add_confirm':
		$refresh = "screenshots.php";
		break;
	case 'Delete Screenshot':
		$refresh = "screenshots.php";
		break;
	case 'edit_confirm':
		$refresh = "screenshots.php";
		break;
}


include "global.php";
include "../sources/admin/screenshots.class.php";

$cp->header();

$module = new Module;
$module->header();

if (!isset($_REQUEST['do'])) {
   $sections = $db->Execute("SELECT * FROM `sp_screenshots_sections` ORDER BY `id`");
   $spSections = array();
   while ($row = $sections->FetchNextObject()) {
      $spSections["$row->ID"] = $row->TITLE;
      }

   do_form_header('screenshots.php');
   do_table_header('Screenshots');
   if (isset($_REQUEST['s'])) {
      $latestPreview = $db->Execute("SELECT id,title,section FROM `sp_screenshots` WHERE `section` = '$_REQUEST[s]' ORDER BY `id` DESC");
   } else {
      $latestPreview = $db->Execute("SELECT id,title,section FROM `sp_screenshots` ORDER BY `id` DESC LIMIT 20");
   }

   echo "<tr><td class=\"formlabel\" colspan=\"2\"><select name=\"id\" size=\"15\">";
   while ($row = $latestPreview->FetchNextObject()) {
      $bgcolor = ($bgcolor == "#ECECFF" ? "#FFFFFF" : "#ECECFF");
      echo "<option value=\"$row->ID\">" . stripslashes($row->TITLE) . " (" . $spSections["$row->SECTION"] . ") </option>";

      }
   echo "</select></td></tr>";

   echo '<tr>
         <td colspan="2">
            <input type="submit" name="do" value="Edit Screenshot">
            <input type="submit" name="do" value="Delete Screenshot">
            <input type="submit" name="do" value="View Matrix">
         </td>
        </tr>';
   do_table_footer();
   echo '</form>';

   do_table_header('View all screenshots by section');
   echo '<table border="0" cellspacing="5" cellpadding="0">';
   $count = 0;
   foreach ($spSections AS $key => $value) {

      $count++;
      if ($count >= 2) {
         echo "<td width=\"150\"><b><a href=\"screenshots.php?s=$key\">&raquo; $value</a></b></td></tr>";
         $count = 0;
      } else {
         echo "<tr><td width=\"150\"><b><a href=\"screenshots.php?s=$key\">&raquo; $value</a></b></td>";
      }
   }
   echo '</table>';
   do_table_footer();
   }

if ($_REQUEST['do'] == 'add_screenshot') {

   $sections = FetchSections('sp_screenshots_sections');

   $formdata = array(
      'title' => array(
         'type' => 'text',
         'title' => 'Title:',
         'name' => 'title'),

     'section' => array(
        'type' => 'select',
        'title' => 'Sections:',
        'name' => 'section',
        'value' => $sections),

      'thumb' => array(
         'type' => 'text',
         'title' => 'Thumbnail URL',
         'name' => 'thumb'),

      'screen' => array(
         'type' => 'text',
         'title' => 'Screenshot URL',
         'name' => 'screen'),

      'submit' => array(
         'type' => 'submit',
         'title' => 'Add Screenshot')
      );
   GenerateForm('screenshots.php','Add Screenshot','add_confirm',$formdata);
   }

if ($_REQUEST['do'] == 'Edit Screenshot') {

   $result = $db->Execute("
      SELECT
         sp_screenshots.id, sp_screenshots.title, sp_screenshots.section, sp_screenshots.thumb, sp_screenshots.screen
      FROM
         sp_screenshots
      WHERE
         sp_screenshots.id = $_REQUEST[id]");
   $sections = FetchSections('sp_screenshots_sections');

   foreach($sections AS $key => $value) {
      if ($key == $result->fields['section']) { $selected = "selected"; }
      $sectionoptions .= "<option value=\"$key\" $selected>" . stripslashes($value) . "</option>";
      $selected = "";
   }
   $formdata = array(
      'title' => array(
         'type' => 'text',
         'title' => 'Title:',
         'name' => 'title',
         'value' => $result->fields['title']),

     'section' => array(
        'type' => 'select',
        'title' => 'Sections',
        'name' => 'section',
        'value' => $sections,
        'selected' => $result->fields['section']),

      'thumb' => array(
         'type' => 'text',
         'title' => 'Thumbnail URL',
         'name' => 'thumb',
         'value' => $result->fields['thumb']),

      'screen' => array(
         'type' => 'text',
         'title' => 'Screenshot URL',
         'name' => 'screen',
         'value' => $result->fields['screen']),

      'submit' => array(
         'type' => 'submit',
         'title' => 'Save Screenshot')
      );
   $hiddendata = array('id' => $_REQUEST[id]);
   GenerateForm('screenshots.php','Edit Screenshot','edit_confirm',$formdata,$hiddendata);
   }


if ($_REQUEST['do'] == 'add_confirm') {

   $RS = $db->Execute("
      SELECT sp_screenshots.id, sp_screenshots.title, sp_screenshots.thumb, sp_screenshots.screen,
      sp_screenshots.section
      FROM `sp_screenshots`
      WHERE sp_screenshots.id = '0'");
   $record = array(
      'title' => $_REQUEST['title'],
      'thumb' => $_REQUEST['thumb'],
      'screen' => $_REQUEST['screen'],
      'section' => $_REQUEST['section']);
   $sql = $db->GetInsertSQL($RS, $record);
   $db->Execute($sql);
   echo '<a href="screenshots.php">Click Here to Continue</a>';
   }

if ($_REQUEST['do'] == 'edit_confirm') {

   $RS = $db->Execute("
      SELECT sp_screenshots.id, sp_screenshots.title, sp_screenshots.thumb, sp_screenshots.screen,
      sp_screenshots.section
      FROM `sp_screenshots`
      WHERE sp_screenshots.id = '$_REQUEST[id]'");
   $record = array(
      'title' => $_REQUEST['title'],
      'thumb' => $_REQUEST['thumb'],
      'screen' => $_REQUEST['screen'],
      'section' => $_REQUEST['section']);
   $sql = $db->GetUpdateSQL($RS, $record);
   $db->Execute($sql);
   echo '<a href="screenshots.php">Click Here to Continue</a>';
   }

if ($_REQUEST['do'] == 'Delete Screenshot') {
   $db->Execute("DELETE FROM `sp_screenshots` WHERE `id` = '$_REQUEST[id]'");
   echo '<center>
            Screenshot has been deleted, <a href="screenshots.php">click here to continue</a>.
         </center>';
   }
if ($_REQUEST['do'] == 'manage_sections') {

   do_form_header('screenshots.php');
   do_table_header('Sections');

   $sections = FetchSections('sp_screenshots_sections');
   foreach($sections AS $key => $value) {

      $BGCOLOR = ($BGCOLOR == "#ECECFF" ? "#FFFFFF" : "#ECECFF");
      echo "<tr>
               <td bgcolor=\"$BGCOLOR\" colspan=\"2\">
                  <input type=\"radio\" value=\"$key\" name=\"id\">" . stripslashes($value) . "
               </td>
            </tr>";
   }

   echo '<tr>
         <td colspan="2">
            <input type="submit" name="do" value="Edit Section">
            <input type="submit" name="do" value="Delete Section">
         </td>
        </tr>';
   do_table_footer();
   echo '</form>';
   }

if ($_REQUEST['do'] == 'Delete Section') {

   $db->Execute("DELETE FROM `sp_screenshots_sections` WHERE `id` = '$_REQUEST[id]'");
   echo '<center>Section has been successfully removed, <a href="screenshots.php?do=manage_sections">click here to continue</a>.</center>';
   }

if ($_REQUEST['do'] == 'add_section') {

   do_form_header('screenshots.php');
   do_table_header("Add Section");
   do_text_row("Title","title");
   do_submit_row();
   echo '<input type="hidden" name="do" value="add_section_confirm">';
   do_table_footer();
   echo '</form>';

   }

if ($_REQUEST['do'] == 'Edit Section') {
   edit_section();

   }

	function edit_section()
	{
		global $db;

		$result = $db->Execute("SELECT * FROM sp_screenshots_sections WHERE id = $_REQUEST[id]");
		if ($result)
		{
			$row = $result->FetchRow();

			do_form_header( "screenshots.php" );
			do_table_header( "Edit Section" );
			do_text_row( "Title", "title", stripslashes($row[title]) );
			do_submit_row("Update");

			echo '<input type="hidden" name="do" value="edit_section_confirm">';
			echo '<input type="hidden" name="id" value="' . $row[id] . '">';

			do_table_footer();
			do_form_footer();
		}
	}


if ($_REQUEST['do'] == 'edit_section_confirm') {

	$module->edit_section_confirm();

   }

if ($_REQUEST['do'] == 'add_section_confirm') {

   $db->Execute("INSERT INTO `sp_screenshots_sections` (title) VALUES ('$_REQUEST[title]');");
   echo '<center>Section has been successfully created, <a href="screenshots.php">click here to continue</a>.</center>';

   }

$cp->footer();
?>