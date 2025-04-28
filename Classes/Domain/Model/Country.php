<?php

namespace Extcode\Contacts\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Property\Exception;
use TYPO3\CMS\Extbase\Annotation\Validate;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
class Country extends AbstractEntity
{
    #[Validate(['validator' => 'NotEmpty'])]
    protected string $iso2 = '';

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $iso3 = '';

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $name = '';

    protected string $tld = '';

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $phoneCountryCode = '';

    public function setIso2(string $iso2): void
    {
        if (strlen($iso2) != 2) {
            throw new Exception(
                'The iso2 code has to have two chars.',
                1395925918
            );
        }

        $this->iso2 = $iso2;
    }

    public function getIso2(): string
    {
        return $this->iso2;
    }

    public function setIso3(string $iso3): void
    {
        if ((strlen($iso3) != 0) and (strlen($iso3) != 3)) {
            throw new Exception(
                'The iso3 code has to have three chars.',
                1395925960
            );
        }

        $this->iso3 = $iso3;
    }

    public function getIso3(): string
    {
        return $this->iso3;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setTld(string $tld): void
    {
        $this->tld = $tld;
    }

    public function getTld(): string
    {
        return $this->tld;
    }

    public function setPhoneCountryCode(string $phoneCountryCode): void
    {
        $this->phoneCountryCode = $phoneCountryCode;
    }

    public function getPhoneCountryCode(): string
    {
        return $this->phoneCountryCode;
    }
}
