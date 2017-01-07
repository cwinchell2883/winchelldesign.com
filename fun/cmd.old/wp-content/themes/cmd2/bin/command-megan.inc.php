<?php
/*
cd
@@
Secrets secrets secrets...
@@
*/

if (!isset($tokens[1]))
{
	e('<p>Unrecognized command. Type \'help\' for assistance.</p>');
}
if (isset($tokens[1]) && strtolower($tokens[1]) == 'stroud')
{
	if (!isset($tokens[2]))
	{
		e('<p>Love you beautiful</p>');
	}
	if (isset($tokens[2]) && strtolower($tokens[2]) == 'loves')
	{
		switch (strtolower($tokens[3]))
		{
			case 'chris':
				e('<p>You bet she does!</p>');
				break;
			case 'brian':
				e('<p>Don\'t make me laugh! LOL</p>');
				break;
			default:
				e('<p>No she doesn\'t... We all know who it is she\'s in love with!</p>');
				break;
		}
	}
}
else {
	e('<p>Something went wrong...</p>');
}
?>
