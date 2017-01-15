<?php
session_start();
if (!session_is_registered('username'))  {
	echo '<div id="header"><h1>' . $site_name . '</h1></div><div id="gutter"></div><div id="col1">';
	showNav();
	echo '</div><div id="col2"><h1>Access Denied! You must login.</h1>';
	include 'inc/login_form.inc.php';
	echo '</div><div id="footer">' . $release . '</div>';
}
else
{
?>
<div id="header"><h1><?php echo $site_name ?></h1></div>
<div id="gutter"></div>
<div id="col1">
	<a name="top">&nbsp;</a>
	<?php showNav(); ?>
</div>
<div id="col2">
<?php
mysql_connect($mysql_host, $mysql_user, $mysql_pass) or die(mysql_error());
mysql_select_db($mysql_db) or die(mysql_error());

// Submit A New Post
if ($_POST['post_submit']) {
	$subject = $_POST['subject'];
	if(empty($subject)) { $subject = "subject"; }
	$name = $_POST['name'];
	$email = $_POST['email'];
	$post = $_POST['post'];
	mysql_query("INSERT INTO bcs_threads (id, subject, startedby, updated, updatedby) VALUES ('NULL', '$subject', " . $_SESSION['id'] . ", NOW(), " . $_SESSION['id'] . ")") or die('Thread could not be created: ' . mysql_error());
	$result = mysql_query("SELECT max(id) AS id FROM bcs_threads");
	$foundid = mysql_fetch_array($result);
	$new_thread_id = $foundid['id'];
	mysql_query("INSERT INTO bcs_posts (id, date, thread, member, post) VALUES ('NULL', NOW(), $new_thread_id, $name, '$post')") or die('Post could not be created: ' . mysql_error());
	echo "<meta http-equiv='refresh' content='0;URL=?page=board&thread=" . $new_thread_id . "'>";
}

// Submit A Reply to A Post
if ($_POST['reply_submit']) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$post = $_POST['post'];
	$thread_id = $_POST['thread_id'];
	mysql_query("UPDATE bcs_threads SET updated=NOW(), updatedby=$name WHERE id=$thread_id") or die('Thread could not be updated: ' . mysql_error());
	mysql_query("INSERT INTO bcs_posts (id, date, thread, member, post) VALUES ('NULL', NOW(), $thread_id, $name, '$post')") or die('Post could not be created: ' . mysql_error());
	echo "<meta http-equiv='refresh' content='0;URL=?page=board&thread=" . $thread_id . "'>";
}

// Submit Editing A Post
if ($_POST['edit_submit']) {
	$id = $_POST['id'];
	$thread_id = $_POST['thread_id'];
	$post = $_POST['post'];
	$post = $post . "\n\n[i]Edited " . date('n/d/Y h:ia') . "[/i]";
	mysql_query("UPDATE bcs_posts SET post='$post' WHERE id=$id") or die('Editing could not be finished: ' . mysql_error());
	echo "<meta http-equiv='refresh' content='0;URL=?page=board&thread=" . $thread_id . "'>";
}

// Displaying the Post you want to Edit
if ($_GET['edit']) {
	$id = $_GET['edit'];
	$result = mysql_query("SELECT * FROM bcs_posts WHERE id = $id") or die('Could not edit your posts: ' . mysql_error());
	while($r=mysql_fetch_array($result)) {
		$post = $r['post'];
		$thread_id = $r['thread'];
	} ?>
	<script type="text/javascript" src="inc/messageboard.inc.js"></script>
	<form method="post" name="editpost" action="?page=board">
		<h1>Edit</h1>
		<p><label for="showname">Name</label>: <input type="text" disabled="disabled" name="showname" id="showname" title="Your Name" value="<?php echo $_SESSION['username']; ?>" size="50" /></p>
		<p><label for="email">Email</label>: <input type="text" disabled="disabled" name="email" id="email" title="Your Email Address" value="<?php echo $_SESSION['email']; ?>" size="50" /></p>
		<script type="text/javascript">var bb = new BBCode();</script>
		<p>
			<input type="button" onclick="bb.insertCode('B', 'bold');" value="B" title="Bold text" />
			<input type="button" onclick="bb.insertCode('I', 'italic');" value="I" title="Italic text" />
			<input type="button" onclick="bb.insertCode('U', 'underline');" value="U" title="Underlined text" />
			<input type="button" onclick="bb.insertCode('QUOTE', 'quote');" value="Quote" title="Insert a quote" />
			<input type="button" onclick="bb.insertImage();" value="Image" title="Inset an image" />
			<input type="button" onclick="bb.insertLink();" value="Link" title="Insert a link" /><br /> 
		</p>
		<p><textarea name="post" id="post" rows="10" cols="100"><?php echo $post; ?></textarea></p>
		<script type="text/javascript">bb.init('post');</script> 
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>"/>
		<p id="smileys"><?php displaySmileys(); ?></p>
		<input class="btn" type="submit" name="edit_submit" value="Submit"/>
	</form>
	<?php 

// Showing a Thread of Posts
} elseif ($_GET['thread']) {
	$thread_id = $_GET['thread'];
	echo '<br/><p><a href="?page=board">Message Board Home</a></p>';
	$alt = 0;
	$result = mysql_query("SELECT bcs_posts.id, thread, name, post, subject, email, bcs_posts.`date`, member FROM bcs_posts, bcs_threads, bcs_members WHERE thread = $thread_id AND bcs_threads.id = thread AND member = bcs_members.id ORDER BY bcs_posts.id") or die('Could not display posts: ' . mysql_error());
	while($r=mysql_fetch_array($result)) {
		$id = $r['id'];
		$thread_id = $r['thread'];
		$subject = $r['subject'];
		if ($alt > 0) { $subject = "RE: " . $subject; }
		$name = $r['name'];
		$email = $r['email'];
		if (empty($email)) { $email_name = $name; } else { $email_name = '<a href="mailto:' . $email . '">' . $name . '</a>'; }
		$post = $r['post'];
		$date = $r['date'];
		$date = date('n/d/Y h:ia', strtotime($date));
		$member = $r['member'];
		if ($alt % 2 == 0) { echo '<div class="altposts">'; } else {  echo '<div class="posts">'; }
		echo '<div class="subject"><b>' . $subject . '</b> - ' . $date . '</div>';
		echo '<div class="post">';
		parse($post);
		echo '</div>';
		if ($member == $_SESSION['id']) { echo '<div class="name"><b>' . $email_name . '</b><span class="edit"> [<a href="?page=board&edit=' . $id . '">edit post</a>]</span></div>'; }
		else { echo '<div class="name"><b>' . $email_name . '</b></div>'; }
		echo '</div>';
		$alt++;
	} ?>
	<script type="text/javascript" src="inc/messageboard.inc.js"></script>
	<form method="post" action="?page=board">
		<h1>Reply</h1>
		<div style="text-align: right;"><a href="#top">top of page</a></div>
		<p><label for="showname">Name</label>: <input type="text" disabled="disabled" name="showname" id="showname" title="Your Name" value="<?php echo $_SESSION['username']; ?>" size="50" /></p>
		<p><label for="email">Email</label>: <input type="text" disabled="disabled" name="email" id="email" title="Your Email Address" value="<?php echo $_SESSION['email']; ?>" size="50" /></p>
		<script type="text/javascript">var bb = new BBCode();</script>
		<p>
			<input type="button" onclick="bb.insertCode('B', 'bold');" value="B" title="Bold text" />
			<input type="button" onclick="bb.insertCode('I', 'italic');" value="I" title="Italic text" />
			<input type="button" onclick="bb.insertCode('U', 'underline');" value="U" title="Underlined text" />
			<input type="button" onclick="bb.insertCode('QUOTE', 'quote');" value="Quote" title="Insert a quote" />
			<input type="button" onclick="bb.insertImage();" value="Image" title="Inset an image" />
			<input type="button" onclick="bb.insertLink();" value="Link" title="Insert a link" /><br /> 
		</p>
		<p><textarea name="post" id="post" rows="10" cols="100" onFocus="removeDefault('message', this);" onBlur="setBackDefault('message', this);">message</textarea></p>
		<script type="text/javascript">bb.init('post');</script> 
		<input type="hidden" name="thread_id" value="<?php echo $thread_id; ?>"/>
		<input type="hidden" name="name" id="name" value="<?php echo $_SESSION['id']; ?>"/>
		<p id="smileys"><?php displaySmileys(); ?></p>
		<input type="submit" name="reply_submit" value="Submit"/>
	</form>
	<?php

// Show Tools (Today/My Posts/Search)
} elseif ($_GET['show']) {
	$show = $_GET['show'];
	if ($show == "today") {
		$today = date('Ymd') . "000000";
		$today_end = date('Ymd') . "245959";
		$result = mysql_query ("SELECT bcs_threads.id, subject, startedby, updated, updatedby, member FROM bcs_threads, bcs_posts WHERE bcs_threads.id = bcs_posts.thread AND updated BETWEEN " . $today . " AND " . $today_end . " GROUP BY bcs_threads.id ORDER BY updated DESC") or die("Could not display todays posts (p1): " . mysql_error());
	} elseif ($show == "my") { 
		$result = mysql_query ("SELECT bcs_threads.id, subject, startedby, updated, updatedby, member FROM bcs_threads, bcs_posts WHERE bcs_threads.id = bcs_posts.thread AND member = " . $_SESSION['id'] . " GROUP BY bcs_threads.id ORDER BY updated DESC") or die("Could not display todays posts (p1): " . mysql_error());
	} else {
		echo die("<p>This feature is currently under construction, please try again later.</p>");
	}
	echo "<br/><p><a href=\"?page=board\">Message Board Home</a></p>";
	echo "<table id=\"board\"><tr><th class=\"sub\">Subject</th><th class=\"start\">Started By</th><th class=\"rep\">Replies</th><th class=\"up\">Last Updated</th></tr>";
	$alt = 0;
	while($r=mysql_fetch_array($result)) {
		$thread = $r['id'];
		$startedby = $r['startedby'];
		$updated = $r['updated'];
		$updatedby = $r['updatedby'];
		$subject = $r['subject'];
		$last_updated = 'error';
		$updatedby_result = mysql_query("SELECT name FROM bcs_members WHERE bcs_members.id = $updatedby") or die('Could not display thread count: ' . mysql_error());
		$updatedby_found = mysql_fetch_array($updatedby_result);
		$updatedby = $updatedby_found['name'];
		$startedby_result = mysql_query("SELECT name FROM bcs_members WHERE bcs_members.id = $startedby") or die('Could not display thread count: ' . mysql_error());
		$startedby_found = mysql_fetch_array($startedby_result);
		$startedby = $startedby_found['name'];
		if (date('n/d/Y', strtotime($updated)) == date('n/d/Y')) {
			$subject = "<img src =\"images/today.gif\"> " . $subject;
			$last_updated = "<img src=\"images/today.gif\"/> Today at " . date('h:ia', strtotime($updated)) . " by " . $updatedby;
		} elseif (date('n/d/Y', strtotime($updated)) == date('n/d/Y', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")))) {
			$subject = "<img src =\"images/yesterday.gif\"> " . $subject;
			$last_updated = "<img src=\"images/yesterday.gif\"/> Yesterday at " . date('h:ia', strtotime($updated)) . " by " . $updatedby;
		} else {
			$last_updated = date('m/d/Y h:ia', strtotime($updated)) . " by " . $updatedby;
		}
		if ($alt % 2 == 0) { echo '<tr>'; } else { echo '<tr class="altrow">'; }
		echo '<td><a href="?page=board&thread=' . $thread . '">' . $subject . '</a></td><td>' . $startedby . '</td><td class="rep">(' . getNumberOfPosts($thread) . ')</td><td>' . $last_updated . '</td></tr>';
		$alt++;
	}
	echo "</table>";

// Display the Thread List
} else {
	echo "<br/>\n<div style=\"text-align: right;\"><a href=\"?page=board&show=today\">Today</a> | <a href=\"?page=board&show=my\">My Posts</a> | <a href=\"#new\">Post New</a></div>";
	$page = 1;
	if ($_GET['boardpage']) { $page = $_GET['boardpage']; }
	$from = (($page * 50) - 50); 
	$result = mysql_query("SELECT bcs_threads.id, subject, startedby, updated, updatedby, member FROM bcs_threads, bcs_posts "
		. "WHERE bcs_threads.id = bcs_posts.thread GROUP BY bcs_threads.id ORDER BY updated DESC LIMIT " . $from . ", 50") or die('Could not display threads: ' . mysql_error());
	echo "<table id=\"board\"><tr><th class=\"sub\">Subject</th><th class=\"start\">Started By</th><th class=\"rep\">Replies</th><th class=\"up\">Last Updated</th></tr>";
	$alt = 0;
	while($r=mysql_fetch_array($result)) {
		$thread = $r['id'];
		$startedby = $r['startedby'];
		$updated = $r['updated'];
		$updatedby = $r['updatedby'];
		$subject = $r['subject'];
		$last_updated = 'error';
		$updatedby_result = mysql_query("SELECT name FROM bcs_members WHERE bcs_members.id = $updatedby") or die('Could not display thread count: ' . mysql_error());
		$updatedby_found = mysql_fetch_array($updatedby_result);
		$updatedby = $updatedby_found['name'];
		$startedby_result = mysql_query("SELECT name FROM bcs_members WHERE bcs_members.id = $startedby") or die('Could not display thread count: ' . mysql_error());
		$startedby_found = mysql_fetch_array($startedby_result);
		$startedby = $startedby_found['name'];
		if (date('n/d/Y', strtotime($updated)) == date('n/d/Y')) {
			$subject = "<img src =\"images/today.gif\"> " . $subject;
			$last_updated = "<img src=\"images/today.gif\"/> Today at " . date('h:ia', strtotime($updated)) . " by " . $updatedby;
		} elseif (date('n/d/Y', strtotime($updated)) == date('n/d/Y', mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")))) {
			$subject = "<img src =\"images/yesterday.gif\"> " . $subject;
			$last_updated = "<img src=\"images/yesterday.gif\"/> Yesterday at " . date('h:ia', strtotime($updated)) . " by " . $updatedby;
		} else {
			$last_updated = date('m/d/Y h:ia', strtotime($updated)) . " by " . $updatedby;
		}
		if ($alt % 2 == 0) { echo '<tr>'; } else { echo '<tr class="altrow">'; }
		echo '<td><a href="?page=board&thread=' . $thread . '">' . $subject . '</a></td><td>' . $startedby . '</td><td class="rep">(' . getNumberOfPosts($thread) . ')</td><td>' . $last_updated . '</td></tr>';
		$alt++;
	}
	echo "</table>";
	$answer = mysql_query("SELECT count(id) AS c FROM bcs_threads") or die('Could not count threads: ' . mysql_error());
	while($rrr=mysql_fetch_array($answer)) { $threadcount = $rrr['c']; }
	$total_pages = ceil($threadcount / 50); 
	echo "<p style=\"text-align: center;\">Select a Page<br />"; 
	if($page > 1) { 
		$prev = ($page - 1); 
		echo "<a href=\"".$_SERVER['PHP_SELF']."?boardpage=$prev\">&lt;&lt;Previous</a> "; 
	} 
	for($i = 1; $i <= $total_pages; $i++) { 
		if(($page) == $i) { echo "$i "; } else { echo "<a href=\"".$_SERVER['PHP_SELF']."?boardpage=$i\">$i</a> "; } 
	} 
	if($page < $total_pages) { 
		$next = ($page + 1); 
		echo "<a href=\"".$_SERVER['PHP_SELF']."?boardpage=$next\">Next>></a>"; 
	} 
	echo "</p>"; 
	?>
<a name="new">&nbsp;</a>
	<script type="text/javascript" src="inc/messageboard.inc.js"></script>
	<form method="post" name="post_submit" action="?page=board">
		<h1>New Message</h1>
		<p><label for="subject">Subject</label>: <input type="text" name="subject" id="subject" title="Message Subject" value="subject" size="50" onFocus="removeDefault('subject', this);" onBlur="setBackDefault('subject', this);" /></p>
		<p><label for="showname">Name</label>: <input type="text" disabled="disabled" name="showname" id="showname" title="Your Name" value="<?php echo $_SESSION['username']; ?>" size="50" /></p>
		<p><label for="email">Email</label>: <input type="text" disabled="disabled" name="email" id="email" title="Your Email Address" value="<?php echo $_SESSION['email']; ?>" size="50" /></p>
		<script type="text/javascript">var bb = new BBCode();</script>
		<p>
			<input type="button" onclick="bb.insertCode('B', 'bold');" value="B" title="Bold text" />
			<input type="button" onclick="bb.insertCode('I', 'italic');" value="I" title="Italic text" />
			<input type="button" onclick="bb.insertCode('U', 'underline');" value="U" title="Underlined text" />
			<input type="button" onclick="bb.insertCode('QUOTE', 'quote');" value="Quote" title="Insert a quote" />
			<input type="button" onclick="bb.insertImage();" value="Image" title="Inset an image" />
			<input type="button" onclick="bb.insertLink();" value="Link" title="Insert a link" /><br /> 
		</p>
		<p><textarea name="post" id="post" rows="10" cols="100" onFocus="removeDefault('message', this);" onBlur="setBackDefault('message', this);">message</textarea></p>
		<script type="text/javascript">bb.init('post');</script> 
		<p><?php displaySmileys(); ?></p>
		<input type="hidden" name="name" id="name" value="<?php echo $_SESSION['id']; ?>"/>
		<input type="submit" name="post_submit" value="Submit"/>
	</form>
	<?php
} ?>
</div>
<div id="footer"><?php echo $release; ?></div>
<?php } ?>