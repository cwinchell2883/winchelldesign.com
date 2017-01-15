<?php
/*
*
* phpBB3 Portal [Dutch]
*
* @package phpBB3 Portal  a.k.a canverPortal  ( www.phpbb3portal.com )
* @version $Id: portal.php,v 1.1 2008/02/09 08:18:13 angelside Exp $
* @copyright (c) Canver Software - www.canversoft.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translation by: Raimon http://www.phpBBservice.nl  2-9-2007
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
	'PORTAL'				=> 'Portaal',
	'WELCOME'				=> 'Welkom',

	// news & global announcements
	'LATEST_ANNOUNCEMENTS'	=> 'Laatste forummededelingen',
	'LATEST_NEWS'			=> 'Laatste nieuws',
	'READ_FULL'				=> 'Lees alles',
	'NO_NEWS'				=> 'Er is geen nieuws',
	'NO_ANNOUNCEMENTS'		=> 'Er zijn geen forummededelingen',
	'POSTED_BY'				=> 'Auteur',
	'COMMENTS'				=> 'Reacties',
	'VIEW_COMMENTS'			=> 'Bekijk alle reacties',
	'POST_REPLY'			=> 'Plaats een reactie',
	'TOPIC_VIEWS'			=> 'Bekeken',

	// who is online
	'WIO_TOTAL'			=> 'Totaal',
	'WIO_REGISTERED'	=> 'Geregistreerd',
	'WIO_HIDDEN'		=> 'Verborgen',
	'WIO_GUEST'			=> 'Gasten',
	//'RECORD_ONLINE_USERS'=> 'View record: <strong>%1$s</strong><br />%2$s',

	// user menu
	'USER_MENU'			=> 'Gebruikersmenu',
	'UM_LOG_ME_IN'		=> 'onthoud mij',
	'UM_HIDE_ME'		=> 'verberg mij',
	'UM_MAIN_SUBSCRIBED'=> 'Abbonementen',
	'UM_BOOKMARKS'		=> 'Bladwijzers',

	// statistics
	'ST_NEW'		=> 'New',
	'ST_NEW_POSTS'	=> 'New post',
	'ST_NEW_TOPICS'	=> 'New topic',
	'ST_NEW_ANNS'	=> 'New announcment',
	'ST_NEW_STICKYS'=> 'New sticky',
	'ST_TOP'		=> 'Aantal',
	'ST_TOP_ANNS'	=> 'Aantal mededelingen',
	'ST_TOP_STICKYS'=> 'Aantal vastegepinde',
	'ST_TOT_ATTACH'	=> 'Aantal bijlagen',

	// search
	'SH'		=> 'OK',
	'SH_SITE'	=> 'forums',
	'SH_POSTS'	=> 'berichten',
	'SH_AUTHOR'	=> 'auteur',
	'SH_ENGINE'	=> 'zoekrobot',
	'SH_ADV'	=> 'Uitgebreid zoeken',
	
	// recent
	'RECENT_TOPIC'		=> 'Recent onderwerp',
	'RECENT_ANN'		=> 'Recente mededeling',
	'RECENT_HOT_TOPIC'	=> 'Recent populair onderwerp',

	// random member
	'RND_MEMBER'	=> 'Willekeurige gebruiker',
	'RND_JOIN'		=> 'Geregistreerd',
	'RND_POSTS'		=> 'Berichten',
	'RND_OCC'		=> 'Beroep',
	'RND_FROM'		=> 'Woonplaats',
	'RND_WWW'		=> 'Website',

	// top poster
	'TOP_POSTER'	=> 'Beste berichtenplaatser',

	// links
	'LINKS'	=> 'Links',

	// latest members
	'LATEST_MEMBERS'	=> 'Laatste lid',

	// make donation
	'DONATION' 		=> 'Maak een donatie',
	'DONATION_TEXT' => 'Dit is een wijze om de kosten van de server en het domein te bekostigen. Dit is niet om winst te maken.',
	'PAY_MSG'		=> 'nadat je de hoogte van de donatie hebt bepaald in het menu, kun je verder gaan door op het logo van paypal te klikken.',
	'PAY_ITEM'		=> 'Maak een donatie', // paypal item

	// main menu
	'M_MENU' 	=> 'Menu',
	'M_CONTENT'	=> 'Inhoud',
	'M_ACP'		=> 'AP',
	'M_HELP'	=> 'FAQ',
	'M_BBCODE'	=> 'BBCode FAQ',
	'M_TERMS'	=> 'Gebruiksvoorwaarden',
	'M_PRV'		=> 'Privacy beleid',
	'M_SEARCH'	=> 'Zoeken',

	// link us
	'LINK_US'		=> 'Link naar ons',
	'LINK_US_TXT'	=> 'Voel je vrij om ons te linken naar <strong>%s</strong>. Gebruik de volgende HTML:',

	// friends
	'FRIENDS'				=> 'vrienden',
	'FRIENDS_OFFLINE'		=> 'Offline',
	'FRIENDS_ONLINE'		=> 'Online',
	'NO_FRIENDS'			=> 'Er zijn momenteel geen vrienden gekozen',
	'NO_FRIENDS_OFFLINE'	=> 'Er zijn geen vrienden offline',
	'NO_FRIENDS_ONLINE'		=> 'Er zijn geen vrienden online',
	
	// last bots
	'LAST_VISITED_BOTS'		=> 'Laatst %s bezochten zoekrobot',
	
	// wordgraph
	'WORDGRAPH'				=> 'Wordgraph',

	// change style
	'BOARD_STYLE'			=> 'forum stijl',
	'STYLE_CHOOSE'			=> 'Selecteer een stijl',
		
	// team
	'NO_ADMINISTRATORS_P'	=> 'Geen beheerders',
	'NO_MODERATORS_P'		=> 'Geen moderators',

	// average Statistics
	'TOPICS_PER_DAY_OTHER'	=> 'Onderwerpen per dag: <strong>%d</strong>',
	'TOPICS_PER_DAY_ZERO'	=> 'Onderwerpen per dag: <strong>0</strong>',
	'POSTS_PER_DAY_OTHER'	=> 'Berichten per dag: <strong>%d</strong>',
	'POSTS_PER_DAY_ZERO'	=> 'Berichten per dag: <strong>0</strong>',
	'USERS_PER_DAY_OTHER'	=> 'Gebruikers per dag: <strong>%d</strong>',
	'USERS_PER_DAY_ZERO'	=> 'Gebruikers per dag: <strong>0</strong>',
	'TOPICS_PER_USER_OTHER'	=> 'Onderwerpen per gebruiker: <strong>%d</strong>',
	'TOPICS_PER_USER_ZERO'	=> 'Onderwerpen per gebruiker: <strong>0</strong>',
	'POSTS_PER_USER_OTHER'	=> 'Berichten per gebruiker: <strong>%d</strong>',
	'POSTS_PER_USER_ZERO'	=> 'Berichten per gebruiker: <strong>0</strong>',
	'POSTS_PER_TOPIC_OTHER'	=> 'Berichten per onderwerp: <strong>%d</strong>',
	'POSTS_PER_TOPIC_ZERO'	=> 'Berichten per onderwerp: <strong>0</strong>',

	// Poll
	'LATEST_POLLS'			=> 'Latest Polls',
	'NO_OPTIONS'			=> 'This poll has no available options.',
	'NO_POLL'				=> 'No polls available',
	'RETURN_PORTAL'			=> '%sReturn to the portal%s',

	// other
	'POLL'		=> 'Peiling',
	'CLOCK'		=> 'Klok',
	'SPONSOR'	=> 'Sponsors',
	
	/**
	* DO NOT REMOVE or CHANGE
	*/
	'PORTAL_COPY'	=> 'Portaal door <a href="http://www.phpbb3portal.com" title="phpBB3 Portal">phpBB3 Portal</a> &copy; <a href="http://www.phpbbturkiye.net" title="phpBB Türkiye">phpBB</a> Turkije <br />
	Vertaling door: <a href="http://www.phpBBservice.nl">phpBBservice.nl</a>',
	)
);

// mini calendar
$lang = array_merge($lang, array(
	'Mini_Cal_calendar'		=> 'Kalender',
	'Mini_Cal_add_event'	=> 'Toevoegen van een gebeurtenis',
	'Mini_Cal_events'		=> 'Aanstaande gebeurtenissen',
	'Mini_Cal_no_events'	=> 'Geen',
	'Mini_cal_this_event'	=> 'Deze vakantiemaand gebeurtenissen',
	'View_next_month'		=> 'volgende maand',
	'View_previous_month'	=> 'vorige maand',

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
		'1'		=> 'zon',
		'2'		=> 'din',
		'3'		=> 'woe',
		'4'		=> 'don',
		'5'		=> 'vrij',
		'6'		=> 'zat',
		'7'		=> 'zon',	
			
		),

		'month'	=> array(
		'1'		=> 'jan',
		'2'		=> 'feb',
		'3'		=> 'maa',
		'4'		=> 'apr',
		'5'	=> 'mei',
		'6'		=> 'jun',
		'7'		=> 'jul',
		'8'		=> 'aug',
		'9'		=> 'sep',
		'10'		=> 'okt',
		'11'		=> 'nov',
		'12'		=> 'dec',
		),

		'long_month'=> array(
		'1'	=> 'januari',
		'2'	=> 'februari',
		'3'		=> 'maart',
		'4'		=> 'april',
		'5'		=> 'mei',
		'6'		=> 'juni',
		'7'		=> 'juli',
		'8'	=> 'augustus',
		'9' => 'september',
		'10'	=> 'oktober',
		'11'	=> 'november',
		'12'	=> 'december',
		),
	),
));

?>