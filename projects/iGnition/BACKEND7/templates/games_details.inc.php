<table border="0" cellspacing="1" cellpadding="3" width="100%">
	<tr>
		<td style="font-size: 9pt;"><b><?php echo stripslashes($row->TITLE); ?></b></td>
	</tr>
	<tr>
		<td height="1" bgcolor="#808080"></td>
	</tr>
	<tr>
		<td style="font-size: 8pt;">
		Game Info |
		<?php echo $cheat_link; ?> |
                <?php echo $download_link; ?>
		</td>
	</tr>
</table>

<br /><br />

   <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tr>
      	<td><img src="images/header_left.jpg"></td>
         <td width="100%" background="images/header_bg.jpg"><b>Game Details</b></td>
      	<td><img src="images/header_right.jpg"></td>
      </tr>
   </table>
   <table border="0" cellspacing="0" cellpadding="5" width="100%" class="gametable">
   	<tr>
        <?php if (!empty($row->BOXSHOT)) { ?>
        <td valign="top">
        <img src="<?php echo $row->BOXSHOT; ?>">
        </td>
        <?php } ?>
   		<td valign="top" width="100%">
   		<table border="0" cellspacing="0" cellpadding="2">

         <?php if ($developer) { ?>
         <tr>
            <td><b>Developer:</b> <a href="companies.php?do=view&id=<?php echo $developer->fields['id']; ?>"><?php echo stripslashes($developer->fields['title']); ?></a></td>
         </tr>
         <?php } ?>

         <?php if ($publisher) { ?>
         <tr>
            <td><b>Publisher:</b> <a href="companies.php?do=view&id=<?php echo $publisher->fields['id']; ?>"><?php echo stripslashes($publisher->fields['title']); ?></a></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->GENRE)) { ?>
         <tr>
            <td><b>Genre:</b> <?php echo stripslashes($row->GENRE); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->RELEASE_DATE)) { ?>
         <tr>
            <td><b>Release Date:</b> <?php echo stripslashes($row->RELEASE_DATE); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->MULTIPLAYER)) { ?>
         <tr>
            <td><b>Multiplayer:</b> <?php echo stripslashes($row->MULTIPLAYER); ?></td>
         </tr>
         <?php } ?>

         <?php echo $customfields; ?>

      </table>
   		</td>
   	</tr>
   	<tr>
   		<td colspan="2">
   		<table border="0" cellspacing="0" cellpadding="2">

   			<tr>
   				<td><b>Minimum System Requirements</b></td>
   			</tr>
   			<tr>
   				<td><b>Platform:</b> <?php echo stripslashes($section->fields['title']); ?></td>
   			</tr>

         <?php if ($row->REQ_SYSTEM != '') { ?>
         <tr>
            <td><b>System:</b> <?php echo stripslashes($row->REQ_SYSTEM); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->REQ_RAM)) { ?>
         <tr>
            <td><b>RAM:</b> <?php echo stripslashes($row->REQ_RAM); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->REQ_VIDEO)) { ?>
         <tr>
            <td><b>Video Memory:</b> <?php echo stripslashes($row->REQ_VIDEO); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->REQ_SPACE)) { ?>
         <tr>
            <td><b>Hard Drive Space:</b> <?php echo stripslashes($row->REQ_SPACE); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->REQ_MOUSE)) { ?>
         <tr>
            <td><b>Mouse:</b> <?php echo stripslashes($row->REQ_MOUSE); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->REQ_DIRECTX)) { ?>
         <tr>
            <td><b>DirectX:</b> <?php echo stripslashes($row->REQ_DIRECTX); ?></td>
         </tr>
         <?php } ?>

         <?php if (!empty($row->REQ_SOUND)) { ?>
         <tr>
            <td><b>Sound Card:</b> <?php echo stripslashes($row->REQ_SOUND); ?></td>
         </tr>
         <?php } ?>

      </table>
   		</td>
   	</tr>
   </table><br />

<?php if (!empty($row->DESCRIPTION)) { ?>
   <div style="border: 1px solid #C0C0C0; padding: 0px; background: #FFFFFF; ">
      <table border="0" cellspacing="0" cellpadding="2" width="100%" style="background: #F1F1F1; color: #000000;">
         <tr>
            <td style="padding-left: 4px;">
               <font style="font-size: 11px;">Description</font>
            </td>
            <td align="right">
               <a title="show/hide" id="exp_3_link" href="javascript: void(0);" onclick="toggle(this, 'exp_3');"  style="text-decoration: none; color: #000000; font-size: 14px; font-weight: bold;">-</a>&nbsp;
            </td>
         </tr>
      </table>
      <div id="exp_3" style="padding: 3px;">
         <table border="0" cellspacing="0" cellpadding="3" >
            <tr>

               <td valign="top">
               <?php echo clean($row->DESCRIPTION); ?>
               </td>
            </tr>
         </table>
      </div>
   </div><noscript></noscript>
   <script language="javascript">toggle(getObject('exp_3_link'), 'exp_3');</script>
<?php } ?>

<br />

<?php build_matrix('games',$row->ID); ?>

<br />

This game has been viewed <?php echo $row->VIEWS; ?> times.