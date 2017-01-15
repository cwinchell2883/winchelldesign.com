<?php
/**
* //SupportTicket System
* ticket [English]
*
* @package language
* @version $Id: ticket.php 1 2008-03-19 14:31:04Z nickvergessen $
* @copyright (c) 2008 Mahony; 2008 Mahony
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Deutsche Übersetzung durch Mahony
* 
*
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » „ “ — …
//
//
$lang = array_merge($lang, array(
	'CST_SUPPORT_TICKET'			=> 'Supportticket System',

	'CST_ERRMESSAGE'				=> 'You didn\'t entered a title for your post. Please press the Back Button of your browser to correct this!',
	'CST_PHPBBVERSION'				=> 'Your phpBB Version:',
	'CST_PHPBBTYPE'					=> 'Your phpBB Type:',
	'CST_STANDARD'					=> 'Standard phpBB (also called Vanilla (phpBB2) or Olympus (phpBB3))',
	'CST_PREMOD'					=> 'Premodded phpBB',
	'CST_ANDDIST'					=> 'other phpBB Distribution',
	'CST_MODS'						=> 'Do you have MODs (Modifications) installed at your forum?',
	'CST_MODS_SHORT'				=> 'MODs installed:',
	'CST_YES'						=> 'Yes',
	'CST_NO'						=> 'No',
	'CST_KNOWLEDGE'					=> 'Your knowledge:',
	'CST_BEGINNER'					=> 'Beginner',

	'CST_BASICKNOW'					=> 'Basic Knowledge',
	'CST_EXTENDED'					=> 'Advanced Knowledge',
	'CST_PROFI'						=> 'Professional',
	'CST_BEFOREERR'					=> 'What have you done before the problem was there?',

	'CST_BOARDLINK'					=> 'Boardlink:',
	'CST_SELFSOLUTION'				=> 'What have you already tryed to solve the problem?',
	'CST_PHPVER'					=> 'PHP Version:',
	'CST_SQLVER'					=> 'MySQL Version:',
	'CST_HEAD_MSG'					=> 'Description and Message',

	'CST_OPTIONAL'					=> 'not required',
	'CST_HEAD'						=> 'This Assistant helps you to give the supporters enaugh Information to help you. Please fill out as many fields you can. Only with these informations its possible to help you efficient and fast!',
));
//SupportTicket System

?>