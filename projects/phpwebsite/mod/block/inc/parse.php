<?php
/**
 * @version $Id: parse.php 7776 2010-06-11 13:52:58Z jtickle $
 * @author Matthew McNaney <mcnaney at gmail dot com>
 */

function block_view($block_id) {
    $block = new Block_Item((int)$block_id);
    if (empty($block->id)) {
        return NULL;
    }
    $template['BLOCK'] = $block->view(FALSE, FALSE);
    return PHPWS_Template::process($template, 'block', 'embedded.tpl');
}

?>