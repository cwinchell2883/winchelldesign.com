<?php

include "global.php";
$cp->header();

$mydirectory = opendir("../templates");
$myfiles = array();
while( $entryname = readdir( $mydirectory ) )
{
	$myfiles["$entryname"] = @filemtime($entryname);
}
if ($_REQUEST['do'] == 'save')
{
	if ($myfilehandle=@fopen('../templates/' . $_REQUEST['filename'],'w'))
	{
		if (get_magic_quotes_gpc())
		{
			$editbuffer = stripslashes($editbuffer);
		}
		fputs($myfilehandle,$editbuffer);
		fclose($myfilehandle);
		echo "Saved OK";
	} else {
		echo "Denied!";
	}
}
$filename = $_REQUEST['filename'];
if (isset($filename) && file_exists("../templates/" . $filename))
{
	$myfile = file("../templates/" . $filename);
	$mylines = count($myfile);
	for($index = 0; $index < $mylines; $index++)
	{
		$newvar .= $myfile[$index];
	}
	$newvar = htmlspecialchars($newvar);
}

$links .= '<form method="post" action="template_editor.php"><select name="filename">';
while (list($name,$value) = each($myfiles))
{
	if ( ($name != ".") && ($name != ".."))
	{
		$links .= "<option>$name</option>\n";
	}
}
closedir($mydirectory);

$links .= '</select> ';

$links .= "<input type='submit' name='submit' value='Edit Template' style='width: 150px;'>";


do_module_header( "Template Editor", $links );
?>
</form>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
	<tr>
		<td colspan="2">
		<form method="post" action="template_editor.php">
		<textarea rows="20" cols="90" name="editbuffer"><?= $newvar; ?></textarea>
		<br />
		<input type="submit" name="submit" value="Save Changes">
		<input type="hidden" name="do" value="save">
		<input type="hidden" name="filename" value="<?= $_REQUEST['filename']; ?>">
		</form>
		</td>
		</tr></table>



<?
$cp->footer();

?>