<?php
defined('TYPO3_MODE') || die('Access denied.');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:faf_companies/Configuration/PageTSConfig/ContentElementWizard.tsconfig">'
    );

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fafcompanies_domain_model_company', 'EXT:faf_companies/Resources/Private/Language/locallang_csh_tx_fafcompanies_domain_model_company.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fafcompanies_domain_model_company');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fafcompanies_domain_model_image');

