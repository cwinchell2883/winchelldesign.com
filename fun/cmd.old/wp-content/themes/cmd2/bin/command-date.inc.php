<?php
/*
date
@@
Displays the date.

DATE

Type DATE to display the current date setting.

If Command Extensions are enabled the DATE command supports
the /T switch which tells the command to just output the
current date, without prompting for a new date.
@@
*/
		e('<p>'.date('Y-m-d g:i:s a').'</p>');
?>