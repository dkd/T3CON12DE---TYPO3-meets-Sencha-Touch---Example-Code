<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Nils Dehl <nils.dehl@dkd.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * ext_localconf file for json_content
 *
 * @package TYPO3
 * @subpackage json_content
 * @author Nils Dehl <nils.dehl@dkd.de>
 * @version $Id:$
 */
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_content.php']['cObjTypeAndClass'][] = array(
	'JSON_CONTENT',
	'Tx_JsonContent_Utility_JsonContent'
);
?>