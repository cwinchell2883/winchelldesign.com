<?php
/*
Pro Clan Manager is a website manager for multiplayer game teams. Pro Clan manager was designed and built by Andrew Fenn.
Copyright (C) 2002 Andrew Fenn

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*/

class Post {
			function LoginFilter($text) {
				return eregi('^[a-z0-9]+$', $text); // allow only number and letters
			}
			
			function Int($int) {
				return intval($int);
			}			
			
			function Text($text) {
				$text = str_replace('&','&amp;',$text); // do this first so it doesn't mess up the other replaces
				
				$text = str_replace('â€˜','&lsquo;', $text);
				$text = str_replace('â€™','&rsquo;', $text);
				$text = str_replace('â€š','&sbquo;', $text);
				$text = str_replace('â€œ','&ldquo;', $text);
				$text = str_replace('â€�','&rdquo;', $text);
				$text = str_replace('â€ž','&bdquo;', $text);
				
				// IE 6 Can't use &apos; So we will have to use &lsquo; for now.
				$text = str_replace("`",'&lsquo;', str_replace("'",'&lsquo;', $text));
				//$text = str_replace("`",'&apos;', str_replace("'",'&apos;', str_replace('â€™', '&apos;', str_replace('â€˜', '&apos;', $text)))); // Replace ` and ' with W3c valids
				$text = str_replace('"','&quot;', str_replace('â€œ','&quot;', str_replace('â€�', '&quot;', $text))); // Replace " with W3c valids
				
				$text = str_replace('â€ ','&dagger;', $text);
				$text = str_replace('â€¡','&Dagger;', $text);
				$text = str_replace('â€¹','&lsaquo;', $text);
				$text = str_replace('â€º','&rsaquo;', $text);
				$text = str_replace('â‚¬','&euro;', $text);
				
				$text = str_replace('Â¢','&cent;', $text);
				$text = str_replace('Â£','&pound;', $text);
				$text = str_replace('Â¥','&yen;', $text);
				$text = str_replace('Â¦','&brvbar;', $text);
				$text = str_replace('Â§','&sect;', $text);
				$text = str_replace('Â©','&copy;', $text);
				$text = str_replace('Âª','&ordf;', $text);
				$text = str_replace('Â«','&laquo;', $text);
				$text = str_replace('Â¬','&not;', $text);
				$text = str_replace('Â®','&reg;', $text);
				$text = str_replace('â„¢','&trade;', $text);
				$text = str_replace('Â¯','&macr;', $text);
				$text = str_replace('Â°','&deg;', $text);
				$text = str_replace('Â±','&plusmn;', $text);
				$text = str_replace('Â²','&sup2;', $text);
				$text = str_replace('Â³','&sup3;', $text);
				$text = str_replace('Â´','&acute;', $text);
				$text = str_replace('Âµ','&micro;', $text);
				$text = str_replace('Â¶','&para;', $text);
				$text = str_replace('Â·','&middot;', $text);
				$text = str_replace('Â¸','&cedil;', $text);
				$text = str_replace('Â¹','&sup1;', $text);
				$text = str_replace('Âº','&ordm;', $text);
				$text = str_replace('Â»','&raquo;', $text);
				$text = str_replace('Â¼','&frac14;', $text);
				$text = str_replace('Â½','&frac12;', $text);
				$text = str_replace('Â¾','&frac34;', $text);
				$text = str_replace('Â¿','&iquest;', $text);
				$text = str_replace('Ã—','&times;', $text);
				$text = str_replace('Ã·','&divide;', $text);
				$text = str_replace('Ã€','&Agrave;', $text);
				$text = str_replace('Ã�','&Aacute;', $text);
				$text = str_replace('Ã‚','&Acirc;', $text);
				$text = str_replace('Ãƒ','&Atilde;', $text);
				$text = str_replace('Ã„','&Auml;', $text);
				$text = str_replace('Ã…','&Aring;', $text);
				$text = str_replace('Ã†','&AElig;', $text);
				$text = str_replace('Ã‡','&Ccedil;', $text);
				$text = str_replace('Ãˆ','&Egrave;', $text);
				$text = str_replace('Ã‰','&Eacute;', $text);
				$text = str_replace('ÃŠ','&Ecirc;', $text);
				$text = str_replace('Ã‹','&Euml;', $text);
				$text = str_replace('ÃŒ','&Igrave;', $text);
				$text = str_replace('Ã�','&Iacute;', $text);
				$text = str_replace('ÃŽ','&Icirc;', $text);
				$text = str_replace('Ã�','&Iuml;', $text);
				$text = str_replace('Ã�','&Iuml;', $text);
				$text = str_replace('Ã�','&ETH;', $text);
				$text = str_replace('Ã‘','&Ntilde;', $text);
				$text = str_replace('Ã’','&Ograve;', $text);
				$text = str_replace('Ã“','&Oacute;', $text);
				$text = str_replace('Ã”','&Ocirc;', $text);
				$text = str_replace('Ã•','&Otilde;', $text);
				$text = str_replace('Ã–','&Ouml;', $text);
				$text = str_replace('Ã˜','&Oslash;', $text);
				$text = str_replace('Ã™','&Ugrave;', $text);
				$text = str_replace('Ãš','&Uacute;', $text);
				$text = str_replace('Ã›','&Ucirc;', $text);
				$text = str_replace('Ãœ','&Uuml;', $text);
				$text = str_replace('Ã�','&Yacute;', $text);
				$text = str_replace('Ãž','&THORN;', $text);
				$text = str_replace('ÃŸ','&szlig;', $text);
				$text = str_replace('Ã ','&agrave;', $text);
				$text = str_replace('Ã¡','&aacute;', $text);
				$text = str_replace('Ã¢','&acirc;', $text);
				$text = str_replace('Ã£','&atilde;', $text);
				$text = str_replace('Ã¤','&auml;', $text);
				$text = str_replace('Ã¥','&aring;', $text);
				$text = str_replace('Ã¦','&aelig;', $text);
				$text = str_replace('Ã§','&ccedil;', $text);
				$text = str_replace('Ã¨','&egrave;', $text);
				$text = str_replace('Ã©','&eacute;', $text);
				$text = str_replace('Ãª','&ecirc;', $text);
				$text = str_replace('Ã«','&euml;', $text);
				$text = str_replace('Ã¬','&igrave;', $text);
				$text = str_replace('Ã­','&iacute;', $text);
				$text = str_replace('Ã®','&icirc;', $text);
				$text = str_replace('Ã¯','&iuml;', $text);
				$text = str_replace('Ã°','&eth;', $text);
				$text = str_replace('Ã±','&ntilde;', $text);
				$text = str_replace('Ã²','&ograve;', $text);
				$text = str_replace('Ã³','&oacute;', $text);
				$text = str_replace('Ã´','&ocirc;', $text);
				$text = str_replace('Ãµ','&otilde;', $text);
				$text = str_replace('Ã¶','&ouml;', $text);
				$text = str_replace('Ã¸','&oslash;', $text);
				$text = str_replace('Ã¹','&ugrave;', $text);
				$text = str_replace('Ãº','&uacute;', $text);
				$text = str_replace('Ã»','&ucirc;', $text);
				$text = str_replace('Ã¼','&uuml;', $text);
				$text = str_replace('Ã½','&yacute;', $text);
				$text = str_replace('Ã¾','&thorn;', $text);
				$text = str_replace('Ã¿','&yuml;', $text);
				
				$text = str_replace('Å’','&OElig;', $text);
				$text = str_replace('Å“','&oelig;', $text);
				$text = str_replace('Å ','&Scaron;', $text);
				$text = str_replace('Å¡','&scaron;', $text);
				$text = str_replace('Å¸','&Yuml;', $text);
				$text = str_replace('Ë†','&circ;', $text);
				$text = str_replace('Ëœ','&tilde;', $text);
				$text = str_replace('â€“','&ndash;', $text);
				$text = str_replace('â€”','&mdash;', $text);
				
				
				$text = stripcslashes(strip_tags($text)); // Get rid of backslashes and html
				return $text;
			}
			
			function Image($image, $url, $name) { // $name shouldn't include an extension "example" is correct, not "example.jpg" 
				if (!empty($image['name'])) {
					if (strstr($image['type'],"image")) {
						/* converts the file size form bytes to kilobytes */
						 $size = $image['size'] * 0.001024;

						 /* Get max filesize */
						$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name`='picmaxsize'";
						$query = mysql_query($sql, CONNECT) or die(mysql_error());
						$row = mysql_fetch_assoc($query);							

						if ($size < $row['s_value']) {
								$ext = substr($image['name'],strpos($image['name'],'.'));
								$sql = "SELECT `s_value` FROM ".MYSQL_PREFIX."_config WHERE `s_name`='photodirectory'";
								$query = mysql_query($sql, CONNECT) or die(mysql_error());
								$row = mysql_fetch_assoc($query);
								if (copy($image['tmp_name'], $row['s_value'].$url.$name.$ext)) { 
									return $row['s_value'].$url.$name.$ext; 
								} else { return 'error:copy'; }
						} else { return 'error:size'; }
					} else { return 'error:format'; }
				} else { return 'error:empty'; }
			}
}

?>