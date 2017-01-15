<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<?php showNav(); ?>
</div>
<div id="col2">
	<?php
	if ($_POST['submit']) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$location = $_POST['location'];
		$birthday = $_POST['birthday'];
		$rank = $_POST['rank'];
		$date = $_POST['date'];
		$recruit = $_POST['recruit'];
		if(strlen($_POST['password']) > 0) {
			$password = md5($_POST['password']);
			mysql_query("UPDATE bcs_members SET name='$name', fname='$fname', lname='$lname', email='$email', location='$location', birthday='$birthday', password='$password' "
				. "WHERE id=$id") or die(mysql_error());
		} else {
			mysql_query("UPDATE bcs_members SET name='$name', fname='$fname', lname='$lname', email='$email', location='$location', birthday='$birthday' WHERE id=$id") or die(mysql_error());
		}
	} else {
		$id = $_SESSION['id'];
		$sql = 'SELECT bcs_members.id, bcs_members.name, email, recruit, date, bcs_ranks.name AS rank, fname, lname, birthday, location '
			. 'FROM bcs_members, bcs_ranks WHERE bcs_members.rank = bcs_ranks.id AND bcs_members.id = ' . $id . ' ORDER BY `order`';
		$result = mysql_query($sql)  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{
			$id=$r["id"];
			$name=$r["name"];
			$fname=$r["fname"];
			$lname=$r["lname"];
			$email=$r["email"];
			$location=$r["location"];
			$birthday=$r["birthday"];
			$rank=$r["rank"];
			$date=$r["date"];
			$recruit=$r["recruit"];
		}
	}
	?>
	<form action="?page=settings" method="post">
	<div class="half">
		<h2>Settings</h2>
		<p>
			Member Name: <input type="text" name="name" size="30" value="<?php echo $name; ?>" /><br /><br />
			First Name: <input type="text" name="fname" size="30" value="<?php echo $fname; ?>" /><br /><br />
			Last Name: <input type="text" name="lname" size="30" value="<?php echo $lname; ?>" /><br /><br />
			Email: <input type="text" name="email" size="30" value="<?php echo $email; ?>" /><br /><br />
			Location: <input type="text" name="location" size="50" value="<?php echo $location; ?>" /><br /><br />
			Birthday: <input type="text" name="birthday" size="30" value="<?php echo $birthday; ?>" /><br /><br />
			Password: <input type="password" name="password" size="20" /><br />Leave Blank if you do not wish to change.<br /><br/>
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
		</p>
	</div>
	<div class="half">
		<p>&nbsp;</p>
		<p>
			ID: <input disabled type="text" name="idshow" size="4" value="<?php echo $id; ?>" /><br /><br />
			Rank: <input disabled type="text" name="rank" size="15" value="<?php echo $rank; ?>" /><br /><br />
			Date Joined: <input disabled type="text" name="date" size="10" value="<?php echo $date; ?>" /><br /><br />
			Recruited By: <input disabled type="text" name="recruit" size="30" value="<?php echo $recruit; ?>" /><br /><br />
		</p>
	</div>
	</form>
</div>
<div id="footer"><?php echo $release; ?></div>