<?php 
####
## Manufacturing Database
## (c) http://winchelldesign.com
## Developed By: Chris Winchell
##
## 
## File: form.php
## Created: 9-17-2010
## Updated: --
####

	require_once("inc/inc.config.php");
	require_once("inc/func.form.php");
	require_once("inc/inc.form.php");
	
	// Prevent the user visiting the logged in page if not logged in
	if(!isUserLoggedIn()) { header("Location: login.php"); die(); }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome <?php echo $loggedInUser->display_username; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="JavaScript">

function getCalendarDate()
{
   var months = new Array(13);
   var dayofweek = new Array(8);
   dayofweek[0] = "Sunday";
   dayofweek[1] = "Monday";
   dayofweek[2] = "Tuesday";
   dayofweek[3] = "Wednsday";
   dayofweek[4] = "Thursday";
   dayofweek[5] = "Friday";
   dayofweek[6] = "Saturday";
   months[0]  = "January";
   months[1]  = "February";
   months[2]  = "March";
   months[3]  = "April";
   months[4]  = "May";
   months[5]  = "June";
   months[6]  = "July";
   months[7]  = "August";
   months[8]  = "September";
   months[9]  = "October";
   months[10] = "November";
   months[11] = "December";
   var now         = new Date();
   var monthnumber = now.getMonth();
   var monthname   = months[monthnumber];
   var monthday    = now.getDate();
   var daynum     = now.getDay();
   var day         = dayofweek[daynum];
   var year        = now.getYear();
   if(year < 2000) { year = year + 1900; }
   var dateString = day + ' ' + 
                    monthname +
                    ' ' +
                    monthday +  
                    ', ' +
                    year;
   return dateString;
} // function getCalendarDate()

function getClockTime()
{
   var now    = new Date();
   var hour   = now.getHours();
   var minute = now.getMinutes();
   var second = now.getSeconds();
   var ap = "AM";
   if (hour   > 11) { ap = "PM";             }
   if (hour   > 12) { hour = hour - 12;      }
   if (hour   == 0) { hour = 12;             }
   if (hour   < 10) { hour   = "0" + hour;   }
   if (minute < 10) { minute = "0" + minute; }
   if (second < 10) { second = "0" + second; }
   var timeString = hour +
                    ':' +
                    minute +
                    ':' +
                    second +
                    " " +
                    ap;
   return timeString;
} // function getClockTime()

function enableText(checkBool, textID)
{
   textFldObj = document.getElementById(textID);
   textFldObj.disabled = !checkBool; // Disable Field
   if (!checkBool) { textFldObj.value = ''; }
} // function enableText

//-->
</script>
</head>

<body>
<div id="wrapper">
	<div id="content">
    
        <div id="left-nav">
        <?php include("inc/nav.php"); ?>
            <div class="clear"></div>
        </div>
        
        <div id="main">
            <div id="container">
               <div id="head">
                  <div class="style5">Enter Sheet & Parts Spec/Tracking</div>
        <?php 
		
		//Form Output
		if(!empty($_POST))
		{
			echo '<div id="spacer">&nbsp;<br /></div>'."\n";
			echo '<table >'."\n";
		    foreach ($_POST as $k => $v)
		    {
				echo '<tr>';
			  	echo '<td style="text-align:left"><b>'.$k.'</b></td>';
			  	echo '<td style="text-align:left"><b><i>'.$v.'</i></b></td>';
			  	echo '</tr>'."\n";
		   	}
		   	echo '</table><br /><br />'."\n";
		   	echo '<a href="javascript:history.go(-1)">Go Back</a>';
		   	exit;
		}
		?>
                  <form action="#" method="post">
				  <script type="text/javascript" language="JavaScript">
                     document.write("<div class=\"style1\">" + getCalendarDate() + " &nbsp; " + getClockTime() + "<\/div>");
                  </script>
               </div>
                  <div id="spacer">&nbsp;<br /></div>
                  <div id="tables">
                     <table width="50%">
                        <tr id="Material">
                           <th class="head1" colspan="2">Material</td>
                        </tr>
                        <tr>
                           <td class="field style2">Type:</td>
                           <td class="answer"><?php echo html_selectbox('material_text', $material, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Part #:</td>
                           <td class="answer"><?php echo html_selectbox('material_part_number', $mold, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Stated:</td>
                           <td class="answer"><?php echo html_textbox('material_stated', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Miced:</td>
                           <td class="answer"><?php echo html_textbox('material_miced', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Color:</td>
                           <td class="answer"><?php echo html_selectbox('material_color', $colors, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Size:</td>
                           <td class="answer"><?php echo html_selectbox('material_size', $sizes, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Supplier:</td>
                           <td class="answer"><?php echo html_selectbox('material_supplier', $supplier, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Order #:</td>
                           <td class="answer"><?php echo html_textbox('material_ordnum', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Pallet #:</td>
                           <td class="answer"><?php echo html_textbox('material_palnum', 3, ''); ?></td>
                        </tr>
                        <tr id="Machine">
                           <th class="head2" colspan="2">Machine</td>
                        </tr>
                        <tr>
                           <td class="field style2">Number:</td>
                           <td class="answer"><?php echo html_selectbox('machine_number', $number, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Start Vacuum/Sq.":</td>
                           <td class="answer"><?php echo html_textbox('machine_start_sq', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">End Vacuum/Sq.":</td>
                           <td class="answer"><?php echo html_textbox('machine_end_sq', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Platen Height:</td>
                           <td class="answer"><?php echo html_textbox('platen_height', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Platen Draw:</td>
                           <td class="answer"><?php echo html_textbox('platen_draw', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="group style2">Oven Settings</td>
                           <td>&nbsp;</td>
                        </tr>
                        <tr>
                           <td class="field style2">Zones:</td>
                           <td class="answer">
                              <table>
                                 <tr>
                                    <td>1<?php echo html_pickbox('machine_zone_1', 'checkbox', 1, array('onclick'=>'enableText(this.checked, \'machine_zones1_text\');')); ?></td>
                                    <td><?php echo html_textbox('machine_zones1_text', 3, '', array('disabled'=>'disabled')); ?>
                                    <td>2<?php echo html_pickbox('machine_zone_2', 'checkbox', 1, array('onclick'=>'enableText(this.checked, \'machine_zones2_text\');')); ?></td>
                                    <td><?php echo html_textbox('machine_zones2_text', 3, '', array('disabled'=>'disabled')); ?>
                                 </tr>
                                 <tr>
                                    <td>3<?php echo html_pickbox('machine_zone_3', 'checkbox', 1, array('onclick'=>'enableText(this.checked, \'machine_zones3_text\');')); ?></td>
                                    <td><?php echo html_textbox('machine_zones3_text', 3, '', array('disabled'=>'disabled')); ?>
                                    <td>4<?php echo html_pickbox('machine_zone_4', 'checkbox', 1, array('onclick'=>'enableText(this.checked, \'machine_zones4_text\');')); ?></td>
                                    <td><?php echo html_textbox('machine_zones4_text', 3, '', array('disabled'=>'disabled')); ?>
                                 </tr>
                                 <tr>
                                    <td>5<?php echo html_pickbox('machine_zone_5', 'checkbox', 1, array('onclick'=>'enableText(this.checked, \'machine_zones5_text\');')); ?></td>
                                    <td><?php echo html_textbox('machine_zones5_text', 3, '', array('disabled'=>'disabled')); ?>
                                    <td>6<?php echo html_pickbox('machine_zone_6', 'checkbox', 1, array('onclick'=>'enableText(this.checked, \'machine_zones6_text\');')); ?></td>
                                    <td><?php echo html_textbox('machine_zones6_text', 3, '', array('disabled'=>'disabled')); ?>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td class="group style2">Temperatures</td>
                           <td>&nbsp;</td>
                        </tr>
                        <tr>
                           <td class="field style2">Mold Surface:</td>
                           <td class="answer"><?php echo html_textbox('temp_mold_surface', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Aquatherm:</td>
                           <td class="answer"><?php echo html_textbox('temp_aquatherm', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Clamp Frame:</td>
                           <td class="answer"><?php echo html_textbox('temp_clamp_frame', 10, ''); ?></td>
                        </tr>
                        <tr id="Timers">
                           <th class="head3" colspan="2">Timers</td>
                        </tr>
                        <tr>
                           <td class="field style2">Heating:</td>
                           <td class="answer"><?php echo html_textbox('time_heating', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Cooling:</td>
                           <td class="answer"><?php echo html_textbox('time_cooling', 10, ''); ?></td>
                        </tr>
                        <tr id="Weather">
                           <th class="head4" colspan="2">Weather</td>
                        </tr>
                        <tr>
                           <td class="field style2">Temperature:</td>
                           <td class="answer"><?php echo html_textbox('weather_outside_temp', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Humidity:</td>
                           <td class="answer"><?php echo html_textbox('weather_outside_humidity', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Barometric Pressure:</td>
                           <td class="answer"><?php echo html_textbox('weather_barometric_pressure', 10, ''); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Weather Type:</td>
                           <td class="answer"><?php echo html_selectbox('weather_type', $weather, $selected = 'sunny', array()); ?></td>
                        </tr>
                        <tr id="Building">
                           <th class="head5" colspan="2">Building</td>
                        </tr>
                        <tr>
                           <td colspan="2">
                              <table>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td class="group center style2">North Side</td>
                                    <td class="group center style2">South Side</td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">Temperature:</td>
                                    <td class="answer"><?php echo html_textbox('building_temp_north', 10, ''); ?></td>
                                    <td class="answer"><?php echo html_textbox('building_temp_south', 10, ''); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">Humidity:</td>
                                    <td class="answer"><?php echo html_textbox('building_humidity_north', 10, ''); ?></td>
                                    <td class="answer"><?php echo html_textbox('building_humidity_south', 10, ''); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">Barometric Pressure:</td>
                                    <td class="answer"><?php echo html_textbox('building_barometric_pressure_north', 10, ''); ?></td>
                                    <td class="answer"><?php echo html_textbox('building_barometric_pressure_south', 10, ''); ?></td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr id="Parts Storage">
                           <th class="head1" colspan="2">Parts Storage</td>
                        </tr>
                        <tr>
                           <td class="field style2">On Cart:</td>
                           <td class="answer"><?php echo html_pickbox('part_storage', 'radio', '1'); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">On Edge:</td>
                           <td class="answer"><?php echo html_pickbox('part_storage', 'radio', '2'); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">On Pallet:</td>
                           <td class="answer"><?php echo html_pickbox('part_storage', 'radio', '3'); ?></td>
                        </tr>
                        <tr id="Results">
                           <th class="head2" colspan="2">Results</td>
                        </tr>
                        <tr>
                           <td class="field style2">Parts per Hour:</td>
                           <td class="answer"><?php echo numlist_gen('results_parts_per_hour', 5, 5); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Bad Parts per Check:</td>
                           <td class="answer"><?php echo numlist_gen('results_bad_parts_per_check', 5, 5); ?></td>
                        </tr>
                        <tr id="Sheet Temps">
                           <th class="head3" colspan="2">Sheet Temps</td>
                        </tr>
                        <tr>
                           <td colspan="2">
                              <table>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td class="group center style2">Left Side</td>
                                    <td class="group center style2">Right Side</td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">Before Oven:</td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_left_side_1', 10, ''); ?></td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_right_side_1', 10, ''); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">After Oven:</td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_left_side_2', 10, ''); ?></td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_right_side_2', 10, ''); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">Before Cooling:</td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_left_side_3', 10, ''); ?></td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_right_side_3', 10, ''); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">After Cooling:</td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_left_side_4', 10, ''); ?></td>
                                    <td class="answer"><?php echo html_textbox('sheet_temp_right_side_4', 10, ''); ?></td>
                                 </tr>
                              </table>
                           </td>
                        <tr id="Fan Placement">
                           <th class="head4" colspan="2">Fan Placement</td>
                        </tr>
                        <tr>
                           <td colspan="2">
                              <table>
                                 <tr>
                                    <td>&nbsp;</td>
                                    <td class="group center fan style2" colspan="3">Left Side</td>
                                    <td class="group center fan style2" colspan="3">Top Side</td>
                                    <td class="group center fan style2" colspan="3">Bottom Side</td>
                                    <td class="group center fan style2" colspan="3">Right Side</td>
                                 </tr>
                                 <tr>
                                    <td rowspan="2" class="field style2">Placement:</td>
                                    <td class="fan">L1<?php echo html_pickbox('fan_placement_left_1', 'checkbox', '1'); ?></td>
                                    <td>L2<?php echo html_pickbox('fan_placement_left_2', 'checkbox', '1'); ?></td>
                                    <td>L3<?php echo html_pickbox('fan_placement_left_3', 'checkbox', '1'); ?></td>
                                    <td rowspan="2" class="fan top">T1<?php echo html_pickbox('fan_placement_top_1', 'checkbox', '1'); ?></td>
                                    <td rowspan="2" class="top">T2<?php echo html_pickbox('fan_placement_top_2', 'checkbox', '1'); ?></td>
                                    <td rowspan="2" class="top">T3<?php echo html_pickbox('fan_placement_top_3', 'checkbox', '1'); ?></td>
                                    <td rowspan="2" class="fan top">B1<?php echo html_pickbox('fan_placement_bottom_1', 'checkbox', '1'); ?></td>
                                    <td rowspan="2" class="top">B2<?php echo html_pickbox('fan_placement_bottom_2', 'checkbox', '1'); ?></td>
                                    <td rowspan="2" class="top">B3<?php echo html_pickbox('fan_placement_bottom_3', 'checkbox', '1'); ?></td>
                                    <td class="fan">R1<?php echo html_pickbox('fan_placement_right_1', 'checkbox', '1'); ?></td>
                                    <td>R2<?php echo html_pickbox('fan_placement_right_2', 'checkbox', '1'); ?></td>
                                    <td>R3<?php echo html_pickbox('fan_placement_right_3', 'checkbox', '1'); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="fan">L4<?php echo html_pickbox('fan_placement_left_4', 'checkbox', '1'); ?></td>
                                    <td>L5<?php echo html_pickbox('fan_placement_left_5', 'checkbox', '1'); ?></td>
                                    <td>L6<?php echo html_pickbox('fan_placement_left_6', 'checkbox', '1'); ?></td>
                                    <td class="fan">R4<?php echo html_pickbox('fan_placement_right_4', 'checkbox', '1'); ?></td>
                                    <td>R5<?php echo html_pickbox('fan_placement_right_5', 'checkbox', '1'); ?></td>
                                    <td>R6<?php echo html_pickbox('fan_placement_right_6', 'checkbox', '1'); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="field style2">Airflow Direction:</td>
                                    <td class="center fan" colspan="3"><?php echo html_selectbox('fan_left_airflow', $airflow, '', array()); ?></td>
                                    <td class="center fan" colspan="3"><?php echo html_selectbox('fan_top_airflow', $airflow, '', array()); ?></td>
                                    <td class="center fan" colspan="3"><?php echo html_selectbox('fan_bottom_airflow', $airflow, '', array()); ?></td>
                                    <td class="center fan" colspan="3"><?php echo html_selectbox('fan_right_airflow', $airflow, '', array()); ?></td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr id="Cooling Rack">
                           <th class="head5" colspan="2">Cooling Rack</td>
                        </tr>
                        <tr>
                           <td class="field style2">Fan Placement:</td>
                           <td class="answer">
                              <select name="cooling_fan_placement">
                                 <option value="L">Left</option>
                                 <option value="M">Middle</option>
                                 <option value="R">Right</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td class="field style2">Part Placement:</td>
                           <td class="answer">
                              <select name="cooling_part_placement">
                                 <option value="U">Upside Down</option>
                                 <option value="D">Rightside Up</option>
                              </select>
                           </td>
                        </tr>
                        <tr id="Quality Check">
                           <th class="head1" colspan="2">Quality Check</td>
                        </tr>
                        <tr>
                           <td class="field style2">Back:</td>
                           <td class="answer"><?php echo html_selectbox('fender_warps_shrinkage_back', $quality, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td class="field style2">Front:</td>
                           <td class="answer"><?php echo html_selectbox('fender_warps_shrinkage_front', $quality, '', array()); ?></td>
                        </tr>
                        <tr>
                           <td colspan="2">
                              <table width="100%">
                                 <tr>
                                    <td class="field style2" rowspan="5">Warps and Shrinkage:</td>
                                 </tr>
                                 <tr>
                                    <td class="center"><img src="" width="55" height="30" alt="" /></td>
                                    <td class="center"><img src="" width="55" height="30" alt="" /></td>
                                    <td class="center"><img src="" width="55" height="30" alt="" /></td>
                                 </tr>
                                 <tr>
                                    <td class="center"><?php echo html_pickbox('fender_warps_shrinkage_center', 'radio', '1'); ?></td>
                                    <td class="center"><?php echo html_pickbox('fender_warps_shrinkage_center', 'radio', '2'); ?></td>
                                    <td class="center"><?php echo html_pickbox('fender_warps_shrinkage_center', 'radio', '3'); ?></td>
                                 </tr>
                                 <tr>
                                    <td class="center"><img src="" width="55" height="30" alt="" /></td>
                                    <td class="center"><img src="" width="55" height="30" alt="" /></td>
                                    <td class="center"><img src="" width="55" height="30" alt="" /></td>
                                 </tr>
                                 <tr>
                                    <td class="center"><?php echo html_pickbox('fender_warps_shrinkage_center', 'radio', '4'); ?></td>
                                    <td class="center"><?php echo html_pickbox('fender_warps_shrinkage_center', 'radio', '5'); ?></td>
                                    <td class="center"><?php echo html_pickbox('fender_warps_shrinkage_center', 'radio', '6'); ?></td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr id="Doors and Fans">
                           <th class="head2" colspan="2">Doors and Fans</td>
                        </tr>
                        <tr>
                           <td class="group style2">Select On Fans</td>
                           <td class="answer">
                              <table>
                                 <tr>
                                    <td>F1<?php echo html_pickbox('open_fans_1', 'checkbox', '1'); ?></td>
                                    <td>F2<?php echo html_pickbox('open_fans_2', 'checkbox', '1'); ?></td>
                                    <td>F3<?php echo html_pickbox('open_fans_3', 'checkbox', '1'); ?></td>
                                    <td>F4<?php echo html_pickbox('open_fans_4', 'checkbox', '1'); ?></td>
                                    <td>F5<?php echo html_pickbox('open_fans_5', 'checkbox', '1'); ?></td>
                                    <td>F6<?php echo html_pickbox('open_fans_6', 'checkbox', '1'); ?></td>
                                    <td>F7<?php echo html_pickbox('open_fans_7', 'checkbox', '1'); ?></td>
                                 </tr>
                                 <tr>
                                    <td>I1<?php echo html_pickbox('open_fans_8', 'checkbox', '1'); ?></td>
                                    <td>I2<?php echo html_pickbox('open_fans_9', 'checkbox', '1'); ?></td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td class="group style2">Select Open Doors</td>
                           <td class="answer">
                              <table>
                                 <tr>
                                    <td>S1<?php echo html_pickbox('open_door_1', 'checkbox', '1'); ?></td>
                                    <td>S2<?php echo html_pickbox('open_door_2', 'checkbox', '1'); ?></td>
                                    <td>S3<?php echo html_pickbox('open_door_3', 'checkbox', '1'); ?></td>
                                 </tr>
                                 <tr>
                                    <td>O4<?php echo html_pickbox('open_door_4', 'checkbox', '1'); ?></td>
                                    <td>O5<?php echo html_pickbox('open_door_5', 'checkbox', '1'); ?></td>
                                    <td>O6<?php echo html_pickbox('open_door_6', 'checkbox', '1'); ?></td>
                                 </tr>
                              </table>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <?php echo html_pickbox('submit', 'submit', 'Enter'); ?>
            </div>
            </form>
        </div>

   </div>
</div>
</body>
</html>