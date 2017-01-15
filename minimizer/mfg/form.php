<?php
##########################################################################################################
##### include('../phpinc/util.php');
#####
function html_selectbox($name, $values, $selected=NULL, $attributes=array())
{
   $attr_html = '';
   if(is_array($attributes) && !empty($attributes))
   {
      foreach ($attributes as $k=>$v)
      {
         $attr_html .= ' '.$k.'="'.$v.'"';
      }
   }
   $output = '<select name="'.$name.'" id="'.$name.'"'.$attr_html.'>'."\n";
   if(is_array($values) && !empty($values))
   {
      foreach ($values as $key=>$value)
      {
         if(is_array($value))
         {
            $output .= '<optgroup label="'.$key.'">'."\n";
            foreach ($value as $k=>$v)
            {
               $sel = $selected == $k ? ' selected="selected"' : '';
               $output .= '<option value="'.$k.'"'.$sel.'>'.$v.'</option>'."\n";
            }
            $output .= '</optgroup>'."\n";
         }
         else
         {
            $sel = $selected == $key ? ' selected="selected"' : '';
            $output .= '<option value="'.$key.'"'.$sel.'>'.$value.'</option>'."\n";
         }
      }
   }
   $output .= "</select>\n";

   return $output;
}

function numlist_gen($name, $count, $limit)
{
   $output = '<select name="'.$name.'" id="'.$name.'">\n"';
   if($limit > $count || $limit == NULL)
   {
      $limit = $count;
   }
   $low = ($count-$limit);
   while ($low <= ($count+$limit))
   {
      $output .= '<option value="'.$low.'">'.$low.'</option>'."\n";
      ++$low;
   }
   $output .= "</select>\n";
   
   return $output;
}

function html_textbox($name, $size, $value=NULL, $attributes=array())
{
   $attr_html = '';
   if(is_array($attributes) && !empty($attributes))
   {
      foreach ($attributes as $k=>$v)
      {
         $attr_html .= ' '.$k.'="'.$v.'"';
      }
   }
   if($size == NULL)
   {
      $size = 5;
   }
   $output = '<input name="'.$name.'" id="'.$name.'" type="text" size="'.$size.'" maxlength="'.$size.'" value="'.$value.'"'.$attr_html." />";
   
   return $output;
}

function html_pickbox($name, $type, $value=NULL, $attributes=array())
{
   $attr_html = '';
   if(is_array($attributes) && !empty($attributes))
   {
      foreach ($attributes as $k=>$v)
      {
         $attr_html .= ' '.$k.'="'.$v.'"';
      }
   }
   if($type == 'radio' || $type == 'checkbox' || $type == 'submit')
   {
      $output = '<input name="'.$name.'" id="'.$name.'" type="'.$type.'" value="'.$value.'"'.$attr_html." />";
      if($value == NULL)
      {
         die('Pickbox Error');
      }
   }
   else
   {
      die('Pickbox Type must be either checkbox or radio');
   }
   
   return $output;
}
##########################################################################################################
##########################################################################################################
##### form.php
##### 

# Drop-List Values

$material = array(
               'HDPE'=> 'HDPE',
               'TPO'=> 'TPO',
               'DP'=> 'DP',
               'Paint Film'=> 'Paint Film'
#              'N'=> '';
               );
$supplier = array(
               'Spartech'=> 'Spartech',
               'RTP'=> 'RTP',
               'Primex'=> 'Primex',
               'P &amp; F Plastics'=> 'P &amp; F Plastics',
               'Orion/Positron'=> 'Orion/Positron',
               'Other'=> 'Other'
               );
$mold = array(
               '101'=> '101',
               '102'=> '102',
               '102 L'=> '102 L',
               '151'=> '151',
               '1021'=> '1021',
               '1100'=> '1100',
               '1352'=> '1352',
               '1352 L'=> '1352 L',
               '1501'=> '1501',
               '1502 L'=> '1502 L',
               '1554'=> '1554',
               '1554 L'=> '1554 L',
               '1601'=> '1601',
               '1612'=> '1612',
               '1901'=> '1901',
               '201'=> '201',
               '202'=> '202',
               '218'=> '218',
               '2014'=> '2014',
               '2201'=> '2201',
               '2218'=> '2218',
               '2261'=> '2261',
               '2261 L'=> '2261 L',
               '2481'=> '2481',
               '2481 L'=> '2481 L',
               '301'=> '301',
               '302'=> '302',
               '3228715'=> '3228715',
               '3833866'=> '3833866',
               '3833867'=> '3833867',
               '3887422'=> '3887422',
               '3887423'=> '3887423',
               '401'=> '401',
               '4001'=> '4001',
               '501'=> '501',
               '501 C'=> '501 C',
               '701'=> '701',
               '702'=> '702',
               '702 L'=> '702 L',
               '801'=> '801',
               '802 L'=> '802 L',
               '901'=> '901',
               '902 L'=> '902 L',
               '9901'=> '9901',
               '9902'=> '9902',
               'C10 L'=> 'C10 L',
               'C10 R'=> 'C10 R',
               'G1000'=> 'G1000',
               'TA53'=> 'TA53',
               'TF44'=> 'TF44',
               'TF44 EC'=> 'TF44 EC',
               );
$colors = array(
               'Black'=> 'Black',
               'Red'=> 'Red',
               'White'=> 'White',
               'Galvanized'=> 'Galvanized',
               'Liquid Platium'=> 'Liquid Platium',
               'Chrome'=> 'Chrome',
               'Green'=> 'Green',
               'TPO Grey'=> 'TPO Grey'
               );
$sizes = array(
               '120x16x26'=> '120x16x26',
               '125x26.5x50'=> '125x26.5x50',
               '187x34x50'=> '187x34x50',
               '187x34x60'=> '187x34x60',
               '187x38.5x49'=> '187x38.5x49',
               '187x38.5x59'=> '187x38.5x59',
               '220x26x55'=> '220x26x55',
               '220x34x48'=> '220x34x48',
               '220x34x50'=> '220x34x50',
               '220x34x59'=> '220x34x59',
               '250x34x48'=> '250x34x48',
               '250x34x50'=> '250x34x50',
               '250x34x60'=> '250x34x60',
               '250x36x69'=> '250x36x69',
               '250x36x70'=> '250x36x70',
               '260x34x59'=> '260x34x59',
               '260x36x69'=> '260x36x69',
               '500x48x96'=> '500x48x96'
               );
$number = array(
               1=> '1 - One',
               2=> '2 - Two',
               3=> '3 - Three',
               4=> '4 - Four',
               5=> '5 - Five',
               6=> '6 - Six',
               7=> '7 - Seven'
               );
$weather = array(
               'sunny'=> 'Sunny',
               'overcast'=> 'Overcast',
               'partlycloudy'=> 'Partly Cloudy',
               'moisture'=> 'Rain/Snow'
               );
$airflow = array(
               'up'=> 'Up',
               'down'=> 'Down',
               'left'=> 'Left',
               'right'=> 'Right'
               );
$quality = array(
               'bow'=> 'Bow',
               'crest'=> 'Crest',
               'straight'=> 'Straight'
               );
#
# Additional Values

$selected = isset($_REQUEST['select']) ? $_REQUEST['select'] : 1;

#
# Output Variables

if( isset($_POST['submit']) )
{
   echo '<table width="600" class="tblstyle">'."\n";

   foreach ($_POST as $k => $v)
   {
      echo '<tr>';
	  echo '<td><b>'.$k.'</b></td>';
	  echo '<td><b>'.$v.'</b></td>';
	  echo '</tr>'."\n";
   }

   echo '</table><br /><br />'."\n";
   echo '<a href="javascript:history.go(-1)">Go Back</a>';
   exit;
}

if( isset($_GET['info']) )
{
   phpinfo();
   exit;
}

?>
<html>
<head>
   <title>Tracking Form</title>
</head>
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

<style>
body {
	padding: 10px 10px 10px 10px;
	margin: 0;
}
.style1 {
   font-size: 9px;
}
.style2 {
   font-size: 12px;
}
.style3 {
   font-size: 14px;
}
.style4 {
   font-size: 16px;
}
.style5 {
   font-size: 18px;
   font-weight: bold;
}
table {
	table-layout: auto;
}
th {
   border: solid 1px #000;
   padding-left: 20px;
   text-align: left;
   color: #FFF;
}
th.head1 {
   background-color:  #609;
}
th.head2 {
   background-color: #060;
}
th.head3 {
   background-color: #00C;
}
th.head4 {
   background-color: #C00;
}
th.head5 {
   background-color: #F60;
}
td {
   text-align: right;
   padding-right: 5px;
}
td.field {
   width: 130px;
   font-weight: bold;
}
td.group {
   font-weight: bold;
   text-decoration: underline;
}
td.center {
   text-align: center;
}
td.fan {
   border-left: solid;
   border-left-width: thin;
   border-left-color: #000;
}
td.top {
   vertical-align: top;
}
td.answer {
   font-style: italic;
   text-align: left;
   padding-left: 5px;
}
img {
   border: solid 1px #000;
}
</style>
<body>
<form action="#" method="post">
<div id="container">
   <div id="head">
      <div class="style5">Enter Sheet & Parts Spec/Tracking</div>
      <script type="text/javascript" language="JavaScript">
         document.write("<div class=\"style1\">" + getCalendarDate() + " &nbsp; " + getClockTime() + "<\/div>");
      </script>
   </div>
   <div id="content">
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
               <td class="field style2">Miced: <b>PLEASE ADD TO DB</b></td>
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
               <td class="field style2">Supplier: <b>PLEASE CHANGE IN DB</b></td>
               <td class="answer"><?php echo html_selectbox('material_supplier', $supplier, '', array()); ?></td>
            </tr>
            <tr>
               <td class="field style2">Order #: <b>PLEASE ADD TO DB</b></td>
               <td class="answer"><?php echo html_textbox('material_ordnum', 10, ''); ?></td>
            </tr>
            <tr>
               <td class="field style2">Pallet #: <b>PLEASE ADD TO DB</b></td>
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
</div>
</form>
<div id="testing" style="visibility: hidden;">
</div>
</body>
</html>