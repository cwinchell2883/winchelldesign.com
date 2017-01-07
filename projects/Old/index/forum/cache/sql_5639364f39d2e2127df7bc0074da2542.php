<?php

/* SELECT s.style_id, t.template_storedb, t.template_path, t.template_id, t.bbcode_bitfield, c.theme_path, c.theme_name, c.theme_storedb, c.theme_id, i.imageset_path, i.imageset_id, i.imageset_name FROM _styles s, _styles_template t, _styles_theme c, _styles_imageset i WHERE s.style_id = 2 AND t.template_id = s.template_id AND c.theme_id = s.theme_id AND i.imageset_id = s.imageset_id */

$expired = (time() > 1336071558) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'style_id' => '2',
    'template_storedb' => '0',
    'template_path' => 'myPage',
    'template_id' => '2',
    'bbcode_bitfield' => 'kNg=',
    'theme_path' => 'myPage',
    'theme_name' => 'myPage',
    'theme_storedb' => '1',
    'theme_id' => '2',
    'imageset_path' => 'myPage',
    'imageset_id' => '2',
    'imageset_name' => 'myPage',
  ),
);
?>