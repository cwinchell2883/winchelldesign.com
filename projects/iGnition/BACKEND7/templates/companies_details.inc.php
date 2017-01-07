<?php

	do_header();

?>

	<b><?php echo $company['title']; ?></b><br />
	<?php echo $company['homepage']; ?><br /><br />

	<?php echo $company['logo']; ?>

	<?php echo $company['description']; ?>

	<?php

		if ( !empty($company['dev_links']) )
		{
			?>

			<table border="0" cellspacing="0" cellpadding="5" width="100%">
				<tr>
					<td background="images/gradient_1.jpg" style="color:#FFF;font-size: 11px;">
					<b>Developer</b>
					</td>
				</tr>
				<tr>
					<td>

					<?php
					echo $company['dev_links'];
					?>

					</td>
				</tr>
			</table>

			<?php
		}

		if ( !empty($company['pub_links']) )
		{
			?>

			<table border="0" cellspacing="0" cellpadding="5" width="100%">
				<tr>
					<td background="images/gradient_1.jpg" style="color:#FFF;font-size: 11px;">
					<b>Publisher</b>
					</td>
				</tr>
				<tr>
					<td>

					<?php
					echo $company['pub_links'];
					?>

					</td>
				</tr>
			</table>

			<?php
		}

	?>

<?php

	do_footer();

?>