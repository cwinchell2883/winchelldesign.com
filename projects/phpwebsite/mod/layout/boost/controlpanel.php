<?php
/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id: controlpanel.php 7355 2010-03-16 20:44:17Z matt $
 */

$link[] = array('label'       => dgettext('layout', 'Layout'),
		 'restricted'  => TRUE,
		 'url'         => 'index.php?module=layout&action=admin',
		 'description' => dgettext('layout', 'Control the layout of your site.'),
		 'image'       => 'layout.png',
		 'tab'         => 'admin'
		 );
		 ?>