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
$smarty->assign('g_lang_next', 'Next');
$smarty->assign('g_lang_prev', 'Previous');
$smarty->assign('g_lang_misc_root', 'Root');
$smarty->assign('g_lang_misc_size', 'Size');
$smarty->assign('g_lang_misc_name','Name');
$smarty->assign('g_lang_misc_time','Time');
$smarty->assign('g_lang_misc_views','Views');
$smarty->assign('g_lang_misc_location', 'Location');
$smarty->assign('g_lang_misc_joindate', 'Join Date');
$smarty->assign('g_lang_misc_status', 'Status');
$smarty->assign('g_lang_misc_user_pic', 'User Picture');
$smarty->assign('g_lang_misc_picture', 'Picture');
$smarty->assign('g_lang_misc_details', 'Details');
$smarty->assign('g_lang_misc_alias', 'Alias');
$smarty->assign('g_lang_misc_joined', 'Joined');
$smarty->assign('g_lang_misc_email', 'Email');
$smarty->assign('g_lang_misc_location', 'Location');
$smarty->assign('g_lang_misc_fav_site', 'Favourite site');
$smarty->assign('g_lang_misc_interests', 'Interests');
$smarty->assign('g_lang_misc_start_date', 'Start date');
$smarty->assign('g_lang_misc_end_date', 'End date');
$smarty->assign('g_lang_misc_votes', 'Votes');
$smarty->assign('g_lang_misc_description', 'Description');
$smarty->assign('g_lang_misc_date', 'Date');
$smarty->assign('g_lang_misc_report', 'Report');
$smarty->assign('g_lang_misc_restore', 'Restore');
$smarty->assign('g_lang_misc_update', 'Update');
$smarty->assign('g_lang_misc_yes', 'Yes');
$smarty->assign('g_lang_misc_no', 'No');
$smarty->assign('g_lang_misc_view','View');
$smarty->assign('g_lang_misc_add', 'Add');
$smarty->assign('g_lang_misc_edit', 'Edit');
$smarty->assign('g_lang_misc_delete', 'Delete');
$smarty->assign('g_lang_misc_subject', 'Subject');
$smarty->assign('g_lang_misc_make_public', 'Make public');
$smarty->assign('g_lang_misc_online', 'Online');
$smarty->assign('g_lang_misc_offline', 'Offline');
$smarty->assign('g_lang_misc_options', 'Options');
$smarty->assign('g_lang_misc_last_online', 'Last online');
$smarty->assign('g_lang_misc_enabled', 'Enabled');
$smarty->assign('g_lang_misc_disabled','Disabled');
$smarty->assign('g_lang_misc_disable', 'Disable');
$smarty->assign('g_lang_misc_enable', 'Enable');
$smarty->assign('g_lang_misc_value', 'Value');
$smarty->assign('g_lang_misc_link','Link');
$smarty->assign('g_lang_misc_public', 'Public');
$smarty->assign('g_lang_misc_private', 'Private');
$smarty->assign('g_lang_misc_version', 'Version');
$smarty->assign('g_lang_misc_install', 'Install');
$smarty->assign('g_lang_misc_uninstall', 'Uninstall');
$smarty->assign('g_lang_misc_author', 'Author');
$smarty->assign('g_lang_misc_talk', 'Talk');
$smarty->assign('g_lang_misc_guest', 'Guest');
$smarty->assign('g_lang_misc_previous_page','Previous page');
$smarty->assign('g_lang_misc_next_page','Next page');
$smarty->assign('g_lang_misc_first','First');
$smarty->assign('g_lang_misc_last','Last');

$smarty->assign('g_lang_error_database', 'There was an error when trying to connect to your database.');
$smarty->assign('g_lang_pass_changed', 'Your password has been changed');
$smarty->assign('g_lang_pass_wrong','The password given was incorrect');
$smarty->assign('g_lang_pass_nomatch', 'The passwords given did not match.');
$smarty->assign('g_lang_pass_format', 'Your password can only contain numbers and letters.');
$smarty->assign('g_lang_image_too_large','Your file is too large. You can only upload pictures under');
$smarty->assign('g_lang_form_unfilled', 'You filled out the form incorrectly please go back and try again.');
$smarty->assign('g_lang_pref_complete', 'Your settings have successfully changed.');
$smarty->assign('g_lang_style_not_found', 'The theme you attempted to install does not exist.');
$smarty->assign('g_lang_log_out', 'You are now logged out');

// user bio
$smarty->assign('g_lang_user_bio_details','User Details');
$smarty->assign('g_lang_user_dob','Date of Birth');
$smarty->assign('g_lang_user_website','Website url');
$smarty->assign('g_lang_user_hidemail','Hide email address from public');
$smarty->assign('g_lang_user_sitechat','Show time in site chat');
$smarty->assign('g_lang_user_description','Description');
$smarty->assign('g_lang_user_amend','Amend my profile');
$smarty->assign('g_lang_user_picture','User Picture');
$smarty->assign('g_lang_user_choosepic','Choose an picture from the website');
$smarty->assign('g_lang_user_upload','Upload a new image from your computer');
$smarty->assign('g_lang_user_url_image','Link to a picture from a website');
$smarty->assign('g_lang_user_created','The user account was created. The password is:');

// user password
$smarty->assign('g_lang_user_oldpass','Old Password');
$smarty->assign('g_lang_user_newpass','New Password');
$smarty->assign('g_lang_user_confirmpass','Confirm Password');
$smarty->assign('g_lang_user_changepass','Change Password');
$smarty->assign('g_lang_pass_description','To change your password enter your old password followed by your new password. Your password can only be numbers and letters.');
$smarty->assign('g_lang_pass_email', 'Email the password');

// ranks
$smarty->assign('g_lang_ranks', 'Ranks');
$smarty->assign('g_lang_rank_module_name', 'Module name');
$smarty->assign('g_lang_rank_select', 'Select rank privileges');
$smarty->assign('g_lang_rank_add', 'Add new rank');
$smarty->assign('g_lang_rank_edit','Edit rank');
$smarty->assign('g_lang_rank_change','Change rank');
$smarty->assign('g_lang_rank_total_users', 'Total users');

// news
$smarty->assign('g_lang_news_none','The news post you\'re looking for could not be found.');
$smarty->assign('g_lang_news', 'News');
$smarty->assign('g_lang_news_add', 'Add news post');
$smarty->assign('g_lang_news_edit', 'Edit news post');

// poll
$smarty->assign('g_lang_poll_none','There are no polls at this time.');
$smarty->assign('g_lang_poll_notf','This poll could not be found in the database.');
$smarty->assign('g_lang_poll_notu','You are not allowed to vote.');
$smarty->assign('g_lang_poll_notime','You cannot vote on this poll at this time.');
$smarty->assign('g_lang_poll_no_time', 'None');
$smarty->assign('g_lang_poll_listing', 'Poll listing');
$smarty->assign('g_lang_poll_viewresults', 'View results');
$smarty->assign('g_lang_poll_add', 'Add new poll');
$smarty->assign('g_lang_poll_name','Poll name');
$smarty->assign('g_lang_poll_options','Poll options');
$smarty->assign('g_lang_poll_closed', 'Closed');
$smarty->assign('g_lang_poll_not_started', 'Not Started');

// downloads
$smarty->assign('g_lang_file_directory','Directory');
$smarty->assign('g_lang_file_uploaded', 'Uploaded by');
$smarty->assign('g_lang_file_downloads', 'File downloads');
$smarty->assign('g_lang_download_file', 'Download file');
$smarty->assign('g_lang_files', 'Files');
$smarty->assign('g_lang_file_preview_image', 'Preview image');
$smarty->assign('g_lang_file_change_preview_image', 'Change preview image');
$smarty->assign('g_lang_file_link_to', 'Link to file');
$smarty->assign('g_lang_file_link_to_size','If linking to the file please type in the file size');
$smarty->assign('g_lang_file_options', 'File options');
$smarty->assign('g_lang_file_add', 'Add new file');
$smarty->assign('g_lang_file_edit', 'Edit file');
$smarty->assign('g_lang_folder_add', 'Add new folder');
$smarty->assign('g_lang_folder_edit','Edit new folder');
$smarty->assign('g_lang_file_size', 'File size');
$smarty->assign('g_lang_file_login', 'You have to login to download this file.');
$smarty->assign('g_lang_file_noname', 'You did not enter a name.');
$smarty->assign('g_lang_file_missing','You did not select a file from either a web link or to be uploaded.');
$smarty->assign('g_lang_file_error','Although you submitted a file it seems there was a problem when trying to upload it.');

// gallery
$smarty->assign('g_lang_image_add', 'Add new image');
$smarty->assign('g_lang_gallery', 'Screenshots');
$smarty->assign('g_lang_image_upload', 'Upload a picture');
$smarty->assign('g_lang_image_wrong_type','The file you uploaded is not an image.');
$smarty->assign('g_lang_image_none','You have not selected a url or file for use.');
$smarty->assign('g_lang_image_error', 'The image you selected could not be uploaded. Please make sure the directory you are uploading images to has write access.');
$smarty->assign('g_lang_image_name', 'You must provide a name for your photo.');
$smarty->assign('g_lang_image_size', 'The image you uploaded is too big. Please choose a smaller image.');

// email
$smarty->assign('g_lang_email_wrong','The email address is incorrect.');
$smarty->assign('g_lang_email_error','There was an error when trying to send email. Maybe your webserver does not support this.');
$smarty->assign('g_lang_email_hidden', 'Hidden');

// users
$smarty->assign('g_lang_user_toohigh', 'You can not promote someone to a higher rank then yourself.');
$smarty->assign('g_lang_user_toolow','You can not change anyone who is the same or higher in rank then you.');
$smarty->assign('g_lang_user_notu','You can not edit or delete yourself');
$smarty->assign('g_lang_user_pass', 'The users new password has been emailed to their email address.');
$smarty->assign('g_lang_user_add','Add new user');
$smarty->assign('g_lang_user_add_desc', 'Type in the new users name and email address. If you want to automatically send them an email with their password then click the checkbox below.');
$smarty->assign('g_lang_user_invalid', 'This username is invalid. A username can only contain numbers and letters.');
$smarty->assign('g_lang_user_exists', 'This username already exists.');
// dates
$smarty->assign('g_lang_date_month1','January');
$smarty->assign('g_lang_date_month2','Febury');
$smarty->assign('g_lang_date_month3','March');
$smarty->assign('g_lang_date_month4','April');
$smarty->assign('g_lang_date_month5','May');
$smarty->assign('g_lang_date_month6','June');
$smarty->assign('g_lang_date_month7','July');
$smarty->assign('g_lang_date_month8','August');
$smarty->assign('g_lang_date_month9','September');
$smarty->assign('g_lang_date_month10','October');
$smarty->assign('g_lang_date_month11','November');
$smarty->assign('g_lang_date_month12','December');

// modules
$smarty->assign('g_lang_module', 'Site Sections');
$smarty->assign('g_lang_module_settings', 'Module Settings');
$smarty->assign('g_lang_module_install','Install Modules');

// events
$smarty->assign('g_lang_events', 'Events');
$smarty->assign('g_lang_events_start_date', 'Start date');
$smarty->assign('g_lang_events_add', 'Add new event');
$smarty->assign('g_lang_events_edit', 'Edit event');
$smarty->assign('g_lang_events_no_report', 'There is no report for this event.');
$smarty->assign('g_lang_events_too_early', 'Event has not yet started.');


// control panel
$smarty->assign('g_lang_panel_logout', 'Logout');
$smarty->assign('g_lang_panel_modules','Modules');
$smarty->assign('g_lang_panel_events', 'Events');
$smarty->assign('g_lang_panel_user', 'User Settings');
$smarty->assign('g_lang_panel_gallery', 'Gallery Settings');
$smarty->assign('g_lang_panel_file', 'File Settings');
$smarty->assign('g_lang_panel_rank', 'Rank Settings');
$smarty->assign('g_lang_panel_poll', 'Poll Settings');
$smarty->assign('g_lang_panel_admin', 'Admin Settings');
$smarty->assign('g_lang_panel_news', 'News Settings');
$smarty->assign('g_lang_panel_usrpass', 'User Password');
$smarty->assign('g_lang_panel_edituser', 'Edit Users');

// Admin
$smarty->assign('g_lang_admin_warning', 'Changing these options could lead to making your website unuseable please be aware of this when making changes.');
$smarty->assign('g_lang_admin_site_options', 'Website options');
$smarty->assign('g_lang_admin_email_options', 'Email options');
$smarty->assign('g_lang_admin_style_options', 'Style options');
$smarty->assign('g_lang_admin_menu_options','Menu options');
$smarty->assign('g_lang_admin_menu_type','Menu type');
$smarty->assign('g_lang_admin_default_style', 'Select your default style');
$smarty->assign('g_lang_admin_install_style', 'Install a new style');
$smarty->assign('g_lang_admin_current_time', 'Your websites current time is');
$smarty->assign('g_lang_admin_display_date', 'Your website will display the date as');
?>