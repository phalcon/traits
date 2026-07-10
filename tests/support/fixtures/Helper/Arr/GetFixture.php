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

use Phalcon\Traits\Support\Helper\Arr\GetTrait;

class GetFixture
{
    use GetTrait;

    /**
     * @param array<array-key, mixed> $collection
     * @param array-key               $index
     * @param mixed                   $defaultValue
     * @param string|null             $cast
     *
     * @return mixed
     */
    public function get(
        array $collection,
        int | string $index,
        mixed $defaultValue = null,
        ?string $cast = null
    ): mixed {
        return $this->getArrVal($collection, $index, $defaultValue, $cast);
    }
}
