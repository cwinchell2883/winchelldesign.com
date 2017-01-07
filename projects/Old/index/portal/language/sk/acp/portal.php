<?php
/*
*
* phpBB3 Portal ACP [Slovak]
*
* @package phpBB3 Portal  a.k.a canverPortal  ( www.phpbb3portal.com )
* @version $Id: portal.php,v 1.1 2008/02/09 08:18:13 angelside Exp $
* @copyright (c) Canver Software - www.canversoft.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translation by: Antrax` http://www.lenartjezakon.com  DATE 20.avgust 2007
*/

/**
* DO NOT CHANGE
*/
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

$lang = array_merge($lang, array(
	'ACP_PORTAL_INFO'					=> 'Portal',
	'ACP_PORTAL_INFO_SETTINGS'			=> 'Osnovne nastavitve',
	'ACP_PORTAL_INFO_SETTINGS_EXPLAIN'	=> 'Hvala, ker ste se odlocili za phpbb3portal. Na tej strani lahko urejate portal va�ega foruma. Prikazi na tej strani vam bodo dali predogled nastavitev za portal. Povezave na levi strani vam omogocajo spreminjanje foruma po va�ih �eljah oziroma si ga lahko popolnoma prilagodite svojim potrebam.',

	'ACP_PORTAL_SETTINGS'				=> 'Osnovne nastavitve',
	'ACP_PORTAL_SETTINGS_EXPLAIN'		=> 'Hvala, ker ste se odlocili za phpbb3portal. Na tej strani lahko urejate portal va�ega foruma. Prikazi na tej strani vam bodo dali predogled nastavitev za portal. Povezave na levi strani vam omogocajo spreminjanje foruma po va�ih �eljah oziroma si ga lahko popolnoma prilagodite svojim potrebam.',

	// general
	'ACP_PORTAL_GENERAL_INFO'				=> 'Administracija portala',
	'ACP_PORTAL_GENERAL_INFO_EXPLAIN'		=> 'Hvala, ker ste se odlocili za phpbb3portal. Na tej strani lahko urejate portal va�ega foruma. Prikazi na tej strani vam bodo dali predogled nastavitev za portal. Povezave na levi strani vam omogocajo spreminjanje foruma po va�ih �eljah oziroma si ga lahko popolnoma prilagodite svojim potrebam.',
	'ACP_PORTAL_GENERAL_SETTINGS'			=> 'Naj osnovnej�e nastavitve',
	'ACP_PORTAL_GENERAL_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate osnovne nastavitve.',
	'PORTAL_ADVANCED_STAT'					=> 'Naprednej�i blok z statistiko',
	'PORTAL_ADVANCED_STAT_EXPLAIN'			=> 'Prika�i ta blok na portalu.',
	'PORTAL_LEADERS'						=> 'Glavni / Ekipa blok',
	'PORTAL_LEADERS_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_CLOCK'							=> 'Urni blok',
	'PORTAL_CLOCK_EXPLAIN'					=> 'Prika�i ta blok na portalu.',
	'PORTAL_LINK_US'						=> 'Oglasni blok',
	'PORTAL_LINK_US_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_LINKS'							=> 'Povezave blok',
	'PORTAL_LINKS_EXPLAIN'					=> 'Prika�i ta blok na portalu.',
	'PORTAL_WELCOME'						=> 'Dobrodo�li sredinski blok',
	'PORTAL_WELCOME_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_MAX_ONLINE_FRIENDS'				=> 'Limit prikaza dosegljivih prijateljev',
	'PORTAL_MAX_ONLINE_FRIENDS_EXPLAIN'		=> 'Omejitev prikaza dosegljivih uporabnikov na portalu.',

	// random member
	'PORTAL_RANDOM_MEMBER'					=> 'Nakljucni clan blok',
	'PORTAL_RANDOM_MEMBER_EXPLAIN'			=> 'Prika�i ta blok na portalu.',

	// global announcements
	'ACP_PORTAL_ANNOUNCE_INFO'					=> 'Obvestilo',
	'ACP_PORTAL_ANNOUNCE_SETTINGS'				=> 'Nastavitve obvestil',
	'ACP_PORTAL_ANNOUNCE_SETTINGS_EXPLAIN'		=> 'Tukaj lahko spreminjate nastavitve v povezavi s obvestili.',
	'PORTAL_ANNOUNCEMENTS'						=> 'Prika�i obvestila',
	'PORTAL_ANNOUNCEMENTS_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_ANNOUNCEMENTS_STYLE'				=> 'Compact global announcements block style',
	'PORTAL_ANNOUNCEMENTS_STYLE_EXPLAIN'		=> 'If select yes use compact style for global announcements, no is large style',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS'			=> '�tevilo obvestil na portalu',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS_EXPLAIN'	=> '0 pomeni neskoncno',
	'PORTAL_ANNOUNCEMENTS_DAY'					=> '�tevilo dni, kako dolgo naj bodo obvestila prikazana',
	'PORTAL_ANNOUNCEMENTS_DAY_EXPLAIN'			=> '0 pomeni neskoncno',
	'PORTAL_ANNOUNCEMENTS_LENGTH'				=> 'Najdalj�a dol�ina obvestila',
	'PORTAL_ANNOUNCEMENTS_LENGTH_EXPLAIN'		=> '0 pomeni neskoncno',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM'			=> 'ID foruma z obvestili',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM_EXPLAIN'	=> 'Forum v katerem so novice in clanki, pustite prazno za prikaz iz vseh forumov, ce jih �elite vec, jih licite z vejico, npr. 1,2,5',

	// news
	'ACP_PORTAL_NEWS_INFO'				=> 'Novice',
	'ACP_PORTAL_NEWS_SETTINGS'			=> 'Novice nastavitve',
	'ACP_PORTAL_NEWS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezanih s novicami.',
	'PORTAL_NEWS'						=> 'Prika�i novicarski blok',
	'PORTAL_NEWS_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_NEWS_STYLE'					=> 'Kompaktni stil novicarskega bloka',
	'PORTAL_NEWS_STYLE_EXPLAIN'			=> 'Ce je izbrano "da" je izbran kompaktni stil, drugace velik stil.',
	'PORTAL_SHOW_ALL_NEWS'				=> 'Prika�i vse clanke iz tega foruma',
	'PORTAL_SHOW_ALL_NEWS_EXPLAIN'		=> 'Vkljucno z lepljivki in obvestili.',
	'PORTAL_NUMBER_OF_NEWS'				=> '�tevilo novic na portalu',
	'PORTAL_NUMBER_OF_NEWS_EXPLAIN'		=> '0 pomeni neskoncno',
	'PORTAL_NEWS_LENGTH'				=> 'Najdalj�a dol�ina clanka',
	'PORTAL_NEWS_LENGTH_EXPLAIN'		=> '0 pomeni neskoncno',
	'PORTAL_NEWS_FORUM'					=> 'ID foruma z novicami',
	'PORTAL_NEWS_FORUM_EXPLAIN'			=> 'Forum s katerega bodo prikazane novice, pustite prazno za prikaz iz vseh forumov, ce je vec forumov jih locite z vejico, npr. 1,2,5',
	'PORTAL_EXCLUDE_FORUM'				=> 'Izkljuci forum ID',
	'PORTAL_EXCLUDE_FORUM_EXPLAIN'		=> 'Forum iz katerega bodo prikazani clanki, pustite prazno za prikaz iz vseh forumov, ce je vec forumov jih locite z vejico, npr. 1,2,5',

	// recent topics
	'ACP_PORTAL_RECENT_INFO'				=> 'Zadnje teme',	
	'ACP_PORTAL_RECENT_SETTINGS'			=> 'Zadnje teme - nastavitve',	
	'ACP_PORTAL_RECENT_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s zadnjimi temami.',
	'PORTAL_RECENT'							=> 'Prika�i blok zadnjih tem',
	'PORTAL_RECENT_EXPLAIN'					=> 'Prika�i ta blok na portalu.',
	'PORTAL_MAX_TOPIC'						=> 'Limit zadnji obvestil/vrocih tem',
	'PORTAL_MAX_TOPIC_EXPLAIN'				=> '0 pomeni neskoncno',
	'PORTAL_RECENT_TITLE_LIMIT'				=> 'Najvec znakov za zadnje teme',
	'PORTAL_RECENT_TITLE_LIMIT_EXPLAIN'		=> '0 pomeni neskoncno',

	// paypal
	'ACP_PORTAL_PAYPAL_INFO'				=> 'Paypal',	
	'ACP_PORTAL_PAYPAL_SETTINGS'			=> 'Paypal nastavitve',
	'ACP_PORTAL_PAYPAL_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spremenite nastavitve za PayPal racun in ostale z njim povezane mo�nosti.',
	'PORTAL_PAY_C_BLOCK'					=> 'Prika�i PayPal blok',
	'PORTAL_PAY_C_BLOCK_EXPLAIN'			=> 'Prika�i ta blok na portalu.',
	'PORTAL_PAY_S_BLOCK'					=> 'Prika�i mini PayPal blok',
	'PORTAL_PAY_S_BLOCK_EXPLAIN'			=> 'Prika�i ta blok na portalu.',
	'PORTAL_PAY_ACC'						=> 'PayPal racun:',
	'PORTAL_PAY_ACC_EXPLAIN'				=> 'Vnesite va� email za PayPal npr. antrax@lenartjezakon.com',

	// last member
	'ACP_PORTAL_MEMBERS_INFO'				=> 'Zadnji pridru�en',
	'ACP_PORTAL_MEMBERS_SETTINGS'			=> 'Zadnji pridru�en - nastavitve',
	'ACP_PORTAL_MEMBERS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve, ki zadevajo nazadnje pridru�enih uporabnikov.',
	'PORTAL_LATEST_MEMBERS'					=> 'Prika�i "zadnji pridru�en" blok',
	'PORTAL_LATEST_MEMBERS_EXPLAIN'			=> 'Prika�i ta blok na portalu.',
	'PORTAL_MAX_LAST_MEMBER'				=> '�tevilo zadnjih pridru�enih',
	'PORTAL_MAX_LAST_MEMBER_EXPLAIN'		=> '0 pomeni neskoncno',

	// bots
	'ACP_PORTAL_BOTS_INFO'						=> 'Obiskovalci boti',
	'ACP_PORTAL_BOTS_SETTINGS'					=> 'Nastavitve bot-ov',
	'ACP_PORTAL_BOTS_SETTINGS_EXPLAIN'			=> 'Tukaj lahko spremenite nastavitve povezane z boti.',
	'PORTAL_LOAD_LAST_VISITED_BOTS'				=> 'Prika�i bote na portalu',
	'PORTAL_LOAD_LAST_VISITED_BOTS_EXPLAIN'		=> 'Prika�i ta blok na portalu.',
	'PORTAL_LAST_VISITED_BOTS_NUMBER'			=> '�tevilo prikazanih botov',
	'PORTAL_LAST_VISITED_BOTS_NUMBER_EXPLAIN'	=> '0 pomeni neskoncno',

	// polls   
	'ACP_PORTAL_POLLS_INFO'				=> 'Anketa',	
	'ACP_PORTAL_POLLS_SETTINGS'			=> 'Nastavitve Anket',
	'ACP_PORTAL_POLLS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spremenite nastavitve Anket.',
	'PORTAL_POLL_TOPIC'					=> 'Prika�i blok z anketo',
	'PORTAL_POLL_TOPIC_EXPLAIN'			=> 'Prika�i ta blok na portalu.',
	'PORTAL_POLL_TOPIC_ID'				=> 'ID teme iz katere bo prikazana anketa',
	'PORTAL_POLL_TOPIC_ID_EXPLAIN'		=> 'Forum iz katerega bodo prikazane ankete, pustite prazno za prikaz vseh, ce je vec forumov jih locite z vejico, npr. 1,2,5',
	'PORTAL_POLL_LIMIT'					=> 'Poll display limit',
	'PORTAL_POLL_LIMIT_EXPLAIN'			=> 'The number of polls you would like to display on the portal page.',
	'PORTAL_POLL_ALLOW_VOTE'			=> 'Allow voting',
	'PORTAL_POLL_ALLOW_VOTE_EXPLAIN'	=> 'Allow users with the required permissions to vote from the portal page.',

	// most poster
	'ACP_PORTAL_MOST_POSTER_INFO'				=> 'Najaktivnej�i',
	'ACP_PORTAL_MOST_POSTER_SETTINGS'			=> 'Najaktivnej�i - nastavitve',
	'ACP_PORTAL_MOST_POSTER_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s "najaktivnej�i".',
	'PORTAL_TOP_POSTERS'                  		=> 'Prika�i "Najaktivnej�i" blok',
	'PORTAL_TOP_POSTERS_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_MAX_MOST_POSTER'					=> 'Koliko uporabnikov prika�em',
	'PORTAL_MAX_MOST_POSTER_EXPLAIN'			=> '0 pomeni neskoncno',

	// left and right collumn width 
	'ACP_PORTAL_COLLUMN_WIDTH_INFO'				=> '�irina stolpca',
	'ACP_PORTAL_COLLUMN_WIDTH_SETTINGS'			=> 'Nastavitve �irine levega in desnega stolpca',	
	'PORTAL_LEFT_COLLUMN_WIDTH'					=> 'Width value of the left collumn',
	'PORTAL_LEFT_COLLUMN_WIDTH_EXPLAIN'			=> 'Change the width of left collumn in pixel, recommended value 180',
	'PORTAL_RIGHT_COLLUMN_WIDTH'				=> 'Width value of the right collumn',
	'PORTAL_RIGHT_COLLUMN_WIDTH_EXPLAIN'		=> 'Change the width of right collumn in pixel, recommended value 180',

	// attachments    
	'ACP_PORTAL_ATTACHMENTS_NUMBER_INFO'				=> 'Priponke',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS'			=> 'Priponke - nastavitve',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s priponkami.',
	'PORTAL_ATTACHMENTS'                  				=> 'Prika�i blok priponk',
	'PORTAL_ATTACHMENTS_EXPLAIN'                  		=> 'Prika�i ta blok na portalu.',
	'PORTAL_ATTACHMENTS_NUMBER'							=> '�tevilo prikazanih priponk',
	'PORTAL_ATTACHMENTS_NUMBER_EXPLAIN'					=> '0 pomeni neskoncno',

	// wordgraph
	'ACP_PORTAL_WORDGRAPH_INFO'				=> 'Wordgraph',
	'ACP_PORTAL_WORDGRAPH_SETTINGS'			=> 'Wordgraph settings',	
	'ACP_PORTAL_WORDGRAPH_SETTINGS_EXPLAIN'	=> 'Here you can change your wordgraph information and certain specific options.',
	'PORTAL_WORDGRAPH'						=> 'Display wordgraph block',
	'PORTAL_WORDGRAPH_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_WORDGRAPH_MAX_WORDS'			=> '�tevilo besed, ki jih prika�em',
	'PORTAL_WORDGRAPH_MAX_WORDS_EXPLAIN'	=> '0 pomeni neskoncno',
	'PORTAL_WORDGRAPH_WORD_COUNTS'			=> 'Include count values to display',
	'PORTAL_WORDGRAPH_WORD_COUNTS_EXPLAIN'	=> 'Display count values per word eg. (25).',
	'PORTAL_WORDGRAPH_RATIO'				=> 'Used aspect ratio word size',
	'PORTAL_WORDGRAPH_RATIO_EXPLAIN'		=> 'Change the aspect ratio (bigger/smaler) word size (default=18)',

	// welcome message
	'ACP_PORTAL_WELCOME_INFO'				=> 'Dobrodo�li',
	'ACP_PORTAL_WELCOME_SETTINGS'			=> 'Dobrodo�li - nastavitve',
	'ACP_PORTAL_WELCOME_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spremenite nastavitve povezane s dobrodo�lico.',
	'PORTAL_WELCOME_INTRO'					=> 'Dobrodo�lica:',
	'PORTAL_WELCOME_INTRO_EXPLAIN'			=> 'Spremeni dobrodo�lico (zgolj besedilo). Max. 600 znakov!',

	// ads
	'ACP_PORTAL_ADS_INFO'				=> 'Ogla�evanje',
	'ACP_PORTAL_ADS_SETTINGS'			=> 'Ogla�evanje - nastavitve',
	'ACP_PORTAL_ADS_SETTINGS_EXPLAIN'	=> 'Tukaj ahko spremenite nastavitve povezane z ogla�evanjem.',
	'PORTAL_ADS_SMALL'					=> 'Prika�i mini oglasni blok',
	'PORTAL_ADS_SMALL_EXPLAIN'			=> 'Prika�i ta blok na portalu.',
	'PORTAL_ADS_SMALL_BOX'				=> 'Oglasna koda',
	'PORTAL_ADS_SMALL_BOX_EXPLAIN'		=> 'Spremeni oglasno kodo (zgolj besedilo). Max. 600 znakov!',
	'PORTAL_ADS_CENTER'					=> 'Prika�i sredinski oglasni blok',
	'PORTAL_ADS_CENTER_EXPLAIN'			=> 'Prika�i ta blok na portalu.',
	'PORTAL_ADS_CENTER_BOX'				=> 'Oglasna koda',
	'PORTAL_ADS_CENTER_BOX_EXPLAIN'		=> 'Spremeni oglasno kodo (zgolj besedilo). Max. 600 znakov!',

	// minicalendar
	'ACP_PORTAL_MINICALENDAR_INFO'				=> 'Mini Kolendar',
	'ACP_PORTAL_MINICALENDAR_SETTINGS'			=> 'Mini Kolendar - settings',
	'ACP_PORTAL_MINICALENDAR_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s mini kolendarjem.',
	'PORTAL_MINICALENDAR'						=> 'Prika�i mini kolendar blok',
	'PORTAL_MINICALENDAR_EXPLAIN'				=> 'Prika�i ta blok na portalu.',
	'PORTAL_MINICALENDAR_TODAY_COLOR'			=> 'Barva trenutnega dneva',
	'PORTAL_MINICALENDAR_TODAY_COLOR_EXPLAIN'	=> 'HEX ali imenovane barve so dovoljene, kot npr. #FFFFFF za belo, ali imena barv kot npr. rdeca.',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR'		=> 'Barva povezave trenutnega dneva',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR_EXPLAIN'=> 'HEX ali imenovane barve so dovoljene, kot npr. #FFFFFF za belo, ali imena barv kot npr. rdeca.',

	// change style
	'ACP_PORTAL_BOARD_STYLE_INFO'				=> 'Spremeni preobleko',
	'ACP_PORTAL_BOARD_STYLE_SETTINGS'			=> 'Spremeni nastavitve preoblek',
	'ACP_PORTAL_BOARD_STYLE_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s preoblekami.',

));

?>