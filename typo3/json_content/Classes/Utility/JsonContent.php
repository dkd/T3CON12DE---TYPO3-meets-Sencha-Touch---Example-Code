<?php
class Tx_JsonContent_Utility_JsonContent {

	/**
	 * Rendering the cObject, CONTENT
	 *
	 * @param	array		Array of TypoScript properties
	 * @return	string		Output
	 */
	public function cObjGetSingleExt($name, $conf, $TSkey, $parent) {
		$resultRecords = array();
		$response = array();

		$this->cObj = $parent;

		$originalRec = $GLOBALS['TSFE']->currentRecord;
		if ($originalRec) { // If the currentRecord is set, we register, that this record has invoked this function. It's should not be allowed to do this again then!!
			$GLOBALS['TSFE']->recordRegister[$originalRec]++;
		}

		$conf['table'] = isset($conf['table.'])
		? trim($this->cObj->stdWrap($conf['table'], $conf['table.']))
		: trim($conf['table']);
		$tablePrefix = t3lib_div::trimExplode('_', $conf['table'], TRUE);
		if (t3lib_div::inList('pages,tt,fe,tx,ttx,user,static', $tablePrefix[0])) {

			$again = FALSE;

			do {
				$res = $this->cObj->exec_getQuery($conf['table'], $conf['select.']);
				if ($error = $GLOBALS['TYPO3_DB']->sql_error()) {
					$GLOBALS['TT']->setTSlogMessage($error, 3);
				} else {
					$this->cObj->currentRecordTotal = $GLOBALS['TYPO3_DB']->sql_num_rows($res);
					$GLOBALS['TT']->setTSlogMessage('NUMROWS: ' . $GLOBALS['TYPO3_DB']->sql_num_rows($res));
					/* @var $cObj tslib_cObj */
					$cObj = t3lib_div::makeInstance('tslib_cObj');
					$cObj->setParent($this->cObj->data, $this->cObj->currentRecord);
					$this->cObj->currentRecordNumber = 0;
					$cobjValue = '';
					while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {

						// Versioning preview:
						$GLOBALS['TSFE']->sys_page->versionOL($conf['table'], $row, TRUE);

						// Language overlay:
						if (is_array($row) && $GLOBALS['TSFE']->sys_language_contentOL) {
							if ($conf['table'] == 'pages') {
								$row = $GLOBALS['TSFE']->sys_page->getPageOverlay($row);
							} else {
								$row = $GLOBALS['TSFE']->sys_page->getRecordOverlay($conf['table'], $row, $GLOBALS['TSFE']->sys_language_content, $GLOBALS['TSFE']->sys_language_contentOL);
							}
						}

						if (is_array($row)) { // Might be unset in the sys_language_contentOL
							// Call hook for possible manipulation of database row for cObj->data

							if (!$GLOBALS['TSFE']->recordRegister[$conf['table'] . ':' . $row['uid']]) {
								$this->cObj->currentRecordNumber++;
								$cObj->parentRecordNumber = $this->cObj->currentRecordNumber;
								$GLOBALS['TSFE']->currentRecord = $conf['table'] . ':' . $row['uid'];
								$this->cObj->lastChanged($row['tstamp']);
								$cObj->start($row, $conf['table']);
								if (isset($conf['fieldRendering.'])) {
									foreach ($row as $field => &$value){
										if (isset($conf['fieldRendering.'][$field . '.']) && !empty($value)) {
											$value = $cObj->stdWrap($value, $conf['fieldRendering.'][$field . '.']);
										}
									}
								}

								$resultRecords[] = $row;
							}
						}
					}
					$GLOBALS['TYPO3_DB']->sql_free_result($res);
				}

			} while ($again);

		}


		$GLOBALS['TSFE']->currentRecord = $originalRec; // Restore


		$response['success'] = TRUE;
		$response['items'] = $resultRecords;
		$response['total'] = count($resultRecords);

		if (($_GET['callback'])) {
			return $_GET['callback'] . '(' .json_encode($response) . ');';
		} else {
			return json_encode($response);
		}
	}
}
?>