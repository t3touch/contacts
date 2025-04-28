<?php

defined('TYPO3') or die();

$_LLL_core_general = 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf';
$_LLL_db = 'LLL:EXT:contacts/Resources/Private/Language/locallang_db.xlf';
$_LLL_tca = 'LLL:EXT:contacts/Resources/Private/Language/locallang_tca.xlf';

return [
    'ctrl' => [
        'title' => $_LLL_db . ':tx_contacts_domain_model_phone',
        'label' => 'number',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',

        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'street,zip,city',
        'iconfile' => 'EXT:contacts/Resources/Public/Icons/tx_contacts_domain_model_phone.svg',
    ],
    'types' => [
        '1' => [
            'showitem' => '
                type,
                number,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.tabs.access,
                    --palette--;' . $_LLL_tca . ':palettes.visibility;hiddenonly,
                    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_tca.xlf:pages.palettes.access;access,
            '
        ],
    ],
    'palettes' => [
        'hiddenonly' => [
            'showitem' => 'hidden;' . $_LLL_db . ':tx_contacts_domain_model_phone',
        ],
        'access' => [
            'showitem' => 'starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel, endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => ['type' => 'language'],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => '', 'value' => 0],
                ],
                'foreign_table' => 'tx_contacts_domain_model_phone',
                'foreign_table_where' => 'AND tx_contacts_domain_model_phone.pid=###CURRENT_PID### AND tx_contacts_domain_model_phone.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => $_LLL_core_general . ':LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle'
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'datetime',
                'size' => 13,
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'datetime',
                'size' => 13,
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'type' => [
            'exclude' => 0,
            'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.PREF',
                        'value' => 'PREF'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.WORK',
                        'value' => 'WORK'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.HOME',
                        'value' => 'HOME'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.VOICE',
                        'value' => 'VOICE'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.FAX',
                        'value' => 'FAX'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.MSG',
                        'value' => 'MSG'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.CELL',
                        'value' => 'CELL'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.PAGER',
                        'value' => 'PAGER'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.BBS',
                        'value' => 'BBS'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.MODEM',
                        'value' => 'MODEM'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.CAR',
                        'value' => 'CAR'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.ISDN',
                        'value' => 'ISDN'
                    ],
                    [
                        'label' => $_LLL_db . ':tx_contacts_domain_model_phone.type.VIDEO',
                        'value' => 'VIDEO'
                    ],
                ],
                'size' => 5,
                'minitems' => 1,
                'maxitems' => 10,
            ],
        ],
        'number' => [
            'exclude' => 0,
            'label' => $_LLL_db . ':tx_contacts_domain_model_phone.number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'required' => true
            ],
        ],
        'contact' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'company' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
