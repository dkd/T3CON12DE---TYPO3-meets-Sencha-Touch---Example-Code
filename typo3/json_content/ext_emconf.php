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
 * ext_emconf file for json_content
 *
 * @package TYPO3
 * @subpackage json_content
 * @author Nils Dehl <nils.dehl@dkd.de>
 * @version $Id:$
 */
$EM_CONF[$_EXTKEY] = array(
	'title' => 'JSON Content',
	'description' => 'Adds a new cObject Type JSON_CONTENT to render table contents as JSON configured by TypoScript',
	'category' => 'plugin',
	'author' => 'Nils Dehl',
	'author_email' => 'nils.dehl@dkd.de',
	'author_company' => 'dkd Internet Service GmbH',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'extbase' => '1.3',
			'fluid' => '1.3',
			'typo3' => '4.5',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);

?>