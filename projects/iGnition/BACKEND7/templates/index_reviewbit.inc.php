<table border="0" cellspacing="0" cellpadding="5" width="100%" style="border: 1px solid #324596;">
      <tr>
         <td width="100%" background="images/gradient_1.jpg" style="border-bottom: 1px solid #324596; color:#FFF;"><b>Latest Reviews</b></td>
      </tr>


<?php
$bgcolor = '';
$ReviewSections = FetchSections('sp_reviews_sections');
$ReviewQuery = $db->Execute("SELECT id,title,section FROM `sp_reviews` ORDER BY `id` DESC LIMIT 10");
while ($ReviewRow = $ReviewQuery->FetchNextObject()) {
   $bgcolor = ($bgcolor == "#FFFFFF" ? "#E9E9E9" : "#FFFFFF");
?>

<tr>
   <td bgcolor="<?php echo $bgcolor; ?>" colspan="3" style="padding: 3px;">
      <font style="font-size: 11px;">
      <?php echo $ReviewSections["$ReviewRow->SECTION"]; ?>: <a href="reviews.php?do=view&id=<?php echo $ReviewRow->ID; ?>"><?php echo stripslashes($ReviewRow->TITLE); ?></a>
      </font>
   </td>
</tr>

<?php
   }
$bgcolor = '';
?>

   <tr>
      <td colspan="3" style="padding: 3px;">
      <a href="reviews.php?">Browse Reviews</a>
      </td>
   </tr>
</table>