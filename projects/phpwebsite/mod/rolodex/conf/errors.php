<?php
/**
 * rolodex - phpwebsite module
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
 * @version $Id: errors.php 7503 2010-04-15 20:05:55Z verdon $
 * @author Verdon Vaillancourt <verdonv at gmail dot com>
 */

$errors = array (RDX_NO_USER_ID => dgettext('rolodex', 'Rolodex member is missing user id.'),
                 RDX_COULD_NOT_DELETE_IMG => dgettext('rolodex', 'There was a problem deleting the image.')
);

?>