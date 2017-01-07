<?php
/**
 * Initializes the menu class
 *
 * @author Matthew McNaney <mcnaney at gmail dot com
 * @version $Id: init.php 7776 2010-06-11 13:52:58Z jtickle $
 */

PHPWS_Core::requireConfig('menu', 'config.php');
PHPWS_Core::initModClass('menu', 'Menu.php');

?>