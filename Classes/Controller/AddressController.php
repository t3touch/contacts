<?php

namespace Extcode\Contacts\Controller;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use Extcode\Contacts\Domain\Model\Address;
use Extcode\Contacts\Domain\Model\Dto\AddressSearch;
use Extcode\Contacts\Domain\Repository\AddressRepository;
use Extcode\Contacts\Domain\Repository\ZipRepository;
use Extcode\Contacts\Hooks\AddressSearchAddressesLoadedHookInterface;
use Extcode\Contacts\Utility\PageUtility;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class AddressController extends ActionController
{
    public function __construct(
        protected AddressRepository $addressRepository,
        protected ZipRepository $zipRepository)
    {}

    public function searchAction(): ResponseInterface
    {
        $addressSearch = new AddressSearch();
        if ($this->settings['orderBy']) {
            $addressSearch->setOrderBy($this->settings['orderBy']);
            if ($this->settings['fallbackOrderBy']) {
                $addressSearch->setFallbackOrderBy($this->settings['fallbackOrderBy']);
            }
        }

        if ($this->request->hasArgument('tx_contacts_addresssearch')) {
            $addressSearchArgs = $this->request->getArgument('tx_contacts_addresssearch');

            $addressSearch->setSearchString((string)$addressSearchArgs['searchWord']);
            $addressSearch->setRadius((int)$addressSearchArgs['radius']);

            $country = $addressSearchArgs['country'];
            $zip = $addressSearchArgs['zip'];
        } else {
            $addressSearchArgs = [];
        }

        $this->view->assign('searchWord', $addressSearch->getSearchString());
        $this->view->assign('zip', $zip);
        $this->view->assign('radius', $addressSearch->getRadius());

        if ($zip) {
            $point = $this->zipRepository->findByCountryAndZip($country, $zip, $this->settings['zipMapFile']);

            if (is_array($point)) {
                $addressSearch->setLat((float)$point['lat']);
                $addressSearch->setLon((float)$point['lon']);
            }
        }

        $addressSearch->setPids(
            PageUtility::extendPidListByChildren(
                $this->request->getAttribute('currentContentObject')->data['pages'] ?? '',
                $this->request->getAttribute('currentContentObject')->data['recursive'] ?? ''
            )
        );

        $addresses = $this->addressRepository->findByDistance($addressSearch);

        if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['contacts']['AddressSearchAddressesLoadedHook']) {
            foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['contacts']['AddressSearchAddressesLoadedHook'] as $className) {
                $_procObj = GeneralUtility::makeInstance($className);
                if (!$_procObj instanceof AddressSearchAddressesLoadedHookInterface) {
                    throw new \UnexpectedValueException($className . ' must implement interface ' . AddressSearchAddressesLoadedHookInterface::class, 123);
                }

                $addresses = $_procObj->enrichAddresses($addresses, $addressSearchArgs);
            }
        }

        $this->view->assign('addresses', $addresses);
        return $this->htmlResponse();
    }

    public function showAction(Address $address = null): ResponseInterface
    {
        if (!$address) {
            $address = $this->addressRepository->findByUid($this->settings['address']);
        }

        $this->view->assign('address', $address);
        return $this->htmlResponse();
    }
}
