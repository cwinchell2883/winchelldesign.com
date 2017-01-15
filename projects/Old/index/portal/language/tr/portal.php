<?php
/*
*
* phpBB3 Portal [Turkish]
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
	'WELCOME'				=> 'Hoşgeldiniz',

	// news & global announcements
	'LATEST_ANNOUNCEMENTS'	=> 'Son genel duyurular',
	'LATEST_NEWS'			=> 'Son haberler',
	'READ_FULL'				=> 'Tümünü oku',
	'NO_NEWS'				=> 'Haber yok',
	'NO_ANNOUNCEMENTS'		=> 'Gemel duyuru yok',
	'POSTED_BY'				=> 'Yazan',
	'COMMENTS'				=> 'Yorumlar',
	'VIEW_COMMENTS'			=> 'Yorumlara bak',
	'POST_REPLY'			=> 'Yorum yaz',
	'TOPIC_VIEWS'			=> 'Bakılma',

	// who is online
	'WIO_TOTAL'			=> 'Toplam',
	'WIO_REGISTERED'	=> 'Kayıtlı',
	'WIO_HIDDEN'		=> 'Gizli',
	'WIO_GUEST'			=> 'Misafir',
	//'RECORD_ONLINE_USERS'=> 'View record: <strong>%1$s</strong><br />%2$s',

	// user menu
	'USER_MENU'			=> 'Kullanıcı menüsü',
	'UM_LOG_ME_IN'		=> 'beni hatırla',
	'UM_HIDE_ME'		=> 'beni gizle',
	'UM_MAIN_SUBSCRIBED'=> 'Abonelikler',
	'UM_BOOKMARKS'		=> 'Yer imleri',

	// statistics
	'ST_NEW'		=> 'Yeni',
	'ST_NEW_POSTS'	=> 'Yeni ileti',
	'ST_NEW_TOPICS'	=> 'Yeni konu',
	'ST_NEW_ANNS'	=> 'Yeni duyuru',
	'ST_NEW_STICKYS'=> 'Yeni sabit',
	'ST_TOP'		=> 'Toplam',
	'ST_TOP_ANNS'	=> 'Toplam duyuru',
	'ST_TOP_STICKYS'=> 'Toplam sabit',
	'ST_TOT_ATTACH'	=> 'Toplam eklenti',

	// search
	'SH'		=> 'ara',
	'SH_SITE'	=> 'forumlar',
	'SH_POSTS'	=> 'iletiler',
	'SH_AUTHOR'	=> 'yazar',
	'SH_ENGINE'	=> 'arama motorları',
	'SH_ADV'	=> 'gelişmiş arama',
	
	// recent
	'RECENT_TOPIC'		=> 'Son konular',
	'RECENT_ANN'		=> 'Son duyurular',
	'RECENT_HOT_TOPIC'	=> 'Son popüler konular',

	// random member
	'RND_MEMBER'	=> 'Rastgele üye',
	'RND_JOIN'		=> 'Kayıt',
	'RND_POSTS'		=> 'İletiler',
	'RND_OCC'		=> 'Meslek',
	'RND_FROM'		=> 'Konum',
	'RND_WWW'		=> 'Web sayfası',

	// top poster
	'TOP_POSTER'	=> 'En çok yazanlar',

	// links
	'LINKS'	=> 'Bağlantılar',

	// latest members
	'LATEST_MEMBERS'	=> 'Son kayıt olanlar',

	// make donation
	'DONATION' 		=> 'Bağış yapın',
	'DONATION_TEXT'	=> 'karşılıksız hizmet sunan bir oluşumdur. Bu oluşuma destek olmak isteyen kullanıcılarımız bağış yaparak; sunucu masrafı, alan adı vb. için gerekli ödeneğin sağlanmasına maddi açıdan destek olabilirler.',
	'PAY_MSG'		=> 'Menüden yapmak istediğiniz bağış miktarını seçtikten sonra, PayPal resmine tıklayarak işleme devam edebilirsiniz. Bu sistem ile bağış yapabilmek için paypal hesabınız ve hesabınızda bağış kadar para veya geçerli bir kredi kartınız olmalıdır.',
	'PAY_ITEM'		=> 'Bağış', // paypal item

	// main menu
	'M_MENU' 	=> 'Menü',
	'M_CONTENT'	=> 'İçerik',
	'M_ACP'		=> 'Yönetim paneli',
	'M_HELP'	=> 'Yardım',
	'M_BBCODE'	=> 'BBCode SSS',
	'M_TERMS'	=> 'Kullanım şartları',
	'M_PRV'		=> 'Gizlilik ilkeleri',
	'M_SEARCH'	=> 'Arama',

	// link us
	'LINK_US'		=> 'Bizi destekleyin',
	'LINK_US_TXT'	=> '<strong>%s</strong> sitemize destek vermek için aşağıdaki kodları kullanabilirsiniz:',

	// friends
	'FRIENDS'				=> 'Arkadaşlar',
	'FRIENDS_OFFLINE'		=> 'Çevrimdışı',
	'FRIENDS_ONLINE'		=> 'Çevrimiçi',
	'NO_FRIENDS'			=> 'Tanımlı arkadaşınız yok',
	'NO_FRIENDS_OFFLINE'	=> 'Çevrimdışı arkadaşınız yok',
	'NO_FRIENDS_ONLINE'		=> 'Çevrimiçi arkadaşınız yok',
	
	// last bots
	'LAST_VISITED_BOTS'		=> 'Son %s bot ziyareti',
	
	// wordgraph
	'WORDGRAPH'				=> 'Kelime bulutu',

	// change style
	'BOARD_STYLE'			=> 'Pano stili',
	'STYLE_CHOOSE'			=> 'Bir stil seçiniz',
		
	// team
	'NO_ADMINISTRATORS_P'	=> 'Yönetici yok',
	'NO_MODERATORS_P'		=> 'Yetkili yok',

	// average Statistics
	'TOPICS_PER_DAY_OTHER'	=> 'Gün başına konu: <strong>%d</strong>',
	'TOPICS_PER_DAY_ZERO'	=> 'Gün başına konu: <strong>0</strong>',
	'POSTS_PER_DAY_OTHER'	=> 'Gün başına ileti: <strong>%d</strong>',
	'POSTS_PER_DAY_ZERO'	=> 'Gün başına ileti: <strong>0</strong>',
	'USERS_PER_DAY_OTHER'	=> 'Gün başına üye: <strong>%d</strong>',
	'USERS_PER_DAY_ZERO'	=> 'Gün başına üye: <strong>0</strong>',
	'TOPICS_PER_USER_OTHER'	=> 'Kullanıcı başına konu: <strong>%d</strong>',
	'TOPICS_PER_USER_ZERO'	=> 'Kullanıcı başına konu: <strong>0</strong>',
	'POSTS_PER_USER_OTHER'	=> 'Kullanıcı başına ileti: <strong>%d</strong>',
	'POSTS_PER_USER_ZERO'	=> 'Kullanıcı başına ileti: <strong>0</strong>',
	'POSTS_PER_TOPIC_OTHER'	=> 'Konu başına ileti: <strong>%d</strong>',
	'POSTS_PER_TOPIC_ZERO'	=> 'Konu başına ileti: <strong>0</strong>',

	// Poll
	'LATEST_POLLS'			=> 'Son anketler',
	'NO_OPTIONS'			=> 'Bu anket için seçenek yok.',
	'NO_POLL'				=> 'Anket yok',
	'RETURN_PORTAL'			=> '%sPortala dön%s',

	// other
	'POLL'		=> 'Anket',
	'CLOCK'		=> 'Saat',
	'SPONSOR'	=> 'Sponsor',
	
	/**
	* DO NOT REMOVE or CHANGE
	*/
	'PORTAL_COPY'	=> 'Portal geliştirme <a href="http://www.phpbb3portal.com" title="phpBB3 Portal" target="_blank">phpBB3 Portal</a> &copy; <a href="http://www.phpbbturkiye.net" title="phpBB Türkiye" target="_blank">phpBB</a> Türkiye',
	)
);

// mini calendar
$lang = array_merge($lang, array(
	'Mini_Cal_calendar'		=> 'Takvim',
	'Mini_Cal_add_event'	=> 'Olay ekle',
	'Mini_Cal_events'		=> 'Yaklaşan olaylar',
	'Mini_Cal_no_events'	=> 'Yok',
	'Mini_cal_this_event'	=> 'Bu ayın tatilleri',
	'View_next_month'		=> 'sonraki ay',
	'View_previous_month'	=> 'önceki ay',

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
			'1'	=> 'Pz',
			'2'	=> 'Pa',
			'3'	=> 'Sa',
			'4'	=> 'Ça',
			'5'	=> 'Pe',
			'6'	=> 'Cu',
			'7'	=> 'Ct',
		),

		'month'	=> array(
			'1'	=> 'Oca',
			'2'	=> 'Şub',
			'3'	=> 'Mar',
			'4'	=> 'Nis',
			'5'	=> 'May',
			'6'	=> 'Haz',
			'7'	=> 'Tem',
			'8'	=> 'Auğ',
			'9'	=> 'Eyl',
			'10'=> 'Eki',
			'11'=> 'Kas',
			'12'=> 'Ara',
		),

		'long_month'=> array(
			'1'	=> 'Ocak',
			'2'	=> 'Şubat',
			'3'	=> 'Mart',
			'4'	=> 'Nisan',
			'5'	=> 'Mayıs',
			'6'	=> 'Haziran',
			'7'	=> 'Temmuz',
			'8'	=> 'Ağustos',
			'9'	=> 'Eylül',
			'10'=> 'Ekim',
			'11'=> 'Kasım',
			'12'=> 'Aralık',
		),
	),
));

?>