<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1210908420 AND s.session_user_id <> 1 */

$expired = (time() > 1210908754) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'session_user_id' => '2',
    'session_ip' => '75.134.133.240',
    'session_viewonline' => '1',
  ),
);
?>