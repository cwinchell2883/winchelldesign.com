<?php
		/*
			Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
			Copyright (C) 2002 Andrew Fenn
		
			This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
		
			This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
		
			You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
		*/

if (!isset($_GET['step'])) $_GET['step'] = '';
switch($_GET['step']) {
	default:
		?>
  		<br /><br />
  		<div style="padding-left: 100px;">
  			<div style="float:left; text-align:center;"><a href="index.php?lang=english&amp;step=0"><img src="lang/english/flag_english.png" alt="English" /></a><br /><a href="index.php?lang=english&amp;step=0">English</a></div>
  			<div style="float:left; text-align:center; padding-left: 30px;"><a href="index.php?lang=italian&amp;step=0"><img src="lang/italian/flag_italian.png" alt="Italian" /></a><br /><a href="index.php?lang=italian&amp;step=0">Italian</a></div>
  			<div style="float:left; text-align:center; padding-left: 30px;"><a href="index.php?lang=portuguese&amp;step=0"><img src="lang/portuguese/flag_portuguese.png" alt="Portuguese" /></a><br /><a href="index.php?lang=portuguese&amp;step=0">Portuguese</a></div>
  			<div style="float:left; text-align:center; padding-left: 30px;"><a href="index.php?lang=turkish&amp;step=0"><img src="lang/turkish/flag_turkish.png" alt="Turkish" /></a><br /><a href="index.php?lang=turkish&amp;step=0">Turkish</a></div>
  		</div>
  		<?php
	break;
	case 'upgrade':
				/* Update to 0.4.2 */
				require('../includes/configure.php');
				$file = file_get_contents('upgrades/0.4.1.sql');
				$file = str_replace('pcm', MYSQL_PREFIX, $file);
				
				$connect = mysql_connect(MYSQL_ADDRESS,MYSQL_USERNAME,MYSQL_PASSWORD) or die('<p>'.$lang['part4_connect_fail'].'</p><p>'.$lang['part4_error'].'</p><p style="color:#950707; padding-left:40px; width:500px;">'.mysql_error().'</p><div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=0">'.$lang['part2_goback'].'</a></div>');
				mysql_select_db(MYSQL_DATABASE) or die('<p>'.$lang['part3dbfail'].'</p><p>'.$lang['part4_error'].'</p><p style="color:#950707; padding-left:40px; width:500px;">'.mysql_error().'</p><div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=0">'.$lang['part2_goback'].'</a></div>');
			
				$query_split = preg_split ("/[;]+/", $file);
				foreach ($query_split as $command_line) {
						$command_line = trim($command_line);
   						if ($command_line != '') {
     						$query_result = mysql_query($command_line);
     						if ($query_result == 0) {
								echo '<p>'.$lang['part4_error'].'</p><p style="color:#950707; padding-left:40px; width:500px;">'.mysql_error().'</p>';
								$error = true;
       							break;
     						}
   						}
				}
				if ($error == false) echo $lang['upgrade_done'];
	break;
	case '0':
		?><h3><?php echo $lang['part0_title'];?></h3>
		<?php
			echo $lang['part0'];
			if (!empty($lang['translator'])) echo $lang['translator'];
		?>
		<div style="float:right; padding-right: 50px;"><a href="index.php?step=1"><img src="img/install.jpg" alt="<?php echo $lang['install']; ?>" style="vertical-align: middle;" /></a>&nbsp;<a href="index.php?step=1"><?php echo $lang['install']; ?></a><br /><a href="index.php?step=upgrade"><img src="img/install.jpg" alt="<?php echo $lang['upgrade']; ?>" style="vertical-align: middle;" /></a>&nbsp;<a href="index.php?step=upgrade"><?php echo $lang['upgrade']; ?> 0.4.1</a></div>
		<br /><br /><br />
		<?php
	break;
	case '1':
			?><p><?php echo $lang['part1']; ?></p><div style="padding-left: 40px;"><?php
			if (is_writeable('../images') && is_writeable('../images/gallery') && is_writeable('../images/ranks') && is_writeable('../images/files/') && is_writeable('../images/events') && is_writeable('../images/users')) {
			  ?><p style="color: green;"><?php echo $lang['part1_image_writable']; ?></p><?php
			} else {
				if (@chmod('../images', 0666)) {
					?><p style="color: green;"><?php echo $lang['part1_image_writable']; ?></p><?php
				} else {
					?><p style="color: red;"><?php echo $lang['part1_image_not_writable']; ?></p><?php
					$stop = true;
				}
			}
			if (is_writable('../files')) {
				?><p style="color:green;"><?php echo $lang['part1_files_writable']; ?></p><?php
			} else {
				if (@chmod('../files', 0666)) {
					?><p style="color:green;"><?php echo $lang['part1_files_writable']; ?></p><?php
				} else {
					?><p style="color: red;"><?php echo $lang['part1_files_not_writable']; ?></p><?php
					$stop = true;
				}
			}
			if (file_exists('../includes/configure.php')) {
				if (is_writable('../includes/configure.php')) {
					?><p style="color:green;"><?php echo $lang['part1_config_writable']; ?></p><?php
				} else {
					if (@chmod('../includes/configure.php', 0666)) {
						?><p style="color:green;"><?php echo $lang['part1_config_writable']; ?></p><?php
					} else {
						?><p style="color: red;"><?php echo $lang['part1_config_not_writable']; ?></p><?php
						$stop = true;
					}
				}
			} else {
				?><p style="color: red;"><?php echo $lang['part1_config_not_there']; ?></p><?php
				$stop = true;
			}

			if (is_writable('../includes/libs/compiled')) {
					?><p style="color:green;"><?php echo $lang['part1_compiled_writable']; ?></p><?php
			} else {
				if (@chmod('../includes/libs/compiled', 0666)) {
					?><p style="color:green;"><?php echo $lang['part1_compiled_writable']; ?></p><?php
				} else {
					?><p style="color: red;"><?php echo $lang['part1_compiled_not_writable']; ?></p><?php
					$stop = true;
				}
			}
			
			
			?></div><div style="float:right; width:200px;"><?php if(empty($stop)) { ?><a href="index.php?step=2"><?php echo $lang['continue']; ?></a><?php } else { ?><a href="index.php?step=1"><?php echo $lang['part2_refresh']; ?></a><?php } ?></div>
			<?php
	break;
	case '2':
			?><br />
			<p><?php echo $lang['part2']; ?></p>
			<div style="width:450px !important; width:550px; padding-left:100px;">
				<form action="index.php?step=3" method="post">
					<div style="float:left; width:200px; height:20px;"><?php echo $lang['part2_address']; ?></div><div style="width:150px; float:left; padding-right: 10px;"><input type="text" name="address" value="localhost" style="width:150px;"/></div><div style="width:50px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_mysql_address']; ?>', this, event, '250px')" /></div>
					<div style="float:left; width:200px; height:20px;"><?php echo $lang['part2_database']; ?></div><div style="width:150px; float:left;padding-right: 10px;"><input type="text" name="database" style="width:150px;" /></div><div style="width:50px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_mysql_database']; ?>', this, event, '250px')" /></div>
					<div style="float:left; width:200px; height:20px;"><?php echo $lang['part2_username']; ?></div><div style="width:150px; float:left;padding-right: 10px;"><input type="text" name="username" style="width:150px;" /></div><div style="width:50px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_mysql_username']; ?>', this, event, '200px')" /></div>
					<div style="float:left; width:200px; height:20px;"><?php echo $lang['part2_password']; ?></div><div style="width:150px; float:left;padding-right: 10px;"><input type="password" name="password" style="width:150px;" /></div><div style="width:50px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_mysql_password']; ?>', this, event, '200px')" /></div>
					<div style="float:left; padding-top:10px; width:200px;"><?php echo $lang['part2_prefix']; ?></div><div style="padding-top: 10px; width:150px; float:left;padding-right: 10px;"><input type="text" name="prefix" value="pcm" style="width:150px;" /></div><div style="width:50px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" style="padding-top:6px;" onMouseover="showhint('<?php echo $lang['desc_mysql_prefix']; ?>', this, event, '200px')" /></div>
					<div style="float:right; padding-top:20px; width:300px;"><input type="submit" value="<?php echo $lang['continue']; ?>" /></div>
				</form>
			</div>
			<?php
	break;
	case '3':
			$config = file_get_contents('configure.php');
			$config = str_replace('<!--ADDRESS--!>', $_POST['address'], $config);
			$config = str_replace('<!--DATABASE--!>', $_POST['database'], $config);
			$config = str_replace('<!--USERNAME--!>', $_POST['username'], $config);
			$config = str_replace('<!--PASSWORD--!>', $_POST['password'], $config);
			$config = str_replace('<!--PREFIX--!>', $_POST['prefix'], $config);
			if(!$file = fopen("../includes/configure.php", "w")) {
			 		?><p><?php 
					echo $lang['part3_not_written'];
			 		 ?></p><div style="width:500px; padding-left:20px;"><textarea style="width:500px; height:200px;"><?php echo $config; ?></textarea></div>
			 		 <?php
			} else {
					 fwrite($file, $config);
					 fclose($file);
					 ?><br /><p><?php echo $lang['part3_written']; ?></p><div style="float:right; width:200px;"><a href="index.php?step=4"><?php echo $lang['part4_continue']; ?></a></div><?php
			}
	break;
	case '4':
			require('../includes/configure.php');
			$file = file_get_contents('database.sql');
			$file = str_replace('pcm', MYSQL_PREFIX, $file);
			
			$file = str_replace('lang[language]', $_SESSION['language'], $file);
			/* Insert the correct language for the menus */
			$file = str_replace('lang[install_menu_1]', $lang['install_menu_1'], $file);
			$file = str_replace('lang[install_menu_2]', $lang['install_menu_2'], $file);
			$file = str_replace('lang[install_menu_3]', $lang['install_menu_3'], $file);
			$file = str_replace('lang[install_menu_4]', $lang['install_menu_4'], $file);
			$file = str_replace('lang[install_menu_5]', $lang['install_menu_5'], $file);
			$file = str_replace('lang[install_menu_6]', $lang['install_menu_6'], $file);
			$file = str_replace('lang[install_menu_7]', $lang['install_menu_7'], $file);
			$file = str_replace('lang[install_menu_8]', $lang['install_menu_8'], $file);
			$file = str_replace('lang[install_menu_9]', $lang['install_menu_9'], $file);
			$file = str_replace('lang[install_menu_10]', $lang['install_menu_10'], $file);
			$file = str_replace('lang[install_menu_11]', $lang['install_menu_11'], $file);
			
			/* Insert correct language for the modules */
			$file = str_replace('lang[install_module1]', $lang['install_module1'], $file);
			$file = str_replace('lang[install_module2]', $lang['install_module2'], $file);
			$file = str_replace('lang[install_module3]', $lang['install_module3'], $file);
			$file = str_replace('lang[install_module4]', $lang['install_module4'], $file);
			$file = str_replace('lang[install_module5]', $lang['install_module5'], $file);
			$file = str_replace('lang[install_module6]', $lang['install_module6'], $file);
			$file = str_replace('lang[install_module7]', $lang['install_module7'], $file);
			$file = str_replace('lang[install_module8]', $lang['install_module8'], $file);
			$file = str_replace('lang[install_module9]', $lang['install_module9'], $file);
			$file = str_replace('lang[install_module10]', $lang['install_module10'], $file);
			
			/* Insert correct language for emails */
			$file = str_replace('lang[install_email_1_subject]', $lang['install_email_1_subject'], $file);
			$file = str_replace('lang[install_email_2_subject]', $lang['install_email_2_subject'], $file);
			$file = str_replace('lang[install_email_1_text]', $lang['install_email_1_text'], $file);
			$file = str_replace('lang[install_email_2_text]', $lang['install_email_2_text'], $file);
			
			/* Insert the correct language for ranks */
			$file = str_replace('lang[install_rank1]', $lang['install_rank1'], $file);
			$file = str_replace('lang[install_rank2]', $lang['install_rank2'], $file);
			
			$connect = mysql_connect(MYSQL_ADDRESS,MYSQL_USERNAME,MYSQL_PASSWORD) or die('<p>'.$lang['part4_connect_fail'].'</p><p>'.$lang['part4_error'].'</p><p style="color:#950707; padding-left:40px; width:500px;">'.mysql_error().'</p><div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=2">'.$lang['part2_goback'].'</a></div>');
			mysql_select_db(MYSQL_DATABASE) or die('<p>'.$lang['part3dbfail'].'</p><p>'.$lang['part4_error'].'</p><p style="color:#950707; padding-left:40px; width:500px;">'.mysql_error().'</p><div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=2">'.$lang['part2_goback'].'</a></div>');
			
			$query_split = preg_split ("/[;]+/", $file);
			foreach ($query_split as $command_line) {
					$command_line = trim($command_line);
   					if ($command_line != '') {
     					$query_result = mysql_query($command_line);
     						if ($query_result == 0) {
								echo '<p>'.$lang['part4_error'].'</p><p style="color:#950707; padding-left:40px; width:500px;">'.mysql_error().'</p>';
								$error = true;
       							break;
     						}
   					}
			}
			
			if (empty($error)) {
					$_GET['step'] = 5;
					header('location: index.php?step=5');
					exit;
			} else {
						echo '<div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=2">'.$lang['part2_goback'].'</a></div>';	
			}
	break;
	case '5':
			/* This is repeated incase someone clicks the refresh button */
			?><p><?php echo $lang['part4']; ?></p><p><?php echo $lang['part4_reminder']; ?></p>
					<div style="width:400px !important; width:500px; padding-left:100px;">
						<form action="index.php?step=6" method="post">
							<div style="float:left; width:200px;"><?php echo $lang['part4_username']; ?></div><div style="width:150px; float:left;"><input type="text" name="username" style="width:140px;" maxlength="100" /></div><div style="width:25px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_user_name']; ?>', this, event, '250px')" /></div>
							<div style="float:left; width:200px;"><?php echo $lang['part4_password']; ?></div><div style="width:150px; float:left;"><input type="password" style="width:140px;" name="password" maxlength="100" /></div><div style="width:25px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_user_pass']; ?>', this, event, '250px')" /></div>
							<div style="float:left; width:200px;"><?php echo $lang['part4_password2']; ?></div><div style="width:150px; float:left;"><input type="password"  style="width:140px;" name="password2" maxlength="100" /></div><div style="width:25px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_user_pass']; ?>', this, event, '250px')" /></div>
							<div style="float:left; width:200px;"><?php echo $lang['part4_email']; ?></div><div style="width:150px; float:left;"><input type="text" name="email" style="width:140px;" maxlength="255" /></div><div style="width:25px; text-align:left; float:left;"><img src="img/help.png" alt="" class="hintanchor" onMouseover="showhint('<?php echo $lang['desc_user_email']; ?>', this, event, '250px')" /></div>
							<div style="float:right; padding-top:20px; width:300px;"><input type="submit" value="<?php echo $lang['continue']; ?>" /></div>
						</form>
					</div>
			<?php
	break;
	case '6':
		require('../includes/post.php');
		$post = new Post();
		if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['password2'])) {
			if ($_POST['password'] === $_POST['password2']) {
				if ($post->LoginFilter($_POST['username']) && $post->LoginFilter($_POST['password'])) {
					require('../includes/configure.php');
					if (empty($_POST['email'])) $_POST['email'] = '';
					$sql = "INSERT IGNORE INTO ".MYSQL_PREFIX."_users (`u_id`, `u_name`, `u_password`, `r_id`, `u_email`, `u_join`, `u_pic`) VALUES ('1', '".$_POST['username']."', '".md5($_POST['password'])."', '1', '".$_POST['email']."', NOW(), 'images/default.jpg')";
					$connect = mysql_connect(MYSQL_ADDRESS, MYSQL_USERNAME, MYSQL_PASSWORD);
					mysql_select_db(MYSQL_DATABASE, $connect);
					mysql_query($sql, $connect) or die('<p>'.$lang['part4_error'].'</p><p style="color:#950707; padding-left:40px; width:500px;">'.mysql_error().'</p><div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=5">'.$lang['part2_goback'].'</a></div>');
					?>
						<p><?php echo $lang['complete']; ?></p><br /><br /><div style="float:right; width:200px; padding-top: 50px;"><a href="../index.php"><?php echo $lang['pcmhome']; ?></a></div>
					<?php
				} else {
					?><p><?php echo $lang['part4_alpha_num']; ?></p><?php
				echo '<div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=5">'.$lang['part2_goback'].'</a></div>';
				}
			} else {
				?><p><?php echo $lang['part4_not_match']; ?></p><?php
				echo '<div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=5">'.$lang['part2_goback'].'</a></div>';
			}
		} else {
			?><p><?php echo $lang['part4_empty']; ?></p><?php
			echo '<div style="float:right; width:200px; padding-top: 50px;"><a href="index.php?step=5">'.$lang['part2_goback'].'</a></div>';
		}
	break;
}

?>
