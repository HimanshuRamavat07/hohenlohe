<?php
// TYPO3 Security
defined('TYPO3_MODE') or die();

call_user_func(function () {
    if (defined('ALL_COMPONENTS')) {
        $allComponents = constant('ALL_COMPONENTS');
        // Adding each components
        foreach ($allComponents as $extKey => $extValue) {
            foreach ($extValue as $key => $theComponent) {
                $tcaComponent = [
                    'showitem' => '
                        --palette--;LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_db.xlf:palette.general;general,
                        --palette--;;visibility,
                        --palette--;LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_db.xlf:tca.tab.elements;,header,pi_flexform,
                        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,space_before_class,space_after_class,
                        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                            --palette--;;language,
                        --div--;LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_db.xlf:palette.access,
                        --palette--;LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_db.xlf:palette.access;access,
                    ',
                ];
                $GLOBALS['TCA']['tt_content']['types'][$theComponent] = $tcaComponent;
            }
        }
    }

    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                'nsBase1Col', // CType
                '1 Column Grid', // label
                'Standard Container grid element', // description 
                [
                    [
                        ['name' => 'Column 1', 'colPos' => 101]
                    ]
                ] // grid configuration
            )
        )
        // override default configurations
        ->setIcon('EXT:ns_basetheme/Resources/Public/Icons/Container/container.svg')
    );

    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                'nsContainerSection', // CType
                'Content Section', // label
                'Add Content Section', // description 
                [
                    [
                        ['name' => 'Column 1', 'colPos' => 101]
                    ]
                ] // grid configuration
            )
        )
        // override default configurations
        ->setIcon('EXT:ns_basetheme/Resources/Public/Icons/Container/container.svg')
    );
});
