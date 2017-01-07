<?php $this->_tpl_include('overall_header.html'); ?>

<div class="centralize" id="message">
	<div class="inner"><span class="corners-top"><span></span></span>
	<h2><?php echo (isset($this->_rootref['MESSAGE_TITLE'])) ? $this->_rootref['MESSAGE_TITLE'] : ''; ?></h2>
	<p><?php echo (isset($this->_rootref['MESSAGE_TEXT'])) ? $this->_rootref['MESSAGE_TEXT'] : ''; ?></p>
	<span class="corners-bottom"><span></span></span></div>
</div>

</body>
</html>