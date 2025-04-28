<?php

declare(strict_types=1);

namespace Extcode\Contacts\Controller\Backend;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Contact;
use Extcode\Contacts\Domain\Model\Dto\Demand;
use Extcode\Contacts\Domain\Repository\ContactRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\Template\ModuleTemplate;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Pagination\SimplePagination;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Pagination\QueryResultPaginator;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use \TYPO3\CMS\Extbase\Annotation\IgnoreValidation;

class ContactController extends ActionController
{
    protected int $pageId = 0;
    protected ModuleTemplate $moduleTemplate;

    public function __construct(
        protected readonly ContactRepository $contactRepository,
        protected readonly ModuleTemplateFactory $moduleTemplateFactory
    )
    {}

    protected function initializeAction(): void
    {
        $this->pageId = (int)($this->request->getParsedBody()['id'] ?? $this->request->getQueryParams()['id'] ?? 0);
        $this->contactRepository->setDefaultOrderings(['lastName' => QueryInterface::ORDER_ASCENDING]);
        $this->moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $this->createShortcutButton();
    }

    public function listAction(int $currentPage = 1): ResponseInterface
    {

        $demand = $this->createDemandObject();
        $contacts = $this->contactRepository->findDemanded($demand);

        $itemsPerPage = $this->settings['itemsPerPage'] ?? 25;
        $paginator = new QueryResultPaginator($contacts, $currentPage, $itemsPerPage);
        $pagination = new SimplePagination($paginator);

        $this->moduleTemplate->assignMultiple([
            'demand' => $demand,
            'contacts' => $contacts,
            'paginator' => $paginator,
            'pagination' => $pagination,
            'pages' => range(1, $pagination->getLastPageNumber()),
        ]);

        return $this->moduleTemplate->renderResponse('Backend/Contact/List');
    }

    public function createShortcutButton()
    {
        $pageTitle = BackendUtility::getRecordTitle('pages', BackendUtility::getRecord('pages', $this->pageId));
        $routeIdentifier = 'web_contacts'; // array-key of the module-configuration
        $buttonBar = $this->moduleTemplate->getDocHeaderComponent()->getButtonBar();
        $shortcutButton = $buttonBar->makeShortcutButton()
            ->setDisplayName($pageTitle)
            ->setRouteIdentifier($routeIdentifier)
            ->setArguments([
                'id' => $this->pageId,
                'controller' => 'Backend\Contact',
                'action' => 'list',
            ]);
        $buttonBar->addButton($shortcutButton, ButtonBar::BUTTON_POSITION_RIGHT);
    }

    #[IgnoreValidation(['contact'])]
    public function showAction(Contact $contact): ResponseInterface
    {
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $moduleTemplate->assign('contact', $contact);

        return $moduleTemplate->renderResponse('Backend/Contact/Show');
    }

    protected function createDemandObject(): Demand
    {
        $demand = GeneralUtility::makeInstance(Demand::class);

        if ($this->request->hasArgument('filter')) {
            $filter = $this->request->getArgument('filter');
            if (!empty($filter['searchString'])) {
                $demand->setSearchString($filter['searchString']);
            }
        }

        return $demand;
    }
}
