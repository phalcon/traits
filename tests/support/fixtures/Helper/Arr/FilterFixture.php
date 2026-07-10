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

namespace Phalcon\Tests\Fixtures\Helper\Arr;

use Phalcon\Traits\Support\Helper\Arr\FilterTrait;

class FilterFixture
{
    use FilterTrait;

    /**
     * Proxy to the trait method
     *
     * @param array<int|string,mixed> $collection
     * @param callable|null           $method
     *
     * @return array<int|string,mixed>
     */
    public function filter(
        array $collection,
        callable|null $method = null
    ): array {
        return $this->toFilter($collection, $method);
    }
}
