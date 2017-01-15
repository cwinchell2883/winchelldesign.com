<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: class.newuser.php
## Created: 9-17-2010
## Updated: --
####

class User 
{
	public $user_active = 0;
	private $clean_email;
	public $status = false;
	private $clean_password;
	private $clean_username;
	private $unclean_username;
	private $clean_group;
	public $sql_failure = false;
	public $mail_failure = false;
	public $email_taken = false;
	public $username_taken = false;
	public $activation_token = 0;
	
	function __construct($user,$pass,$email,$group)
	{
		// Used for display only
		$this->unclean_username = $user;
		
		// Sanitize
		$this->clean_email = sanitize($email);
		$this->clean_password = trim($pass);
		$this->clean_username = sanitize($user);
		$this->clean_group = sanitize($group);
		
		if(usernameExists($this->clean_username))
		{
			$this->username_taken = true;
		}
		else if(emailExists($this->clean_email))
		{
			$this->email_taken = true;
		}
		else
		{
			// No problems have been found.
			$this->status = true;
		}
	}
	
	public function addUser()
	{
		global $db,$emailActivation,$websiteUrl,$db_table_prefix;
	
		// Prevent this function being called if there were construction errors
		if($this->status)
		{
			// Construct a secure hash for the plain text password
			$secure_pass = generateHash($this->clean_password);
			
			// Do we need to send out an email?
			if($emailRegistration)
			{
				$this->user_active = 1;
			
				$mail = new phpMail();
			
				// Build the activation message
				$activation_message = "Your account has been activated. Please log in to the Manufacturing Portal at the below url: \n\n ".$websiteUrl."login.php";
				
				// Define more to build larger structures
				$hooks = array(
					"searchStrs" => array("#ACTIVATION-MESSAGE","#ACTIVATION-KEY","#USERNAME#"),
					"subjectStrs" => array($activation_message,$this->activation_token,$this->unclean_username)
				);
				
				// Build the template
				if(!$mail->newTemplateMsg("new-registration.txt",$hooks))
				{
					$this->mail_failure = true;
				}
				else
				{
					// Send the mail. Specify users email here and subject.				
					if(!$mail->sendMail($this->clean_email,"New User"))
					{
						$this->mail_failure = true;
					}
				}
			}
			else
			{
				// No email activation
				$this->user_active = 1;
			}	
	
	
			if(!$this->mail_failure)
			{
					// Insert the user into the database
					$sql = "INSERT INTO `".$db_table_prefix."Users` (
							`Username`,
							`Username_Clean`,
							`Password`,
							`Email`,
							`LostPasswordRequest`, 
							`Active`,
							`Group_ID`,
							`SignUpDate`,
							`LastSignIn`
							)
					 		VALUES (
							'".$db->sql_escape($this->unclean_username)."',
							'".$db->sql_escape($this->clean_username)."',
							'".$secure_pass."',
							'".$db->sql_escape($this->clean_email)."',
							'0',
							'".$this->user_active."',
							'".$db->sql_escape($this->clean_group)."',
							'".time()."',
							'0'
							)";
					 
				return $db->sql_query($sql);
			}
		}
	}
}

?>