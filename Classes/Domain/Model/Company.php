<?php

namespace Extcode\Contacts\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\Validate;

class Company extends AbstractContact
{

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $name;

    protected string $legalName = '';

    protected string $legalForm = '';

    protected string $registeredOffice = '';

    protected string $registerCourt = '';

    protected string $registerNumber = '';

    protected string $vatId = '';

    /**
     * @var ObjectStorage<Contact>
     */
    protected ObjectStorage $directors;

    /**
     * @var ObjectStorage<Contact>
     */
    protected ObjectStorage $contacts;

    /**
     * @var ObjectStorage<Company>
     */
    protected ObjectStorage $companies;

    protected ?FileReference $logo;

    public function __construct(string $name)
    {
        parent::__construct();
        $this->name = $name;
    }

    public function initializeObject(): void
    {
        $this->directors = new ObjectStorage();
        $this->contacts = new ObjectStorage();
        $this->companies = new ObjectStorage();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (strlen($name) == 0) {
            throw new \InvalidArgumentException(
                'The name can not be blank.',
                1373527548
            );
        }

        $this->name = $name;
    }

    public function getLegalName(): string
    {
        return $this->legalName;
    }

    public function setLegalName(string $legalName): void
    {
        $this->legalName = $legalName;
    }

    public function getLegalForm(): string
    {
        return $this->legalForm;
    }

    public function setLegalForm(string $legalForm): void
    {
        $this->legalForm = $legalForm;
    }

    public function getRegisteredOffice(): string
    {
        return $this->registeredOffice;
    }

    public function setRegisteredOffice(string $registeredOffice): void
    {
        $this->registeredOffice = $registeredOffice;
    }

    public function getRegisterCourt(): string
    {
        return $this->registerCourt;
    }

    public function setRegisterCourt(string $registerCourt): void
    {
        $this->registerCourt = $registerCourt;
    }

    public function getRegisterNumber(): string
    {
        return $this->registerNumber;
    }

    public function setRegisterNumber(string $registerNumber): void
    {
        $this->registerNumber = $registerNumber;
    }

    public function getVatId(): string
    {
        return $this->vatId;
    }

    public function setVatId(string $vatId): void
    {
        $this->vatId = $vatId;
    }

    public function addDirector(Contact $director): void
    {
        $this->directors?->attach($director);
    }

    public function removeDirector(Contact $director): void
    {
        $this->directors?->detach($director);
    }

    /**
     * @return ObjectStorage<Contact>
     */
    public function getDirectors(): ObjectStorage
    {
        return $this->directors;
    }

    /**
     * @param ObjectStorage<Contact> $directors
     */
    public function setDirectors($directors): void
    {
        $this->directors = $directors;
    }

    public function addContact(Contact $contact): void
    {
        $this->contacts?->attach($contact);
    }

    public function removeContact(Contact $contact): void
    {
        $this->contacts?->detach($contact);
    }

    /**
     * @return ObjectStorage<Contact> $contacts
     */
    public function getContacts(): ObjectStorage
    {
        return $this->contacts;
    }

    /**
     * @param ObjectStorage<Contact> $contacts
     */
    public function setContacts(ObjectStorage $contacts): void
    {
        $this->contacts = $contacts;
    }

    public function addCompany(self $company): void
    {
        $this->companies?->attach($company);
    }

    public function removeCompany(self $company): void
    {
        $this->companies?->detach($company);
    }

    /**
     * @return ObjectStorage<Company> $companies
     */
    public function getCompanies(): ObjectStorage
    {
        return $this->companies;
    }

    /**
     * @param ObjectStorage<Company> $companies
     */
    public function setCompanies(ObjectStorage $companies): void
    {
        $this->companies = $companies;
    }

    public function getLogo(): ?FileReference
    {
        return $this->logo ?? null;
    }

    public function setLogo(FileReference $logo): void
    {
        $this->logo = $logo;
    }
}
