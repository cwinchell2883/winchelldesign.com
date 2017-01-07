<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1218151470 AND s.session_user_id <> 1 */

$expired = (time() > 1218151825) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'session_user_id' => '26',
    'session_ip' => '65.55.230.217',
    'session_viewonline' => '1',
  ),
);
?>