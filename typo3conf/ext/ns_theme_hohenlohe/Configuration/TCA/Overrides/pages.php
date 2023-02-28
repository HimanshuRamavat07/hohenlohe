<?php
// TYPO3 Security
defined('TYPO3_MODE') or die();

call_user_func(function () {
    $locallang_db = '';

    // Get Components from ext_localconf.php

    $temporaryColumns1 = [
       
     
    'header_class' => [
    'exclude' => 1,
   'label' => 'Progress Bar White Color',
   'config' => [
      'type' => 'check',
      'renderType' => 'checkboxToggle',
      'items' => [
         [
            0 => '',
            1 => '',
            'invertStateDisplay' => true
         ]
      ],
   ]
],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
        'pages',
        $temporaryColumns1
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'pages',
        'ns_theme_hohenlohe',
        'header_class'
    );
    $GLOBALS['TCA']['pages']['palettes']['ns_theme_hohenlohe']['canNotCollapse'] = 1;

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', 'header_class', '', 'after:title');
});
