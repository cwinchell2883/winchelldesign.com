<tr>

	<td bgcolor="<?php echo $bgcolor; ?>" style="font-size: 11px;">
		<a href="gamedetails.php?id=<?php echo $row->ID; ?>"><?php echo stripslashes($row->TITLE); ?></a>
	</td>

	<td bgcolor="<?php echo $bgcolor; ?>" style="font-size: 11px;">
		<?php echo stripslashes($row->GENRE); ?>
	</td>

	<td bgcolor="<?php echo $bgcolor; ?>" style="font-size: 11px;">
		<?php echo stripslashes($row->RELEASE_DATE); ?>
	</td>

	<td bgcolor="<?php echo $bgcolor; ?>" style="font-size: 11px;">
		<?php echo $section; ?>
	</td>

</tr>