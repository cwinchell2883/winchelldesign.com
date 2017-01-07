<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showNav(); ?>
</div>
<div id="col2">
	<h2>Login</h2>
	<?php
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	if (session_is_registered('username')) { 
		echo "You are already logged in!";
	} else {
		if ((!$user) || (!$pass)) {
			include 'inc/login_form.inc.php';
			exit(); 
		}
		$pass = md5($pass); 
		$link = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
		mysql_select_db($mysql_db, $link);
		$user = escape_string($user);
		$pass = escape_string($pass);
		$result = mysql_query("SELECT * FROM bcs_members WHERE name='$user' AND password='$pass'", $link); 
		$login_check = mysql_num_rows($result);
		if($login_check > 0) { 
			while($row = mysql_fetch_array($result)) { 
				foreach( $row AS $key => $val ) { 
					$$key = stripslashes( $val ); 
				} 
				session_register('username');
				$_SESSION['username'] = $name;
				session_register('id');
				$_SESSION['id'] = $id;
				session_register('email');
				$_SESSION['email'] = $email;
				session_register('rank');
				$_SESSION['rank'] = $rank;
				if ($rank <= 1) {
					session_register('admin');
					$_SESSION['admin'] = $name;
					echo '<h3>Admin Login Successful</h3><p>Proceed to the <a href="?page='.$_SESSION["prevpage"].'">Previous Page</a> or <a href="admin.php?edit_page=index">Admin Section</a>?';
				} else {
					header('refresh:2;url=/iGnition/index.php?page='.$_SESSION['prevpage']);
					echo '<h3>Login Successful</h3><p>You will be redirected to your previous page.</p>';
				}
			} 
		} else { 
			echo '<h3 class="error">Invalid Login</h3><p>You could not be logged in.  Please check that your username and password are correct.</p>';
			include 'inc/login_form.inc.php';
		} 
	}
	?>
</div>
<div id="footer"><?php echo $release; ?></div>