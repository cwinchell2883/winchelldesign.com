<form name="login" method="post" action=" ?page=login">
	<h3>Please Login</h3>
	<p>
		<label for="user">Username</label>:
		<input type="text" name="user" title="Please Enter Your Username" value="<?php echo $user; ?>" size="50"/>
	</p>
	<p>
		<label for="pass">Password</label>:
		<input type="password" name="pass" title="Please Enter Your Password" size="20"/>
	</p>
	<p><a href="?page=resetpass">Forgot Password?</a></p>
	<p><input type="submit" name="login" value="Login"/></p>
</form>
<script language="JavaScript">
	document.form.user.focus();
</script>