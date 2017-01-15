<!-- $Id: wordgraph.html,v 1.1 2008/02/09 08:18:16 angelside Exp $ //-->
<div class="panel">
	<div class="inner">
		<span class="corners-top"><span></span></span>
			<h3><?php echo ((isset($this->_rootref['L_WORDGRAPH'])) ? $this->_rootref['L_WORDGRAPH'] : ((isset($user->lang['WORDGRAPH'])) ? $user->lang['WORDGRAPH'] : '{ WORDGRAPH }')); ?></h3>
			<?php $_wordgraph_count = (isset($this->_tpldata['wordgraph'])) ? sizeof($this->_tpldata['wordgraph']) : 0;if ($_wordgraph_count) {for ($_wordgraph_i = 0; $_wordgraph_i < $_wordgraph_count; ++$_wordgraph_i){$_wordgraph_val = &$this->_tpldata['wordgraph'][$_wordgraph_i]; ?>
			<a href="<?php echo $_wordgraph_val['WORD_SEARCH_URL']; ?>"><span style="font-size: <?php echo $_wordgraph_val['WORD_FONT_SIZE']; ?>px"><?php echo $_wordgraph_val['WORD']; ?></span></a>
			<?php }} ?>
		<span class="corners-bottom"><span></span></span>
	</div>
</div>
<br style="clear:both" />