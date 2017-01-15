<br />

<table border="0" cellspacing="0" cellpadding="5" width="100%" style="border: 1px solid #324596;">
	<tr>
		<td background="images/gradient_1.jpg" style="color: #FFF;">

			<b><?php echo stripslashes($review->fields['title']); ?></b>

		</td>
	</tr>

	<tr>

		<td bgcolor="#E3E3E3">

			<b>Score</b>

		</td>

	</tr>

	<tr>

		<td>Gameplay: <b><?php echo $review->fields['gameplay']; ?></b></td>

	</tr>

	<tr>

		<td>Graphics: <b><?php echo $review->fields['graphics']; ?></b></td>

	</tr>

	<tr>

		<td>Sound: <b><?php echo $review->fields['sound']; ?></b></td>

	</tr>

	<tr>

		<td>Value: <b><?php echo $review->fields['value']; ?></b></td>

	</tr>

	<tr>

		<td style="border-bottom: 1px solid #DBDBDB;">Tilt: <b><?php echo $review->fields['tilt']; ?></b></td>

	</tr>

	<tr>
		<td>

			<?php echo clean($review->fields['intro']); ?>

      </td>
   </tr>
   <tr>
      <td>
			<?php echo clean($review->fields['text']); ?>
		</td>
	</tr>
</table>