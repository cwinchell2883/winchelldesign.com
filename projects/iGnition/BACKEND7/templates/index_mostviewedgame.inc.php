<table border="0" cellspacing="0" cellpadding="5" width="100%" style="border: 1px solid #324596;">
      <tr>
         <td width="100%" background="images/gradient_1.jpg" style="border-bottom: 1px solid #324596; color:#FFF;"><b>Most Popular Games</b></td>
      </tr>


<?php
$counter = 0;
$GameSections = FetchSections('sp_games_sections');
$GameQuery = $db->Execute("SELECT id,title FROM `sp_games` WHERE `published` = '1' ORDER BY `views` DESC LIMIT 10");
while ($GameRow = $GameQuery->FetchNextObject()) {
$counter++;
?>

   <tr>
      <td bgcolor="#FFFFFF" style="padding: 3px;">
         <font style="font-size: 11px;">
         <?php echo $counter; ?>. <a href="gamedetails.php?id=<?php echo $GameRow->ID; ?>"><b><?php echo stripslashes($GameRow->TITLE); ?></b></a>
         </font>
      </td>
   </tr>


<?php
   }
?>
</table>