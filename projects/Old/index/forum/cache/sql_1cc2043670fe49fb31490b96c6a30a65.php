<?php

/* SELECT COUNT(DISTINCT s.session_ip) as num_guests FROM _sessions s WHERE s.session_user_id = 1 AND s.session_time >= 1220474880 */

$expired = (time() > 1220475277) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'num_guests' => '1',
  ),
);
?>