<?php
/*
*
* phpBB3 Portal [Greek]
*
* @package phpBB3 Portal  a.k.a canverPortal  ( www.phpbb3portal.com )
* @version $Id: portal.php,v 1.1 2008/02/09 08:18:13 angelside Exp $
* @copyright (c) Canver Software - www.canversoft.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translation by: YOU_NICK http://www.yourwebpage.tld  DATE 
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
	'WELCOME'				=> 'Καλως Ορισατε',

	// news & global announcements
	'LATEST_ANNOUNCEMENTS'	=> 'Τελευταίες γενικές ανακοινώσεις',
	'LATEST_NEWS'			=> 'Τελευταίες ειδήσεις',
	'READ_FULL'				=> 'Όλα διαβασμένα',
	'NO_NEWS'				=> 'Δεν υπάρχουν ειδήσεις',
	'NO_ANNOUNCEMENTS'		=> 'Δεν υπάρχουν γενικές ανακοινώσεις',
	'POSTED_BY'				=> 'Δημοσιεύθηκε από ',
	'COMMENTS'				=> 'Σχόλια',
	'VIEW_COMMENTS'			=> 'Διάβασε τα σχόλια',
	'POST_REPLY'			=> 'Σχολίασε',
	'TOPIC_VIEWS'			=> 'Εμφανίσεις',

	// who is online
	'WIO_TOTAL'			=> 'Συνολικά',
	'WIO_REGISTERED'	=> 'Εγγεγραμμένοι',
	'WIO_HIDDEN'		=> 'Κρυφοί',
	'WIO_GUEST'			=> 'Επισκέπτες',
	//'RECORD_ONLINE_USERS'=> 'View record: <strong>%1$s</strong><br />%2$s',

	// user menu
	'USER_MENU'			=> 'Επιλογές μέλους',
	'UM_LOG_ME_IN'		=> 'αυτόματη σύνδεση',
	'UM_HIDE_ME'		=> 'απόκρυψη κατά τη σύνδεση',
	'UM_MAIN_SUBSCRIBED'=> 'Συνδρομές',
	'UM_BOOKMARKS'		=> 'Σελιδοδείκτες',

	// statistics
	'ST_NEW'		=> 'New',
	'ST_NEW_POSTS'	=> 'New post',
	'ST_NEW_TOPICS'	=> 'New topic',
	'ST_NEW_ANNS'	=> 'New announcment',
	'ST_NEW_STICKYS'=> 'New sticky',
	'ST_TOP'		=> 'Συνολικά',
	'ST_TOP_ANNS'	=> 'Συνολικές ανακοινώσεις',
	'ST_TOP_STICKYS'=> 'Συνολικές σημειώσεις',
	'ST_TOT_ATTACH'	=> 'Συνολικά συνημμένα',

	// search
	'SH'		=> 'Αναζήτηση',
	'SH_SITE'	=> 'forums',
	'SH_POSTS'	=> 'δημοσιεύσεις',
	'SH_AUTHOR'	=> 'συγγραφέας',
	'SH_ENGINE'	=> 'μηχανές αναζήτησης',
	'SH_ADV'	=> 'αναζήτηση με κριτήρια',
	
	// recent
	'RECENT_TOPIC'		=> 'Πρόσφατα θέματα',
	'RECENT_ANN'		=> 'Πρόσφατες ανακοινώσεις',
	'RECENT_HOT_TOPIC'	=> 'Πρόσφατα δημοφιλή θέματα',

	// random member
	'RND_MEMBER'	=> 'Τυχαίο μέλος',
	'RND_JOIN'		=> 'Εγγραφή',
	'RND_POSTS'		=> 'Θέματα',
	'RND_OCC'		=> 'Ασχολία',
	'RND_FROM'		=> 'Τοποθεσία',
	'RND_WWW'		=> 'Web page',

	// top poster
	'TOP_POSTER'	=> 'Τα πιο ενεργά μέλη',

	// links
	'LINKS'	=> 'Σύνδεσμοι',

	// latest members
	'LATEST_MEMBERS'	=> 'Νεότερα μέλη',

	// make donation
	'DONATION' 		=> 'Κάνε δωρεά',
	'DONATION_TEXT'	=> 'is a formation suplying services with no intention of any revenue. Anyone who wants to support this formation can do it by donating so that the cost of server, the domain and etc. could be paid of.',
	'PAY_MSG'		=> 'After selecting the amount which you want to donate from the menu, you can go on by clicking on the picture of PayPal.',
	'PAY_ITEM'		=> 'Κάντε δωρεά', // paypal item

	// main menu
	'M_MENU' 	=> 'Μενου',
	'M_CONTENT'	=> 'Περιεχόμενο',
	'M_ACP'		=> 'Πίνακα Ελέγχου Διαχειριστή',
	'M_HELP'	=> 'Βοήθεια',
	'M_BBCODE'	=> 'BBCode FAQ',
	'M_TERMS'	=> 'Όροι χρήσης',
	'M_PRV'		=> 'Προσωπικό Απόρρητο',
	'M_SEARCH'	=> 'Αναζήτηση',

	// link us
	'LINK_US'		=> 'Συνδέσου μαζί μας',
	'LINK_US_TXT'	=> 'Παρακαλώ, μη δυστάσετε να προσθέσετε τη διευθυνσή μας <strong>%s</strong> στη σελίδα σας. Χρησιμοποιήστε το παρακάτω HTML κώδικα:',

	// friends
	'FRIENDS'				=> 'Φίλοι',
	'FRIENDS_OFFLINE'		=> 'Αποσυνδεμένοι',
	'FRIENDS_ONLINE'		=> 'Συνδεδεμένοι',
	'NO_FRIENDS'			=> 'Δεν έχουν οριστεί ακόμα φίλοι',
	'NO_FRIENDS_OFFLINE'	=> 'Κανένας φίλος αποσυνδεμένος',
	'NO_FRIENDS_ONLINE'		=> 'Κανένας φίλος συνδεδεμένος',
	
	// last bots
	'LAST_VISITED_BOTS'		=> '%s bots που μας επισκέπτηκαν',
	
	// wordgraph
	'WORDGRAPH'				=> 'Λεξογράφημα',

	// change style
	'BOARD_STYLE'			=> 'Στυλ Πίνακα',
	'STYLE_CHOOSE'			=> 'Επιλέξτε στυλ',
		
	// team
	'NO_ADMINISTRATORS_P'	=> 'Κανένας διαχειριστής',
	'NO_MODERATORS_P'		=> 'Κανένας συντονιστής',

	// average Statistics
	'TOPICS_PER_DAY_OTHER'	=> 'Θέματα ανά ημέρα: <strong>%d</strong>',
	'TOPICS_PER_DAY_ZERO'	=> 'Θέματα ανά ημέρα: <strong>0</strong>',
	'POSTS_PER_DAY_OTHER'	=> 'Μηνύματα ανά ημέρα: <strong>%d</strong>',
	'POSTS_PER_DAY_ZERO'	=> 'Μηνύματα ανά ημέρα: <strong>0</strong>',
	'USERS_PER_DAY_OTHER'	=> 'Μέλη ανά ημέρα: <strong>%d</strong>',
	'USERS_PER_DAY_ZERO'	=> 'Μέλη ανά ημέρα: <strong>0</strong>',
	'TOPICS_PER_USER_OTHER'	=> 'Θέματα ανά μέλος: <strong>%d</strong>',
	'TOPICS_PER_USER_ZERO'	=> 'Θέματα ανά μέλος: <strong>0</strong>',
	'POSTS_PER_USER_OTHER'	=> 'Μηνύματα ανά μέλος: <strong>%d</strong>',
	'POSTS_PER_USER_ZERO'	=> 'Μηνύματα ανά μέλος: <strong>0</strong>',
	'POSTS_PER_TOPIC_OTHER'	=> 'Μηνύματα ανά θέμα: <strong>%d</strong>',
	'POSTS_PER_TOPIC_ZERO'	=> 'Μηνύματα ανά θέμα: <strong>0</strong>',

	// Poll
	'LATEST_POLLS'			=> 'Latest Polls',
	'NO_OPTIONS'			=> 'This poll has no available options.',
	'NO_POLL'				=> 'No polls available',
	'RETURN_PORTAL'			=> '%sReturn to the portal%s',

	// other
	'POLL'		=> 'Ψηφοφορία',
	'CLOCK'		=> 'Ρολόι',
	'SPONSOR'	=> 'Δωροθέτες',
	
	/**
	* DO NOT REMOVE or CHANGE
	*/
	'PORTAL_COPY'	=> 'Portal by <a href="http://www.phpbb3portal.com" title="phpBB3 Portal" target="_blank">phpBB3 Portal</a>',
	)
);

// mini calendar
$lang = array_merge($lang, array(
	'Mini_Cal_calendar'		=> 'Ημερολόγιο',
	'Mini_Cal_add_event'	=> 'Πρόσθεση συμβάντος',
	'Mini_Cal_events'		=> 'Ερχόμενα συμβαντα',
	'Mini_Cal_no_events'	=> 'Τίποτα',
	'Mini_cal_this_event'	=> 'Συμβάντα διακοπών',
	'View_next_month'		=> 'επόμενος μήνας',
	'View_previous_month'	=> 'προηγούμενος μήνας',

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
			'1'	=> 'Δε',
			'2'	=> 'Τρ',
			'3'	=> 'Τε',
			'4'	=> 'Πε',
			'5'	=> 'Πα',
			'6'	=> 'Σα',
			'7'	=> 'Κυ',
		),

		'month'	=> array(
			'1'	=> 'Ιαν',
			'2'	=> 'Φεβ',
			'3'	=> 'Μαρ',
			'4'	=> 'Απρ',
			'5'	=> 'Μαι',
			'6'	=> 'Ιουν',
			'7'	=> 'Ιουλ',
			'8'	=> 'Αυγ',
			'9'	=> 'Σεπ',
			'10'=> 'Οκτ',
			'11'=> 'Νοε',
			'12'=> 'Δεκ',
		),

		'long_month'=> array(
			'1'	=> 'Ιανουάριος',
			'2'	=> 'Φεβρουάριος',
			'3'	=> 'Μάρτιος',
			'4'	=> 'Απρίλιος',
			'5'	=> 'Μάιος',
			'6'	=> 'Ιούνιος',
			'7'	=> 'Ιούλιος',
			'8'	=> 'Άυγουστος',
			'9'	=> 'Σεπτέμβριος',
			'10'=> 'Οκτώβριος',
			'11'=> 'Νοέμβριος',
			'12'=> 'Δεκέμβριος',
		),
	),
));

?>