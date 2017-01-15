<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1229834820 AND s.session_user_id <> 1 */

$expired = (time() > 1229835178) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'session_user_id' => '16',
    'session_ip' => '66.249.67.41',
    'session_viewonline' => '1',
  ),
);
?>