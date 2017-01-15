<?php/*Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.Copyright (C) 2002 Andrew FennThis program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA*/// BELOW ARE THE LANGUAGE FILES USED BY PRO CLAN MANAGER// g_ stands for global variable. This means it can be used in any template// m_ stands for a member variable. It can only be used in a specific template. // misc statements found in the templates, please check here before adding the same thing twice$smarty->assign('g_lang_misc_upload', 'Yükle');$smarty->assign('g_lang_postedby', 'Gönderen');$smarty->assign('g_lang_next', 'Sonraki');$smarty->assign('g_lang_prev', 'Önceki');$smarty->assign('g_lang_misc_root', 'Kök');$smarty->assign('g_lang_misc_size', 'Boyut');$smarty->assign('g_lang_misc_name','İsim');$smarty->assign('g_lang_misc_time','Zaman');$smarty->assign('g_lang_misc_views','Görüntüleme');$smarty->assign('g_lang_misc_location', 'Konum');$smarty->assign('g_lang_misc_joindate', 'Katılma Tarihi');$smarty->assign('g_lang_misc_status', 'Durum');$smarty->assign('g_lang_misc_user_pic', 'Kullanıcı Resmi');$smarty->assign('g_lang_misc_picture', 'Resim');$smarty->assign('g_lang_misc_details', 'Detaylar');$smarty->assign('g_lang_misc_alias', 'Takma isim');$smarty->assign('g_lang_misc_joined', 'Katıldı');$smarty->assign('g_lang_misc_email', 'Email');$smarty->assign('g_lang_misc_location', 'Konum');$smarty->assign('g_lang_misc_fav_site', 'Favori Site');$smarty->assign('g_lang_misc_interests', 'İlgi Alanları');$smarty->assign('g_lang_misc_start_date', 'Başlama Tarihi');$smarty->assign('g_lang_misc_end_date', 'Bitiş Tarihi');$smarty->assign('g_lang_misc_votes', 'Oylar');$smarty->assign('g_lang_misc_description', 'Tanımlamalar');$smarty->assign('g_lang_misc_date', 'Tarih');$smarty->assign('g_lang_misc_report', 'Rapor');$smarty->assign('g_lang_misc_restore', 'Geri Koy');$smarty->assign('g_lang_misc_update', 'Güncelle');$smarty->assign('g_lang_misc_yes', 'Evet');$smarty->assign('g_lang_misc_no', 'Hayır');$smarty->assign('g_lang_misc_view','Gör');$smarty->assign('g_lang_misc_add', 'Ekle');$smarty->assign('g_lang_misc_edit', 'Değiştir');$smarty->assign('g_lang_misc_delete', 'Sil');$smarty->assign('g_lang_misc_subject', 'Konu');$smarty->assign('g_lang_misc_make_public', 'Umuma aç');$smarty->assign('g_lang_misc_online', 'Çevrimiçi');$smarty->assign('g_lang_misc_offline', 'Çevrimdışı');$smarty->assign('g_lang_misc_options', 'Seçenekler');$smarty->assign('g_lang_misc_last_online', 'Son Çevrimiçi');$smarty->assign('g_lang_misc_enabled', 'Etkin');$smarty->assign('g_lang_misc_disabled','Etkin Değil');$smarty->assign('g_lang_misc_disable', 'Devre dışı');$smarty->assign('g_lang_misc_enable', 'Etkin');$smarty->assign('g_lang_misc_value', 'Değer');$smarty->assign('g_lang_misc_link','Bağ');$smarty->assign('g_lang_misc_public', 'Genel');$smarty->assign('g_lang_misc_private', 'Özel');$smarty->assign('g_lang_misc_version', 'Sürüm');$smarty->assign('g_lang_misc_install', 'Kurulum');$smarty->assign('g_lang_misc_uninstall', 'Kaldırma');$smarty->assign('g_lang_misc_author', 'Yazar');$smarty->assign('g_lang_misc_talk', 'Konuş');$smarty->assign('g_lang_misc_guest', 'Misafir');$smarty->assign('g_lang_misc_previous_page','Önceki Sayfa');$smarty->assign('g_lang_misc_next_page','Sonraki Sayfa');$smarty->assign('g_lang_misc_first','İlk');$smarty->assign('g_lang_misc_last','Son');$smarty->assign('g_lang_error_database', 'Veritabanına bağlanırken bir hata oluştu.');$smarty->assign('g_lang_pass_changed', 'Şifreniz değiştirildi');$smarty->assign('g_lang_pass_wrong','Girilen şifre hatalı');$smarty->assign('g_lang_pass_nomatch', 'Şifrele uyuşmuyor.');$smarty->assign('g_lang_pass_format', 'Şifreniz sadece sayı ve harflerden oluşabilir.');$smarty->assign('g_lang_image_too_large','Dosyanız çok büyük. Sadece şu boyuttan küçük dosyaları yükleyebilirsiniz:');$smarty->assign('g_lang_form_unfilled', 'Formu yanlış doldurdunuz geri dönüp tekrar deneyin.');$smarty->assign('g_lang_pref_complete', 'Ayarlarınız başarıyla değiştirildi.');$smarty->assign('g_lang_style_not_found', 'Yüklemeye çalıştığınız tema mevcut değil.');$smarty->assign('g_lang_log_out', 'Çıkış yaptınız');// user bio$smarty->assign('g_lang_user_bio_details','Kullanıcı Detayları');$smarty->assign('g_lang_user_dob','Doğum Tarihi');$smarty->assign('g_lang_user_website','Web Site Adresi');$smarty->assign('g_lang_user_hidemail','EPostayı Genelden sakla');$smarty->assign('g_lang_user_sitechat','Site sohbetinde zaman göster');$smarty->assign('g_lang_user_description','Tanımlama');$smarty->assign('g_lang_user_amend','Profilimi düzelt');$smarty->assign('g_lang_user_picture','Kullanıcı Resmi');$smarty->assign('g_lang_user_choosepic','Web sitesinden bir resim seçin');$smarty->assign('g_lang_user_upload','Bilgisayarınızdan bir resim yükleyin');$smarty->assign('g_lang_user_url_image','Başka bir web sitesindeki resme bağ verin');$smarty->assign('g_lang_user_created','Kullanıcı hesabı yaratıldı. Şifreniz:');// user password$smarty->assign('g_lang_user_oldpass','Eski Şifre');$smarty->assign('g_lang_user_newpass','Yeni Şifre');$smarty->assign('g_lang_user_confirmpass','Şifreyi Doğrula');$smarty->assign('g_lang_user_changepass','Şifreyi Değiştir');$smarty->assign('g_lang_pass_description','Şifrenizi değiştirmek için eski şifrenizi, daha sonra yeni şifrenizi giriniz. Şifreniz sadece sayı ve harflerden oluşabilir.');$smarty->assign('g_lang_pass_email', 'Şifreyi elektronik posta olarak at');// ranks$smarty->assign('g_lang_ranks', 'Rütbeler');$smarty->assign('g_lang_rank_module_name', 'Modül İsmi');$smarty->assign('g_lang_rank_select', 'Rütbe İzinleri');$smarty->assign('g_lang_rank_add', 'Yeni Rütbe Ekle');$smarty->assign('g_lang_rank_edit','Rütbeyi Düzelt');$smarty->assign('g_lang_rank_change','Rütbe Değiştir');$smarty->assign('g_lang_rank_total_users', 'Toplam Kullanıcılar');// news$smarty->assign('g_lang_news_none','Bakmaya çalıştığınız yeni haber mesajı bulunamıyor.');$smarty->assign('g_lang_news', 'Haberler');$smarty->assign('g_lang_news_add', 'Yeni Haber Ekle');$smarty->assign('g_lang_news_edit', 'Haber Güncelle');// poll$smarty->assign('g_lang_poll_none','Herhangi bir oylama yok.');$smarty->assign('g_lang_poll_notf','Bu oylama veritabanında bulunamadı.');$smarty->assign('g_lang_poll_notu','Oy kullanma hakkınız yok.');$smarty->assign('g_lang_poll_notime','Bu oylamada şu an oy kullanamazsınız.');$smarty->assign('g_lang_poll_no_time', 'Hiç');$smarty->assign('g_lang_poll_listing', 'Oylama Listesi');$smarty->assign('g_lang_poll_viewresults', 'Sonuçlar');$smarty->assign('g_lang_poll_add', 'Yeni Oylama');$smarty->assign('g_lang_poll_name','Oylama Adı');$smarty->assign('g_lang_poll_options','Oylama Seçenekleri');$smarty->assign('g_lang_poll_closed', 'Kapalı');$smarty->assign('g_lang_poll_not_started', 'Başlamadı');// downloads$smarty->assign('g_lang_file_directory','Dizin');$smarty->assign('g_lang_file_uploaded', 'Yükleyen');$smarty->assign('g_lang_file_downloads', 'Dosya İndirmeleri');$smarty->assign('g_lang_download_file', 'Dosyayı İndir');$smarty->assign('g_lang_files', 'Dosyalar');$smarty->assign('g_lang_file_preview_image', 'Resim Önizleme');$smarty->assign('g_lang_file_change_preview_image', 'Önizleme resmini değiştir');$smarty->assign('g_lang_file_link_to', 'Dosya Bağı');$smarty->assign('g_lang_file_link_to_size','Dosyaya bağ yapıyorsanız lütfen dosya boyutunu giriniz');$smarty->assign('g_lang_file_options', 'Dosya Seçenekleri');$smarty->assign('g_lang_file_add', 'Yeni Dosya Ekle');$smarty->assign('g_lang_file_edit', 'Dosyayı Güncelle');$smarty->assign('g_lang_folder_add', 'Yeni Dizin Ekle');$smarty->assign('g_lang_folder_edit','Yeni Dizini Güncelle');$smarty->assign('g_lang_file_size', 'Dosya Boyutu');$smarty->assign('g_lang_file_login', 'Bu dosyayı indirmek için giriş yapmalısınız.');$smarty->assign('g_lang_file_noname', 'Bir isim girmediniz.');$smarty->assign('g_lang_file_missing','Herhangi bir dosya seçmediniz.');$smarty->assign('g_lang_file_error','Bir dosya eklediğiniz halde yüklemede bir sorun var.');// gallery$smarty->assign('g_lang_image_add', 'Yeni Resim Ekle');$smarty->assign('g_lang_gallery', 'Ekran Görüntüleri');$smarty->assign('g_lang_image_upload', 'Resim Yükle');$smarty->assign('g_lang_image_wrong_type','Yüklediğiniz dosya bir resim dosyası değil.');$smarty->assign('g_lang_image_none','Kullanmak için bir URL veya dosya seçmediniz.');$smarty->assign('g_lang_image_error', 'Seçtiğiniz resim yüklenemez. Yükleme yaptığınız dizinin yazma hakkı olduğundan emin olun.');$smarty->assign('g_lang_image_name', 'Resim için bir isim belirlemelisiniz.');$smarty->assign('g_lang_image_size', 'Yüklediğiniz resim çok büyük. Daha küçük bir resim seçiniz.');// email$smarty->assign('g_lang_email_wrong','Elektronik posta adresi hatalı.');$smarty->assign('g_lang_email_error','EMail gönderirken hata oluştu. Web sunucunuz bunu desteklemiyor olabilir.');$smarty->assign('g_lang_email_hidden', 'Gizli');// users$smarty->assign('g_lang_user_toohigh', 'Başkasına kendi rütbenizden daha yüksek bir rütbe veremezsiniz.');$smarty->assign('g_lang_user_toolow','Kendi rütbeniz veya daha yüksek rütbeli birini değiştiremezsiniz.');$smarty->assign('g_lang_user_notu','Kendinizi değiştiremez veya silemezsiniz');$smarty->assign('g_lang_user_pass', 'Kullanıcının yeni şifresi email adreslerine gönderildi.');$smarty->assign('g_lang_user_add','Yeni Kullanıcı Ekle');$smarty->assign('g_lang_user_add_desc', 'Yeni kullanıcının kullanıcı adı ve şifresini girin. Eğer şifresinin email adresine gönderilmesini istiyorsanız aşağıdaki kutucuğu seçin.');$smarty->assign('g_lang_user_invalid', 'Bu kullanıcı adı hatalı. Kullanıcı adı sadece sayı ve harflerden oluşabilir.');$smarty->assign('g_lang_user_exists', 'Bu kullanıcı adı daha önce alınmış.');// dates$smarty->assign('g_lang_date_month1','Ocak');$smarty->assign('g_lang_date_month2','Şubat');$smarty->assign('g_lang_date_month3','Mart');$smarty->assign('g_lang_date_month4','Nisan');$smarty->assign('g_lang_date_month5','Mayıs');$smarty->assign('g_lang_date_month6','Haziran');$smarty->assign('g_lang_date_month7','Temmuz');$smarty->assign('g_lang_date_month8','Ağustos');$smarty->assign('g_lang_date_month9','Eylül');$smarty->assign('g_lang_date_month10','Ekim');$smarty->assign('g_lang_date_month11','Kasım');$smarty->assign('g_lang_date_month12','Aralık');// modules$smarty->assign('g_lang_module', 'Site Bölümleri');$smarty->assign('g_lang_module_settings', 'Modül Ayarları');$smarty->assign('g_lang_module_install','Modül Kur');// events$smarty->assign('g_lang_events', 'Olaylar');$smarty->assign('g_lang_events_start_date', 'Başlangıç Tarihi');$smarty->assign('g_lang_events_add', 'Yeni Olay Ekle');$smarty->assign('g_lang_events_edit', 'Olay Güncelle');$smarty->assign('g_lang_events_no_report', 'Bu olay için rapor bulunamadı.');$smarty->assign('g_lang_events_too_early', 'Olay henüz başlamadı.');// control panel$smarty->assign('g_lang_panel_logout', 'Çıkış');$smarty->assign('g_lang_panel_modules','Modüller');$smarty->assign('g_lang_panel_events', 'Olaylar');$smarty->assign('g_lang_panel_user', 'Kullanıcı Ayarları');$smarty->assign('g_lang_panel_gallery', 'Galeri Ayarları');$smarty->assign('g_lang_panel_file', 'Dosya Ayarları');$smarty->assign('g_lang_panel_rank', 'Rütbe Ayarları');$smarty->assign('g_lang_panel_poll', 'Oylama Ayarları');$smarty->assign('g_lang_panel_admin', 'Yönetici Ayarları');$smarty->assign('g_lang_panel_news', 'Haber Ayarları');$smarty->assign('g_lang_panel_usrpass', 'Kullanıcı Şifre');$smarty->assign('g_lang_panel_edituser', 'Kullanıcıları Güncelle');// Admin$smarty->assign('g_lang_admin_warning', 'Bu ayarları değiştirmeniz web sitenizi kullanışsız kılabilir, değişiklik yaparken bu noktayı unutmayın.');$smarty->assign('g_lang_admin_site_options', 'Web site ayarları');$smarty->assign('g_lang_admin_email_options', 'Email ayarları');$smarty->assign('g_lang_admin_style_options', 'Stil ayarları');$smarty->assign('g_lang_admin_menu_options','Menü ayarları');$smarty->assign('g_lang_admin_menu_type','Menü tipi');$smarty->assign('g_lang_admin_default_style', 'Varsayılan stilinizi seçiniz');$smarty->assign('g_lang_admin_install_style', 'Yeni bir stil yükleyin');?>