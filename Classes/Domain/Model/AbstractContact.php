<?php
declare(strict_types=1);

namespace Extcode\Contacts\Domain\Model;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Annotation\ORM\Lazy;

abstract class AbstractContact extends AbstractEntity
{
    /**
     * @var ObjectStorage<Address>
     */
    protected ObjectStorage $addresses;

    /**
     * @var ObjectStorage<Phone>
     */
    protected ObjectStorage $phoneNumbers;

    protected string $email = '';

    protected string $uri = '';

    protected string $teaser = '';

    protected string $description = '';

    protected string $metaDescription = '';

    /**
     * @var ObjectStorage<TtContent>
     */
    #[Lazy]
    protected ObjectStorage $ttContent;

    protected ?Category $category;

    /**
     * @var ObjectStorage<Category>
     */
    protected ObjectStorage $categories;

    public function __construct()
    {
        $this->initializeObject();
    }

    public function initializeObject(): void
    {
        $this->addresses = new ObjectStorage();
        $this->phoneNumbers = new ObjectStorage();
        $this->ttContent = new ObjectStorage();
        $this->categories = new ObjectStorage();
    }

    public function addAddress(Address $address): void
    {
        $this->addresses?->attach($address);
    }

    public function removeAddress(Address $address): void
    {
        $this->addresses?->detach($address);
    }

    /**
     * @return ObjectStorage<Address>
     */
    public function getAddresses(): ObjectStorage
    {
        return $this->addresses;
    }

    /**
     * @param ObjectStorage<Address> $addresses
     */
    public function setAddresses(ObjectStorage $addresses): void
    {
        $this->addresses = $addresses;
    }

    public function addPhoneNumber(Phone $phoneNumber): void
    {
        $this->phoneNumbers?->attach($phoneNumber);
    }
    public function removePhoneNumber(Phone $phoneNumber): void
    {
        $this->phoneNumbers?->detach($phoneNumber);
    }

    /**
     * @return ObjectStorage<Phone> $phoneNumbers
     */
    public function getPhoneNumbers(): ObjectStorage
    {
        return $this->phoneNumbers;
    }

    /**
     * @param ObjectStorage<Phone> $phoneNumbers
     */
    public function setPhoneNumbers(ObjectStorage $phoneNumbers): void
    {
        $this->phoneNumbers = $phoneNumbers;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): void
    {
        $this->uri = $uri;
    }

    public function getTeaser(): string
    {
        return $this->teaser;
    }

    public function setTeaser(string $teaser): void
    {
        $this->teaser = $teaser;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(string $metaDescription): void
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return ObjectStorage
     */
    public function getTtContent(): ObjectStorage
    {
        return $this->ttContent;
    }

    /**
     * @param ObjectStorage $ttContent
     */
    public function setTtContent(ObjectStorage $ttContent): void
    {
        $this->ttContent = $ttContent;
    }

    public function getCategory(): ?Category
    {
        return $this->category ?? null;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function addCategory(Category $category): void
    {
        $this->categories?->attach($category);
    }

    public function removeCategory(Category $category): void
    {
        $this->categories?->detach($category);
    }

    /**
     * Returns the Categories
     *
     * @return ObjectStorage<Category> $categories
     */
    public function getCategories(): ObjectStorage
    {
        return $this->categories;
    }

    public function getFirstCategory(): ?Category
    {
        $categories = $this->getCategories();
        if ($categories !== null) {
            $categories->rewind();
            return $categories->current();
        }

        return null;
    }

    /**
     * Sets the Categories
     *
     * @param ObjectStorage<Category> $categories
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }
}
