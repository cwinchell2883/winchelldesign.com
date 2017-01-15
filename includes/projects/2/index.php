<?php
// Compress Website
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip'))
{
	ob_start("ob_gzhandler");
}
else
{
	ob_start();
}

// Define Caller ID
define('CALLER_ID', true);

// Set some variables
$script_root_path = (defined('SCRIPT_ROOT_PATH')) ? SCRIPT_ROOT_PATH : './';
$script_inc_path = (defined('SCRIPT_INC_PATH')) ? SCRIPT_INC_PATH : $script_root_path . 'inc/';
$script_img_path = (defined('SCRIPT_IMG_PATH')) ? SCRIPT_IMG_PATH : $script_root_path . 'img/';
$Ex = '.' . substr(strrchr(__FILE__, '.'), 1);
$PHP_SELF = 'index' . $Ex;

// Do some includes
require_once($script_root_path . 'common' . $Ex);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title><?php echo $config_title; ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo $script_inc_path . "css/style.css"; ?>" />
<script type="text/javascript" src="<?php echo $script_inc_path . "js/link.js"; ?>"></script>
<script type="text/javascript" src="<?php echo $script_inc_path . "js/flashobject.js"; ?>"></script>
</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr align="center">
		<td>
		<table width="760" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="231">
				<a href="index.htm"><img src="<?php echo $script_img_path . "a_01.gif"; ?>" width="231" height="59" border="0"></a></td>
				<td align="right" valign="middle">
				<!--webbot bot="Include" u-include="include/menu1.htm" tag="BODY" startspan -->

<table border="0" width="100%" cellspacing="5" cellpadding="0">
	<tr>
		<td align="right" class="content">
		<font face="Verdana" size="1" color="#FFFFFF"><b>::</b></font><font face="Verdana" size="2">
		</font><b><font size="1"><a href="index.htm">
		<font color="#FFFFFF" face="Tahoma">Home</font></a></font></b><font face="Verdana" size="2">&nbsp;&nbsp;
		</font><font face="Verdana" size="1" color="#FFFFFF"><b>::</b></font><font face="Verdana" size="2">
		</font><b><font size="1"><a href="contactus.htm">
		<font color="#FFFFFF" face="Tahoma">Contact us</font></a></font></b><font face="Verdana" size="2">&nbsp;&nbsp;
		</font><font face="Verdana" size="1" color="#FFFFFF"><b>::</b></font><font face="Verdana" size="2">
		</font><b><font size="1"><a href="feedback.htm">
		<font color="#FFFFFF" face="Tahoma">Feedback</font></a></font></b><font face="Verdana" size="2">&nbsp;&nbsp;
		</font><font face="Verdana" size="1" color="#FFFFFF"><b>::</b></font><font face="Verdana" size="2">
		</font><b><a href="sitemap.htm"><font color="#FFFFFF" face="Tahoma">
		<font size="1">Site Map</font><font size="2">&nbsp;&nbsp; </font></font>
		</a></b></td>
	</tr>
</table>

<!--webbot bot="Include" i-checksum="36798" endspan --></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr align="center">
		<td>
		<table width="760" border="0" cellspacing="0" cellpadding="0" background="<?php echo $script_img_path . "_01.jpg"; ?>">
			<tr>
				<td>
				    <div id="flashcontent"> <a target="_blank" href="http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash"> 
              <img src="<?php echo $script_img_path . "noflash01.gif"; ?>" border="0"> </a> </div>
            <script type="text/javascript">
				
				var fo = new FlashObject("inc/swf/index.swf", "index", "760", "200", "7");
				fo.addParam("wmode", "transparent");
				fo.addParam("quality", "high");
				fo.addParam("scale", "noscale");
				fo.write("flashcontent");
				</script>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr align="center">
		<td>
		<table width="760" border="0" cellspacing="0" cellpadding="0" background="<?php echo $script_img_path . "b_01.gif"; ?>">
			<tr>
				<td background="<?php echo $script_img_path . "b_02.gif"; ?>" width="12">
				<img src="<?php echo $script_img_path . "b_02.gif"; ?>" width="12" height="48"></td>
				<td background="<?php echo $script_img_path . "b_02.gif"; ?>" width="180">
				<!--webbot bot="Navigation" s-type="banner" s-orientation="horizontal" s-rendering="graphics" startspan --><img src="<?php echo $script_img_path . "index.htm_cmp_073tgfp_technology_slim010_bnr.gif"; ?>" width="180" height="32" border="0" alt="Welcome to Tech80"><!--webbot bot="Navigation" i-checksum="32322" endspan --></td>
				<td width="9"><img src="<?php echo $script_img_path . "b_03.gif"; ?>" width="9" height="48"></td>
				<td width="100%" align="right">
				<!--webbot bot="Include" u-include="include/menu.htm" tag="BODY" startspan -->

<table border="0" cellspacing="5" cellpadding="0" class="content">
	<tr>
		<td><font face="Verdana" size="1" color="#FFFFFF">|
		<a href="aboutus.htm"><font color="#FFFFFF">About us</font></a> |
		<a href="product.htm"><font color="#FFFFFF">Product</font></a><font face="Verdana" size="1"> 
		| </font><a href="services.htm"><font color="#FFFFFF">Services</font></a><font face="Verdana" size="1"> 
		| </font><a href="resources.htm"><font color="#FFFFFF">Resources</font></a><font face="Verdana" size="1"> 
		| </font></font><a href="casestudy.htm">
		<font face="Verdana" size="1" color="#FFFFFF">Case Studies</font></a></td>
	</tr>
</table>

<!--webbot bot="Include" i-checksum="63017" endspan --></td>
				<td width="12">
				<img src="<?php echo $script_img_path . "b_01.gif"; ?>" width="12" height="48"></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr align="center">
		<td>
		<table width="760" border="0" cellspacing="0" cellpadding="0" background="<?php echo $script_img_path . "c_bg.gif"; ?>">
			<tr valign="top">
				<td width="164">
				<table width="164" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
						<table width="100%" cellspacing="5" cellpadding="0" border="0" class="content">
							<tr>
								<td width="20">
								<img src="<?php echo $script_img_path . "c_03.gif"; ?>" width="16" height="18"></td>
								<td align="left" width="127">
								<b>
								<font face="Tahoma, Verdana" size="1" color="#FFCC00">
								January 22, 2007</font></b></td>
							</tr>
							<tr>
								<td colspan="2">
								<img src="<?php echo $script_img_path . "c_02.gif"; ?>" width="161" height="1"></td>
							</tr>
							<tr>
								<td colspan="2">
								<font size="1">The new Web-Site has launched!&nbsp; 
								With the new site Tech80 has increased it's tech 
								force to 9 techs to service your needs.&nbsp; 
								Tech80 has also added the ability to reach us 
								with a REAL TIME, single click to chat, product 
								called Revation.&nbsp; Any e-mail we send to you 
								will always have our current status.</font></td>
							</tr>
						</table>
						</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp; </td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>
						<table width="100%" cellspacing="5" cellpadding="0" border="0" class="content">
							<tr>
								<td width="20">
								<img src="<?php echo $script_img_path . "c_03.gif"; ?>" width="16" height="18"></td>
								<td align="left" width="127">
								<b>
								<font face="Tahoma, Verdana" size="1" color="#FFCC00">
								January 22, 2007</font></b></td>
							</tr>
							<tr>
								<td colspan="2">
								<img src="<?php echo $script_img_path . "c_02.gif"; ?>" width="161" height="1"></td>
							</tr>
							<tr>
								<td colspan="2">
								<font size="1">Case / Trouble Ticket software has been added to 
								truely make your life easy.&nbsp; Just click on 
								the service tab at the top to experience our new 
								level of service!</font></td>
							</tr>
						</table>
						</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr align="center">
						<td>
						<table width="165" border="0" cellspacing="0" cellpadding="0" background="<?php echo $script_img_path . "c_07.gif"; ?>">
							<tr>
								<td>
								<img src="<?php echo $script_img_path . "c_04.gif"; ?>" width="165" height="7"></td>
							</tr>
							<tr>
								<td>
								<table width="100%" border="0" cellspacing="0" cellpadding="5">
									<tr>
										<td colspan="2">
										<table width="100%" border="0" cellspacing="0" cellpadding="4">
											<tr>
												<td width="15">
												<img src="<?php echo $script_img_path . "d_01.gif"; ?>" width="15" height="14"></td>
												<td>
												<b>
												<font face="Tahoma, Verdana" size="1" color="#FFCC00">
												Did you know?</font></b></td>
											</tr>
										</table>
										</td>
									</tr>
									<tr>
										<td colspan="2">
										<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#888888">
										That by standardizing your computer 
										models and creating standards support 
										costs can drop by as much as %40</font><p>
										<font face="Verdana, Arial, Helvetica, sans-serif" size="1" color="#888888">
										New computer purchases do not have to be 
										a severe hit to your budget.&nbsp; Some 
										manufacturers actually have buy 2 get 1 
										free sales saving you thousands!</font></td>
									</tr>
								</table>
								</td>
							</tr>
							<tr>
								<td>
								<img src="<?php echo $script_img_path . "c_05.gif"; ?>" width="165" height="9"></td>
							</tr>
						</table>
						</td>
						<td>&nbsp;</td>
					</tr>
					</table>
				<img src="<?php echo $script_img_path . "c_01.gif"; ?>" width="164" height="2"><br>
				</td>
				<td>
				<table width="100%" border="0" cellspacing="10" cellpadding="5" class="content">
					<tr>
						<td><font face="Verdana" size="3" color="#A8CF04"><b>
						<img border="0" src="<?php echo $script_img_path . "l1.gif"; ?>" width="11" height="11"> Precise Focus: 1 - 80 Computers<br><img border="0" src="<?php echo $script_img_path . "hr.gif"; ?>" width="386" height="2"></b></font><br>
            <table border="0" cellspacing="0" cellpadding="10">
							<tr align="left">
								<td>
								<img border="0" src="<?php echo $script_img_path . "index1.jpg"; ?>" width="100" height="100"></td>
								<td>
                <b><font face="Verdana" size="3">Some of the features of being on Tech80</font></b><br><br>
								<font size="2" face="Verdana">
								<img src="<?php echo $script_img_path . "l2.gif"; ?>" width="4" height="4"> 
								One hour or less response times on most cases<br>
								<img src="<?php echo $script_img_path . "l2.gif"; ?>" width="4" height="4"> 
								Documentation and forms so your always in the know<br>
								<img src="<?php echo $script_img_path . "l2.gif"; ?>" width="4" height="4"> 
								Never pay for another techs learning curve again<br>
								<img src="<?php echo $script_img_path . "l2.gif"; ?>" width="4" height="4"> 
								Support from anywhere, any time<br>
								<img src="<?php echo $script_img_path . "l2.gif"; ?>" width="4" height="4">
								Specialize in companies with 1 - 80 computers</font></td>
							</tr>
						</table>
						<p><font face="Verdana"><b><font size="3">Getting Started&nbsp;
						</font></b></font></p>
						<table border="0" cellspacing="0" cellpadding="10">
							<tr align="left">
								<td>
								<img border="0" src="<?php echo $script_img_path . "index2.jpg"; ?>" width="100" height="100"></td>
								<td><font face="Verdana" size="2">Give us a test 
								drive, click on the Service tab above and time<br>
								our response.&nbsp; Let us prove to you up front 
								that Tech80 is the solution for that feeling of 
								throwing the computer out the window.</font><p>
								<font face="Verdana" size="2">Tech80 will not 
								only solve your immediate needs, Tech80 will 
								stabilize your network, turning IT issues into a 
								process that is as simple as filling out a 
								vacation request.</font></td>
							</tr>
						</table>
&nbsp;<p><b><font face="Verdana" size="3">True Solutions</font></b></p>
						<table border="0" cellspacing="0" cellpadding="10">
							<tr align="left">
								<td>
								<img border="0" src="<?php echo $script_img_path . "bluePuzzle.jpg"; ?>" width="100" height="100"></td>
								<td><font face="Verdana" size="2">Tech80 helps 
								your customers by knowing your industry and 
								partnering with you to facilitate innovative 
								means of acurate communication through 
								technology.</font><p>
								<font face="Verdana" size="2">We align ourselves 
								with your business to make your technology 
								profitable for you.&nbsp; We go beyond simply 
								supporting your network.&nbsp; We look at 
								process, software, data retention, security, 
								even phone systems and copiers to ensure you are 
								taking full advantage of what is available to 
								you.&nbsp; We even assist in the budgeting 
								process so there are no surprises throughout the 
								year.&nbsp;&nbsp; </font></td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr align="center">
		<td>
		<table width="761" border="0" cellspacing="0" cellpadding="0" bgcolor="212121" height="30">
			<tr align="center">
				<td>
				<font face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF" size="1">
				Copyright &#9426; 2006-2009 Tech80. All rights reserved</font><font face="Tahoma, Verdana" color="#FFFFFF" size="1"><b>
				</b></font></td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<br>
<br>

</body>
</html>