<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1219713360 AND s.session_user_id <> 1 */

$expired = (time() > 1219713695) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
);
?>