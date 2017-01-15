<?php

/* SELECT COUNT(DISTINCT s.session_ip) as num_guests FROM phpbb_sessions s WHERE s.session_user_id = 1 AND s.session_time >= 1210107000 */

$expired = (time() > 1210107403) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'num_guests' => '1',
  ),
);
?>