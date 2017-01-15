<?php

error_reporting(E_ALL ^ E_NOTICE);

include "global.php";

$cp->header();

switch ($_REQUEST['do'])
{

	case 'add':
		add_announcement();
		break;

	case 'add_confirm':
		add_confirm();
		break;

	case 'edit':
		edit_announcement();
		break;

	case 'edit_confirm':
		edit_confirm();
		break;

	case 'delete':
		delete_announcement();
		break;

	default:
		do_welcome();
		break;

}

function do_welcome()
{
	global $db, $pwzlogin;

	$links = '<a href="index2.php?do=add">Post Announcement</a>';

	do_module_header('Welcome, '.$_SESSION['pwzlogin'],$links);

	do_table_header( "Announcements" );
	$result = $db->Execute("SELECT * FROM `sp_announcements` ORDER BY `date` DESC;");
	if ($result->RecordCount() == 0)
	{
		echo '<tr><td class="formlabel">No announcements have been posted.</td></tr>';
	}
	while ($row = $result->FetchNextObject())
	{
		echo("<tr><td class='formlabel'><b>" . stripslashes($row->TITLE) . "</b><br />");
		echo("Posted by " . stripslashes($row->USER) . " on " . stripslashes($row->DATE));
		echo("<tr><td class='formlabel2'>" . html_entity_decode($row->TEXT) . "<br />");
		echo("<font style='font-size: 11px; color: blue;'>");
		echo("<a href=index2.php?do=edit&id=$row->ID>Edit Announcement</a> | ");
		echo("<a href=index2.php?do=delete&id=$row->ID>Delete Announcement</a></td></tr>");
	}
	do_table_footer();

	/**
	*	Recent Games Table
	**/
	do_table_header( "Recent Content :: Games" );
	$games = $db->Execute("SELECT id,title FROM `sp_games` ORDER BY `id` DESC LIMIT 0,5");
	while ($row = $games->FetchNextObject())
	{
		echo '
			<tr>
				<td class="formlabel" style="font-size: 11px;">
				<a href="games.php?do=Edit Game&id=', $row->ID, '">', stripslashes($row->TITLE), '</a>
				</td>
			</tr>';
	}

	if ($games->RecordCount() == 0)
	{
		echo("<tr><td class='formlabel2' style='font-size: 11px;'>No content to display.</td></tr>");
	}
	do_table_footer();

	/**
	*	Recent News Table
	**/
	do_table_header( "Recent Content :: News" );
	$news = $db->Execute("SELECT id,title FROM `sp_news` ORDER BY `id` DESC LIMIT 0,5");
	while ($row = $news->FetchNextObject())
	{
		echo '
			<tr>
				<td class="formlabel" style="font-size: 11px;">
				<a href="news.php?do=Edit News&id=', $row->ID, '">', stripslashes($row->TITLE), '</a>
				</td>
			</tr>';
	}
	if ($news->RecordCount() == 0)
	{
		echo("<tr><td class='formlabel2' style='font-size: 11px;'>No content to display.</td></tr>");
	}
	do_table_footer();

	/**
	*	Recent Previews Table
	**/
	do_table_header( "Recent Content :: Previews" );
	$previews = $db->Execute("SELECT id,title FROM `sp_previews` ORDER BY `id` DESC LIMIT 0,5");
	while ($row = $previews->FetchNextObject())
	{
		echo '
			<tr>
				<td class="formlabel" style="font-size: 11px;">
				<a href="previews.php?do=Edit Preview&id=', $row->ID, '">', stripslashes($row->TITLE), '</a>
				</td>
			</tr>';
	}
	if ($previews->RecordCount() == 0)
	{
		echo("<tr><td class='formlabel2' style='font-size: 11px;'>No content to display.</td></tr>");
	}
	do_table_footer();

	/**
	* Recent Reviews Table
	**/
	do_table_header( "Recent Content :: Reviews" );
	$reviews = $db->Execute("SELECT id,title FROM `sp_reviews` ORDER BY `id` DESC LIMIT 0,5");
	while ($row = $reviews->FetchNextObject())
	{
		echo '
			<tr>
				<td class="formlabel" style="font-size: 11px;">
				<a href="reviews.php?do=Edit Review&id=', $row->ID, '">', stripslashes($row->TITLE), '</a>
				</td>
			</tr>';
	}
	if ($reviews->RecordCount() == 0)
	{
		echo("<tr><td class='formlabel2' style='font-size: 11px;'>No content to display.</td></tr>");
	}
	do_table_footer();

}

function add_announcement()
{
	global $db, $pwzlogin;
	do_form_header('index2.php');
	do_table_header('Post New Announcement');
	do_text_row('Username','user',$pwzlogin);
	do_text_row('Title','title');
	do_textarea_row('Message','text');
	do_submit_row('Post Announcement');
	do_table_footer();
	echo '<input type="hidden" name="do" value="add_confirm">';
	echo '</form>';
}

function edit_announcement()
{
	global $db;
	$result = $db->Execute("SELECT * FROM `sp_announcements` WHERE `id` = '$_REQUEST[id]'");
	do_form_header('index2.php');
	do_table_header('Post New Announcement');
	do_text_row('Username','user',$result->fields['user']);
	do_text_row('Title','title',stripslashes($result->fields['title']));
	do_textarea_row('Message','text',stripslashes($result->fields['text']));
	do_submit_row('Save Changes');
	do_table_footer();
	echo '<input type="hidden" name="do" value="edit_confirm">';
	echo '<input type="hidden" name="id" value="'.$_REQUEST[id].'">';
	echo '</form>';
}

function edit_confirm()
{
	global $db;
	$record = array(
		'user' => $_REQUEST['user'],
		'title' => $_REQUEST['title'],
		'text' => $_REQUEST['text']);
	$db->AutoExecute('sp_announcements',$record,'UPDATE',"`id` = '$_REQUEST[id]'");
	SPMessage("Success | Announcement has been updated.","index2.php");
}

function add_confirm()
{
	global $db;
	$record = array(
		'user' => $_REQUEST['user'],
		'date' => date("m.d.Y"),
		'title' => $_REQUEST['title'],
		'text' => $_REQUEST['text']);

	$db->AutoExecute('sp_announcements',$record,'INSERT');
	SPMessage('Success | Announcement has been added.','index2.php');
}

function delete_announcement()
{
	global $db;
	$db->Execute("DELETE FROM `sp_announcements` WHERE `id` = '$_REQUEST[id]'");
	SPMessage('Success | Announcement has been deleted.','index2.php');
}

$cp->footer();

?>