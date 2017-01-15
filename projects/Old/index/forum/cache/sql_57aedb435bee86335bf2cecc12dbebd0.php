<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1226797560 AND s.session_user_id <> 1 */

$expired = (time() > 1226797906) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'session_user_id' => '16',
    'session_ip' => '66.249.66.225',
    'session_viewonline' => '1',
  ),
);
?>