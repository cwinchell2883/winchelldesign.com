<?php

/* SELECT s.session_user_id, s.session_ip, s.session_viewonline FROM phpbb_sessions s WHERE s.session_time >= 1210107030 AND s.session_user_id <> 1 */

$expired = (time() > 1210107373) ? true : false;
if ($expired) { return; }

$this->sql_rowset[$query_id] = array (
);
?>