<?php

use Extcode\Contacts\Controller\AddressController;
use Extcode\Contacts\Controller\CompanyController;
use Extcode\Contacts\Controller\ContactController;
use Extcode\Contacts\DataHandler\EvalFloat8;
use Extcode\Contacts\Hooks\DataHandler;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$_LLL_be = 'LLL:EXT:contacts/Resources/Private/Language/locallang_be.xlf';

ExtensionUtility::configurePlugin(
    'Contacts',
    'Contacts',
    [
        ContactController::class => 'list, show, teaser',
    ],
    [
        ContactController::class => 'list',
    ]
);

ExtensionUtility::configurePlugin(
    'Contacts',
    'ContactTeaser',
    [
        ContactController::class => 'teaser',
    ],
    [
        ContactController::class => '',
    ]
);

ExtensionUtility::configurePlugin(
    'Contacts',
    'Companies',
    [
        CompanyController::class => 'list, show, teaser',
    ],
    [
        CompanyController::class => 'list',
    ]
);

ExtensionUtility::configurePlugin(
    'Contacts',
    'CompanyTeaser',
    [
        CompanyController::class => 'teaser',
    ],
    [
        CompanyController::class => '',
    ]
);

ExtensionUtility::configurePlugin(
    'Contacts',
    'AddressSearch',
    [
        AddressController::class => 'search',
    ],
    [
        AddressController::class => 'search',
    ]
);

ExtensionUtility::configurePlugin(
    'Contacts',
    'Address',
    [
        AddressController::class => 'show',
    ],
    [
        AddressController::class => '',
    ]
);

// register "contacts:" namespace
$GLOBALS['TYPO3_CONF_VARS']['SYS']['fluid']['namespaces']['contacts'][]
    = 'Extcode\\Contacts\\ViewHelpers';

// clearCachePostProc Hook

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearCachePostProc']['contacts_clearcache'] =
    DataHandler::class . '->clearCachePostProc';

// provide extension configuration for TypoScript
$extensionConfiguration = new ExtensionConfiguration();
$contactsConfiguration = $extensionConfiguration->get('contacts');

ExtensionManagementUtility::addTypoScriptConstants('plugin.tx_contacts.googleMapsApiKey=' . $contactsConfiguration['googleMapsApiKey']);
ExtensionManagementUtility::addTypoScriptConstants('plugin.tx_contacts.googleMapsLibrary=' . $contactsConfiguration['googleMapsLibrary']);

// register class to be available in 'eval' of TCA
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tce']['formevals'][EvalFloat8::class] = '';

// register layouts
$GLOBALS['TYPO3_CONF_VARS']['EXT']['contacts']['templateLayouts']['address'][] = [$_LLL_be . ':flexforms_template.templateLayout.address.gmaps', 'gmaps'];

$GLOBALS['TYPO3_CONF_VARS']['EXT']['contacts']['templateLayouts']['contact_teaser'][] = [$_LLL_be . ':flexforms_template.templateLayout.contact_teaser.default', 'default'];
$GLOBALS['TYPO3_CONF_VARS']['EXT']['contacts']['templateLayouts']['company_teaser'][] = [$_LLL_be . ':flexforms_template.templateLayout.company_teaser.default', 'default'];
