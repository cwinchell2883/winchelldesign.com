<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

// BELOW ARE THE LANGUAGE FILES USED BY PRO CLAN MANAGER
// g_ stands for global variable. This means it can be used in any template
// m_ stands for a member variable. It can only be used in a specific template. 


// misc statements found in the templates, please check here before adding the same thing twice
$smarty->assign('g_lang_misc_upload', 'Upload');
$smarty->assign('g_lang_postedby', 'Posted by');
$smarty->assign('g_lang_next', 'Successivo');
$smarty->assign('g_lang_prev', 'Precedente');
$smarty->assign('g_lang_misc_root', 'Radice');
$smarty->assign('g_lang_misc_size', 'Dimensione');
$smarty->assign('g_lang_misc_name','Nome');
$smarty->assign('g_lang_misc_time','Tempo');
$smarty->assign('g_lang_misc_views','Viste');
$smarty->assign('g_lang_misc_location', 'Locazione');
$smarty->assign('g_lang_misc_joindate', 'Join Date');
$smarty->assign('g_lang_misc_status', 'Stato');
$smarty->assign('g_lang_misc_user_pic', 'Immagine Utente');
$smarty->assign('g_lang_misc_picture', 'Immagine');
$smarty->assign('g_lang_misc_details', 'Dettagli');
$smarty->assign('g_lang_misc_alias', 'Alias');
$smarty->assign('g_lang_misc_joined', 'Joined');
$smarty->assign('g_lang_misc_email', 'Email');
$smarty->assign('g_lang_misc_location', 'Locazione');
$smarty->assign('g_lang_misc_fav_site', 'Preferiti');
$smarty->assign('g_lang_misc_interests', 'Interests');
$smarty->assign('g_lang_misc_start_date', 'Data di inizio');
$smarty->assign('g_lang_misc_end_date', 'Data di fine');
$smarty->assign('g_lang_misc_votes', 'Votes');
$smarty->assign('g_lang_misc_description', 'Descrizione');
$smarty->assign('g_lang_misc_date', 'Data');
$smarty->assign('g_lang_misc_report', 'Rapporto');
$smarty->assign('g_lang_misc_restore', 'Riavvia');
$smarty->assign('g_lang_misc_update', 'Aggiorna');
$smarty->assign('g_lang_misc_yes', 'SÃ¬');
$smarty->assign('g_lang_misc_no', 'No');
$smarty->assign('g_lang_misc_view','Visualizza');
$smarty->assign('g_lang_misc_add', 'Aggiungi');
$smarty->assign('g_lang_misc_edit', 'Modifica');
$smarty->assign('g_lang_misc_delete', 'Cancella');
$smarty->assign('g_lang_misc_subject', 'Oggetto');
$smarty->assign('g_lang_misc_make_public', 'Rendi pubblico');
$smarty->assign('g_lang_misc_online', 'In linea');
$smarty->assign('g_lang_misc_offline', 'Non in linea');
$smarty->assign('g_lang_misc_options', 'Opzioni');
$smarty->assign('g_lang_misc_last_online', 'Ultimo in linea');
$smarty->assign('g_lang_misc_enabled', 'Abilitato');
$smarty->assign('g_lang_misc_disabled','Disabilitato');
$smarty->assign('g_lang_misc_disable', 'Disabilita');
$smarty->assign('g_lang_misc_enable', 'Abilita');
$smarty->assign('g_lang_misc_value', 'Valore');
$smarty->assign('g_lang_misc_link','Link');
$smarty->assign('g_lang_misc_public', 'Pubblico');
$smarty->assign('g_lang_misc_private', 'Privato');
$smarty->assign('g_lang_misc_version', 'Versione');
$smarty->assign('g_lang_misc_install', 'Installazione');
$smarty->assign('g_lang_misc_uninstall', 'Dinsintalla');
$smarty->assign('g_lang_misc_author', 'Autore');
$smarty->assign('g_lang_misc_talk', 'Parla');
$smarty->assign('g_lang_misc_guest', 'Ospite');
$smarty->assign('g_lang_misc_previous_page','Pagina precedente');
$smarty->assign('g_lang_misc_next_page','Pagine successiva');
$smarty->assign('g_lang_misc_first','Primo');
$smarty->assign('g_lang_misc_last','Ultimo');

$smarty->assign('g_lang_error_database', 'C\'Ã¨ stato un\' errore nella
connesione al database.');
$smarty->assign('g_lang_pass_changed', 'Password modificata');
$smarty->assign('g_lang_pass_wrong','La password inserita non Ã¨ corretta');
$smarty->assign('g_lang_pass_nomatch', 'Le password non corrispondono.');
$smarty->assign('g_lang_pass_format', 'La password deve contenere solo numeri e
lettere.');
$smarty->assign('g_lang_image_too_large','Your file is too large. You can only upload pictures under');
$smarty->assign('g_lang_form_unfilled', 'You filled out the form incorrectly please go back and try again.');
$smarty->assign('g_lang_pref_complete', 'Impostazioni cambiate con successo.');
$smarty->assign('g_lang_style_not_found', 'Il tema che vuoi installare non 
esiste.');
$smarty->assign('g_lang_log_out', 'Ora sei entrato');

// user bio
$smarty->assign('g_lang_user_bio_details','Dettagli utente');
$smarty->assign('g_lang_user_dob','Data di nascita');
$smarty->assign('g_lang_user_website','Sito Web');
$smarty->assign('g_lang_user_hidemail','Nascondi indirizzo email');
$smarty->assign('g_lang_user_sitechat','Mostra il tempo');
$smarty->assign('g_lang_user_description','Descrizione');
$smarty->assign('g_lang_user_amend','Amend my profile');
$smarty->assign('g_lang_user_picture','Immagine Utente');
$smarty->assign('g_lang_user_choosepic','Scegli una figura dal sito');
$smarty->assign('g_lang_user_upload','Carica una nuova immagine dal tuo computer');
$smarty->assign('g_lang_user_url_image','Link to a picture from a website');
$smarty->assign('g_lang_user_created','L\'utente Ã¨ stato creato. La password Ã¨');

// user password
$smarty->assign('g_lang_user_oldpass','Vecchia Password');
$smarty->assign('g_lang_user_newpass','Nuova Password');
$smarty->assign('g_lang_user_confirmpass','Conferma Password');
$smarty->assign('g_lang_user_changepass','Cambia Password');
$smarty->assign('g_lang_pass_description','Per cambiare la tua password cambia 
la tua vecchia password seguita dalla tua nuova password. La password puÃ² 
contenere solo numeri e lettere.');
$smarty->assign('g_lang_pass_email', 'Email the password');

// ranks
$smarty->assign('g_lang_ranks', 'Ranks');
$smarty->assign('g_lang_rank_module_name', 'Module name');
$smarty->assign('g_lang_rank_select', 'Seleziona i privilegi del rank');
$smarty->assign('g_lang_rank_add', 'Aggiungi un nuovo rank');
$smarty->assign('g_lang_rank_edit','Modifica rank');
$smarty->assign('g_lang_rank_change','Cambia rank');
$smarty->assign('g_lang_rank_total_users', 'Utenti totali');

// news
$smarty->assign('g_lang_news_none','The news post you\'re looking for could not be found.');
$smarty->assign('g_lang_news', 'News');
$smarty->assign('g_lang_news_add', 'Aggiungi news post');
$smarty->assign('g_lang_news_edit', 'Modifica news post');

// poll
$smarty->assign('g_lang_poll_none','There are no polls at this time.');
$smarty->assign('g_lang_poll_notf','This poll could not be found in the database.');
$smarty->assign('g_lang_poll_notu','Non sei in grado di votare.');
$smarty->assign('g_lang_poll_notime','You cannot vote on this poll at this time.');
$smarty->assign('g_lang_poll_no_time', 'Nessuno');
$smarty->assign('g_lang_poll_listing', 'Poll listing');
$smarty->assign('g_lang_poll_viewresults', 'Visualizza risultati');
$smarty->assign('g_lang_poll_add', 'Aggiungi un nuovo poll');
$smarty->assign('g_lang_poll_name','Poll nome');
$smarty->assign('g_lang_poll_options','Poll opzioni');
$smarty->assign('g_lang_poll_closed', 'Chiuso');
$smarty->assign('g_lang_poll_not_started', 'Non avviato');

// downloads
$smarty->assign('g_lang_file_directory','Cartella');
$smarty->assign('g_lang_file_uploaded', 'Uploaded by');
$smarty->assign('g_lang_file_downloads', 'File download');
$smarty->assign('g_lang_download_file', 'Download file');
$smarty->assign('g_lang_files', 'File');
$smarty->assign('g_lang_file_preview_image', 'Anteprima Immagine');
$smarty->assign('g_lang_file_change_preview_image', 'Cambia l\'anteprima delle
immagini');
$smarty->assign('g_lang_file_link_to', 'Collegamento al file');
$smarty->assign('g_lang_file_link_to_size','If linking to the file please type in the file size');
$smarty->assign('g_lang_file_options', 'Opzioni file');
$smarty->assign('g_lang_file_add', 'Aggiungi un nuovo file');
$smarty->assign('g_lang_file_edit', 'Modifica file');
$smarty->assign('g_lang_folder_add', 'Aggiungi una nuova cartella');
$smarty->assign('g_lang_folder_edit','Modifica una nuova folder');
$smarty->assign('g_lang_file_size', 'Dimensioni del file');
$smarty->assign('g_lang_file_login', 'Devi effettuare il login per scaricare
questo file.');
$smarty->assign('g_lang_file_noname', 'Non hai digitato il nome.');
$smarty->assign('g_lang_file_missing','You did not select a file from either a web link or to be uploaded.');
$smarty->assign('g_lang_file_error','Although you submitted a file it seems there was a problem when trying to upload it.');

// gallery
$smarty->assign('g_lang_image_add', 'Aggiungi una nuova immagine');
$smarty->assign('g_lang_gallery', 'Screenshots');
$smarty->assign('g_lang_image_upload', 'Upload un\'immagine');
$smarty->assign('g_lang_image_wrong_type','Il file che hai caricato non Ã¨ un\'
immagine.');
$smarty->assign('g_lang_image_none','You have not selected a url or file for use.');
$smarty->assign('g_lang_image_error', 'The image you selected could not be uploaded. Please make sure the directory you are uploading images to has write access.');
$smarty->assign('g_lang_image_name', 'Devi fornire il nome per una foto.');
$smarty->assign('g_lang_image_size', 'The image you uploaded is too big. Please choose a smaller image.');

// email
$smarty->assign('g_lang_email_wrong','L\'indirizzo email non Ã¨ corretto.');
$smarty->assign('g_lang_email_error','There was an error when trying to send email. Maybe your webserver does not support this.');
$smarty->assign('g_lang_email_hidden', 'Nascosto');

// users
$smarty->assign('g_lang_user_toohigh', 'You can not promote someone to a higher rank then yourself.');
$smarty->assign('g_lang_user_toolow','You can not change anyone who is the same or higher in rank then you.');
$smarty->assign('g_lang_user_notu','Non puoi cancellare o modificare il tuo 
utente');
$smarty->assign('g_lang_user_pass', 'The users new password has been emailed to their email address.');
$smarty->assign('g_lang_user_add','Aggiungi un nuovo utente');
$smarty->assign('g_lang_user_add_desc', 'Type in the new users name and email address. If you want to automatically send them an email with their password then click the checkbox below.');
$smarty->assign('g_lang_user_invalid', 'This username is invalid. A username can only contain numbers and letters.');
$smarty->assign('g_lang_user_exists', 'Questo username Ã¨ giÃ  esistente.');
// dates
$smarty->assign('g_lang_date_month1','Gennaio');
$smarty->assign('g_lang_date_month2','Febbraio');
$smarty->assign('g_lang_date_month3','Marzo');
$smarty->assign('g_lang_date_month4','Aprile');
$smarty->assign('g_lang_date_month5','Maggio');
$smarty->assign('g_lang_date_month6','Giugno');
$smarty->assign('g_lang_date_month7','Luglio');
$smarty->assign('g_lang_date_month8','Agosto');
$smarty->assign('g_lang_date_month9','Settembre');
$smarty->assign('g_lang_date_month10','Ottobre');
$smarty->assign('g_lang_date_month11','Novembre');
$smarty->assign('g_lang_date_month12','Dicembre');

// modules
$smarty->assign('g_lang_module', 'Site Sections');
$smarty->assign('g_lang_module_settings', 'Module Settings');
$smarty->assign('g_lang_module_install','Install Modules');

// events
$smarty->assign('g_lang_events', 'Eventi');
$smarty->assign('g_lang_events_start_date', 'Data di partenza');
$smarty->assign('g_lang_events_add', 'Aggiungi un nuovo evento');
$smarty->assign('g_lang_events_edit', 'Modifica evento');
$smarty->assign('g_lang_events_no_report', 'There is no report for this event.');
$smarty->assign('g_lang_events_too_early', 'Evento non Ã¨ ancora iniziato.');


// control panel
$smarty->assign('g_lang_panel_logout', 'Logout');
$smarty->assign('g_lang_panel_modules','Modules');
$smarty->assign('g_lang_panel_events', 'Eventi');
$smarty->assign('g_lang_panel_user', 'Impostazioni utente');
$smarty->assign('g_lang_panel_gallery', 'Impostazioni galleria');
$smarty->assign('g_lang_panel_file', 'Impostazioni file');
$smarty->assign('g_lang_panel_rank', 'Impostazioni Rank');
$smarty->assign('g_lang_panel_poll', 'Impostazioni Poll');
$smarty->assign('g_lang_panel_admin', 'Impostazioni amministratore');
$smarty->assign('g_lang_panel_news', 'Impostazioni News');
$smarty->assign('g_lang_panel_usrpass', 'Password Utente');
$smarty->assign('g_lang_panel_edituser', 'Modifica Utenti');

// Admin
$smarty->assign('g_lang_admin_warning', 'LA modifica di queste opzioni potrebbe 
rendere inutilizzabile il tuo sito.per favore presta attenzione a queste 
modifiche');
$smarty->assign('g_lang_admin_site_options', 'Opzioni SitoWeb');
$smarty->assign('g_lang_admin_email_options', 'Opzioni email');
$smarty->assign('g_lang_admin_style_options', 'Opzioni stile');
$smarty->assign('g_lang_admin_menu_options','Opzioni Menu ');
$smarty->assign('g_lang_admin_menu_type','Menu type');
$smarty->assign('g_lang_admin_default_style', 'Seleziona il tuo stile di default');
$smarty->assign('g_lang_admin_install_style', 'Installa un nuovo stile');
$smarty->assign('g_lang_admin_current_time', 'Your websites current time is');
$smarty->assign('g_lang_admin_display_date', 'Your website will display the date as');
?>

