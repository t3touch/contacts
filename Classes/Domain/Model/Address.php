<?php

namespace Extcode\Contacts\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

class Address extends AbstractEntity
{
    protected string $title = '';

    protected string $type = 'INTL,POSTAL,PARCEL,WORK';

    protected string $street = '';

    protected string $streetNumber = '';

    protected string $addition1 = '';

    protected string $addition2 = '';

    protected string $zip = '';

    protected string $city = '';

    protected string $region = '';

    protected ?Country $country;

    protected string $postBox = '';

    protected string $lat = '';

    /**
     * @var ObjectStorage<TtContent>
     */
    #[Lazy]
    protected ObjectStorage $ttContent;

    protected ?Contact  $contact;

    protected ?Company $company;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->ttContent = new ObjectStorage();
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setType(string $type): void
    {
        $types = ['DOM', 'INTL', 'POSTAL', 'PARCEL', 'HOME', 'WORK'];

        if (!in_array($type, $types)) {
            throw new \InvalidArgumentException(
                'The type have to be a set of (DOM, INTL, POSTAL, PARCEL, HOME, WORK).',
                1373530255
            );
        }

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreetNumber(string $streetNumber): void
    {
        $this->streetNumber = $streetNumber;
    }

    public function getStreetNumber(): string
    {
        return $this->streetNumber;
    }

    public function setAddition1(string $addition1): void
    {
        $this->addition1 = $addition1;
    }

    public function getAddition1(): string
    {
        return $this->addition1;
    }

    public function setAddition2(string $addition2): void
    {
        $this->addition2 = $addition2;
    }

    public function getAddition2(): string
    {
        return $this->addition2;
    }

    public function setZip(string $zip): void
    {
        $this->zip = $zip;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    public function getCountry(): ?Country
    {
        return $this->country ?? null;
    }

    public function setPostBox(string $postBox): void
    {
        $this->postBox = $postBox;
    }

    public function getPostBox(): string
    {
        return $this->postBox;
    }

    public function setLat(string $lat): void
    {
        $this->lat = $lat;
    }

    public function getLat(): string
    {
        return $this->lat;
    }

    public function setLon(string $lon): void
    {
        $this->lon = $lon;
    }

    public function getLon(): ?float
    {
        return $this->lon ?? null;
    }

    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
    }

    public function getContact(): ?Contact
    {
        return $this->contact ?? null;
    }

    public function getCompany(): ?Company
    {
        return $this->company ?? null;
    }

    public function setCompany($company): void
    {
        $this->company = $company;
    }

    /**
     * @param ObjectStorage $ttContent
     */
    public function setTtContent(ObjectStorage $ttContent): void
    {
        $this->ttContent = $ttContent;
    }

    /**
     * @return ObjectStorage
     */
    public function getTtContent(): ObjectStorage
    {
        return $this->ttContent;
    }
}
