<?php

declare(strict_types=1);

/**
 * This file is part of nextphp.
 *
 * @link     https://github.com/next-laboratory
 * @license  https://github.com/next-laboratory/next/blob/master/LICENSE
 */

namespace Next\Foundation\Event\Collector;

use Next\Foundation\Event\Attribute\Listen;
use Next\Aop\Collector\AbstractCollector;
use Next\Event\ListenerProvider;
use Psr\Container\ContainerExceptionInterface;
use ReflectionException;

class ListenerCollector extends AbstractCollector
{
    /**
     * @throws ReflectionException
     * @throws ContainerExceptionInterface
     */
    public static function collectClass(string $class, object $attribute): void
    {
        if ($attribute instanceof Listen) {
            make(ListenerProvider::class)->addListener(make($class));
        }
    }
}
