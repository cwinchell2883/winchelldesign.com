<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM _sessions s WHERE s.session_time >= 1219037790 AND s.session_user_id <> 1 */

$expired = (time() > 1219038147) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
);
?>