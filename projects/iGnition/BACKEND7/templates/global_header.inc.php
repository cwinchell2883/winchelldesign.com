<?php

global $right, $top, $bottom, $location, $spconfig;
global $latest_poll;

// Config Settings -> Template Variables
$TITLE = $spconfig["site_title"];
$META_DESCRIPTION = $spconfig["meta_description"];
$META_KEYWORDS = $spconfig["meta_keywords"];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


<html>
<head>
	<title><?php print($TITLE); ?></title>

<META NAME="description" CONTENT="<?php echo $META_DESCRIPTION; ?>">
<META NAME="keywords" CONTENT="<?php echo $META_KEYWORDS; ?>">
<style type="text/css">
@import url("templates/template_css.css");
</style>
<script language="javascript">
var ie4 = false; if(document.all) { ie4 = true; }
function getObject(id) { if (ie4) { return document.all[id]; } else { return document.getElementById(id); } }
function toggle(link, divId) { var lText = link.innerHTML; var d = getObject(divId);
 if (lText == '+') { link.innerHTML = '&#8722;'; d.style.display = 'block'; }
 else { link.innerHTML = '+'; d.style.display = 'none'; } }
</script>
   </head>

   <body>
   <br />
   <table border="0" cellspacing="0" cellpadding="5" width="90%" align="center">
      <tr>

         <td width="100%" background="images/gradient_1.jpg" style="color:#FFF;font-size: 12px;">
         <b><?php echo $TITLE; ?></b>
         </td>

      </tr>
   </table>
   <table border="0" cellspacing="0" cellpadding="4" width="90%" align="center">
      <tr>
         <td class="topmenu"><?php echo $top; ?></td>
      </tr>
   </table>
   <table border="0" cellspacing="0" cellpadding="0" width="90%" align="center">
   	<tr>
   		<td class="outerborder">
		   <table border="0" cellspacing="0" cellpadding="0" width="100%">
			  <tr>
				 <td valign="top" width="150" class="leftmenu">

					<?php echo GenerateLeftMenu(); ?>

					<div style="padding: 3px;">

					<form method="post" action="poll_vote.php">
					<?php echo GenerateLatestPoll(); ?>
					<input type="submit" value="Vote">
					</form>

					</div>

					<br />
					<img src="images/pixel.gif" height="1" width="150">
				</td>

				<td width="100%" valign="top" class="maincontent">
					<table border="0" cellspacing="0" cellpadding="0" width="100%" class="navbar">
						<tr>
							<td><a href="index.php">Home</a> <?php echo $location; ?></td>
						</tr>
					</table>

<?php

// 02.21.05 - These functions are outdated and will be moved/removed in a future updated.

// GENERIC TABLE FUNCTION
function do_table_start($width='100%') {
return <<<EOF

   <table border="0" cellspacing="0" cellpadding="3" width="$width" class="generictable" align="center">
      <tr>
         <td>
EOF;
}

function do_table_end() {
return <<<EOF

         </td>
      </tr>
   </table>
EOF;
}

$start_table = do_table_start();
$end_table = do_table_end();
?>