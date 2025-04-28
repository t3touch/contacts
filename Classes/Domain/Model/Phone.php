<?php

namespace Extcode\Contacts\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Annotation\Validate;

/*
 * This file is part of the package extcode/contacts.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
class Phone extends AbstractEntity
{
    protected string $type = 'VOICE';

    #[Validate(['validator' => 'NotEmpty'])]
    protected string $number = '';

    public function setType(string $type): void
    {
        $types = [
            'PREF',
            'WORK',
            'HOME',
            'VOICE',
            'FAX',
            'MSG',
            'CELL',
            'PAGER',
            'BBS',
            'MODEM',
            'CAR',
            'ISDN',
            'VIDEO'
        ];

        if (!in_array($type, $types)) {
            throw new \InvalidArgumentException(
                'The type have to be a set of (PREF, WORK, HOME, VOICE, FAX, MSG, CELL, PAGER, BBS, MODEM, CAR, ISDN, VIDEO).',
                1373531068
            );
        }

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}
