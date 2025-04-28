<?php

use Extcode\Contacts\Controller\Backend\CompanyController;
use Extcode\Contacts\Controller\Backend\ContactController;

return [
    'web_contacts' => [
        'parent' => 'web',
        'position' => ['bottom'],
        'access' => 'admin',
        'workspaces' => 'live',
        'path' => '/module/web/contacts',
        'labels' => 'LLL:EXT:contacts/Resources/Private/Language/locallang_db.xlf:tx_contacts.module.contacts',
        'iconIdentifier' => 'module-contacts',
        'extensionName' => 'Contacts',
        'controllerActions' => [
            CompanyController::class => [
                'list', 'show',
            ],
            ContactController::class => [
                'list', 'show',
            ],
        ],
    ],
];
