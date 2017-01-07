		<?php if(!isUserLoggedIn()) { ?>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
       <?php } elseif($loggedInUser->isGroupMember(1)) { ?>
       		<ul>
                <li><a href="index.php">Home</a></li>
            	<li><a href="account.php">Account Settings</a></li>
            	<li><a href="form.php">Enter Data</a></li>
            	<li><a href="logout.php">Logout</a></li>
       		</ul>
       <?php } elseif($loggedInUser->isGroupMember(2)) { ?>
       		<ul>
                <li><a href="index.php">Home</a></li>
            	<li><a href="account.php">Account Settings</a></li>
            	<li><a href="form.php">Enter Data</a></li>
            	<li><a href="search.php">Search</a></li>
            	<li><a href="logout.php">Logout</a></li>
       		</ul>
       <?php } else { ?>
       		<ul>
                <li><a href="index.php">Home</a></li>
            	<li><a href="account.php">Account Settings</a></li>
            	<li><a href="form.php">Enter Data</a></li>
            	<li><a href="search.php">Search</a></li>
            	<li><a href="admin.php">Admin Settings</a></li>
            	<li><a href="logout.php">Logout</a></li>
       		</ul>
       <?php } ?>
            
            <div id="build">
				<span><?php echo "Version: ".$version."<br />&copy; ".date("Y")."<br />Winchell Design"; ?></span>
            </div>
            
