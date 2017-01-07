<?php
$expired = (time() > 1367603958) ? true : false;
if ($expired) { return; }

$data = array (
  'local' => 
  array (
    'f_' => 0,
    'f_announce' => 1,
    'f_attach' => 2,
    'f_bbcode' => 3,
    'f_bump' => 4,
    'f_delete' => 5,
    'f_download' => 6,
    'f_edit' => 7,
    'f_email' => 8,
    'f_flash' => 9,
    'f_icons' => 10,
    'f_ignoreflood' => 11,
    'f_img' => 12,
    'f_list' => 13,
    'f_noapprove' => 14,
    'f_poll' => 15,
    'f_post' => 16,
    'f_postcount' => 17,
    'f_print' => 18,
    'f_read' => 19,
    'f_reply' => 20,
    'f_report' => 21,
    'f_search' => 22,
    'f_sigs' => 23,
    'f_smilies' => 24,
    'f_sticky' => 25,
    'f_subscribe' => 26,
    'f_user_lock' => 27,
    'f_vote' => 28,
    'f_votechg' => 29,
    'm_' => 30,
    'm_approve' => 31,
    'm_chgposter' => 32,
    'm_delete' => 33,
    'm_edit' => 34,
    'm_info' => 35,
    'm_lock' => 36,
    'm_merge' => 37,
    'm_move' => 38,
    'm_report' => 39,
    'm_split' => 40,
  ),
  'id' => 
  array (
    'f_' => 1,
    'f_announce' => 2,
    'f_attach' => 3,
    'f_bbcode' => 4,
    'f_bump' => 5,
    'f_delete' => 6,
    'f_download' => 7,
    'f_edit' => 8,
    'f_email' => 9,
    'f_flash' => 10,
    'f_icons' => 11,
    'f_ignoreflood' => 12,
    'f_img' => 13,
    'f_list' => 14,
    'f_noapprove' => 15,
    'f_poll' => 16,
    'f_post' => 17,
    'f_postcount' => 18,
    'f_print' => 19,
    'f_read' => 20,
    'f_reply' => 21,
    'f_report' => 22,
    'f_search' => 23,
    'f_sigs' => 24,
    'f_smilies' => 25,
    'f_sticky' => 26,
    'f_subscribe' => 27,
    'f_user_lock' => 28,
    'f_vote' => 29,
    'f_votechg' => 30,
    'm_' => 31,
    'm_approve' => 32,
    'm_chgposter' => 33,
    'm_delete' => 34,
    'm_edit' => 35,
    'm_info' => 36,
    'm_lock' => 37,
    'm_merge' => 38,
    'm_move' => 39,
    'm_report' => 40,
    'm_split' => 41,
    'm_ban' => 42,
    'm_warn' => 43,
    'a_' => 44,
    'a_aauth' => 45,
    'a_attach' => 46,
    'a_authgroups' => 47,
    'a_authusers' => 48,
    'a_backup' => 49,
    'a_ban' => 50,
    'a_bbcode' => 51,
    'a_board' => 52,
    'a_bots' => 53,
    'a_clearlogs' => 54,
    'a_email' => 55,
    'a_fauth' => 56,
    'a_forum' => 57,
    'a_forumadd' => 58,
    'a_forumdel' => 59,
    'a_group' => 60,
    'a_groupadd' => 61,
    'a_groupdel' => 62,
    'a_icons' => 63,
    'a_jabber' => 64,
    'a_language' => 65,
    'a_mauth' => 66,
    'a_modules' => 67,
    'a_names' => 68,
    'a_phpinfo' => 69,
    'a_profile' => 70,
    'a_prune' => 71,
    'a_ranks' => 72,
    'a_reasons' => 73,
    'a_roles' => 74,
    'a_search' => 75,
    'a_server' => 76,
    'a_styles' => 77,
    'a_switchperm' => 78,
    'a_uauth' => 79,
    'a_user' => 80,
    'a_userdel' => 81,
    'a_viewauth' => 82,
    'a_viewlogs' => 83,
    'a_words' => 84,
    'u_' => 85,
    'u_attach' => 86,
    'u_chgavatar' => 87,
    'u_chgcensors' => 88,
    'u_chgemail' => 89,
    'u_chggrp' => 90,
    'u_chgname' => 91,
    'u_chgpasswd' => 92,
    'u_download' => 93,
    'u_hideonline' => 94,
    'u_ignoreflood' => 95,
    'u_masspm' => 96,
    'u_pm_attach' => 97,
    'u_pm_bbcode' => 98,
    'u_pm_delete' => 99,
    'u_pm_download' => 100,
    'u_pm_edit' => 101,
    'u_pm_emailpm' => 102,
    'u_pm_flash' => 103,
    'u_pm_forward' => 104,
    'u_pm_img' => 105,
    'u_pm_printpm' => 106,
    'u_pm_smilies' => 107,
    'u_readpm' => 108,
    'u_savedrafts' => 109,
    'u_search' => 110,
    'u_sendemail' => 111,
    'u_sendim' => 112,
    'u_sendpm' => 113,
    'u_sig' => 114,
    'u_viewonline' => 115,
    'u_viewprofile' => 116,
    'a_add_user' => 117,
  ),
  'option' => 
  array (
    1 => 'f_',
    2 => 'f_announce',
    3 => 'f_attach',
    4 => 'f_bbcode',
    5 => 'f_bump',
    6 => 'f_delete',
    7 => 'f_download',
    8 => 'f_edit',
    9 => 'f_email',
    10 => 'f_flash',
    11 => 'f_icons',
    12 => 'f_ignoreflood',
    13 => 'f_img',
    14 => 'f_list',
    15 => 'f_noapprove',
    16 => 'f_poll',
    17 => 'f_post',
    18 => 'f_postcount',
    19 => 'f_print',
    20 => 'f_read',
    21 => 'f_reply',
    22 => 'f_report',
    23 => 'f_search',
    24 => 'f_sigs',
    25 => 'f_smilies',
    26 => 'f_sticky',
    27 => 'f_subscribe',
    28 => 'f_user_lock',
    29 => 'f_vote',
    30 => 'f_votechg',
    31 => 'm_',
    32 => 'm_approve',
    33 => 'm_chgposter',
    34 => 'm_delete',
    35 => 'm_edit',
    36 => 'm_info',
    37 => 'm_lock',
    38 => 'm_merge',
    39 => 'm_move',
    40 => 'm_report',
    41 => 'm_split',
    42 => 'm_ban',
    43 => 'm_warn',
    44 => 'a_',
    45 => 'a_aauth',
    46 => 'a_attach',
    47 => 'a_authgroups',
    48 => 'a_authusers',
    49 => 'a_backup',
    50 => 'a_ban',
    51 => 'a_bbcode',
    52 => 'a_board',
    53 => 'a_bots',
    54 => 'a_clearlogs',
    55 => 'a_email',
    56 => 'a_fauth',
    57 => 'a_forum',
    58 => 'a_forumadd',
    59 => 'a_forumdel',
    60 => 'a_group',
    61 => 'a_groupadd',
    62 => 'a_groupdel',
    63 => 'a_icons',
    64 => 'a_jabber',
    65 => 'a_language',
    66 => 'a_mauth',
    67 => 'a_modules',
    68 => 'a_names',
    69 => 'a_phpinfo',
    70 => 'a_profile',
    71 => 'a_prune',
    72 => 'a_ranks',
    73 => 'a_reasons',
    74 => 'a_roles',
    75 => 'a_search',
    76 => 'a_server',
    77 => 'a_styles',
    78 => 'a_switchperm',
    79 => 'a_uauth',
    80 => 'a_user',
    81 => 'a_userdel',
    82 => 'a_viewauth',
    83 => 'a_viewlogs',
    84 => 'a_words',
    85 => 'u_',
    86 => 'u_attach',
    87 => 'u_chgavatar',
    88 => 'u_chgcensors',
    89 => 'u_chgemail',
    90 => 'u_chggrp',
    91 => 'u_chgname',
    92 => 'u_chgpasswd',
    93 => 'u_download',
    94 => 'u_hideonline',
    95 => 'u_ignoreflood',
    96 => 'u_masspm',
    97 => 'u_pm_attach',
    98 => 'u_pm_bbcode',
    99 => 'u_pm_delete',
    100 => 'u_pm_download',
    101 => 'u_pm_edit',
    102 => 'u_pm_emailpm',
    103 => 'u_pm_flash',
    104 => 'u_pm_forward',
    105 => 'u_pm_img',
    106 => 'u_pm_printpm',
    107 => 'u_pm_smilies',
    108 => 'u_readpm',
    109 => 'u_savedrafts',
    110 => 'u_search',
    111 => 'u_sendemail',
    112 => 'u_sendim',
    113 => 'u_sendpm',
    114 => 'u_sig',
    115 => 'u_viewonline',
    116 => 'u_viewprofile',
    117 => 'a_add_user',
  ),
  'global' => 
  array (
    'm_' => 0,
    'm_approve' => 1,
    'm_chgposter' => 2,
    'm_delete' => 3,
    'm_edit' => 4,
    'm_info' => 5,
    'm_lock' => 6,
    'm_merge' => 7,
    'm_move' => 8,
    'm_report' => 9,
    'm_split' => 10,
    'm_ban' => 11,
    'm_warn' => 12,
    'a_' => 13,
    'a_aauth' => 14,
    'a_attach' => 15,
    'a_authgroups' => 16,
    'a_authusers' => 17,
    'a_backup' => 18,
    'a_ban' => 19,
    'a_bbcode' => 20,
    'a_board' => 21,
    'a_bots' => 22,
    'a_clearlogs' => 23,
    'a_email' => 24,
    'a_fauth' => 25,
    'a_forum' => 26,
    'a_forumadd' => 27,
    'a_forumdel' => 28,
    'a_group' => 29,
    'a_groupadd' => 30,
    'a_groupdel' => 31,
    'a_icons' => 32,
    'a_jabber' => 33,
    'a_language' => 34,
    'a_mauth' => 35,
    'a_modules' => 36,
    'a_names' => 37,
    'a_phpinfo' => 38,
    'a_profile' => 39,
    'a_prune' => 40,
    'a_ranks' => 41,
    'a_reasons' => 42,
    'a_roles' => 43,
    'a_search' => 44,
    'a_server' => 45,
    'a_styles' => 46,
    'a_switchperm' => 47,
    'a_uauth' => 48,
    'a_user' => 49,
    'a_userdel' => 50,
    'a_viewauth' => 51,
    'a_viewlogs' => 52,
    'a_words' => 53,
    'u_' => 54,
    'u_attach' => 55,
    'u_chgavatar' => 56,
    'u_chgcensors' => 57,
    'u_chgemail' => 58,
    'u_chggrp' => 59,
    'u_chgname' => 60,
    'u_chgpasswd' => 61,
    'u_download' => 62,
    'u_hideonline' => 63,
    'u_ignoreflood' => 64,
    'u_masspm' => 65,
    'u_pm_attach' => 66,
    'u_pm_bbcode' => 67,
    'u_pm_delete' => 68,
    'u_pm_download' => 69,
    'u_pm_edit' => 70,
    'u_pm_emailpm' => 71,
    'u_pm_flash' => 72,
    'u_pm_forward' => 73,
    'u_pm_img' => 74,
    'u_pm_printpm' => 75,
    'u_pm_smilies' => 76,
    'u_readpm' => 77,
    'u_savedrafts' => 78,
    'u_search' => 79,
    'u_sendemail' => 80,
    'u_sendim' => 81,
    'u_sendpm' => 82,
    'u_sig' => 83,
    'u_viewonline' => 84,
    'u_viewprofile' => 85,
    'a_add_user' => 86,
  ),
);
?>