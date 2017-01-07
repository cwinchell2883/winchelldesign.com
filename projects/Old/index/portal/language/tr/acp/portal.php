<?php
/*
*
* phpBB3 Portal ACP [Turkish]
*
* @package phpBB3 Portal  a.k.a canverPortal  ( www.phpbb3portal.com )
* @version $Id: portal.php,v 1.1 2008/02/09 08:18:13 angelside Exp $
* @copyright (c) Canver Software - www.canversoft.net
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
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
	'ACP_PORTAL_INFO_'					=> 'Portal',
	'ACP_PORTAL_INFO_SETTINGS'			=> 'Genel ayarlar',
	'ACP_PORTAL_INFO_SETTINGS_EXPLAIN'	=> 'Thank you for choosing phpBB3 Portal. On this page you can manage the portal of your board. The screens inhere will give you a quick overview of all the various portal settings. The links on the left hand side of this screen allow you to control every aspect of your portal experience.',

	'ACP_PORTAL_SETTINGS'				=> 'Portal ayarlarları',
	'ACP_PORTAL_SETTINGS_EXPLAIN'		=> 'Thank you for choosing phpBB3 Portal. On this page you can manage the portal of your board. The screens inhere will give you a quick overview of all the various portal settings. The links on the left hand side of this screen allow you to control every aspect of your portal experience.',

	// general
	'ACP_PORTAL_GENERAL_INFO'				=> 'Portal yönetimi',
	'ACP_PORTAL_GENERAL_INFO_EXPLAIN'		=> 'Thank you for choosing phpBB3 Portal. On this page you can manage the portal of your board. The screens inhere will give you a quick overview of all the various portal settings. The links on the left hand side of this screen allow you to control every aspect of your portal experience.',
	'ACP_PORTAL_GENERAL_SETTINGS'			=> 'Genel ayarlar',
	'ACP_PORTAL_GENERAL_SETTINGS_EXPLAIN'	=> 'Buradan genel ve belirli ayarları değiştirebilirsiniz.',
	'PORTAL_ADVANCED_STAT'					=> 'İstatistik',
	'PORTAL_ADVANCED_STAT_EXPLAIN'			=> 'Bu bloğu portalda göster.',
	'PORTAL_LEADERS'						=> 'Yöneticiler',
	'PORTAL_LEADERS_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_CLOCK'							=> 'Saat',
	'PORTAL_CLOCK_EXPLAIN'					=> 'Bu bloğu portalda göster.',
	'PORTAL_LINK_US'						=> 'Bizi destekleyin',
	'PORTAL_LINK_US_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_LINKS'							=> 'Bağlantılar',
	'PORTAL_LINKS_EXPLAIN'					=> 'Bu bloğu portalda göster.',
	'PORTAL_WELCOME'						=> 'Hoşgeldiniz',
	'PORTAL_WELCOME_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_MAX_ONLINE_FRIENDS'				=> 'Çevrimiçi arkadaşlar limiti',
	'PORTAL_MAX_ONLINE_FRIENDS_EXPLAIN'		=> 'Çevrim arkadaşlar bloğunda gösterilecek arkadaş sayısı.',

	// random member
	'PORTAL_RANDOM_MEMBER'					=> 'Rastgele üyeler',
	'PORTAL_RANDOM_MEMBER_EXPLAIN'			=> 'Bu bloğu portalda göster.',

	// global announcements
	'ACP_PORTAL_ANNOUNCE_INFO'					=> 'Genel duyurular',
	'ACP_PORTAL_ANNOUNCE_SETTINGS'				=> 'Genel duyuru ayarları',
	'ACP_PORTAL_ANNOUNCE_SETTINGS_EXPLAIN'		=> 'Buradan genel duyuru ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_ANNOUNCEMENTS'						=> 'Genel duyuruları göster',
	'PORTAL_ANNOUNCEMENTS_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_ANNOUNCEMENTS_STYLE'				=> 'Basit görünüm',
	'PORTAL_ANNOUNCEMENTS_STYLE_EXPLAIN'		=> 'Eğer "evet" olarak işaretlerseniz genel duyurular az yer kaplayan basit şekilde gösterilecek.',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS'			=> 'Duyuru sayısı',
	'PORTAL_NUMBER_OF_ANNOUNCEMENTS_EXPLAIN'	=> 'Sınır koymamak için 0 yazınız',
	'PORTAL_ANNOUNCEMENTS_DAY'					=> 'Duyuruların gösterileceği gün sayısı',
	'PORTAL_ANNOUNCEMENTS_DAY_EXPLAIN'			=> 'Sınır koymamak için 0 yazınız',
	'PORTAL_ANNOUNCEMENTS_LENGTH'				=> 'En fazla global duyuru uzunluğu',
	'PORTAL_ANNOUNCEMENTS_LENGTH_EXPLAIN'		=> 'Sınır koymamak için 0 yazınız',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM'			=> 'Genel duyuru forum numarası',
	'PORTAL_GLOBAL_ANNOUNCEMENTS_FORUM_EXPLAIN'	=> 'Genel duyuruların alınacağı forum, tüm forumlar için boş bırakın, birden fazla forum yazmak için virgül kullanın, örn. 1,2,5',

	// news
	'ACP_PORTAL_NEWS_INFO'				=> 'Haberler',
	'ACP_PORTAL_NEWS_SETTINGS'			=> 'Haber ayarları',
	'ACP_PORTAL_NEWS_SETTINGS_EXPLAIN'	=> 'Buradan haber ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_NEWS'						=> 'Haber bloğunu göster',
	'PORTAL_NEWS_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_NEWS_STYLE'					=> 'Basit görünüm',
	'PORTAL_NEWS_STYLE_EXPLAIN'			=> 'Eğer "evet" olarak işaretlerseniz genel haberler az yer kaplayan basit şekilde gösterilecek',
	'PORTAL_SHOW_ALL_NEWS'				=> 'Bu forumdaki tüm başlıkları göster',
	'PORTAL_SHOW_ALL_NEWS_EXPLAIN'		=> 'Sabit ve duyuruları dahil et.',
	'PORTAL_NUMBER_OF_NEWS'				=> 'Portalda gösterilecek haber sayısı',
	'PORTAL_NUMBER_OF_NEWS_EXPLAIN'		=> 'Sınır koymamak için 0 yazınız',
	'PORTAL_NEWS_LENGTH'				=> 'Haber içeriği uzunluğu',
	'PORTAL_NEWS_LENGTH_EXPLAIN'		=> 'Sınır koymamak için 0 yazınız',
	'PORTAL_NEWS_FORUM'					=> 'Haber forumu numarası',
	'PORTAL_NEWS_FORUM_EXPLAIN'			=> 'Haberlerin alınacağı forum, tüm forumlar için boş bırakın, birden fazla forum yazmak için virgül kullanın, örn. 1,2,5',
	'PORTAL_EXCLUDE_FORUM'				=> 'Hariç tutulacak forum numarası',
	'PORTAL_EXCLUDE_FORUM_EXPLAIN'		=> 'Hariç tutulacak forum, tüm forumlar için boş bırakın, birden fazla forum yazmak için virgül kullanın, örn. 1,2,5',

	// recent topics
	'ACP_PORTAL_RECENT_INFO'				=> 'Son konular',	
	'ACP_PORTAL_RECENT_SETTINGS'			=> 'Son konu ayarları',	
	'ACP_PORTAL_RECENT_SETTINGS_EXPLAIN'	=> 'Buradan son konular ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_RECENT'							=> 'Son konular bloğunu göster',
	'PORTAL_RECENT_EXPLAIN'					=> 'Bu bloğu portalda göster.',
	'PORTAL_MAX_TOPIC'						=> 'Limit of recent announcements/hot topics',
	'PORTAL_MAX_TOPIC_EXPLAIN'				=> 'Sınır koymamak için 0 yazınız',
	'PORTAL_RECENT_TITLE_LIMIT'				=> 'Son konular için karakter limiti',
	'PORTAL_RECENT_TITLE_LIMIT_EXPLAIN'		=> 'Sınır koymamak için 0 yazınız',

	// paypal
	'ACP_PORTAL_PAYPAL_INFO'				=> 'Paypal',	
	'ACP_PORTAL_PAYPAL_SETTINGS'			=> 'Paypal ayarları',
	'ACP_PORTAL_PAYPAL_SETTINGS_EXPLAIN'	=> 'Buradan paypal ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_PAY_C_BLOCK'					=> 'Paypal orta bloğu göster',
	'PORTAL_PAY_C_BLOCK_EXPLAIN'			=> 'Bu bloğu portalda göster.',
	'PORTAL_PAY_S_BLOCK'					=> 'Küçük paypal bloğunu göster',
	'PORTAL_PAY_S_BLOCK_EXPLAIN'			=> 'Bu bloğu portalda göster.',
	'PORTAL_PAY_ACC'						=> 'Kullanılacak paypal hesabı',
	'PORTAL_PAY_ACC_EXPLAIN'				=> 'Paypal için kullanacağınız e-posta adresini yazın, örn. xxx@xxx.com',

	// last member
	'ACP_PORTAL_MEMBERS_INFO'				=> 'Son üyeler',
	'ACP_PORTAL_MEMBERS_SETTINGS'			=> 'Son üyeler ayarları',
	'ACP_PORTAL_MEMBERS_SETTINGS_EXPLAIN'	=> 'Buradan son üyeler ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_LATEST_MEMBERS'					=> 'Son üyeler bloğunu göster',
	'PORTAL_LATEST_MEMBERS_EXPLAIN'			=> 'Bu bloğu portalda göster.',
	'PORTAL_MAX_LAST_MEMBER'				=> 'Gösterilecek son üye sayısı',
	'PORTAL_MAX_LAST_MEMBER_EXPLAIN'		=> 'Sınır koymamak için 0 yazınız',

	// bots
	'ACP_PORTAL_BOTS_INFO'						=> 'Bot ziyaretleri',
	'ACP_PORTAL_BOTS_SETTINGS'					=> 'Bot ziyaretleri ayarları',
	'ACP_PORTAL_BOTS_SETTINGS_EXPLAIN'			=> 'Buradan bot ziyaretleri ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_LOAD_LAST_VISITED_BOTS'				=> 'Son ziyaret eden botlar bloğunu göster',
	'PORTAL_LOAD_LAST_VISITED_BOTS_EXPLAIN'		=> 'Bu bloğu portalda göster.',
	'PORTAL_LAST_VISITED_BOTS_NUMBER'			=> 'Gösterilecek bot sayısı',
	'PORTAL_LAST_VISITED_BOTS_NUMBER_EXPLAIN'	=> 'Sınır koymamak için 0 yazınız',

	// polls   
	'ACP_PORTAL_POLLS_INFO'				=> 'Anket',	
	'ACP_PORTAL_POLLS_SETTINGS'			=> 'Anket ayarları',
	'ACP_PORTAL_POLLS_SETTINGS_EXPLAIN'	=> 'Buradan anket ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_POLL_TOPIC'					=> 'Anket bloğunu göster',
	'PORTAL_POLL_TOPIC_EXPLAIN'			=> 'Bu bloğu portalda göster.',
	'PORTAL_POLL_TOPIC_ID'				=> 'Poll topic from forum with id',
	'PORTAL_POLL_TOPIC_ID_EXPLAIN'		=> 'Forum we pull the articles from, leave blank to pull from all forums, separate by comma for multi-forums, eg. 1,2,5',
	'PORTAL_POLL_LIMIT'					=> 'Poll display limit',
	'PORTAL_POLL_LIMIT_EXPLAIN'			=> 'The number of polls you would like to display on the portal page.',
	'PORTAL_POLL_ALLOW_VOTE'			=> 'Allow voting',
	'PORTAL_POLL_ALLOW_VOTE_EXPLAIN'	=> 'Allow users with the required permissions to vote from the portal page.',

	// most poster
	'ACP_PORTAL_MOST_POSTER_INFO'				=> 'Most poster',
	'ACP_PORTAL_MOST_POSTER_SETTINGS'			=> 'Most poster settings',
	'ACP_PORTAL_MOST_POSTER_SETTINGS_EXPLAIN'	=> 'Buradan en çok ileti gönderenler ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_TOP_POSTERS'                  		=> 'Display most/top posters block',
	'PORTAL_TOP_POSTERS_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_MAX_MOST_POSTER'					=> 'How many most posters to display',
	'PORTAL_MAX_MOST_POSTER_EXPLAIN'			=> 'Sınır koymamak için 0 yazınız',

	// left and right collumn width 
	'ACP_PORTAL_COLLUMN_WIDTH_INFO'				=> 'Collumn width',
	'ACP_PORTAL_COLLUMN_WIDTH_SETTINGS'			=> 'Left and right collumn width settings',	
	'PORTAL_LEFT_COLLUMN_WIDTH'					=> 'Width value of the left collumn',
	'PORTAL_LEFT_COLLUMN_WIDTH_EXPLAIN'			=> 'Change the width of left collumn in pixel, recommended value 180',
	'PORTAL_RIGHT_COLLUMN_WIDTH'				=> 'Width value of the right collumn',
	'PORTAL_RIGHT_COLLUMN_WIDTH_EXPLAIN'		=> 'Change the width of right collumn in pixel, recommended value 180',

	// attachments    
	'ACP_PORTAL_ATTACHMENTS_NUMBER_INFO'				=> 'Attachments',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS'			=> 'Attachments settings',
	'ACP_PORTAL_ATTACHMENTS_NUMBER_SETTINGS_EXPLAIN'	=> 'Buradan eklenti ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_ATTACHMENTS'                  				=> 'Display attachments block',
	'PORTAL_ATTACHMENTS_EXPLAIN'                  		=> 'Bu bloğu portalda göster.',
	'PORTAL_ATTACHMENTS_NUMBER'							=> 'Limit of displayed attachments',
	'PORTAL_ATTACHMENTS_NUMBER_EXPLAIN'					=> 'Sınır koymamak için 0 yazınız',

	// wordgraph
	'ACP_PORTAL_WORDGRAPH_INFO'				=> 'Wordgraph',
	'ACP_PORTAL_WORDGRAPH_SETTINGS'			=> 'Wordgraph settings',	
	'ACP_PORTAL_WORDGRAPH_SETTINGS_EXPLAIN'	=> 'Buradan kelime bulutu ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_WORDGRAPH'						=> 'Display wordgraph block',
	'PORTAL_WORDGRAPH_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_WORDGRAPH_MAX_WORDS'			=> 'How many words to display',
	'PORTAL_WORDGRAPH_MAX_WORDS_EXPLAIN'	=> 'Sınır koymamak için 0 yazınız',
	'PORTAL_WORDGRAPH_WORD_COUNTS'			=> 'Include count values to display',
	'PORTAL_WORDGRAPH_WORD_COUNTS_EXPLAIN'	=> 'Display count values per word eg. (25).',
	'PORTAL_WORDGRAPH_RATIO'				=> 'Used aspect ratio word size',
	'PORTAL_WORDGRAPH_RATIO_EXPLAIN'		=> 'Change the aspect ratio (bigger/smaler) word size (default=18)',

	// welcome message
	'ACP_PORTAL_WELCOME_INFO'				=> 'Welcome',
	'ACP_PORTAL_WELCOME_SETTINGS'			=> 'Welcome settings',
	'ACP_PORTAL_WELCOME_SETTINGS_EXPLAIN'	=> 'Buradan karşılama mesajı ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_WELCOME_INTRO'					=> 'Welcome message',
	'PORTAL_WELCOME_INTRO_EXPLAIN'			=> 'Change the welcome (plain text only). Max. 600 characters!',

	/*
	// ads
	'ACP_PORTAL_ADS_INFO'				=> 'Advertisement',
	'ACP_PORTAL_ADS_SETTINGS'			=> 'Advertisement settings',
	'ACP_PORTAL_ADS_SETTINGS_EXPLAIN'	=> 'Buradan reklam ayarları ve seçeneklerini değiştirebilirsiniz..',
	'PORTAL_ADS_SMALL'					=> 'Display small ads block',
	'PORTAL_ADS_SMALL_EXPLAIN'			=> 'Bu bloğu portalda göster.',
	'PORTAL_ADS_SMALL_BOX'				=> 'Ads code',
	'PORTAL_ADS_SMALL_BOX_EXPLAIN'		=> 'Change the ads code (plain text only). Max. 600 characters!',
	'PORTAL_ADS_CENTER'					=> 'Display center ads block',
	'PORTAL_ADS_CENTER_EXPLAIN'			=> 'Bu bloğu portalda göster.',
	'PORTAL_ADS_CENTER_BOX'				=> 'Ads code',
	'PORTAL_ADS_CENTER_BOX_EXPLAIN'		=> 'Change the ads code (plain text only). Max. 600 characters!',
	*/
	
	// minicalendar
	'ACP_PORTAL_MINICALENDAR_INFO'				=> 'Mini takvim',
	'ACP_PORTAL_MINICALENDAR_SETTINGS'			=> 'Mini takvim ayarları',
	'ACP_PORTAL_MINICALENDAR_SETTINGS_EXPLAIN'	=> 'Buradan mini takvim ayarları ve seçeneklerini değiştirebilirsiniz.',
	'PORTAL_MINICALENDAR'						=> 'Display mini calendar block',
	'PORTAL_MINICALENDAR_EXPLAIN'				=> 'Bu bloğu portalda göster.',
	'PORTAL_MINICALENDAR_TODAY_COLOR'			=> 'Active day color',
	'PORTAL_MINICALENDAR_TODAY_COLOR_EXPLAIN'	=> 'HEX or named colors are allowed such as #FFFFFF for white, or color names like vilolet.',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR'		=> 'Gün bağlantı renk kodu',
	'PORTAL_MINICALENDAR_DAY_LINK_COLOR_EXPLAIN'=> 'HEX or named colors are allowed such as #FFFFFF for white, or color names like vilolet.',


	/*
	// change style
	'ACP_PORTAL_BOARD_STYLE_INFO'				=> 'Change board style',
	'ACP_PORTAL_BOARD_STYLE_SETTINGS'			=> 'Change board style settings',
	'ACP_PORTAL_BOARD_STYLE_SETTINGS_EXPLAIN'	=> 'Buradan stil değiştirme ayarları ve seçeneklerini değiştirebilirsiniz.',
	*/

));

?>