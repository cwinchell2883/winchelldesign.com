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
	'ACP_PORTAL_INFO_SETTINGS_EXPLAIN'	=> 'Hvala, ker ste se odlocili za phpbb3portal. Na tej strani lahko urejate portal vašega foruma. Prikazi na tej strani vam bodo dali predogled nastavitev za portal. Povezave na levi strani vam omogocajo spreminjanje foruma po vaših željah oziroma si ga lahko popolnoma prilagodite svojim potrebam.',

	'ACP_PORTAL_SETTINGS'				=> 'Osnovne nastavitve',
	'ACP_PORTAL_SETTINGS_EXPLAIN'		=> 'Hvala, ker ste se odlocili za phpbb3portal. Na tej strani lahko urejate portal vašega foruma. Prikazi na tej strani vam bodo dali predogled nastavitev za portal. Povezave na levi strani vam omogocajo spreminjanje foruma po vaših željah oziroma si ga lahko popolnoma prilagodite svojim potrebam.',

	// general
	'ACP_PORTAL_GENERAL_INFO'				=> 'Administracija portala',
	'ACP_PORTAL_GENERAL_INFO_EXPLAIN'		=> 'Hvala, ker ste se odlocili za phpbb3portal. Na tej strani lahko urejate portal vašega foruma. Prikazi na tej strani vam bodo dali predogled nastavitev za portal. Povezave na levi strani vam omogocajo spreminjanje foruma po vaših željah oziroma si ga lahko popolnoma prilagodite svojim potrebam.',
	'ACP_PORTAL_GENERAL_SETTINGS'			=> 'Naj osnovnejše nastavitve',
	'ACP_PORTAL_GENERAL_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate osnovne nastavitve.',
	'PORTAL_ADVANCED_STAT'					=> 'Naprednejši blok z statistiko',
	'PORTAL_ADVANCED_STAT_EXPLAIN'			=> 'Prikaži ta blok na portalu.',
	'PORTAL_LEADERS'						=> 'Glavni / Ekipa blok',
	'PORTAL_LEADERS_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
	'PORTAL_CLOCK'							=> 'Urni blok',
	'PORTAL_CLOCK_EXPLAIN'					=> 'Prikaži ta blok na portalu.',
	'PORTAL_LINK_US'						=> 'Oglasni blok',
	'PORTAL_LINK_US_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
	'PORTAL_LINKS'							=> 'Povezave blok',
	'PORTAL_LINKS_EXPLAIN'					=> 'Prikaži ta blok na portalu.',
	'PORTAL_WELCOME'						=> 'Dobrodošli sredinski blok',
	'PORTAL_WELCOME_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
	'PORTAL_MAX_ONLINE_FRIENDS'				=> 'Limit prikaza dosegljivih prijateljev',
	'PORTAL_MAX_ONLINE_FRIENDS_EXPLAIN'		=> 'Omejitev prikaza dosegljivih uporabnikov na portalu.',

	// random member
	'PORTAL_RANDOM_MEMBER'					=> 'Nakljucni clan blok',
	'PORTAL_RANDOM_MEMBER_EXPLAIN'			=> 'Prikaži ta blok na portalu.',

	// global announcements
	'ACP_PORTAL_ANNOUNCE_INFO'					=> 'Obvestilo',
	'ACP_PORTAL_ANNOUNCE_SETTINGS'				=> 'Nastavitve obvestil',
	'ACP_PORTAL_ANNOUNCE_SETTINGS_EXPLAIN'		=> 'Tukaj lahko spreminjate nastavitve v povezavi s obvestili.',
	'PORTAL_ANNOUNCEMENTS'						=> 'Prikaži obvestila',
	'PORTAL_ANNOUNCEMENTS_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
	'PORTAL_ANNOUNCEMENTS_STYLE'				=> 'Compact global announcements block style',
	'PORTAL_ANNOUNCEMENTS_STYLE_EXPLAIN'		=> 'If select yes use compact style for global announcements, no is large style',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS'			=> 'Število obvestil na portalu',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS_EXPLAIN'	=> '0 pomeni neskoncno',
	'PORTAL_ANNOUNCEMENTS_DAY'					=> 'Število dni, kako dolgo naj bodo obvestila prikazana',
	'PORTAL_ANNOUNCEMENTS_DAY_EXPLAIN'			=> '0 pomeni neskoncno',
	'PORTAL_ANNOUNCEMENTS_LENGTH'				=> 'Najdaljša dolžina obvestila',
	'PORTAL_ANNOUNCEMENTS_LENGTH_EXPLAIN'		=> '0 pomeni neskoncno',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM'			=> 'ID foruma z obvestili',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM_EXPLAIN'	=> 'Forum v katerem so novice in clanki, pustite prazno za prikaz iz vseh forumov, ce jih želite vec, jih licite z vejico, npr. 1,2,5',

	// news
	'ACP_PORTAL_NEWS_INFO'				=> 'Novice',
	'ACP_PORTAL_NEWS_SETTINGS'			=> 'Novice nastavitve',
	'ACP_PORTAL_NEWS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezanih s novicami.',
	'PORTAL_NEWS'						=> 'Prikaži novicarski blok',
	'PORTAL_NEWS_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
	'PORTAL_NEWS_STYLE'					=> 'Kompaktni stil novicarskega bloka',
	'PORTAL_NEWS_STYLE_EXPLAIN'			=> 'Ce je izbrano "da" je izbran kompaktni stil, drugace velik stil.',
	'PORTAL_SHOW_ALL_NEWS'				=> 'Prikaži vse clanke iz tega foruma',
	'PORTAL_SHOW_ALL_NEWS_EXPLAIN'		=> 'Vkljucno z lepljivki in obvestili.',
	'PORTAL_NUMBER_OF_NEWS'				=> 'Število novic na portalu',
	'PORTAL_NUMBER_OF_NEWS_EXPLAIN'		=> '0 pomeni neskoncno',
	'PORTAL_NEWS_LENGTH'				=> 'Najdaljša dolžina clanka',
	'PORTAL_NEWS_LENGTH_EXPLAIN'		=> '0 pomeni neskoncno',
	'PORTAL_NEWS_FORUM'					=> 'ID foruma z novicami',
	'PORTAL_NEWS_FORUM_EXPLAIN'			=> 'Forum s katerega bodo prikazane novice, pustite prazno za prikaz iz vseh forumov, ce je vec forumov jih locite z vejico, npr. 1,2,5',
	'PORTAL_EXCLUDE_FORUM'				=> 'Izkljuci forum ID',
	'PORTAL_EXCLUDE_FORUM_EXPLAIN'		=> 'Forum iz katerega bodo prikazani clanki, pustite prazno za prikaz iz vseh forumov, ce je vec forumov jih locite z vejico, npr. 1,2,5',

	// recent topics
	'ACP_PORTAL_RECENT_INFO'				=> 'Zadnje teme',	
	'ACP_PORTAL_RECENT_SETTINGS'			=> 'Zadnje teme - nastavitve',	
	'ACP_PORTAL_RECENT_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s zadnjimi temami.',
	'PORTAL_RECENT'							=> 'Prikaži blok zadnjih tem',
	'PORTAL_RECENT_EXPLAIN'					=> 'Prikaži ta blok na portalu.',
	'PORTAL_MAX_TOPIC'						=> 'Limit zadnji obvestil/vrocih tem',
	'PORTAL_MAX_TOPIC_EXPLAIN'				=> '0 pomeni neskoncno',
	'PORTAL_RECENT_TITLE_LIMIT'				=> 'Najvec znakov za zadnje teme',
	'PORTAL_RECENT_TITLE_LIMIT_EXPLAIN'		=> '0 pomeni neskoncno',

	// paypal
	'ACP_PORTAL_PAYPAL_INFO'				=> 'Paypal',	
	'ACP_PORTAL_PAYPAL_SETTINGS'			=> 'Paypal nastavitve',
	'ACP_PORTAL_PAYPAL_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spremenite nastavitve za PayPal racun in ostale z njim povezane možnosti.',
	'PORTAL_PAY_C_BLOCK'					=> 'Prikaži PayPal blok',
	'PORTAL_PAY_C_BLOCK_EXPLAIN'			=> 'Prikaži ta blok na portalu.',
	'PORTAL_PAY_S_BLOCK'					=> 'Prikaži mini PayPal blok',
	'PORTAL_PAY_S_BLOCK_EXPLAIN'			=> 'Prikaži ta blok na portalu.',
	'PORTAL_PAY_ACC'						=> 'PayPal racun:',
	'PORTAL_PAY_ACC_EXPLAIN'				=> 'Vnesite vaš email za PayPal npr. antrax@lenartjezakon.com',

	// last member
	'ACP_PORTAL_MEMBERS_INFO'				=> 'Zadnji pridružen',
	'ACP_PORTAL_MEMBERS_SETTINGS'			=> 'Zadnji pridružen - nastavitve',
	'ACP_PORTAL_MEMBERS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve, ki zadevajo nazadnje pridruženih uporabnikov.',
	'PORTAL_LATEST_MEMBERS'					=> 'Prikaži "zadnji pridružen" blok',
	'PORTAL_LATEST_MEMBERS_EXPLAIN'			=> 'Prikaži ta blok na portalu.',
	'PORTAL_MAX_LAST_MEMBER'				=> 'Število zadnjih pridruženih',
	'PORTAL_MAX_LAST_MEMBER_EXPLAIN'		=> '0 pomeni neskoncno',

	// bots
	'ACP_PORTAL_BOTS_INFO'						=> 'Obiskovalci boti',
	'ACP_PORTAL_BOTS_SETTINGS'					=> 'Nastavitve bot-ov',
	'ACP_PORTAL_BOTS_SETTINGS_EXPLAIN'			=> 'Tukaj lahko spremenite nastavitve povezane z boti.',
	'PORTAL_LOAD_LAST_VISITED_BOTS'				=> 'Prikaži bote na portalu',
	'PORTAL_LOAD_LAST_VISITED_BOTS_EXPLAIN'		=> 'Prikaži ta blok na portalu.',
	'PORTAL_LAST_VISITED_BOTS_NUMBER'			=> 'Število prikazanih botov',
	'PORTAL_LAST_VISITED_BOTS_NUMBER_EXPLAIN'	=> '0 pomeni neskoncno',

	// polls   
	'ACP_PORTAL_POLLS_INFO'				=> 'Anketa',	
	'ACP_PORTAL_POLLS_SETTINGS'			=> 'Nastavitve Anket',
	'ACP_PORTAL_POLLS_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spremenite nastavitve Anket.',
	'PORTAL_POLL_TOPIC'					=> 'Prikaži blok z anketo',
	'PORTAL_POLL_TOPIC_EXPLAIN'			=> 'Prikaži ta blok na portalu.',
	'PORTAL_POLL_TOPIC_ID'				=> 'ID teme iz katere bo prikazana anketa',
	'PORTAL_POLL_TOPIC_ID_EXPLAIN'		=> 'Forum iz katerega bodo prikazane ankete, pustite prazno za prikaz vseh, ce je vec forumov jih locite z vejico, npr. 1,2,5',
	'PORTAL_POLL_LIMIT'					=> 'Poll display limit',
	'PORTAL_POLL_LIMIT_EXPLAIN'			=> 'The number of polls you would like to display on the portal page.',
	'PORTAL_POLL_ALLOW_VOTE'			=> 'Allow voting',
	'PORTAL_POLL_ALLOW_VOTE_EXPLAIN'	=> 'Allow users with the required permissions to vote from the portal page.',

	// most poster
	'ACP_PORTAL_MOST_POSTER_INFO'				=> 'Najaktivnejši',
	'ACP_PORTAL_MOST_POSTER_SETTINGS'			=> 'Najaktivnejši - nastavitve',
	'ACP_PORTAL_MOST_POSTER_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s "najaktivnejši".',
	'PORTAL_TOP_POSTERS'                  		=> 'Prikaži "Najaktivnejši" blok',
	'PORTAL_TOP_POSTERS_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
	'PORTAL_MAX_MOST_POSTER'					=> 'Koliko uporabnikov prikažem',
	'PORTAL_MAX_MOST_POSTER_EXPLAIN'			=> '0 pomeni neskoncno',

	// left and right collumn width 
	'ACP_PORTAL_COLLUMN_WIDTH_INFO'				=> 'Širina stolpca',
	'ACP_PORTAL_COLLUMN_WIDTH_SETTINGS'			=> 'Nastavitve širine levega in desnega stolpca',	
	'PORTAL_LEFT_COLLUMN_WIDTH'					=> 'Width value of the left collumn',
	'PORTAL_LEFT_COLLUMN_WIDTH_EXPLAIN'			=> 'Change the width of left collumn in pixel, recommended value 180',
	'PORTAL_RIGHT_COLLUMN_WIDTH'				=> 'Width value of the right collumn',
	'PORTAL_RIGHT_COLLUMN_WIDTH_EXPLAIN'		=> 'Change the width of right collumn in pixel, recommended value 180',

	// attachments    
	'ACP_PORTAL_ATTACHMENTS_NUMBER_INFO'				=> 'Priponke',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS'			=> 'Priponke - nastavitve',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s priponkami.',
	'PORTAL_ATTACHMENTS'                  				=> 'Prikaži blok priponk',
	'PORTAL_ATTACHMENTS_EXPLAIN'                  		=> 'Prikaži ta blok na portalu.',
	'PORTAL_ATTACHMENTS_NUMBER'							=> 'Število prikazanih priponk',
	'PORTAL_ATTACHMENTS_NUMBER_EXPLAIN'					=> '0 pomeni neskoncno',

	// wordgraph
	'ACP_PORTAL_WORDGRAPH_INFO'				=> 'Wordgraph',
	'ACP_PORTAL_WORDGRAPH_SETTINGS'			=> 'Wordgraph settings',	
	'ACP_PORTAL_WORDGRAPH_SETTINGS_EXPLAIN'	=> 'Here you can change your wordgraph information and certain specific options.',
	'PORTAL_WORDGRAPH'						=> 'Display wordgraph block',
	'PORTAL_WORDGRAPH_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
	'PORTAL_WORDGRAPH_MAX_WORDS'			=> 'Število besed, ki jih prikažem',
	'PORTAL_WORDGRAPH_MAX_WORDS_EXPLAIN'	=> '0 pomeni neskoncno',
	'PORTAL_WORDGRAPH_WORD_COUNTS'			=> 'Include count values to display',
	'PORTAL_WORDGRAPH_WORD_COUNTS_EXPLAIN'	=> 'Display count values per word eg. (25).',
	'PORTAL_WORDGRAPH_RATIO'				=> 'Used aspect ratio word size',
	'PORTAL_WORDGRAPH_RATIO_EXPLAIN'		=> 'Change the aspect ratio (bigger/smaler) word size (default=18)',

	// welcome message
	'ACP_PORTAL_WELCOME_INFO'				=> 'Dobrodošli',
	'ACP_PORTAL_WELCOME_SETTINGS'			=> 'Dobrodošli - nastavitve',
	'ACP_PORTAL_WELCOME_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spremenite nastavitve povezane s dobrodošlico.',
	'PORTAL_WELCOME_INTRO'					=> 'Dobrodošlica:',
	'PORTAL_WELCOME_INTRO_EXPLAIN'			=> 'Spremeni dobrodošlico (zgolj besedilo). Max. 600 znakov!',

	// ads
	'ACP_PORTAL_ADS_INFO'				=> 'Oglaševanje',
	'ACP_PORTAL_ADS_SETTINGS'			=> 'Oglaševanje - nastavitve',
	'ACP_PORTAL_ADS_SETTINGS_EXPLAIN'	=> 'Tukaj ahko spremenite nastavitve povezane z oglaševanjem.',
	'PORTAL_ADS_SMALL'					=> 'Prikaži mini oglasni blok',
	'PORTAL_ADS_SMALL_EXPLAIN'			=> 'Prikaži ta blok na portalu.',
	'PORTAL_ADS_SMALL_BOX'				=> 'Oglasna koda',
	'PORTAL_ADS_SMALL_BOX_EXPLAIN'		=> 'Spremeni oglasno kodo (zgolj besedilo). Max. 600 znakov!',
	'PORTAL_ADS_CENTER'					=> 'Prikaži sredinski oglasni blok',
	'PORTAL_ADS_CENTER_EXPLAIN'			=> 'Prikaži ta blok na portalu.',
	'PORTAL_ADS_CENTER_BOX'				=> 'Oglasna koda',
	'PORTAL_ADS_CENTER_BOX_EXPLAIN'		=> 'Spremeni oglasno kodo (zgolj besedilo). Max. 600 znakov!',

	// minicalendar
	'ACP_PORTAL_MINICALENDAR_INFO'				=> 'Mini Kolendar',
	'ACP_PORTAL_MINICALENDAR_SETTINGS'			=> 'Mini Kolendar - settings',
	'ACP_PORTAL_MINICALENDAR_SETTINGS_EXPLAIN'	=> 'Tukaj lahko spreminjate nastavitve povezane s mini kolendarjem.',
	'PORTAL_MINICALENDAR'						=> 'Prikaži mini kolendar blok',
	'PORTAL_MINICALENDAR_EXPLAIN'				=> 'Prikaži ta blok na portalu.',
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