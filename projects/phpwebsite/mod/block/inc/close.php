<?php

/**
 * @author Matthew McNaney <mcnaney at gmail dot com>
 * @version $Id: close.php 7776 2010-06-11 13:52:58Z jtickle $
 */

Block::show();

if (Current_User::allow('block')) {
    $key = Key::getCurrent();
    if (Key::checkKey($key) && javascriptEnabled()) {
        $val['address'] = sprintf('index.php?module=block&action=js_block_edit&key_id=%s&authkey=%s',
        $key->id, Current_User::getAuthkey());
        $val['label'] = dgettext('block', 'Add block here');
        $val['width'] = 640;
        $val['height'] = 480;
        MiniAdmin::add('block', javascript('open_window', $val));
    }
}

?>