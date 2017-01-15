<?php

/* SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (_moderator_cache m) LEFT JOIN _users u ON (m.user_id = u.user_id) LEFT JOIN _groups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1 AND m.forum_id IN (5, 6, 8, 9, 10, 11, 12) */

$expired = (time() > 1220422360) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
);
?>