<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Traits\Helper\Arr;

use function array_filter;
use function is_callable;

/**
 * Provides a wrapper to array_filter with a callable on an array
 */
trait FilterTrait
{
    /**
     * @param array<array-key, mixed> $collection
     * @param callable|null           $method
     * @param int                     $mode
     *
     * @return array<array-key, mixed>
     */
    protected function staticToFilter(
        array $collection,
        callable|null $method = null,
        int $mode = 0
    ): array {
        if (null === $method || !is_callable($method)) {
            return $collection;
        }

        return array_filter($collection, $method, $mode);
    }

    /**
     * @param array<array-key, mixed> $collection
     * @param callable|null           $method
     * @param int                     $mode
     *
     * @return array<array-key, mixed>
     */
    protected function toFilter(
        array $collection,
        callable|null $method = null,
        int $mode = 0
    ): array {
        return self::staticToFilter($collection, $method, $mode);
    }
}
