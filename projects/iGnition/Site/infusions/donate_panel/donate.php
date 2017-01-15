<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2010 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: donate.php
| Version: 1.00
| Author: Fangree Productions
| Developers: Fangree_Craig 
| Site: http://www.fangree.co.uk
+--------------------------------------------------------+
| Other Credits: 
| Special Thanks to Barspin for Assisting with admin and infusion.php
| Thanks to Paypal API.
| Testing  by Nostradamus
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/

require_once "../../maincore.php";
require_once THEMES."templates/header.php";
if (!defined("IN_FUSION")) { die("Access Denied"); }
// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."donate_panel/locale/".$settings['locale'].".php")) {
	// Load the locale file matching the current site locale setting.
	include INFUSIONS."donate_panel/locale/".$settings['locale'].".php";
} else {
	// Load the infusion's default locale file.
	include INFUSIONS."donate_panel/locale/English.php";
}
include INFUSIONS."donate_panel/infusion_db.php";

add_to_head("<style type='text/css'>

fieldset {
    border: 1px solid #333333;
    width: 80%;
    padding: 5px 6px 6px;
	margin-right: 0.7em;
    margin: auto;

}
legend {
   color: #333;
   background: #9fb2bc;
   border: 1px solid #9fb2bc;
   padding: 2px 6px;
     
   margin-right: 0.7em;
}

</style>");
opentable("".$locale['don003']."");
$result = dbquery("SELECT * FROM ".DB_DONATE_TABLE." ORDER BY donate_desc AND donate_email_address AND donate_desc2");

if (dbrows($result)) {
	while($data = dbarray($result)) {
echo"<br /><fieldset><legend>".$locale['don035']."</legend>".$data['donate_site_desc']."</fieldset><br />";
closetable();
opentable("".$locale['don002']."");
echo "<center>".$data['donate_desc2']."<hr width='90%'><form action='https://www.paypal.com/cgi-bin/webscr' target='_blank' method='post'>
".$locale['don004']." <input type='text' name='amount' size=5 class='textbox'>\n";

echo"<select name='currency_code' class='textbox'>\n";
echo"<option value='".$locale['don006']."'>".$locale['don006']."</option>\n";
echo" <option value='".$locale['don007']."'>".$locale['don007']."</option>\n";
echo"<option value='".$locale['don008']."'>".$locale['don008']."</option>\n";
echo"<option value='".$locale['don009']."'>".$locale['don009']."</option>\n";
echo"<option value='".$locale['don010']."'>".$locale['don010']."</option>\n";
echo"<option value='".$locale['don011']."'>".$locale['don011']."</option>\n";
echo"<option value='".$locale['don012']."'>".$locale['don012']."</option>\n";
echo"<option value='".$locale['don013']."'>".$locale['don013']."</option>\n";
echo"<option value='".$locale['don014']."'>".$locale['don014']."</option>\n";
echo"<option value='".$locale['don015']."'>".$locale['don015']."</option>\n";
echo"<option value='".$locale['don016']."'>".$locale['don016']."</option>\n";
echo"<option value='".$locale['don017']."'>".$locale['don017']."</option>\n";
echo"<option value='".$locale['don018']."'>".$locale['don018']."</option>\n";
echo"<option value='".$locale['don019']."'>".$locale['don019']."</option>\n";
echo"<option value='".$locale['don020']."'>".$locale['don020']."</option>\n";
echo"<option value='".$locale['don021']."'>".$locale['don021']."</option>\n";
echo"<option value='".$locale['don022']."'>".$locale['don022']."</option>\n";
echo"<option value='".$locale['don023']."'>".$locale['don023']."</option>\n";
echo"<option value='".$locale['don024']."'>".$locale['don024']."</option>\n";
echo"<option value='".$locale['don025']."'>".$locale['don025']."</option></select>\n";

echo"<input type='hidden' name='cmd' value='_xclick'>\n";
echo"<input type='hidden' name='business' value='".$data['donate_email_address']."'>\n";
echo"<input type='hidden' name='item_name' value='".$data['donate_desc']."'>\n";
echo"<input type='hidden' name='no_note' value='1'>\n";
echo"<input type='hidden' name='tax' value='0'>\n";
echo"<br /><input input type='image' src='https://www.paypal.com/en_GB/i/btn/btn_donate_SM.gif' border='0' name='submit' alt='".$locale['don026']."'>
<img alt='' border='0' src='https://www.paypal.com/en_GB/i/scr/pixel.gif' width='1' height='1'>
</form></br>
</center>";
	}
} else { echo ""; }

closetable();
// Please do not remove copyright info
include INFUSIONS."donate_panel/includes/copyright_func.php";
echo "".showDPcopyright()."<br />";
// End copyright info
require_once THEMES."templates/footer.php";
?>