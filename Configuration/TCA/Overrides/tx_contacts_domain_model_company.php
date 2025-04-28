<?php
defined('TYPO3') or die();

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

$_LLL_db = 'LLL:EXT:contacts/Resources/Private/Language/locallang_db.xlf:';

$GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['category'] = [
    'exclude' => true,
    'label' => $_LLL_db . 'tx_contacts_domain_model_company.category',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'foreign_table' => 'sys_category',
        'foreign_table_where' => 'AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        'items' => [
            ['', 0],
        ],
        'minitems' => 0,
        'maxitems' => 1,
        'eval' => 'int',
        'default' => 0,
    ],
];

$GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['categories'] = [
    'exclude' => true,
    'label' => $_LLL_db . 'tx_contacts_domain_model_company.categories',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectMultipleSideBySide',
        'foreign_table' => 'sys_category',
        'foreign_table_where' => 'AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
        'items' => [
            ['', 0],
        ],
        'minitems' => 0,
        'maxitems' => 9999,
        'eval' => 'int',
        'default' => 0,
    ],
];

// category restriction based on settings in extension manager
$categoryRestrictionSetting = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('contacts', 'categoryRestriction');

if ($categoryRestrictionSetting) {
    $categoryRestriction = '';
    switch ($categoryRestrictionSetting) {
        case 'current_pid':
            $categoryRestriction = ' AND sys_category.pid=###CURRENT_PID### ';
            break;
        case 'siteroot':
            $categoryRestriction = ' AND sys_category.pid IN (###SITEROOT###) ';
            break;
        case 'page_tsconfig':
            $categoryRestriction = ' AND sys_category.pid IN (###PAGE_TSCONFIG_IDLIST###) ';
            break;
        default:
            $categoryRestriction = '';
    }

    // prepend category restriction at the beginning of foreign_table_where
    if (!empty($categoryRestriction)) {
        $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['category']['config']['foreign_table_where'] = $categoryRestriction .
            $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['category']['config']['foreign_table_where'];
        $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['categories']['config']['foreign_table_where'] = $categoryRestriction .
            $GLOBALS['TCA']['tx_contacts_domain_model_company']['columns']['categories']['config']['foreign_table_where'];
    }
}
