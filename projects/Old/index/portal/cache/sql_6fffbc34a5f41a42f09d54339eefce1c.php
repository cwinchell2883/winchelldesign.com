<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM phpbb_sessions s WHERE s.session_time >= 1210106250 AND s.session_user_id <> 1 */

$expired = (time() > 1210106603) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'session_user_id' => '2',
    'session_ip' => '71.82.124.90',
    'session_viewonline' => '1',
  ),
);
?>