<?php
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo 'This file cannot be called upon directly.';
	exit;
}

$path = dirname(__FILE__);
$path .= '/1/index.html';

include($path);
?>