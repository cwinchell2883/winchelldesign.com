<?php
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: class.mail.php
## Created: 9-17-2010
## Updated: --
####

class phpMail {

	// Text based system with hooks to replace various strs in txt email templates
	public $contents = NULL;

	// Function used for replacing hooks in our templates
	public function newTemplateMsg($template,$additionalHooks)
	{
		global $mail_templates_dir,$debug_mode;
	
		$this->contents = file_get_contents($mail_templates_dir.$template);

		// Check to see we can access the file && it has content
		if(!$this->contents || empty($this->contents))
		{
			if($debug_mode)
			{
				if(!$this->contents)
				{ 
					echo "Unable to open mail-templates directory. Perhaps try setting the mail directory to ".getenv("DOCUMENT_ROOT");
							
					die(); 
				}
				else if(empty($this->contents))
				{
					echo "Template file is empty... nothing to send"; 
					
					die();
				}
			}
		
			return false;
		}
		else
		{
			// Replace default hooks
			$this->contents = replaceDefaultHook($this->contents);
		
			// Replace defined && custom hooks
			$this->contents = str_replace($additionalHooks["searchStrs"],$additionalHooks["subjectStrs"],$this->contents);

			// Do we need to include an email footer?
			// Try and find the #INC-FOOTER hook
			if(strpos($this->contents,"#INC-FOOTER#") !== FALSE)
			{
				$footer = file_get_contents($mail_templates_dir."email-footer.txt");
				if($footer && !empty($footer)) $this->contents .= replaceDefaultHook($footer); 
				$this->contents = str_replace("#INC-FOOTER#","",$this->contents);
			}
			
			return true;
		}
	}
	
	public function sendMail($email,$subject,$msg = NULL)
	{
		global $websiteName,$emailAddress;
		
		$header = "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		$header .= "From: ". $websiteName . " <" . $emailAddress . ">\r\n";
		
		 
		// Check to see if we sending a template email.
		if($msg == NULL)
			$msg = $this->contents; 

		$message .= $msg;

		$message = wordwrap($message, 70);
			
		return mail($email,$subject,$message,$header);
	}
}


?>