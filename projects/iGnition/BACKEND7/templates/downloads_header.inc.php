<table border="0" cellspacing="1" cellpadding="3" width="100%">
	<tr>
		<td style="font-size: 9pt;"><b><?php echo stripslashes($row->TITLE); ?></b></td>
	</tr>
	<tr>
		<td height="1" bgcolor="#808080"></td>
	</tr>
	<tr>
		<td style="font-size: 8pt;">
		<a href="gamedetails.php?id=<?php echo $row->ID; ?>">Game Info</a> |
		<?php echo $cheat_link; ?> |
                Downloads
		</td>
	</tr>
        <tr>
           <td>