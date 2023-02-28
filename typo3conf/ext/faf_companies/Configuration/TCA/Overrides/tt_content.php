<?php
defined('TYPO3_MODE') or die();

$_EXTKEY = 'faf_companies';

/***************
 * Plugin
 */
 \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Faf.FafCompanies',
        'Company',
        'company'
    );

$pluginSignature = str_replace('_', '', 'faf_companies') . '_' . 'company';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:faf_companies/Configuration/FlexForms/flexform.xml');
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'recursive,select_key,pages';

