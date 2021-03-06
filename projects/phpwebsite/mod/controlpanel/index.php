<?php

/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id: index.php 7776 2010-06-11 13:52:58Z jtickle $
 */
if (!defined('PHPWS_SOURCE_DIR')) {
    include '../../core/conf/404.html';
    exit();
}

if (!Current_User::isLogged()) {
    Current_User::requireLogin();
}

if (isset($_GET['cp_image_toggle'])){
    PHPWS_ControlPanel_Tab::toggleImage($_GET['tab']);
}
 
if (isset($_GET['cp_desc_toggle'])){
    PHPWS_ControlPanel_Tab::toggleDesc($_GET['tab']);
}

if (isset($_REQUEST['action'])){
    PHPWS_Core::initModClass('controlpanel', 'Action.php');

    if ($_REQUEST['action'] == 'admin' && Current_User::allow('controlpanel')) {
        CP_Action::adminAction();
    }
} elseif ($_SESSION['User']->isLogged()){
    Layout::add(PHPWS_ControlPanel::display());
}

?>