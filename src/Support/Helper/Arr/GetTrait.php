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

use function settype;

/**
 * Gets an array element by key and if it does not exist returns the default.
 * It also allows for casting the returned value to a specific type using
 * `settype` internally
 */
trait GetTrait
{
    /**
     * @param array<array-key, mixed> $collection
     * @param array-key               $index
     * @param mixed                   $defaultValue
     * @param string|null             $cast
     *
     * @return mixed
     */
    protected static function getArrVal(
        array $collection,
        int | string $index,
        mixed $defaultValue = null,
        ?string $cast = null
    ): mixed {
        $value = $defaultValue;
        if (true === isset($collection[$index])) {
            $value = $collection[$index];
        }

        if ($cast) {
            settype($value, $cast);
        }

        return $value;
    }
}
