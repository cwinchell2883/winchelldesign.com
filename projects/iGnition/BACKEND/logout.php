<?php 
session_start();
session_destroy(); 
echo '<h1>You have been logged out.</h1><br />';
echo 'Click <a href="index.php">here</a> to continue.';
echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
?> 
