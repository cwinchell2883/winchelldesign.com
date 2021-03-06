<?php

/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id: index.php 7776 2010-06-11 13:52:58Z jtickle $
 */

if (!defined('PHPWS_SOURCE_DIR')) {
    header('HTTP/1.0 403 Forbidden');
    exit('<h1>403: Forbidden</h1>');
}

if ($_REQUEST['module'] != 'layout' || !isset($_REQUEST['action'])) {
    PHPWS_Core::errorPage('404');
}


if ($_REQUEST['action'] == 'ckeditor') {
    Layout::ckeditor();
}

if (!Current_User::allow('layout')) {
    Current_User::disallow();
}

PHPWS_Core::initModClass('layout', 'LayoutAdmin.php');

switch ($_REQUEST['action']){
    case 'admin':
        Layout_Admin::admin();
        break;

    default:
        PHPWS_Core::errorPage('404');
} // END action switch

?>
