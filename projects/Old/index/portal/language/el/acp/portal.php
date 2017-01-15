<?php
/**
*
* phpBB3 Portal ACP [Greek]
*
* @package language
* @version $Id: portal.php,v 1.1 2008/02/09 08:18:13 angelside Exp $
* @copyright (c) 2007 phpBB Group
* @author 2007-12-19 - takistmr
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
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

$lang = array_merge($lang, array(
	'ACP_PORTAL_INFO'			=> 'Portal',
	'ACP_PORTAL_INFO_SETTINGS'	=> 'Γενικές Ρυθμίσεις',
	'ACP_PORTAL_INFO_SETTINGS_EXPLAIN'	=> 'Σας ευχαριστούμε που επιλέξατε το phpBB3 Portal. Σε αυτή τη σελίδα μπορείτε να διαχειριστείτε το portal του πίνακα συζητήσεών σας. Στην οθόνη θα σας δίνεται μία γρήγορη επισκόπηση όλων των ρυθμίσεων του portal. Οι σύνδεσμοι στα αριστερά σας επιτρέπουν να ελέγχετε κάθε όψη του portal.',
	'ACP_PORTAL_SETTINGS'	=> 'Ρυθμίσεις του Portal',
	'ACP_PORTAL_SETTINGS_EXPLAIN'	=> 'Σας ευχαριστούμε που επιλέξατε το phpBB3 Portal. Σε αυτή τη σελίδα μπορείτε να διαχειριστείτε το portal του πίνακα συζητήσεών σας. Στην οθόνη θα σας δίνεται μία γρήγορη επισκόπηση όλων των ρυθμίσεων του portal. Οι σύνδεσμοι στα αριστερά σας επιτρέπουν να ελέγχετε κάθε όψη του portal.',
	'ACP_PORTAL_GENERAL_INFO'	=> 'Διαχείριση του Portal',
	'ACP_PORTAL_GENERAL_INFO_EXPLAIN'	=> 'Σας ευχαριστούμε που επιλέξατε το phpBB3 Portal. Σε αυτή τη σελίδα μπορείτε να διαχειριστείτε το portal του πίνακα συζητήσεών σας. Στην οθόνη θα σας δίνεται μία γρήγορη επισκόπηση όλων των ρυθμίσεων του portal. Οι σύνδεσμοι στα αριστερά σας επιτρέπουν να ελέγχετε κάθε όψη του portal.',
	'ACP_PORTAL_GENERAL_SETTINGS'	=> 'Γενικές Ρυθμίσεις',
	'ACP_PORTAL_GENERAL_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείτε να αλλάξετε τις γενικές και ειδικές ρυθμίσεις.',
	'PORTAL_ADVANCED_STAT'	=> 'Block αναλυτικών στατιστικών',
	'PORTAL_ADVANCED_STAT_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_LEADERS'	=> 'Block Ηγέτες/Ομάδες',
	'PORTAL_LEADERS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_CLOCK'	=> 'Block ρολογιού',
	'PORTAL_CLOCK_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_LINK_US'	=> 'Block συνδέσου μαζί μας.',
	'PORTAL_LINK_US_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_LINKS'	=> 'Block συνέδεσέ μας.',
	'PORTAL_LINKS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_WELCOME'	=> 'Block κεντρικού καλώς ορίσματος.',
	'PORTAL_WELCOME_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_MAX_ONLINE_FRIENDS'	=> 'Όριο συνδεδεμένων στο Portal φίλων.',
	'PORTAL_MAX_ONLINE_FRIENDS_EXPLAIN'	=> 'Όρισε τον αριθμό των συνδεδεμένων στο Portal φίλων που θα εμφανίζονται στο block.',
	'PORTAL_RANDOM_MEMBER'	=> 'Block τυχαίου μέλους.',
	'PORTAL_RANDOM_MEMBER_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'ACP_PORTAL_ANNOUNCE_INFO'	=> 'Γενικές ανακοινώσεις',
	'ACP_PORTAL_ANNOUNCE_SETTINGS'	=> 'Ρυθμίσεις γενικών ανακοινώσεων',
	'ACP_PORTAL_ANNOUNCE_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ρυθμίσεις τις γενικές και ειδικές ανακοινώσεις.',
	'PORTAL_ANNOUNCEMENTS'	=> 'Εμφάνισε τις γενικές ανακοινώσεις.',
	'PORTAL_ANNOUNCEMENTS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_ANNOUNCEMENTS_STYLE'	=> 'Ενιαίο block γενικών ανακοινώσεων',
	'PORTAL_ANNOUNCEMENTS_STYLE_EXPLAIN'	=> 'If select yes use compact style for global announcements, no is large style',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS'	=> 'Αριθμός ανακοινώσεων στο Portal',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS_EXPLAIN'	=> '0 σημαίνει άπειρα.',
	'PORTAL_ANNOUNCEMENTS_DAY'	=> 'Αριθμός ημερών που θα εμφανίζεται η ανακοίνωση',
	'PORTAL_ANNOUNCEMENTS_DAY_EXPLAIN'	=> '0 σημαίνει επ άπερον.',
	'PORTAL_ANNOUNCEMENTS_LENGTH'	=> 'Μέγιστο μήκος των γενικών ανακοινώσεων',
	'PORTAL_ANNOUNCEMENTS_LENGTH_EXPLAIN'	=> '0 σημαίνει άπειρο.',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM'	=> 'forum ID των γενικών ανακοινώσεων',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM_EXPLAIN'	=> 'Forum που αντλούμε τις γενικές ανακοινώσεις, άφησε κενό για να αντλήσουμε από όλα, για άντληση από πολλά χρησιμοποίησε το κόμμα για διαχωρισμό μεταξύ τους, πχ. 1,2,5',
	'ACP_PORTAL_NEWS_INFO'	=> 'Ειδήσεις',
	'ACP_PORTAL_NEWS_SETTINGS'	=> 'Ρυθμίσεις ειδήσεων',
	'ACP_PORTAL_NEWS_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμήσεις για το block των ειδήσεων.',
	'PORTAL_NEWS'	=> 'Εμφάνησε το block των ειδήσεων',
	'PORTAL_NEWS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_NEWS_STYLE'	=> 'Ενιαίου στυλ block ειδήσεων',
	'PORTAL_NEWS_STYLE_EXPLAIN'	=> 'Αν επιλεγεί το ΝΑΙ θα εφαρμοστεί το ενιαίου στυλ block ειδήσεων, αν επιλεγεί το ΟΧΙ τότε το μεγάλο.',
	'PORTAL_SHOW_ALL_NEWS'	=> 'Εμφάνιση όλων των άρθρων του forum',
	'PORTAL_SHOW_ALL_NEWS_EXPLAIN'	=> 'Συμπεριλαμβανομένων των σημειώσεων και των ανακοινώσεων.',
	'PORTAL_NUMBER_OF_NEWS'	=> 'Αριθμός των άρθρων ειδήσεων στο Portal',
	'PORTAL_NUMBER_OF_NEWS_EXPLAIN'	=> '0 σημαίνει άπειρα',
	'PORTAL_NEWS_LENGTH'	=> 'Μέγιστο μήκος των άρθρων ειδήσεων',
	'PORTAL_NEWS_LENGTH_EXPLAIN'	=> '0 σημαίνει άπειρα.',
	'PORTAL_NEWS_FORUM'	=> 'Forum ID των ειδήσεων',
	'PORTAL_NEWS_FORUM_EXPLAIN'	=> 'Forum που αντλούμε τα άρθρα των ειδήσεων, άφησε κενό να να αντληθούν από όλα, χρησιμοποίησε το κόμμα μεταξύ πολλαπλών Forums, πχ. 1,2,5',
	'PORTAL_EXCLUDE_FORUM'	=> 'Εξαιρέσιμα Forum ID',
	'PORTAL_EXCLUDE_FORUM_EXPLAIN'	=> 'Forum που δεν αντλούμε τα άρθρα των ειδήσεων, άφησε κενό να να μην αντληθούν από πουθενά, χρησιμοποίησε το κόμμα μεταξύ πολλαπλών Forums, πχ. 1,2,5',
	'ACP_PORTAL_RECENT_INFO'	=> 'Πρόσφατα θέματα',
	'ACP_PORTAL_RECENT_SETTINGS'	=> 'Ρυθμίσεις πρόσφατων θεμάτων',
	'ACP_PORTAL_RECENT_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμήσεις για το block των πρόσφατων θεμάτων.',
	'PORTAL_RECENT'	=> 'Εμφάνισε το block των πρόσφατων θεμάτων',
	'PORTAL_RECENT_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_MAX_TOPIC'	=> 'Όριο των πρόσφατων ανακοινώσεων/ενεργών θεμάτων',
	'PORTAL_MAX_TOPIC_EXPLAIN'	=> '0 σημαίνει άπειρα.',
	'PORTAL_RECENT_TITLE_LIMIT'	=> 'Πλήθος χαρακτήρων που θα εμφανίζονται για κάθε τίτλο θέματος',
	'PORTAL_RECENT_TITLE_LIMIT_EXPLAIN'	=> '0 σημαίνει άπειροι.',
	'ACP_PORTAL_PAYPAL_INFO'	=> 'Paypal',
	'ACP_PORTAL_PAYPAL_SETTINGS'	=> 'Ρυθμίσεις Paypal',
	'ACP_PORTAL_PAYPAL_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμίσεις για το paypal.',
	'PORTAL_PAY_C_BLOCK'	=> 'Εμφάνισε το κεντρικό block του paypal',
	'PORTAL_PAY_C_BLOCK_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_PAY_S_BLOCK'	=> 'Εμφάνισε το μικρό block του paypal',
	'PORTAL_PAY_S_BLOCK_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_PAY_ACC'	=> 'Λογαριασμός paypal',
	'PORTAL_PAY_ACC_EXPLAIN'	=> 'Γράψτε την διεύθυνση e-mail του Paypal πχ. xxx@xxx.com',
	'ACP_PORTAL_MEMBERS_INFO'	=> 'Νεότερα μέλη',
	'ACP_PORTAL_MEMBERS_SETTINGS'	=> 'Ρυθμίσεις νεότερων μελών',
	'ACP_PORTAL_MEMBERS_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείτε να ρυθμίσετε το block των νεότερων μελών.',
	'PORTAL_LATEST_MEMBERS'	=> 'Εμφάνισε το block των νεότερων μελών.',
	'PORTAL_LATEST_MEMBERS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_MAX_LAST_MEMBER'	=> 'Πλήθος των εμφανιζόμενων νέων μελών στο block.',
	'PORTAL_MAX_LAST_MEMBER_EXPLAIN'	=> '0 σημαίνει άπειροι.',
	'ACP_PORTAL_BOTS_INFO'	=> 'Βots που επισκέπτηκαν το Forum',
	'ACP_PORTAL_BOTS_SETTINGS'	=> 'Ρυθμίσεις των Βots που επισκέπτηκαν το Forum',
	'ACP_PORTAL_BOTS_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμίσεις του block των Βots που επισκέπτηκαν το Forum',
	'PORTAL_LOAD_LAST_VISITED_BOTS'	=> 'Εμφάνιση του block των Βots που επισκέπτηκαν το Forum',
	'PORTAL_LOAD_LAST_VISITED_BOTS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_LAST_VISITED_BOTS_NUMBER'	=> 'Πόσα bots να εμφανίζονται;',
	'PORTAL_LAST_VISITED_BOTS_NUMBER_EXPLAIN'	=> '0 σημαίνει άπειρα.',
	'ACP_PORTAL_POLLS_INFO'	=> 'Ψηφοφορίες',
	'ACP_PORTAL_POLLS_SETTINGS'	=> 'Ρυθμίσεις ψηφοφοριών',
	'ACP_PORTAL_POLLS_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμίσεις για τις ψηφοφορίες.',
	'PORTAL_POLL_TOPIC'	=> 'Εμφάνισε το block των ψηφοφοριών',
	'PORTAL_POLL_TOPIC_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_POLL_TOPIC_ID'	=> 'Ψηφοφορία από το forum με id',
	'PORTAL_POLL_TOPIC_ID_EXPLAIN'	=> 'Forum we pull the articles from, leave blank to pull from all forums, separate by comma for multi-forums, eg. 1,2,5',
	'PORTAL_POLL_LIMIT'					=> 'Poll display limit',
	'PORTAL_POLL_LIMIT_EXPLAIN'			=> 'The number of polls you would like to display on the portal page.',
	'PORTAL_POLL_ALLOW_VOTE'			=> 'Allow voting',
	'PORTAL_POLL_ALLOW_VOTE_EXPLAIN'	=> 'Allow users with the required permissions to vote from the portal page.',
	'ACP_PORTAL_MOST_POSTER_INFO'	=> 'Τα πιο ενεργά μέλη',
	'ACP_PORTAL_MOST_POSTER_SETTINGS'	=> 'Ρυθμίσεις των ενεργών μελών',
	'ACP_PORTAL_MOST_POSTER_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμίσεις για τα πιο ενεργά μέλη',
	'PORTAL_TOP_POSTERS'	=> 'Εμφάνισε το block των πιο ενεργών μελών',
	'PORTAL_TOP_POSTERS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_MAX_MOST_POSTER'	=> 'Πόσα μέλη θα εμφανίζονται',
	'PORTAL_MAX_MOST_POSTER_EXPLAIN'	=> '0 σημαίνει άπειρα.',
	'ACP_PORTAL_COLLUMN_WIDTH_INFO'	=> 'Πλάτος στήλης',
	'ACP_PORTAL_COLLUMN_WIDTH_SETTINGS'	=> 'Ρυθμίσεις της αριστερής και δεξιάς στήλης',
	'PORTAL_LEFT_COLLUMN_WIDTH'	=> 'Πλάτος της αριστερής στήλης',
	'PORTAL_LEFT_COLLUMN_WIDTH_EXPLAIN'	=> 'Άλλαξε το πλάτος της αριστερής στήλης (σε pixel), προτεινόμενη τιμή 180',
	'PORTAL_RIGHT_COLLUMN_WIDTH'	=> 'Πλάτος της δεξιάς στήλης',
	'PORTAL_RIGHT_COLLUMN_WIDTH_EXPLAIN'	=> 'Άλλαξε το πλάτος της δεξιάς στήλης (σε pixel), προτεινόμενη τιμή 180',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_INFO'	=> 'Συνημμένα',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS'	=> 'Ρυθμίσεις συνημμένων.',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμίσεις για το block των συνημμένων. ',
	'PORTAL_ATTACHMENTS'	=> 'Εμφάνισε το block των συνημμένων.',
	'PORTAL_ATTACHMENTS_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_ATTACHMENTS_NUMBER'	=> 'Όριο εμφανιζόμενων συνημμένων.',
	'PORTAL_ATTACHMENTS_NUMBER_EXPLAIN'	=> '0 σημαίνει άπειρα.',
	'ACP_PORTAL_WORDGRAPH_INFO'	=> 'Λεξογράφημα',
	'ACP_PORTAL_WORDGRAPH_SETTINGS'	=> 'Ρυθμίσεις λεξογραφήματος',
	'ACP_PORTAL_WORDGRAPH_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμίσεις του block wordgraph.',
	'PORTAL_WORDGRAPH'	=> 'Eμφάνισε το block λεξογράφημα.',
	'PORTAL_WORDGRAPH_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο portal..',
	'PORTAL_WORDGRAPH_MAX_WORDS'	=> 'Πόσες λέξεις να εμφανίζονται;',
	'PORTAL_WORDGRAPH_MAX_WORDS_EXPLAIN'	=> '0 σημαίνει άπειρες.',
	'PORTAL_WORDGRAPH_WORD_COUNTS'	=> 'Περιλαμβανόμενων τιμών μέτρησης λέξεων για εμφάνιση',
	'PORTAL_WORDGRAPH_WORD_COUNTS_EXPLAIN'	=> 'Εμφάνιση τιμών μέτρησης λέξεων πχ. (25).',
	'PORTAL_WORDGRAPH_RATIO'	=> 'Χρησιμοποιούμενος λόγος μεγέθους λέξης',
	'PORTAL_WORDGRAPH_RATIO_EXPLAIN'	=> 'Αλλαγή του λόγου (μεγαλύτερο/μικρότερο) μεγέθους λέξης (αυτόματο=18)',
	'ACP_PORTAL_WELCOME_INFO'	=> 'Καλώς Ορίσατε',
	'ACP_PORTAL_WELCOME_SETTINGS'	=> 'Ρυθμίσεις καλωσορίσματος',
	'ACP_PORTAL_WELCOME_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείς να ορίσεις τις ρυθμίσεις του μηνύματος του καλωσορίσματος.',
	'PORTAL_WELCOME_INTRO'	=> 'Μήνυμα καλωσορίσματος',
	'PORTAL_WELCOME_INTRO_EXPLAIN'	=> 'Αλλαγή του μηνύματος (απλό κείμενο). Μέγιστος αριθμός 600 χαρακτήρες!',
	'ACP_PORTAL_MINICALENDAR_INFO'	=> 'Μικρό ημερολόγιο',
	'ACP_PORTAL_MINICALENDAR_SETTINGS'	=> 'Ρυθμίσεις μικρού ημερολογίου',
	'ACP_PORTAL_MINICALENDAR_SETTINGS_EXPLAIN'	=> 'Εδώ μπορείτε να ρυθμίσετε το block του μικρού ημερολογίου',
	'PORTAL_MINICALENDAR'	=> 'Εμφάνισε το block του μικρού ημερολογίου',
	'PORTAL_MINICALENDAR_EXPLAIN'	=> 'Εμφάνισε αυτό το block στο Portal.',
	'PORTAL_MINICALENDAR_TODAY_COLOR'	=> 'Χρώμα σύνδεσου ημέρας.',
	'PORTAL_MINICALENDAR_TODAY_COLOR_EXPLAIN'	=> 'HEX ή ονόματα χρωμάτων (στα Αγγλικά) επιτρέπονται, όπως #FFFFFF για το λευκό, ή ονόμα χρώματος όπως το violet.',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR'	=> 'Χρώμα σύνδεσμου ημέρας',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR_EXPLAIN'	=> 'HEX ή ονόματα χρωμάτων (στα Αγγλικά) επιτρέπονται, όπως #FFFFFF για το λευκό, ή ονόμα χρώματος όπως το violet.',
));

?>