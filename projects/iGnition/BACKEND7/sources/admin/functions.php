<?php



function do_table_header( $title='' )
{
	// ==============================
	// Table Header
	// ==============================

	echo '
		<table border="0" cellspacing="0" cellpadding="4" width="100%" style="border: 1px solid #1D6AA0;border-bottom: 0px;">
			<tr>
				<td class="bar">', $title, '</td>
			</tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="4" width="100%" style="border: 1px solid #1D6AA0;">';
}



function do_table_footer()
{
	// ==============================
	// Table Footer
	// ==============================

	echo '
		</table><br />';
}



function do_module_header($title,$links='',$helpfile='',$settings='',$search='')
{
	// ==============================
	// Module header link tool for the lazy
	// ==============================

	if ($settings)
	{
		$settingslink = "<a href=\"$settings\">Module Settings</a> &nbsp; ";
	}
	if ($search)
	{
		$searchlink = "<a href=\"$search\">Search</a> &nbsp; ";
	}

	do_table_header($title);

	echo '

		<tr>
			<td class="formlabel2" style="font-size: 8pt;" background="../images/admin/moduleMenu.jpg">'.$links.'</td>
			<td align="right" class="formlabel2" style="font-size: 8pt;" background="../images/admin/moduleMenu.jpg">
				'.$searchlink.'
				'.$settingslink.'
			</td>
		</tr>

	';

	do_table_footer();
}



function do_text_row($title, $name, $value='')
{
	// ==============================
	// Text Field
	// ==============================

	echo '
		<tr>
			<td class="formlabel" style="text-align: right; font-weight: bold;">
				', $title, '
			</td>
			<td class="formlabel">
				<input type="text" name="', $name, '" value="', $value, '" size="50">
			</td>
		</tr>';
}



function do_select_row($title, $name, $options, $selid='null')
{
	// ==============================
	// Select Field
	// ==============================

	if ($selid != 'null')
	{
		$htmlop = '';
		foreach($options AS $key => $value)
		{
			if ($key == $selid)
			{
				$htmlop .= "<OPTION VALUE=\"$key\" selected>$value</OPTION>\n";
			} else {
				$htmlop .= "<OPTION VALUE=\"$key\">$value</OPTION>\n";
			}
		}
	} else {
		$htmlop = '';
		foreach($options AS $key => $value)
		{
			$htmlop .= "<OPTION VALUE=\"$key\">$value</OPTION>\n";
		}
	}

echo <<<EOF

	<TR>
		<TD VALIGN="top" CLASS="formlabel" ALIGN="right">
		<B>$title</B>
		</TD>
		<TD CLASS="formlabel">
		<SELECT NAME="$name">
		$htmlop
		</SELECT>
		</TD>
	</TR>

EOF;
}


function do_form_header($action)
{
	// ==============================
	// Form Headers
	// ==============================

echo <<<EOF

	<form method="post" action="$action" name="SPform" onsubmit="return submitForm();">

EOF;
}



function do_form_footer()
{
	// ==============================
	// Form Footers
	// ==============================

echo <<<EOF

	</form>

EOF;
}



function SPMessage($text,$link)
{
	// ==============================
	// Confirmation Message
	// ==============================

	do_table_header('iGaming CMS Message');
	echo '
		<tr>
			<td class="formlabel" style="line-height: 200%; font-size: 12px;">

				<img src="../images/admin/info.jpg" align="left" hspace="15">
				<span style="font-weight: bold;">'.$text.'</span><br />
				Please wait while we transfer you to the next page.

			</td>
		</tr>';


	echo "<TD class=\"formlabel\" ALIGN=\"center\" STYLE=\"font-size: 12px;\">"
		."<A HREF=\"$link\">(or click here if you do not wish to wait)</A>"
		."</TD>"
		."</TR>";
	do_table_footer();
}



function do_textarea_row($title, $name, $value='')
{
	// ==============================
	// WYSIWYG Editor
	// ==============================

	$value = RTESafe( $value );

echo <<<EOF

	<TR>
		<TD CLASS="formlabel" COLSPAN="2">
		<B>$title</B><BR />
        <script language="JavaScript" type="text/javascript">
        function submitForm() {
           updateRTEs('$name');
           return true;
        }
        initRTE("../images/wysiwyg/", "", "");
        </script>
        <noscript><b>Javascript must be enabled to use this WYSIWYG editor.</b></noscript>

        <script language="JavaScript" type="text/javascript">
        writeRichText('$name', '$value', 400, 200, true, false);
        </script>
		</TD>
	</TR>

EOF;
}



function do_submit_row($title='Submit')
{
	// ==============================
	// Submit Button
	// ==============================

echo <<<EOF

	<TR>
		<TD COLSPAN="2" ALIGN="right" CLASS="formlabel">
		<INPUT TYPE="submit" NAME="submit" VALUE="$title" STYLE="width: 150px;">
		</TD>
	</TR>

EOF;
}



function RTESafe($strText='')
{
	// ==============================
	// Used by WYSIWYG Editor
	// ==============================

   //returns safe code for preloading in the RTE
   $tmpString = trim($strText);

   //convert all types of single quotes
   $tmpString = str_replace(chr(145), chr(39), $tmpString);
   $tmpString = str_replace(chr(146), chr(39), $tmpString);
   $tmpString = str_replace("'", "&#39;", $tmpString);

   //convert all types of double quotes
   $tmpString = str_replace(chr(147), chr(34), $tmpString);
   $tmpString = str_replace(chr(148), chr(34), $tmpString);
// $tmpString = str_replace("\"", "\"", $tmpString);

   //replace carriage returns & line feeds
   $tmpString = str_replace(chr(10), " ", $tmpString);
   $tmpString = str_replace(chr(13), " ", $tmpString);

   return $tmpString;
}



function clean($text='')
{
	// ==============================
	// Clean text of slashes and html
	// ==============================

	$text = stripslashes( $text );
	$text = htmlentities( $text );

	return $text;
}



function GenerateForm($target,$title,$do,$fieldarray,$hiddendata='')
{
	// ==============================
	// Generate a form from an array
	// ==============================

   do_form_header($target);
   do_table_header($title);

   foreach($fieldarray AS $key => $value) {

      switch($value["type"]) {
         case 'text':
            do_text_row($value["title"],$value["name"],$value["value"]);
            break;
         case 'submit':
            do_submit_row($value["title"]);
            break;
         case 'textarea':
         	do_table_footer();
         	do_table_header($value["title"]);
            do_textarea_row('',$value["name"],$value["value"]);
            break;
         case 'select':
		 	do_select_row($value["title"], $value["name"], $value["value"], $value["selected"]);
            break;
         case 'spacer':
         	do_table_footer();
         	do_table_header($value["title"]);
         	break;
         }
      }
   do_table_footer();
   echo '<input type="hidden" name="do" value="'.$do.'">';

   if (!empty($hiddendata)) {
      foreach ($hiddendata AS $key => $value) {
         echo "<input type=\"hidden\" name=\"$key\" value=\"$value\">";
         }
      }
   }



function FetchSections($table)
{
	// ==============================
	// Fetch section ID and TITLE into array
	// ==============================

   global $db;
   $result = $db->Execute("
   	SELECT
		s.id, s.title
	FROM
		$table AS s
	ORDER BY
		s.title");
   $data = array('0' => 'None');
   while ($row = $result->FetchNextObject()) {
      $data["$row->ID"] = stripslashes($row->TITLE);
   }
   return $data;
}



function ListModules()
{
	// ==============================
	// Fetch module list into variable
	// ==============================

   global $db;
   $result = $db->Execute("SELECT * FROM `sp_modules` WHERE `active` = '1' ORDER BY `title`");
   while ($row = $result->FetchNextObject())
   {
      $modules .= "<tr><td><img src='../images/admin/iconDefault.jpg' align='left' hspace='5'></td><td class=\"menu\"><a href=\"" . stripslashes($row->URL) . "\">" . stripslashes($row->TITLE) . "</a></td></tr>";
   }
   return $modules;
}
?>