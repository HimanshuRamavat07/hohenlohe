<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l18n_parent',
        'transOrigDiffSourceField' => 'l18n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'name,subline,linktext,modelbannertitle,modelcontent',
        'iconfile' => 'EXT:faf_companies/Resources/Public/Icons/tx_fafcompanies_domain_model_company.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, companylogo, hoverlogo, name, slug, subline, linktext, modelbannerimages, modelbannertitle, modelcontent, industry, year, address, cooperating, facebook, youtube, instagram, linkedin, xing, rating, images, textcontent, media, bottomcontent, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',

            ],
        ],
        'l18n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_fafcompanies_domain_model_company',
                'foreign_table_where' => 'AND {#tx_fafcompanies_domain_model_company}.{#pid}=###CURRENT_PID### AND {#tx_fafcompanies_domain_model_company}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_source' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'l18n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => '',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
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
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'companylogo' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.companylogo',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'companylogo',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                            ],
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'companylogo',
                        'tablenames' => 'tx_fafcompanies_domain_model_company',
                        'table_local' => 'sys_file',
                    ],
                    'minitems' => 1,
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'hoverlogo' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.hoverlogo',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'hoverlogo',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                            ],
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'hoverlogo',
                        'tablenames' => 'tx_fafcompanies_domain_model_company',
                        'table_local' => 'sys_file',
                    ],
                    'minitems' => 1,
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],
        ],
        'slug' => [
            'label' => 'Slug',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['name'],
                    'replacements' => [
                        '/' => '-'
                    ],
                    'fieldSeparator' => '/',
                    'prefixParentPageSlug' => false,
                ],
                'fallbackCharacter' => '-',
                'default' => ''
            ]
        ],
        'subline' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.subline',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'linktext' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.linktext',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'modelbannerimages' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.modelbannerimages',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'modelbannerimages',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                            --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                            ],
                        ],
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'modelbannerimages',
                        'tablenames' => 'tx_fafcompanies_domain_model_company',
                        'table_local' => 'sys_file',
                    ],
                    'minitems' => 1,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
            
        ],
        'modelbannertitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.modelbannertitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'modelcontent' => [
            'exclude' => true,
            'label' => 'LLL:EXT:faf_companies/Resources/Private/Language/locallang_db.xlf:tx_fafcompanies_domain_model_company.modelcontent',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
          
        ],
        'industry' => [
            'exclude' => true,
            'label' => 'Industry',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
          
        ],
        'year' => [
            'exclude' => true,
            'label' => 'Foundation Year',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
          
        ],
        'address' => [
            'exclude' => true,
            'label' => 'Address',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'cooperating' => [
            'exclude' => true,
            'label' => 'Cooperating',
            'config' => [
                'type' => 'text',
                'size' => 30,
                'max' => 255,
            ],
          
        ],
        'facebook' => [
            'exclude' => true,
            'label' => 'Facebook',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'youtube' => [
            'exclude' => true,
            'label' => 'Youtube',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'instagram' => [
            'exclude' => true,
            'label' => 'Instagram',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'linkedin' => [
            'exclude' => true,
            'label' => 'LinkedIn',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'xing' => [
            'exclude' => true,
            'label' => 'Xing',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'rating' => [
            'exclude' => true,
            'label' => 'Rating (1-5)',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'range' => [
                    'lower' => 1,
                    'upper' => 5
                ],
                'eval' => 'num,required',
            ],
          
        ],
        'images' => [
            'exclude' => true,
            'label' => 'Text Image',
            'config' => [
                'type' => 'inline',
                'allowed' => 'tx_fafcompanies_domain_model_image',
                'foreign_table' => 'tx_fafcompanies_domain_model_image',
                'foreign_field' => 'cruser_id',
                'foreign_table_where' => 'AND tx_fafcompanies_domain_model_image.pid=###CURRENT_PID### AND tx_fafcompanies_domain_model_image.sys_language_uid IN (-1,0)',
                'appearance' => [
                    'collapseAll' => true,
                    'expandSingle' => true,
                    'levelLinksPosition' => 'bottom',
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'enabledControls' => [
                        'info' => false,
                    ]
                ],
 
            ],
        ],
        'textcontent' => [
            'exclude' => true,
            'label' => 'Text Content',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
        'media' => [
            'exclude' => true,
            'label' => 'LLL:EXT:ns_theme_hohenlohe/Resources/Private/Language/locallang_flex.xlf:general.videoUrl',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'bottomcontent' => [
            'exclude' => true,
            'label' => 'RTE',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
            ],
        ],
    ],
];

