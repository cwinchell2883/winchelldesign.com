<?php
session_start();
if (!isset($_SESSION['username']))
{
	echo '<div id="header"><h1>' . $site_name . '</h1></div><div id="gutter"></div><div id="col1">';
	showNav();
	echo '</div><div id="col2"><h1>Access Denied! You must login.</h1>';
	include 'inc/login_form.inc.php';
	echo '</div><div id="footer">' . $release . '</div>';
	exit();
}
if (isset($_SESSION['username']) & ($_SESSION['rank'] > $accesslvl[$_GET['edit_page']]))
{
	echo '<div id="header"><h1>' . $site_name . '</h1></div><div id="gutter"></div><div id="col1">';
	header('refresh:2;url=/iGnition/index.php?page=news');
	echo '</div><div id="col2"><h1>Access Denied! You do not have permission to view this page.</h1>';
	echo '<p>You will be redirected to the home page.</p>';
	echo '</div><div id="footer">' . $release . '</div>';
	exit();
}
else
	mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
	mysql_select_db($mysql_db) or die(mysql_error()); 
{
?>
	<div id="menu">[&nbsp;<a href="index.php">user mode</a>&nbsp;]&nbsp;&nbsp;[&nbsp;<a href="index.php?page=logout">logout</a>&nbsp;]</div>
	<div id="header"><h1>Administration</h1></div>
	<div id="gutter"></div>
	<div id="col1">
		<?php showAdminNav(); ?>
	</div>
	<div id="col2">
		<div class="half">
		<?php
		if($_POST['del'])
		{
			$id = $_POST['id'];
			mysql_query("DELETE FROM bcs_news WHERE id=$id")  or die(mysql_error());
			echo "<meta http-equiv='refresh' content='0;URL=?edit_page=news'>";
		}
		if($_POST['submit'])
		{
			$id = $_POST['id'];
			$title = $_POST['title'];
			$news = $_POST['news'];
			$name = $_POST['name'];
			$date = $_POST['date'];
			if(strlen($id) > 0)
			{
				mysql_query("UPDATE bcs_news SET title='$title', news='$news', name='$name', date='$date' WHERE id=$id") or die(mysql_error());
			}
			else
			{
				mysql_query("INSERT INTO bcs_news (id,title,news,name,date) VALUES ('NULL', '$title', '$news', '$name', '$date')") or die(mysql_error()); 
			}
			echo "<p>The following news was submitted successfully</p>";
			echo "<p><b>Date:</b> ";
			echo date("F d, Y g:i a", strtotime($date));
			echo "<br /><b>Submitted by:</b> ";
			echo $name;
			echo "<br /><b>Title:</b> ";
			echo $title;
			echo "<br /><b>News:</b> ";
			echo $news;
		}
		elseif($_POST['edit'])
		{
			$id = $_POST['id'];
			$result = mysql_query("SELECT * FROM bcs_news WHERE id = " . $id)  or die(mysql_error());
			while($r=mysql_fetch_array($result))
			{
				$id=$r["id"];
				$title=$r["title"];
				$news=$r["news"];
				$date=$r["date"];
				$name=$r["name"];
			}
			?>
			<h2>Edit News</h2>
			<script type="text/javascript" src="inc/messageboard.inc.js"></script>
			<form action="?edit_page=news" method="post">
			<p>
				Date/Time: <input type="text" name="dateshow" value='<?php echo date("F d, Y g:i a"); ?>' /><br /><br />
				<input type="hidden" name="date" value='<?php echo date("Y-m-d H:i:s"); ?>' />
				<input type="hidden" name="id" value="<?php echo $id; ?>"/>
				Submitted By: <input type="text" name="name" value="<?php echo $name; ?>"/><br /><br />
				News Title: <input type="text" name="title" value="<?php echo $title; ?>"/><br /><br />
				News:<br />
				<script type="text/javascript">var bb = new BBCode();</script>
				<p>
					<input type="button" onclick="bb.insertCode('B', 'bold');" value="B" title="Bold text" />
					<input type="button" onclick="bb.insertCode('I', 'italic');" value="I" title="Italic text" />
					<input type="button" onclick="bb.insertCode('U', 'underline');" value="U" title="Underlined text" />
					<input type="button" onclick="bb.insertCode('QUOTE', 'quote');" value="Quote" title="Insert a quote" />
					<input type="button" onclick="bb.insertImage();" value="Image" title="Inset an image" />
					<input type="button" onclick="bb.insertLink();" value="Link" title="Insert a link" /><br /> 
				</p>
				<textarea name="news" rows="8" cols="50"><?php echo $news; ?></textarea><br />
				<script type="text/javascript">bb.init('news');</script> 
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		}
		else
		{ ?>
			<h2>Add News</h2>
			<script type="text/javascript" src="inc/messageboard.inc.js"></script>
			<form action="?edit_page=news" method="post">
			<p>
				Date/Time: <input type="text" name="dateshow" value='<?php echo date("F d, Y g:i a"); ?>' /><br /><br />
				<input type="hidden" name="date" value='<?php echo date("Y-m-d H:i:s"); ?>' />
				Submitted By: <input type="text" name="name" /><br /><br />
				News Title: <input type="text" name="title" /><br /><br />
				News:<br />
				<script type="text/javascript">var bb = new BBCode();</script>
				<p>
					<input type="button" onclick="bb.insertCode('B', 'bold');" value="B" title="Bold text" />
					<input type="button" onclick="bb.insertCode('I', 'italic');" value="I" title="Italic text" />
					<input type="button" onclick="bb.insertCode('U', 'underline');" value="U" title="Underlined text" />
					<input type="button" onclick="bb.insertCode('QUOTE', 'quote');" value="Quote" title="Insert a quote" />
					<input type="button" onclick="bb.insertImage();" value="Image" title="Inset an image" />
					<input type="button" onclick="bb.insertLink();" value="Link" title="Insert a link" /><br /> 
				</p>
				<textarea name="news" rows="8" cols="50"></textarea><br />
				<script type="text/javascript">bb.init('news');</script> 
				<input type="submit" name="submit" value="Submit" />&nbsp;&nbsp;<input type="reset" />
			</p>
			</form>
		<?php
		} //close $_POST['submit'] else statement
		?>
		</div>
		<div class="half">
		<h2>News</h2>
		<?php
		$result = mysql_query("SELECT * FROM bcs_news ORDER BY date DESC")  or die(mysql_error());
		while($r=mysql_fetch_array($result))
		{
			$id=$r["id"];
			$title=$r["title"];
			$news=$r["news"];
			$date=$r["date"];
			$name=$r["name"];
			echo '<p><b>'.$title.'</b> <i>'. date("F d, Y g:i a", strtotime($date)) .'</i><br />';
			echo $news.'<br />';
			echo '<i>Submitted by:</i> '.$name.'<br/>';
			echo '<form action="?edit_page=news" method="post">';
			echo '<input type="submit" value="Del" name="del" />';
			echo '<input type="submit" value="Edit" name="edit" />';
			echo '<input type="hidden" name="id" value="'.$id.'" />';
			echo '</form></p>';
		}
		?>
		</div> 
	</div> <!-- end of col2 div -->
	<div id="footer"><?php echo $release; ?></div>
<?php
} // end session else
?> 