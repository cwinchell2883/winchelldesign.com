<?php
/**
 * elections - phpwebsite module
 *
 * See docs/AUTHORS and docs/COPYRIGHT for relevant info.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @version $Id: update.php 7595 2010-04-27 00:03:06Z verdon $
 * @author Verdon Vaillancourt <verdonv at gmail dot com>
 */

function elections_update(&$content, $currentVersion)
{
    $home_dir = PHPWS_Boost::getHomeDir();
    switch ($currentVersion) {


        case version_compare($currentVersion, '2.0.1', '<'):
            $content[] = '<pre>';

            $files = array('templates/view_candidate.tpl',
                       'templates/view_ballot.tpl', 
                       'templates/list_ballots.tpl'
                       );
            electionsUpdateFiles($files, $content);

            $content[] = '2.0.1 changes
----------------
+ Fixed duplicate error when editing candidates
+ Fixed saving image/file with candidate and ballot
+ Added image/file to views for ballots and candidates
+ Some tweaks to language
+ Added javascriptEnabled() checks around js checking in cast 
  ballot form and provided non-js alternatives
+ Some optimizing of code
+ Some code tidy up

</pre>';


        case version_compare($currentVersion, '2.0.2', '<'):
            $content[] = '<pre>';

            $content[] = '2.0.2 changes
----------------
+ Updated for phpws Core 2.0.0
+ PHP strict fixes
+ Some code tidy up
+ Implemented Icon class


</pre>';




    } // end switch
    return true;
}

function electionsUpdateFiles($files, &$content)
{
    if (PHPWS_Boost::updateFiles($files, 'elections')) {
        $content[] = '--- Updated the following files:';
    } else {
        $content[] = '--- Unable to update the following files:';
    }
    $content[] = "    " . implode("\n    ", $files);
}

?>