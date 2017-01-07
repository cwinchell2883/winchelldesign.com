<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_MINI_CAL_CALENDAR'])) ? $this->_rootref['L_MINI_CAL_CALENDAR'] : ((isset($user->lang['MINI_CAL_CALENDAR'])) ? $user->lang['MINI_CAL_CALENDAR'] : '{ MINI_CAL_CALENDAR }')); ?></h3>
	
			<table width="100%" cellspacing="1">
			<tr>
				<td align="left" colspan="2"><?php echo (isset($this->_rootref['U_PREV_MONTH'])) ? $this->_rootref['U_PREV_MONTH'] : ''; ?></td>
				<td colspan="3" align="center"><span class="genmed"><?php echo ((isset($this->_rootref['L_MINI_CAL_MONTH'])) ? $this->_rootref['L_MINI_CAL_MONTH'] : ((isset($user->lang['MINI_CAL_MONTH'])) ? $user->lang['MINI_CAL_MONTH'] : '{ MINI_CAL_MONTH }')); ?></span></td>
				<td align="right" colspan="2"><?php echo (isset($this->_rootref['U_NEXT_MONTH'])) ? $this->_rootref['U_NEXT_MONTH'] : ''; ?></td>
			</tr>
			<tr>
				<td width="16%"><span class="gensmall" style="color:#0000FF"><?php echo ((isset($this->_rootref['L_MINI_CAL_SUN'])) ? $this->_rootref['L_MINI_CAL_SUN'] : ((isset($user->lang['MINI_CAL_SUN'])) ? $user->lang['MINI_CAL_SUN'] : '{ MINI_CAL_SUN }')); ?></span></td>
				<td width="14%"><span class="gensmall" style="color:#0000FF"><?php echo ((isset($this->_rootref['L_MINI_CAL_MON'])) ? $this->_rootref['L_MINI_CAL_MON'] : ((isset($user->lang['MINI_CAL_MON'])) ? $user->lang['MINI_CAL_MON'] : '{ MINI_CAL_MON }')); ?></span></td>
				<td width="14%"><span class="gensmall" style="color:#0000FF"><?php echo ((isset($this->_rootref['L_MINI_CAL_TUE'])) ? $this->_rootref['L_MINI_CAL_TUE'] : ((isset($user->lang['MINI_CAL_TUE'])) ? $user->lang['MINI_CAL_TUE'] : '{ MINI_CAL_TUE }')); ?></span></td>
				<td width="14%"><span class="gensmall" style="color:#0000FF"><?php echo ((isset($this->_rootref['L_MINI_CAL_WED'])) ? $this->_rootref['L_MINI_CAL_WED'] : ((isset($user->lang['MINI_CAL_WED'])) ? $user->lang['MINI_CAL_WED'] : '{ MINI_CAL_WED }')); ?></span></td>
				<td width="14%"><span class="gensmall" style="color:#0000FF"><?php echo ((isset($this->_rootref['L_MINI_CAL_THU'])) ? $this->_rootref['L_MINI_CAL_THU'] : ((isset($user->lang['MINI_CAL_THU'])) ? $user->lang['MINI_CAL_THU'] : '{ MINI_CAL_THU }')); ?></span></td>
				<td width="14%"><span class="gensmall"><?php echo ((isset($this->_rootref['L_MINI_CAL_FRI'])) ? $this->_rootref['L_MINI_CAL_FRI'] : ((isset($user->lang['MINI_CAL_FRI'])) ? $user->lang['MINI_CAL_FRI'] : '{ MINI_CAL_FRI }')); ?></span></td>
				<td width="14%"><span class="gensmall" style="color:#FF0000"><?php echo ((isset($this->_rootref['L_MINI_CAL_SAT'])) ? $this->_rootref['L_MINI_CAL_SAT'] : ((isset($user->lang['MINI_CAL_SAT'])) ? $user->lang['MINI_CAL_SAT'] : '{ MINI_CAL_SAT }')); ?></span></td>
			</tr>
			<?php $_mini_cal_row_count = (isset($this->_tpldata['mini_cal_row'])) ? sizeof($this->_tpldata['mini_cal_row']) : 0;if ($_mini_cal_row_count) {for ($_mini_cal_row_i = 0; $_mini_cal_row_i < $_mini_cal_row_count; ++$_mini_cal_row_i){$_mini_cal_row_val = &$this->_tpldata['mini_cal_row'][$_mini_cal_row_i]; ?>
			<tr>
				<?php $_mini_cal_days_count = (isset($_mini_cal_row_val['mini_cal_days'])) ? sizeof($_mini_cal_row_val['mini_cal_days']) : 0;if ($_mini_cal_days_count) {for ($_mini_cal_days_i = 0; $_mini_cal_days_i < $_mini_cal_days_count; ++$_mini_cal_days_i){$_mini_cal_days_val = &$_mini_cal_row_val['mini_cal_days'][$_mini_cal_days_i]; ?>
				<td class="row1" align="center"><span class="gensmall"><?php echo $_mini_cal_days_val['MINI_CAL_DAY']; ?></span></td>
				<?php }} ?>
			</tr>
			<?php }} ?>
			</table>
			<hr />

			<table class="tablebg" width="100%" cellspacing="1">
				<?php $_mini_cal_holiday_count = (isset($this->_tpldata['mini_cal_holiday'])) ? sizeof($this->_tpldata['mini_cal_holiday']) : 0;if ($_mini_cal_holiday_count) {for ($_mini_cal_holiday_i = 0; $_mini_cal_holiday_i < $_mini_cal_holiday_count; ++$_mini_cal_holiday_i){$_mini_cal_holiday_val = &$this->_tpldata['mini_cal_holiday'][$_mini_cal_holiday_i]; ?>
				<tr>
				<td class="row1" align="left"><span class="gensmall"><?php echo $_mini_cal_holiday_val['MINI_CAL_HOLIDAYS']; ?></span></td>
				</tr>
				<?php }} ?>
			</table>

			<table class="tablebg" width="100%" cellspacing="1">
			<?php if ($this->_rootref['S_DISPLAY_BIRTHDAY_LIST']) {  ?>
			<tr>
			<td class="row1" align="left">
				<span class="gensmall"><?php if ($this->_rootref['BIRTHDAY_LIST']) {  echo ((isset($this->_rootref['L_CONGRATULATIONS'])) ? $this->_rootref['L_CONGRATULATIONS'] : ((isset($user->lang['CONGRATULATIONS'])) ? $user->lang['CONGRATULATIONS'] : '{ CONGRATULATIONS }')); ?>: <strong><?php echo (isset($this->_rootref['BIRTHDAY_LIST'])) ? $this->_rootref['BIRTHDAY_LIST'] : ''; ?></strong><?php } else { echo ((isset($this->_rootref['L_NO_BIRTHDAYS'])) ? $this->_rootref['L_NO_BIRTHDAYS'] : ((isset($user->lang['NO_BIRTHDAYS'])) ? $user->lang['NO_BIRTHDAYS'] : '{ NO_BIRTHDAYS }')); } ?></span>
			</td>
			</tr>
			<?php } ?>
			</table>			

		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />