<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/


$lang['translator'] = "<p>- Tahir Emre KALAYCI tarafından çevrilmiştir</p>"; // <-- Put this in here  "<p>- Translated by Andrew Fenn</p>"   replace Andrew Fenn with your name

$lang['title'] = 'Pro Clan Manager - Kurulum 0.4.1';

$lang['complete'] = '<p>Web siteniz kullanımınıza hazır. Lütfen:</p><p>- &quot;install&quot; dizinini sunucunuzdan siliniz.</p><p>- &quot;configure.php&quot; dizinizi de sadece okuma olarak chmod&lsquo;layın. (555)</p>';
$lang['pcmhome'] = 'Yeni Klan Web Siteme Git';


$lang['part4_empty'] = 'Kullanıcı adı ve şifre alanları gerekmektedir. Lütfen bu alanları doldurun.';
$lang['part4_not_match'] = 'Şifreler birbiriyle uyuşmuyor.';
$lang['part4_alpha_num'] = 'Kullanıcı adı ve şifrenizde sadece sayı ve harfler bulunabilir.';
$lang['part4_reminder'] = 'Lütfen kullanıcı adı ve şifrenizi unutmayın, web sitesine girebilmek için bunlara gereksinim duyuyorsunuz.';
$lang['part4'] = 'Pro Clan Manager&lsquo;ın kurulumunu tamamlamak için hesabınıza kullanıcı adı ve şifre ayarlamalısınız. Kullanıcı adı yeni web sitenizde kullanacağınız kullanıcı adıyla aynı olacaktır.';
$lang['part4_username'] = 'Kullanıcı Adı';
$lang['part4_password'] = 'Şifre';
$lang['part4_password2'] = 'Şifre (Tekrar)';
$lang['part4_email'] = 'Email';


$lang['part3dbfail'] = 'Veritabanınızı seçme denemesi başarısız oldu. Yanlış veritabanı ismi girmiş olabilirsiniz.';
$lang['part4_connect_fail'] = 'Veritabanınıza bağlantı denemesi başarısız oldu. MySQL adresi, kullanıcı adı veya şifreyi yanlış girmiş olabilirsiniz.';
$lang['part4_error'] = 'Oluşan hata: ';
$lang['part4_continue'] = '4.Adıma devam et';

$lang['part3_written'] = 'MySQL detayları yapılandırma dosyasına yazıldı. Şimdi çalışıp çalışmadığını kontrol edip, Pro Clan Manager&lsquo;ın çalışması için gereken MySQL tablolarını yaratalım.';
$lang['part3_not_written'] = 'configure.php dosyasına yazmada hata oluştu. Aşağıdaki metin kutusundaki yazıyı kopyalayıp &quot;configure.php&quot; dosyasına yapıştırın. Bu dosya &quot;includes&quot; dizininde bulunmaktadır.';
$lang['part3_continue'] = '3.Adıma devam et';

$lang['part2'] = 'MySQL detayları web sunucunuzda sağlanmalıdır. Nasıl olduğunu bilmiyorsanız web barındırma hizmetinizden talep ediniz.';
$lang['part2_address'] = 'MySQL Adresi';
$lang['part2_database'] = 'MySQL Veritabanı';
$lang['part2_username'] = 'MySQL Kullanıcı Adı';
$lang['part2_password'] = 'MySQL Şifresi';
$lang['part2_prefix'] = 'Tablo Öneki';
$lang['part2_goback'] = 'Geri dönüp tekrar dene.';

$lang['part2_refresh'] = 'Sayfayı Yenile';
$lang['part2_contiue'] = '2.Adıma devam et';

$lang['part1'] = 'Bu kurulum web sunucunuzdaki dosyalara yazma hakkını kontrol etmelidir. Eğer yazamazsa bazı dosya ve dizinlerdeki hakları değiştirip kuruluma devam etmelisiniz.';
$lang['part1_image_writable'] = '&quot;images&quot; dizini yazılabilir.';
$lang['part1_image_not_writable'] = 'Lütfen &quot;images&quot; dizini ve altındaki dizinleri 666 CHMOD&lsquo;layın, bu başarısız olursa 777&lsquo;yi deneyin.';

$lang['part1_files_writable'] = '&quot;files&quot; dizini yazılabilir.';
$lang['part1_files_not_writable'] = '&quot;files&quot; dizininin yazma hakkı yok. Lütfen dizini 666 CHMOD&lsquo;layın, bu başarısız olursa 777&lsquo;yi deneyin.';

$lang['part1_config_writable'] = '&quot;configure.php&quot; dosyası yazılabilir.';
$lang['part1_config_not_writable'] = '&quot;configure.php&quot; dosyasının yazma hakkı yok. &quot;configure.php&quot; dosyası &quot;includes&quot; dizini altındadır. Lütfen dosyayı 666 CHMOD&lsquo;layın, bu başarısız olursa 777&lsquo;yi deneyin.';
$lang['part1_config_not_there'] = '&quot;configure.php&quot; dizini bulunamıyor. &quot;includes&quot; dizini altında olması gerekiyor. ';

$lang['part1_compiled_writable'] = '&quot;compiled&quot; dizini yazılabilir.';
$lang['part1_compiled_not_writable'] = '&quot;compiled&quot; dizininin yazma hakkı yok. &quot;compiled&quot; dizini &quot;includes/libs&quot; dizini altındadır. Lütfen 666 CHMOD&lsquo;layın, bu başarısız olursa 777&lsquo;yi deneyin.';

$lang['part0_title'] = 'hoşgeldiniz';
$lang['part0'] = '<p>Pro Clan Manager&lsquo;i indirdiğiniz için teşekkürler. Bu sayfa size kurulum esnasında rehberlik edecektir. Herhangi bir yardım ihtiyacında fare işaretçisini daha iyi açıklamalar alabileceğiniz soru işaretlerinin üzerine getirin.</p><p>Hata yapmamak için bu yönergeleri iyi okumayı unutmayın</p><p>İhtiyaç anında web sitesini şu adresten ziyaret edebilirsiniz:<a href="http://www.proclanmanager.com">www.proclanmanager.com</a></p><p>İyi şanslar, umarım yeni web sitenizi beğenirsiniz.</p><br /><p>- Andrew Fenn</p>';


$lang['filelocked'] = ' Kurulum dizini kilitlenmiş. Kurulumun kilitini kaldırmak için kurulum (install) dizinindeki folder.lock dosyasını siliniz.';

$lang['install'] = 'Yükle';
$lang['upgrade_done'] = '<p>The upgrade was successful. Please now delete the &quot;install&quot; directory.</p>';
$lang['upgrade'] = 'Upgrade from';
$lang['continue'] = 'Devam';

/* Below is the data that will go into the site */

$lang['install_email_1_subject'] = 'Sitemize hoşgeldiniz!';
$lang['install_email_1_text'] = 'Giriş yapmak için lütfen aşağıdaki bilgileri kullanın!\r\n\r\nKullanıcı adı: [username]\r\nŞifre: [password]'; // [username] and [password] <-- Leave these words alone.
$lang['install_email_2_subject'] = 'Yeni Şifreniz';
$lang['install_email_2_text'] = 'Yeni şifreniz aşağıdadır.\r\n\r\nŞifre: [password]'; // [password] <-- leave this word alone


$lang['install_menu_1'] = 'Kullanıcı Ayarları';
$lang['install_menu_2'] = 'Kullanıcı Şifre';
$lang['install_menu_3'] = 'Yönetim Ekranı';
$lang['install_menu_4'] = 'Çıkış';
$lang['install_menu_5'] = 'Haberler';
$lang['install_menu_6'] = 'Arşiv';
$lang['install_menu_7'] = 'Liste';
$lang['install_menu_8'] = 'Anketler';
$lang['install_menu_9'] = 'İndirmeler';
$lang['install_menu_10'] = 'Ekran Görüntüleri';
$lang['install_menu_11'] = 'Olaylar';

$lang['install_module1'] = 'Site Yöneticisi';
$lang['install_module2'] = 'Üye Alanı';
$lang['install_module3'] = 'Haberler';
$lang['install_module4'] = 'Anketler';
$lang['install_module5'] = 'Üye Rütbeleri';
$lang['install_module6'] = 'İndirmeler';
$lang['install_module7'] = 'Ekran Görüntüleri';
$lang['install_module8'] = 'Üye Yönetimi';
$lang['install_module9'] = 'Olaylar';
$lang['install_module10'] = 'Site Sohbet';

$lang['install_rank1'] = 'Yönetici';
$lang['install_rank2'] = 'Üye';

/* Below is the language for describing what all the textboxes mean */

$lang['desc_mysql_address'] = '<p>MySQL adresi MySQL veritabanını konumudur.</p><p>Eğer MySQL adresini bilmiyorsanız localhost&lsquo;u deneyin. Eğer başarısız olursanız web barındırma sağlayıcınızla irtibata geçiniz.</p>';
$lang['desc_mysql_database']= '<p>MySQL veritabanı tablo bilgilerinin saklanacağı veritabanının adıdır.</p><p> Eğer veritabanı adını bilmiyorsanız web barındırma kullanıcı adını deneyin.</p><p>Eğer başarısız olursanız web barındırma sağlayıcınızla irtibata geçiniz ve MySQL ayarları hakkındaki detayları sorunuz.</p>';
$lang['desc_mysql_username']= '<p>MySQL kullanıcı adı veritabanına giriş yapmak için kullanılmaktadır.</p><p> Eğer MySQL kullanıcı adını bilmiyorsanız web barındırma kullanıcı adını deneyin. Eğer başarısız olursanız web barındırma sağlayıcınızla irtibata geçiniz.</p>';
$lang['desc_mysql_password']= '<p>MySQL şifreniz MySQL veritabanına giriş yapmak için kullanılmaktadır.</p><p> Eğer MySQL şifrenizi bilmiyorsanız web barındırma şifrenizi deneyin. Eğer başarısız olursanız web barındırma sağlayıcınızla irtibata geçiniz.</p>';
$lang['desc_mysql_prefix']  = '<p>Tablo öneki MySQL veritabanınızdaki tabloların başındaki ifadedir.Örneğin &ldquo;pcm_news&rdquo;.</p><p>Eğer Pro Clan Manager&lsquo;ın sadece bir örneğini yükleyecekseniz buraya fazla kafa yormadan herhangi bir şey girebilirsiniz.</p><p>Eğer çok oyunlu bir klan iseniz ve birden fazla Pro Clan Manager kuracaksanız her yeni Pro Clan Manager kurulumunda bunu farklı seçmelisiniz.</p>';

$lang['desc_user_name'] = '<p>Bu web sitenizde gözükecek olan yeni kullanıcı adınızdır.</p><p>Bu ayrıca Pro Clan Manager&lsquo;a giriş yapmak için kullanacağınız isimdir.</p>';
$lang['desc_user_pass'] = '<p>Bu Pro Clan Manager&lsquo;a giriş yapmak için kullanacağınız şifredir.</p>';
$lang['desc_user_email'] = '<p>Bu web sitesinde kullanıcı adınız altında gösterilecek olan elektronik posta adresidir.</p><p>Bu kutuyu boş bırakabilirsiniz.</p>'
?>