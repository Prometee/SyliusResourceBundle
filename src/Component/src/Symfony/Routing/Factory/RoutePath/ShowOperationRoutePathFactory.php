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

namespace Sylius\Resource\Symfony\Routing\Factory\RoutePath;

use Sylius\Resource\Metadata\HttpOperation;
use Sylius\Resource\Metadata\ShowOperationInterface;

/**
 * @experimental
 */
final class ShowOperationRoutePathFactory implements OperationRoutePathFactoryInterface
{
    public function __construct(private OperationRoutePathFactoryInterface $decorated)
    {
    }

    public function createRoutePath(HttpOperation $operation, string $rootPath): string
    {
        $shortName = $operation->getShortName();
        $identifier = $operation->getResource()?->getIdentifier() ?? 'id';

        if ($operation instanceof ShowOperationInterface) {
            $path = match ($shortName) {
                'show', 'get' => '',
                default => '/' . $shortName,
            };

            return sprintf('%s/{%s}%s', $rootPath, $identifier, $path);
        }

        return $this->decorated->createRoutePath($operation, $rootPath);
    }
}
