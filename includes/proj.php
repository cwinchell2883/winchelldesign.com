<?php
// Die if not called by index.php
if(!defined('CALLER_ID'))
{
	echo 'This file cannot be called upon directly.';
	exit;
}

if($num)
{
	if(!file_exists($script_inc_path . 'projects/' . $num . $Ex))
	{
		require($script_inc_path . '404' . $Ex);
	}
	else
	{
		require($script_inc_path . 'projects/' . $num . $Ex);
	}
}
else
{
	require($script_inc_path . 'main' . $Ex);
}
?>