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

class Contact extends AbstractContact
{

    protected string $salutation = '';

    protected string $title = '';

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $firstName;

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $lastName;

    protected \DateTime $birthday;

    /**
     * @var ObjectStorage<Company>
     */
    protected ObjectStorage $companies;

    protected ?FileReference $photo;

    public function __construct(
        string $salutation,
        string $title,
        string $firstName,
        string $lastName
    ) {
        parent::__construct();
        $this->salutation = $salutation;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;

        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->companies = new ObjectStorage();
        $this->addresses = new ObjectStorage();
        $this->phoneNumbers = new ObjectStorage();
    }

    public function setSalutation(string $salutation): void
    {
        $this->salutation = $salutation;
    }

    public function getSalutation(): string
    {
        return $this->salutation;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setFirstName(string $firstName): void
    {
        if (strlen($firstName) == 0) {
            throw new \InvalidArgumentException(
                'The first name can not be blank.',
                1373525114
            );
        }

        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setLastName(string $lastName): void
    {
        if (strlen($lastName) == 0) {
            throw new \InvalidArgumentException(
                'The last name can not be blank.',
                1373525586
            );
        }

        $this->lastName = $lastName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(string $seperator = ' '): string
    {
        return implode($seperator, [$this->getFirstName(), $this->getLastName()]);
    }

    public function getTitleFullName(string $seperator = ' '): string
    {
        $titleFullName = [];
        if ($this->getTitle()) {
            $titleFullName[] = $this->getTitle();
        }
        $titleFullName[] = $this->getFullName($seperator);

        return implode($seperator, $titleFullName);
    }

    public function setBirthday(\DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getBirthday(): ?\DateTime
    {
        if ($this->birthday) {
            return $this->birthday;
        }

        return null;
    }

    public function addCompany(Company $company): void
    {
        $this->companies?->attach($company);
    }

    public function removeCompany(Company $company): void
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

    public function getPhoto(): ?FileReference
    {
        return $this->photo ?? null;
    }

    public function setPhoto(FileReference $photo): void
    {
        $this->photo = $photo;
    }
}
