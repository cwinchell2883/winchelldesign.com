<?php
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo "This file cannot be called upon directly.";
	exit;
}
?>
<center>
<div>Access to <?php echo $p . $Ex; ?> has been temporarily disabled for updates. Please check back again later.</div>
<div>Click <a href="<?php echo $PHP_SELF . '?p=main';?>">here</a> to return to the main page.</div>
</center>