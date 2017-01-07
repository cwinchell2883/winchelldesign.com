<?php

/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id: init.php 7776 2010-06-11 13:52:58Z jtickle $
 */
PHPWS_Core::requireConfig('photoalbum');
PHPWS_Core::initModClass('photoalbum', 'AlbumManager.php');

?>