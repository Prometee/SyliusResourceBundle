<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Sylius Sp. z o.o.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Sylius\Bundle\ResourceBundle\Validator\Constraints;

use Sylius\Bundle\ResourceBundle\Validator\DisabledValidator;
use Symfony\Component\Validator\Constraint;

final class Disabled extends Constraint
{
    public string $message = 'sylius.resource.not_disabled';

    public function getTargets(): array
    {
        return [self::PROPERTY_CONSTRAINT, self::CLASS_CONSTRAINT];
    }

    public function validatedBy(): string
    {
        return DisabledValidator::class;
    }
}
