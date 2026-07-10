<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Traits\Support\Helper\Arr;

use function array_filter;

/**
 * Filters a collection using array_filter with an optional callable
 */
trait FilterTrait
{
    /**
     * Helper method to filter the collection
     *
     * @param array<array-key, mixed> $collection
     * @param callable|null           $method
     *
     * @return array<array-key, mixed>
     */
    protected static function toFilter(
        array $collection,
        callable|null $method = null
    ): array {
        if (null === $method) {
            return $collection;
        }

        return array_filter($collection, $method);
    }
}
