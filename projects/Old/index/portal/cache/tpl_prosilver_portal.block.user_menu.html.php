<!-- $Id: user_menu.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
		<h3><?php echo ((isset($this->_rootref['L_USER_MENU'])) ? $this->_rootref['L_USER_MENU'] : ((isset($user->lang['USER_MENU'])) ? $user->lang['USER_MENU'] : '{ USER_MENU }')); ?></h3>
		<span style="font-size:1.1em;">
			<div align="center">
				<a href="<?php echo (isset($this->_rootref['U_VIEW_PROFILE'])) ? $this->_rootref['U_VIEW_PROFILE'] : ''; ?>"><?php if ($this->_rootref['USER_COLOR']) {  ?><span style="color: <?php echo (isset($this->_rootref['USER_COLOR'])) ? $this->_rootref['USER_COLOR'] : ''; ?>; font-weight: bold;"><?php } else { ?><span><?php } echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?></span></a><br /><br />
				<a href="<?php echo (isset($this->_rootref['U_PROFILE'])) ? $this->_rootref['U_PROFILE'] : ''; ?>"><?php if ($this->_rootref['AVATAR_IMG']) {  echo (isset($this->_rootref['AVATAR_IMG'])) ? $this->_rootref['AVATAR_IMG'] : ''; } else { ?><img src="<?php echo (isset($this->_rootref['T_THEME_PATH'])) ? $this->_rootref['T_THEME_PATH'] : ''; ?>/images/no_avatar.gif" alt="" /><?php } ?></a>
				<?php if ($this->_rootref['RANK_TITLE']) {  ?><br /><small><?php echo (isset($this->_rootref['RANK_TITLE'])) ? $this->_rootref['RANK_TITLE'] : ''; ?></small><?php } if ($this->_rootref['RANK_IMG']) {  ?><br /><?php echo (isset($this->_rootref['RANK_IMG'])) ? $this->_rootref['RANK_IMG'] : ''; } ?>
			</div><hr />
		
			<a href="<?php echo (isset($this->_rootref['U_NEW_POSTS'])) ? $this->_rootref['U_NEW_POSTS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_NEW_POSTS'])) ? $this->_rootref['L_NEW_POSTS'] : ((isset($user->lang['NEW_POSTS'])) ? $user->lang['NEW_POSTS'] : '{ NEW_POSTS }')); ?></a><br />
			<a href="<?php echo (isset($this->_rootref['U_SELF_POSTS'])) ? $this->_rootref['U_SELF_POSTS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_SELF_POSTS'])) ? $this->_rootref['L_SELF_POSTS'] : ((isset($user->lang['SELF_POSTS'])) ? $user->lang['SELF_POSTS'] : '{ SELF_POSTS }')); ?></a><br />
			<a href="<?php echo (isset($this->_rootref['U_UM_BOOKMARKS'])) ? $this->_rootref['U_UM_BOOKMARKS'] : ''; ?>"><?php echo ((isset($this->_rootref['L_UM_BOOKMARKS'])) ? $this->_rootref['L_UM_BOOKMARKS'] : ((isset($user->lang['UM_BOOKMARKS'])) ? $user->lang['UM_BOOKMARKS'] : '{ UM_BOOKMARKS }')); ?></a><br />
			<a href="<?php echo (isset($this->_rootref['U_UM_MAIN_SUBSCRIBED'])) ? $this->_rootref['U_UM_MAIN_SUBSCRIBED'] : ''; ?>"><?php echo ((isset($this->_rootref['L_UM_MAIN_SUBSCRIBED'])) ? $this->_rootref['L_UM_MAIN_SUBSCRIBED'] : ((isset($user->lang['UM_MAIN_SUBSCRIBED'])) ? $user->lang['UM_MAIN_SUBSCRIBED'] : '{ UM_MAIN_SUBSCRIBED }')); ?></a><br />
			<a href="<?php echo (isset($this->_rootref['U_PRIVATE_MESSAGES'])) ? $this->_rootref['U_PRIVATE_MESSAGES'] : ''; ?>"><?php echo ((isset($this->_rootref['L_PRIVATE_MESSAGES'])) ? $this->_rootref['L_PRIVATE_MESSAGES'] : ((isset($user->lang['PRIVATE_MESSAGES'])) ? $user->lang['PRIVATE_MESSAGES'] : '{ PRIVATE_MESSAGES }')); ?></a><hr />
			
			<a href="<?php echo (isset($this->_rootref['U_LOGIN_LOGOUT'])) ? $this->_rootref['U_LOGIN_LOGOUT'] : ''; ?>"><?php echo ((isset($this->_rootref['L_LOGIN_LOGOUT'])) ? $this->_rootref['L_LOGIN_LOGOUT'] : ((isset($user->lang['LOGIN_LOGOUT'])) ? $user->lang['LOGIN_LOGOUT'] : '{ LOGIN_LOGOUT }')); ?></a>
		</span>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />