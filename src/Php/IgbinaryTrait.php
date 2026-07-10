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

namespace Phalcon\Traits\Php;

use function igbinary_serialize;
use function igbinary_unserialize;

/**
 * Igbinary based wrapper methods
 */
trait IgbinaryTrait
{
    /**
     * @param mixed $value
     *
     * @return string|null
     *
     * @link https://php.net/manual/en/function.igbinary-serialize.php
     */
    protected static function phpIgbinarySerialize(mixed $value): string | null
    {
        return igbinary_serialize($value);
    }

    /**
     * @param string $value
     *
     * @return mixed
     *
     * @link https://php.net/manual/en/function.igbinary-unserialize.php
     */
    protected static function phpIgbinaryUnserialize(string $value): mixed
    {
        return igbinary_unserialize($value);
    }
}
