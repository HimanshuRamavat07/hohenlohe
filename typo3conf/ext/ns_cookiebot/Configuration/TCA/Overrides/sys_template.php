<?php
defined('TYPO3_MODE') or die();
$extKey = 'ns_cookiebot';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', '[NITSAN] Cookiebot');