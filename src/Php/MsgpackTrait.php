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

use function msgpack_pack;
use function msgpack_unpack;

/**
 * MessagePack based wrapper methods
 */
trait MsgpackTrait
{
    /**
     * @param mixed $value
     *
     * @return string
     *
     * @link https://php.net/manual/en/function.msgpack-pack.php
     */
    protected static function phpMsgpackPack(mixed $value): string
    {
        return msgpack_pack($value);
    }

    /**
     * @param string $value
     *
     * @return mixed
     *
     * @link https://php.net/manual/en/function.msgpack-unpack.php
     */
    protected static function phpMsgpackUnpack(string $value): mixed
    {
        return msgpack_unpack($value);
    }
}
