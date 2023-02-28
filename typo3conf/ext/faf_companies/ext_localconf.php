<?php
defined('TYPO3_MODE') || die('Access denied.');

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'FafCompanies',
        'Company',
        [
            \Faf\FafCompanies\Controller\CompanyController::class => 'list, show'
        ],
        // non-cacheable actions
        [
            \Faf\FafCompanies\Controller\CompanyController::class => ''
        ]
    );

	$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
	
	$iconRegistry->registerIcon(
		'faf_companies-plugin-company',
		\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
		['source' => 'EXT:faf_companies/Resources/Public/Icons/user_plugin_company.svg']
	);
   $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['faf_companies'] = \Faf\FafCompanies\Hooks\PageLayoutView::class;
