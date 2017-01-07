<?php
/*
*
* phpBB3 Portal [Slovak]
*
* @package phpBB3 Portal  a.k.a canverPortal  ( www.phpbb3portal.com )
* @version $Id: portal.php,v 1.1 2008/02/09 08:18:13 angelside Exp $
* @copyright (c) Canver Software - www.canversoft.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translation by: Antrax` @ www.lenartjezakon.com  DATE 20.avgust 2007
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
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine


$lang = array_merge($lang, array(
	// General
	'PORTAL'				=> 'Portal',
	'WELCOME'				=> 'Dobrodošli',

	// news & global announcements
	'LATEST_ANNOUNCEMENTS'	=> 'Zadnja obvestila',
	'LATEST_NEWS'			=> 'Zadnje novice',
	'READ_FULL'				=> 'Pokaži vse',
	'NO_NEWS'				=> 'Ni novic',
	'NO_ANNOUNCEMENTS'		=> 'Ni obvestil',
	'POSTED_BY'				=> 'Avtor',
	'COMMENTS'				=> 'Komentarji',
	'VIEW_COMMENTS'			=> 'Poglej komentarje',
	'POST_REPLY'			=> 'Komentiraj',
	'TOPIC_VIEWS'			=> 'Ogledov',

	// who is online
	'WIO_TOTAL'			=> 'Skupaj',
	'WIO_REGISTERED'	=> 'Registriranih',
	'WIO_HIDDEN'		=> 'Skritih',
	'WIO_GUEST'			=> 'Gostov',
	//'RECORD_ONLINE_USERS'=> 'Poglej rekord: <strong>%1$s</strong><br />%2$s',

	// user menu
	'USER_MENU'			=> 'Uporabniški meni',
	'UM_LOG_ME_IN'		=> 'zapomni si me',
	'UM_HIDE_ME'		=> 'skrij me',
	'UM_MAIN_SUBSCRIBED'=> 'Naročen',
	'UM_BOOKMARKS'		=> 'Priljubljene',

	// statistics
	'ST_NEW'		=> 'Novo',
	'ST_NEW_POSTS'	=> 'Nov odgovor',
	'ST_NEW_TOPICS'	=> 'Nova tema',
	'ST_NEW_ANNS'	=> 'Novo obvestilo',
	'ST_NEW_STICKYS'=> 'Nov lepljivek',
	'ST_TOP'		=> 'Skupaj',
	'ST_TOP_ANNS'	=> 'Skupno obvestil',
	'ST_TOP_STICKYS'=> 'Skupno lepljivkov',
	'ST_TOT_ATTACH'	=> 'Skupno dodatkov',

	// search
	'SH'		=> 'pojdi',
	'SH_SITE'	=> 'forumi',
	'SH_POSTS'	=> 'odgovorov',
	'SH_AUTHOR'	=> 'avtor',
	'SH_ENGINE'	=> 'iskalni kriteriji',
	'SH_ADV'	=> 'napredno iskanje',
	
	// recent
	'RECENT_TOPIC'		=> 'Zadnje teme',
	'RECENT_ANN'		=> 'Zadnja obvestila',
	'RECENT_HOT_TOPIC'	=> 'Zadnje popularne teme',

	// random member
	'RND_MEMBER'	=> 'Naključni član',
	'RND_JOIN'		=> 'Pridružen',
	'RND_POSTS'		=> 'Posts',
	'RND_OCC'		=> 'Poklic',
	'RND_FROM'		=> 'Lokacija',
	'RND_WWW'		=> 'Spletna stran',

	// top poster
	'TOP_POSTER'	=> 'Naj pisatelji',

	// links
	'LINKS'	=> 'Povezave',

	// latest members
	'LATEST_MEMBERS'	=> 'Zadnji člani',

	// make donation
	'DONATION' 		=> 'Donirajte',
	'DONATION_TEXT'	=> 'Darovanje je prostovoljno! Kdorkoli želi pomagati oz. podpreti razvoj,strežnik in domeno prosimo, da daruje.',
	'PAY_MSG'		=> 'Po izbiri zneska iz seznama, ki ga želite donirati kliknite na ikono PayPal.',
	'PAY_ITEM'		=> 'Donirajte', // paypal item

	// main menu
	'M_MENU' 	=> 'Meni',
	'M_CONTENT'	=> 'Vsebina',
	'M_ACP'		=> 'ACP',
	'M_HELP'	=> 'Pomoč',
	'M_BBCODE'	=> 'BBCode FAQ',
	'M_TERMS'	=> 'Pogoji uporabi',
	'M_PRV'		=> 'Splošni pogoji',
	'M_SEARCH'	=> 'Iskanje',

	// link us
	'LINK_US'		=> 'Dodajte povezavo',
	'LINK_US_TXT'	=> 'Za povezavo na našo spletno stran <strong>%s</strong>. uporabite naslednjo HTML kodo:',

	// friends
	'FRIENDS'				=> 'Prijatelji',
	'FRIENDS_OFFLINE'		=> 'Nedosegljivi',
	'FRIENDS_ONLINE'		=> 'Dosegljivi',
	'NO_FRIENDS'			=> 'No friends currently defined',
	'NO_FRIENDS_OFFLINE'	=> 'Prijatelji niso nedosegljivi',
	'NO_FRIENDS_ONLINE'		=> 'Ni dosegljivih prijateljev',
	
	// last bots
	'LAST_VISITED_BOTS'		=> 'Zadnjih %s botov',
	
	// wordgraph
	'WORDGRAPH'				=> 'Wordgraph',

	// change style
	'BOARD_STYLE'			=> 'Preobleka',
	'STYLE_CHOOSE'			=> 'Izberi preobleko',
		
	// team
	'NO_ADMINISTRATORS_P'	=> 'Ni administratorjev',
	'NO_MODERATORS_P'		=> 'Ni moderatorjev',

	// average Statistics
	'TOPICS_PER_DAY_OTHER'	=> 'Tem dnevno: <strong>%d</strong>',
	'TOPICS_PER_DAY_ZERO'	=> 'Tem dnevno: <strong>0</strong>',
	'POSTS_PER_DAY_OTHER'	=> 'Sporočil dnevno: <strong>%d</strong>',
	'POSTS_PER_DAY_ZERO'	=> 'Sporočil dnevno: <strong>0</strong>',
	'USERS_PER_DAY_OTHER'	=> 'Uporabnikov dnevno: <strong>%d</strong>',
	'USERS_PER_DAY_ZERO'	=> 'Uporabnikov dnevno: <strong>0</strong>',
	'TOPICS_PER_USER_OTHER'	=> 'Tem na uporabnika: <strong>%d</strong>',
	'TOPICS_PER_USER_ZERO'	=> 'Tem na uporabnika: <strong>0</strong>',
	'POSTS_PER_USER_OTHER'	=> 'Sporočil na uporabnika: <strong>%d</strong>',
	'POSTS_PER_USER_ZERO'	=> 'Sporočil na uporabnika: <strong>0</strong>',
	'POSTS_PER_TOPIC_OTHER'	=> 'Sporočil na temo: <strong>%d</strong>',
	'POSTS_PER_TOPIC_ZERO'	=> 'Sporočil na temo: <strong>0</strong>',

	// Poll
	'LATEST_POLLS'			=> 'Latest Polls',
	'NO_OPTIONS'			=> 'This poll has no available options.',
	'NO_POLL'				=> 'No polls available',
	'RETURN_PORTAL'			=> '%sReturn to the portal%s',

	// other
	'POLL'		=> 'Anketa',
	'CLOCK'		=> 'Ura',
	'SPONSOR'	=> 'Sponzorji',
	
	/**
	* DO NOT REMOVE or CHANGE
	*/
	'PORTAL_COPY'	=> 'Portal by <a href="http://www.phpbb3portal.com" title="phpBB3 Portal" target="_blank">phpBB3 Portal</a> &copy; <a href="http://www.phpbbturkiye.net" title="phpBB Türkiye" target="_blank">phpBB</a> Türkiye',
	)
);

// mini calendar
$lang = array_merge($lang, array(
	'Mini_Cal_calendar'		=> 'Kolendar',
	'Mini_Cal_add_event'	=> 'Dodaj dogodek',
	'Mini_Cal_events'		=> 'Prihajajoči dogodki',
	'Mini_Cal_no_events'	=> 'Brez',
	'Mini_cal_this_event'	=> 'Dogodki za tekoči mesec',
	'View_next_month'		=> 'naslednji mesec',
	'View_previous_month'	=> 'prejšni mesec',

// uses MySQL DATE_FORMAT - %c  long_month, numeric (1..12) - %e  Day of the long_month, numeric (0..31)
// see http://www.mysql.com/doc/D/a/Date_and_time_functions.html for more details
// currently supports: %a, %b, %c, %d, %e, %m, %y, %Y, %H, %k, %h, %l, %i, %s, %p
	'Mini_Cal_date_format'		=> '%b %e',
	'Mini_Cal_date_format_Time'	=> '%H:%i',

// if you change the first day of the week in constants.php, you should change values for the short day names accordingly
// e.g. FDOW = Sunday -> $lang['mini_cal']['day'][1] = 'Su'; ... $lang['mini_cal']['day'][7] = 'Sa'; 
//      FDOW = Monday -> $lang['mini_cal']['day'][1] = 'Mo'; ... $lang['mini_cal']['day'][7] = 'Su'; 
	'mini_cal'	=> array(
		'day'	=> array(
			'1'	=> 'Pon',
			'2'	=> 'Tor',
			'3'	=> 'Sre',
			'4'	=> 'Čet',
			'5'	=> 'Pet',
			'6'	=> 'Sob',
			'7'	=> 'Ned',
		),

		'month'	=> array(
			'1'	=> 'Jan',
			'2'	=> 'Feb',
			'3'	=> 'Mar',
			'4'	=> 'Apr',
			'5'	=> 'Maj',
			'6'	=> 'Jun',
			'7'	=> 'Jul',
			'8'	=> 'Avg',
			'9'	=> 'Sep',
			'10'=> 'Okt',
			'11'=> 'Nov',
			'12'=> 'Dec',
		),

		'long_month'=> array(
			'1'	=> 'Januar',
			'2'	=> 'Februar',
			'3'	=> 'Marec',
			'4'	=> 'April',
			'5'	=> 'Maj',
			'6'	=> 'Junij',
			'7'	=> 'Julij',
			'8'	=> 'Avgust',
			'9'	=> 'September',
			'10'=> 'Oktober',
			'11'=> 'November',
			'12'=> 'December',
		),
	),
));

?>