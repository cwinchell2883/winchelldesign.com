<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1226460690 AND s.session_user_id <> 1 */

$expired = (time() > 1226461035) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
);
?>