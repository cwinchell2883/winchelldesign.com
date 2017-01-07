<table border="0" cellspacing="0" cellpadding="5" width="100%" style="border: 1px solid #324596;">
      <tr>
         <td width="100%" background="images/gradient_1.jpg" style="border-bottom: 1px solid #324596; color:#FFF;"><b>Latest Previews</b></td>
      </tr>


<?php
$PreviewSections = FetchSections('sp_previews_sections');
$PreviewQuery = $db->Execute("SELECT id,title,section FROM `sp_previews` ORDER BY `id` DESC LIMIT 10");
while ($PreviewRow = $PreviewQuery->FetchNextObject()) {
   $bgcolor = ($bgcolor == "#FFFFFF" ? "#E9E9E9" : "#FFFFFF");
?>

<tr>
   <td bgcolor="<?php echo $bgcolor; ?>" colspan="3" style="padding: 3px;">
      <font style="font-size: 11px;">
      <?php echo $PreviewSections["$PreviewRow->SECTION"]; ?>: <a href="previews.php?do=view&id=<?php echo $PreviewRow->ID; ?>"><?php echo stripslashes($PreviewRow->TITLE); ?></a>
      </font>
   </td>
</tr>

<?php
   }
$bgcolor = '';
?>

   <tr>
      <td colspan="3" style="padding: 3px;">
      <a href="previews.php?">Browse Previews</a>
      </td>
   </tr>
</table>