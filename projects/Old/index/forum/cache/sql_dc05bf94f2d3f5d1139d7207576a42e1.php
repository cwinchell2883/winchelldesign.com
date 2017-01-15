<?php

/* SELECT COUNT(DISTINCT s.session_ip) as num_guests FROM _sessions s WHERE s.session_user_id = 1 AND s.session_time >= 1210898700 */

$expired = (time() > 1210899082) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
  0 => 
  array (
    'num_guests' => '1',
  ),
);
?>