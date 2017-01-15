<?php
#iGnition CMS System
#(c)2010 by Chris Winchell (winchell.design@gmail.com)
#This project is ongoing...
#
#This program is not distributed under the terms of the GNU General
#Public License and will not be published or distributed without
#prior written consent of its owner. If leaked, the fradulent user
#accepts upon themselves all responsabilities of their actions and
#may be persued by leagal action.
#
#ATTN: Chris Winchell, 919 41st ST NW, Rochester, Minnesota 55901-4268, USA


// Caller ID
if (!defined("IN_SITE")) { die("Access Denied"); }

// Page Body
echo "<body>\n";
echo "<div>\n";
echo "<ol>\n";
echo "<li><a href='#section=1'>Item 1</a></li>\n";
echo "<li><a href='#section=2'>Item 2</a></li>\n";
echo "<li><a href='#section=3'>Item 3</a></li>\n";
echo "</ol>\n";
echo "</div>\n";

echo "<div class='content' id='1'>";
echo "Here some text... or something<br />";
echo "Section 1";
echo "</div>";
echo "<div class='content' id='2'>";
echo "Maybe a picture here or something<br />";
echo "Section 2";
echo "</div>";
echo "<div class='content' id='3'>";
echo "Definitely dont put anything here... okay, just kidding<br />";
echo "Section 3";
echo "</div>";

echo "<script type='text/javascript'>";
echo "activatables('section', ['1', '2', '3'])";
echo "</script>\n";


// Page Footer
echo "</body>\n";
echo "</html>";
?>