<?php
// TYPO3 Security Check
if (!defined('TYPO3')) {
    die('Access denied.');
}

// Let's configuration of this extension from "Extension Manager"
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['blog'] = 'ns_theme_hohenlohe';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ns_theme_hohenlohe/Configuration/PageTSconfig/setup.tsconfig">');


if (TYPO3_MODE === 'BE') {
    // Let's add default PageTS for "Form"
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:ns_theme_hohenlohe/Configuration/RTE/Default.yaml';
}

if ($GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/backend.php']['constructPostProcess']) {
    // Let's add default PageTS for "Form"
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:ns_theme_hohenlohe/Configuration/RTE/Default.yaml';
}
