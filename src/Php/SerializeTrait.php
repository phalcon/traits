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

use function serialize;
use function unserialize;

/**
 * PHP serialize/unserialize wrapper methods
 */
trait SerializeTrait
{
    /**
     * @param mixed $value
     *
     * @return string
     *
     * @link https://php.net/manual/en/function.serialize.php
     */
    protected static function phpSerialize(mixed $value): string
    {
        return serialize($value);
    }

    /**
     * @param string $data
     * @param array{allowed_classes?: array<string>|bool, max_depth?: int} $options
     *
     * @return mixed
     *
     * @link https://php.net/manual/en/function.unserialize.php
     */
    protected static function phpUnserialize(string $data, array $options = []): mixed
    {
        return unserialize($data, $options);
    }
}
