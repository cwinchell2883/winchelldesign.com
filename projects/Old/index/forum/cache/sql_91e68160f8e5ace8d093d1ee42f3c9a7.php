<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1228391610 AND s.session_user_id <> 1 */

$expired = (time() > 1228391966) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'session_user_id' => '25',
    'session_ip' => '65.55.210.17',
    'session_viewonline' => '1',
  ),
);
?>