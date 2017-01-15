<?php

/**
*    ========================
*    CONFIGURATION VARIABLES
*    ========================
*/

/* Number of news items to show on frontpage */
$cfglimit = '10';

/**
*    ========================
*    END CONFIGURATION
*    ========================
**/

$NewsSections = FetchSections('sp_news_sections');
$NewsQuery = $db->Execute("SELECT id,title,intro,section,date,author,newsimage FROM `sp_news` ORDER BY `date` DESC LIMIT $cfglimit");
while ($NewsRow = $NewsQuery->FetchNextObject()) {
   $bgcolor = ($bgcolor == "#FFFFFF" ? "#F1F1F1" : "#FFFFFF");
?>
<table border="0" cellspacing="0" cellpadding="5" width="100%" style="border: 1px solid #000040;">

	<tr>
	   <td colspan="2" class="index_newstitle" background="images/gradient_1.jpg">
	      <b><?php echo $NewsSections["$NewsRow->SECTION"]; ?>:
	      <a href="index.php?do=viewarticle&id=<?php echo $NewsRow->ID; ?>" style="color: #FFF"><?php echo stripslashes($NewsRow->TITLE); ?></a></b>
           </td>
        </tr>
        <tr>
           <td bgcolor="#E3E3E3" colspan="2" style="border-bottom: 1px solid #DBDBDB;">
              Posted on <?php echo stripslashes($NewsRow->DATE); ?>
              by <?php echo stripslashes($NewsRow->AUTHOR); ?>
	   </td>
	</tr>

	<tr>
           <?php
           if (!empty($NewsRow->NEWSIMAGE))
           {
               echo '<td align="center" valign="top">
                     <img src="images/news_icons/' . $NewsRow->NEWSIMAGE . '" />
                     </td>';
           }
           ?>
	   <td class="index_newsbit" width="100%" valign="top">
	      <?php echo clean($NewsRow->INTRO); ?>

	   </td>
	</tr>
	</table><br />

<?php
   }
if ($NewsQuery->RecordCount() > 10)
{
?>

	<div style="padding: 5px; font-weight: bold;">
		<a href="archive.php">News Archive</a>
	</div>

<?php
}
?>
