<?php
/*
*
* phpBB3 Portal ACP [Dutch]
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
	'ACP_PORTAL_INFO'					=> 'Portaal',
	'ACP_PORTAL_INFO_SETTINGS'			=> 'Algemene instellingen',
	'ACP_PORTAL_INFO_SETTINGS_EXPLAIN'	=> 'Dank je dat je gekozen hebt voor phpBB3 portaal. Op deze pagina kan je de portaal beheren van je forum. De schermen hier geven je een snelle kijk op alle portaal instellingen. De links aan de linkerkant van dit scherm  geven je de mogelijkheid om elk onderdeel te beheren.',

	'ACP_PORTAL_SETTINGS'				=> 'Algemene instellingen',
	'ACP_PORTAL_SETTINGS_EXPLAIN'		=> 'Dank je dat je gekozen hebt voor phpBB3 portaal. Op deze pagina kan je de portaal beheren van je forum. De schermen hier geven je een snelle kijk op alle portaal instellingen. De links aan de linkerkant van dit scherm  geven je de mogelijkheid om elk onderdeel te beheren.',

	// general
	'ACP_PORTAL_GENERAL_INFO'				=> 'Portaal beheer',
	'ACP_PORTAL_GENERAL_INFO_EXPLAIN'		=> 'Dank je dat je gekozen hebt voor phpBB3 portaal. Op deze pagina kan je de portaal beheren van je forum. De schermen hier geven je een snelle kijk op alle portaal instellingen. De links aan de linkerkant van dit scherm  geven je de mogelijkheid om elk onderdeel te beheren.',
	'ACP_PORTAL_GENERAL_SETTINGS'			=> 'Algemene instellingen',
	'ACP_PORTAL_GENERAL_SETTINGS_EXPLAIN'	=> 'Hier kan je de algemene instellingen aanpassen en specifieke instellingen aanpassen.',
	'PORTAL_ADVANCED_STAT'					=> 'Uitgebreide statistieken blok',
	'PORTAL_ADVANCED_STAT_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',
	'PORTAL_LEADERS'						=> 'Leiders / Team blok',
	'PORTAL_LEADERS_EXPLAIN'				=> 'Weergeven dit blok op de portaal.',
	'PORTAL_CLOCK'							=> 'Klok blok',
	'PORTAL_CLOCK_EXPLAIN'					=> 'Weergeven dit blok op de portaal.',
	'PORTAL_LINK_US'						=> 'Link ons blok',
	'PORTAL_LINK_US_EXPLAIN'				=> 'Weergeven dit blok op de portaal.',
	'PORTAL_LINKS'							=> 'Links blok',
	'PORTAL_LINKS_EXPLAIN'					=> 'Weergeven dit blok op de portaal.',
	'PORTAL_WELCOME'						=> 'Welkom midden blok',
	'PORTAL_WELCOME_EXPLAIN'				=> 'Weergeven dit blok op de portaal.',
	'PORTAL_MAX_ONLINE_FRIENDS'				=> 'Limiet van de weergeven online vrienden',
	'PORTAL_MAX_ONLINE_FRIENDS_EXPLAIN'		=> 'Limiet weergeven van de online vrienden in de portaal blok om een waarde te bepaalen.',

	// random member
	'PORTAL_RANDOM_MEMBER'					=> 'Willekeurig gebruiker blok',
	'PORTAL_RANDOM_MEMBER_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',

	// global announcements
	'ACP_PORTAL_ANNOUNCE_INFO'					=> 'Forummededelingen',
	'ACP_PORTAL_ANNOUNCE_SETTINGS'				=> 'Forummededelingen instellingen',
	'ACP_PORTAL_ANNOUNCE_SETTINGS_EXPLAIN'		=> 'Hier kan je jouw forummededelingen informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_ANNOUNCEMENTS'						=> 'Weergeven forum mededelingen',
	'PORTAL_ANNOUNCEMENTS_EXPLAIN'				=> 'Weergeven dit blok op de portaal.',
	'PORTAL_ANNOUNCEMENTS_STYLE'				=> 'Compacte forummededelingen blok stijl',
	'PORTAL_ANNOUNCEMENTS_STYLE_EXPLAIN'		=> 'Als je ja kiest word er een compacte stijl gebruikt voor forummededelingen, nee is een groote stijl',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS'			=> 'Aantal mededelingen op de portaal',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS_EXPLAIN'	=> '0 betekend geen limiet',
	'PORTAL_ANNOUNCEMENTS_DAY'					=> 'Aantal dagen dat de mededelingen worden weergegeven',
	'PORTAL_ANNOUNCEMENTS_DAY_EXPLAIN'			=> '0 betekend geen limiet',
	'PORTAL_ANNOUNCEMENTS_LENGTH'				=> 'Maximale lengte van de forummededelingen',
	'PORTAL_ANNOUNCEMENTS_LENGTH_EXPLAIN'		=> '0 betekend geen limiet',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM'			=> 'Forummededelingen forum ID',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM_EXPLAIN'	=> 'Het forum waar we de forummededelingen ophalen, laat dit leeg als we alle gegevens moeten ophalen uit alle forums, bij meerdere forums kan je een komma gebruiken, b.v. 1,2,5',

	// news
	'ACP_PORTAL_NEWS_INFO'				=> 'Nieuws',
	'ACP_PORTAL_NEWS_SETTINGS'			=> 'Nieuws instellingen',
	'ACP_PORTAL_NEWS_SETTINGS_EXPLAIN'	=> 'Hier kan je de nieuws informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_NEWS'						=> 'Weergeven nieuws blok',
	'PORTAL_NEWS_EXPLAIN'				=> 'Dit blok weergeven op de portaal.',
	'PORTAL_NEWS_STYLE'					=> 'Compacte nieuws blok stijl',
	'PORTAL_NEWS_STYLE_EXPLAIN'			=> 'Als je ja selecteerd word er een compacte stijl gebruikt voor het nieuws, bij nee is het een groote stijl.',
	'PORTAL_SHOW_ALL_NEWS'				=> 'Weergeven alle artikellen in dit forum',
	'PORTAL_SHOW_ALL_NEWS_EXPLAIN'		=> 'inclusief vastegepinde en mededelingen.',
	'PORTAL_NUMBER_OF_NEWS'				=> 'Aantal nieuws artikellen op de portaal.',
	'PORTAL_NUMBER_OF_NEWS_EXPLAIN'		=> '0 betekend geen limiet',
	'PORTAL_NEWS_LENGTH'				=> 'Miximale lengte van een nieuws artikel',
	'PORTAL_NEWS_LENGTH_EXPLAIN'		=> '0 betekend geen limiet',
	'PORTAL_NEWS_FORUM'					=> 'Nieuws Forum ID',
	'PORTAL_NEWS_FORUM_EXPLAIN'			=> 'Het forum waar we de artikelen ophalen, laat dit leeg als we alle gegevens moeten ophalen uit alle forums, bij meerdere forums kan je een komma gebruiken, b.v. 1,2,5',
	'PORTAL_EXCLUDE_FORUM'				=> 'Exclusief Forum ID',
	'PORTAL_EXCLUDE_FORUM_EXPLAIN'		=> 'Het forum waar we de artikelen ophalen, laat dit leeg als we alle gegevens moeten ophalen uit alle forums, bij meerdere forums kan je een komma gebruiken, b.v. 1,2,5',

	// recent topics
	'ACP_PORTAL_RECENT_INFO'				=> 'Recente onderwerpen',	
	'ACP_PORTAL_RECENT_SETTINGS'			=> 'Recente onderwerpen instellingen',	
	'ACP_PORTAL_RECENT_SETTINGS_EXPLAIN'	=> 'Hier kan je de recente onderwerpen informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_RECENT'							=> 'Recent onderwerpen blok weergeven',
	'PORTAL_RECENT_EXPLAIN'					=> 'Weergeven dit blok op de portaal.',
	'PORTAL_MAX_TOPIC'						=> 'Limiet van recente mededelingen/populaire onderwerpen',
	'PORTAL_MAX_TOPIC_EXPLAIN'				=> '0 betekend geen limiet',
	'PORTAL_RECENT_TITLE_LIMIT'				=> 'Teken limiet voor recent onderwerp',
	'PORTAL_RECENT_TITLE_LIMIT_EXPLAIN'		=> '0 betekend geen limiet',

	// paypal
	'ACP_PORTAL_PAYPAL_INFO'				=> 'Paypal',	
	'ACP_PORTAL_PAYPAL_SETTINGS'			=> 'Paypal instellingen',
	'ACP_PORTAL_PAYPAL_SETTINGS_EXPLAIN'	=> 'Hier kan je de jouw paypal informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_PAY_C_BLOCK'					=> 'Paypal midden blok weergeven',
	'PORTAL_PAY_C_BLOCK_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',
	'PORTAL_PAY_S_BLOCK'					=> 'Weergeven van het smalle paypal blok',
	'PORTAL_PAY_S_BLOCK_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',
	'PORTAL_PAY_ACC'						=> 'Paypal accountend om te gebruiken',
	'PORTAL_PAY_ACC_EXPLAIN'				=> 'Typ het gebruikte paypal email adres in. b.v. xxx@xxx.nl',

	// last member
	'ACP_PORTAL_MEMBERS_INFO'				=> 'Laatste gebruikers',
	'ACP_PORTAL_MEMBERS_SETTINGS'			=> 'Laatste gebruikers instellingen',
	'ACP_PORTAL_MEMBERS_SETTINGS_EXPLAIN'	=> 'Hier kan je jouw laatste gebruikers informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_LATEST_MEMBERS'					=> 'Weergeven van de laatste gebruikers blok',
	'PORTAL_LATEST_MEMBERS_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',
	'PORTAL_MAX_LAST_MEMBER'				=> 'Limiet van het aantal weergeven laatste gebruikers',
	'PORTAL_MAX_LAST_MEMBER_EXPLAIN'		=> '0 betekend geen limiet',

	// bots
	'ACP_PORTAL_BOTS_INFO'						=> 'Bezoeken van zoekrobots',
	'ACP_PORTAL_BOTS_SETTINGS'					=> 'Bezoeken zoekrobots instellingen',
	'ACP_PORTAL_BOTS_SETTINGS_EXPLAIN'			=> 'Hier kan je de bezoeken zoekrobots informatie aantepassen, en bepaalde opties ervoor instellen.',
	'PORTAL_LOAD_LAST_VISITED_BOTS'				=> 'Weergeven van de Bezoeken zoekrobots blok',
	'PORTAL_LOAD_LAST_VISITED_BOTS_EXPLAIN'		=> 'Weergeven dit blok op de portaal.',
	'PORTAL_LAST_VISITED_BOTS_NUMBER'			=> 'Hoeveel zoekrobots wil je laten weergeven',
	'PORTAL_LAST_VISITED_BOTS_NUMBER_EXPLAIN'	=> '0 betekend geen limiet',

	// polls   
	'ACP_PORTAL_POLLS_INFO'				=> 'Peiling',	
	'ACP_PORTAL_POLLS_SETTINGS'			=> 'peiling instellingen',
	'ACP_PORTAL_POLLS_SETTINGS_EXPLAIN'	=> 'Hier kan je de peiling informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_POLL_TOPIC'					=> 'weergeven van het peiling blok',
	'PORTAL_POLL_TOPIC_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',
	'PORTAL_POLL_TOPIC_ID'				=> 'Peiling onderwerp van het forum met ID',
	'PORTAL_POLL_TOPIC_ID_EXPLAIN'		=> 'Het forum waar we de peilingen ophalen, laat dit leeg als we alle gegevens moeten ophalen uit alle forums, bij meerdere forums kan je een komma gebruiken, b.v. 1,2,5',
	'PORTAL_POLL_LIMIT'					=> 'Poll display limit',
	'PORTAL_POLL_LIMIT_EXPLAIN'			=> 'The number of polls you would like to display on the portal page.',
	'PORTAL_POLL_ALLOW_VOTE'			=> 'Allow voting',
	'PORTAL_POLL_ALLOW_VOTE_EXPLAIN'	=> 'Allow users with the required permissions to vote from the portal page.',

	// most poster
	'ACP_PORTAL_MOST_POSTER_INFO'				=> 'Most poster',
	'ACP_PORTAL_MOST_POSTER_SETTINGS'			=> 'Most poster settings',
	'ACP_PORTAL_MOST_POSTER_SETTINGS_EXPLAIN'	=> 'Hier kan je de meeste berichtenplaatser informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_TOP_POSTERS'                  		=> 'Weergeven dan de meeste/beste berichtenplaatser blok',
	'PORTAL_TOP_POSTERS_EXPLAIN'				=> 'Weergeven dit blok op de portaal.',
	'PORTAL_MAX_MOST_POSTER'					=> 'Hoeveel meeste berichtenplaatsers wil je weergeven',
	'PORTAL_MAX_MOST_POSTER_EXPLAIN'			=> '0 betekend geen limiet',

	// left and right collumn width 
	'ACP_PORTAL_COLLUMN_WIDTH_INFO'				=> 'Tabel breedte',
	'ACP_PORTAL_COLLUMN_WIDTH_SETTINGS'			=> 'Links en rechter tabel breedte instellingen',	
	'PORTAL_LEFT_COLLUMN_WIDTH'					=> 'Breedte waarde van de linker tabel',
	'PORTAL_LEFT_COLLUMN_WIDTH_EXPLAIN'			=> 'Verander de breedte van de linker tabel in pixels, de waarde 180 is aanbevolen',
	'PORTAL_RIGHT_COLLUMN_WIDTH'				=> 'Breedte waarde van de rechter tabel',
	'PORTAL_RIGHT_COLLUMN_WIDTH_EXPLAIN'		=> 'Verander de breedte van de rechter tabel in pixels, de waarde 180 is aanbevolen',

	// attachments    
	'ACP_PORTAL_ATTACHMENTS_NUMBER_INFO'				=> 'Bijlagen',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS'			=> 'Bijlagen instellingen',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS_EXPLAIN'	=> 'Hier kan je de bijlagen informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_ATTACHMENTS'                  				=> 'Weergeven bijlagen blok',
	'PORTAL_ATTACHMENTS_EXPLAIN'                  		=> 'Weergeven dit blok op de portaal.',
	'PORTAL_ATTACHMENTS_NUMBER'							=> 'Limiet van het aantal teweergeven bijlagen',
	'PORTAL_ATTACHMENTS_NUMBER_EXPLAIN'					=> '0 betekend geen limiet',

	// wordgraph
	'ACP_PORTAL_WORDGRAPH_INFO'				=> 'Wordgraph',
	'ACP_PORTAL_WORDGRAPH_SETTINGS'			=> 'Wordgraph instellingen',	
	'ACP_PORTAL_WORDGRAPH_SETTINGS_EXPLAIN'	=> 'Hier kan je jouw wordgraph informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_WORDGRAPH'						=> 'Weergeven wordgraph blok',
	'PORTAL_WORDGRAPH_EXPLAIN'				=> 'Weergeven dit blok op de portaal.',
	'PORTAL_WORDGRAPH_MAX_WORDS'			=> 'Hoeveel worden moeten er worden weergeven',
	'PORTAL_WORDGRAPH_MAX_WORDS_EXPLAIN'	=> '0 betekend geen limiet',
	'PORTAL_WORDGRAPH_WORD_COUNTS'			=> 'Inclusief teller waarde om weertegeven',
	'PORTAL_WORDGRAPH_WORD_COUNTS_EXPLAIN'	=> 'Weergeven teller waarde per woord b.v. (25).',
	'PORTAL_WORDGRAPH_RATIO'				=> 'Gebruikt aspect woorden groote',
	'PORTAL_WORDGRAPH_RATIO_EXPLAIN'		=> 'Veranderd het de woorden groote (default=18)',

	// welcome message
	'ACP_PORTAL_WELCOME_INFO'				=> 'Welkom',
	'ACP_PORTAL_WELCOME_SETTINGS'			=> 'Welkom instellingen',
	'ACP_PORTAL_WELCOME_SETTINGS_EXPLAIN'	=> 'Hier kan je het welkoms berichten informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_WELCOME_INTRO'					=> 'Welkom bericht',
	'PORTAL_WELCOME_INTRO_EXPLAIN'			=> 'veranderd de welkomstekst (normale tekst alleen). Max. 600 tekens!',

	// ads
	'ACP_PORTAL_ADS_INFO'				=> 'Advertenties',
	'ACP_PORTAL_ADS_SETTINGS'			=> 'Advertenties instellingen',
	'ACP_PORTAL_ADS_SETTINGS_EXPLAIN'	=> 'Hier kan je de advertentie informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_ADS_SMALL'					=> 'Weergeven van een smal advertentie blok',
	'PORTAL_ADS_SMALL_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',
	'PORTAL_ADS_SMALL_BOX'				=> 'Advertentie code',
	'PORTAL_ADS_SMALL_BOX_EXPLAIN'		=> 'Verander de advertentie code (normale tekst alleen). Max. 600 tekens!',
	'PORTAL_ADS_CENTER'					=> 'Weergeven van het midden advertentie blok',
	'PORTAL_ADS_CENTER_EXPLAIN'			=> 'Weergeven dit blok op de portaal.',
	'PORTAL_ADS_CENTER_BOX'				=> 'Advertentie code',
	'PORTAL_ADS_CENTER_BOX_EXPLAIN'		=> 'Verander de advertentie code (normale tekst alleen). Max. 600 tekens!',

	// minicalendar
	'ACP_PORTAL_MINICALENDAR_INFO'				=> 'Kleine kalender',
	'ACP_PORTAL_MINICALENDAR_SETTINGS'			=> 'Kleine kalender instellingen',
	'ACP_PORTAL_MINICALENDAR_SETTINGS_EXPLAIN'	=> 'Hier kan je de kleine kalender informatie aanpassen, en bepaalde opties ervoor instellen.',
	'PORTAL_MINICALENDAR'						=> 'Weergeven kleine kalender blok',
	'PORTAL_MINICALENDAR_EXPLAIN'				=> 'Weergeven dit blok op de portaal.',
	'PORTAL_MINICALENDAR_TODAY_COLOR'			=> 'Aktieve dag kleur',
	'PORTAL_MINICALENDAR_TODAY_COLOR_EXPLAIN'	=> 'HEX of naam kleuren zijn toegestaan zoals #FFFFFF voor wit, of kleuren namen zoals violet.',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR'		=> 'Dag link kleur',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR_EXPLAIN'=> 'HEX of naam kleuren zijn toegestaan zoals #FFFFFF voor wit, of kleuren namen zoals violet.',

	// change style
	'ACP_PORTAL_BOARD_STYLE_INFO'				=> 'Change board style',
	'ACP_PORTAL_BOARD_STYLE_SETTINGS'			=> 'Change board style settings',
	'ACP_PORTAL_BOARD_STYLE_SETTINGS_EXPLAIN'	=> 'Here you can change your change board style information and certain specific options.',

));

?>