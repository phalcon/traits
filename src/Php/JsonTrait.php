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

use function json_decode;
use function json_encode;

/**
 * JSON wrapper methods
 */
trait JsonTrait
{
    /**
     * @param string    $json
     * @param bool|null $associative
     * @param int       $depth
     * @param int       $flags
     *
     * @return mixed
     *
     * @link https://php.net/manual/en/function.json-decode.php
     */
    protected function phpJsonDecode(
        string $json,
        ?bool $associative = null,
        int $depth = 512,
        int $flags = 0
    ): mixed {
        return json_decode($json, $associative, $flags, $depth);
    }

    /**
     * @param mixed $value
     * @param int   $flags
     * @param int   $depth
     *
     * @return false|string
     *
     * @link https://php.net/manual/en/function.json-encode.php
     */
    protected function phpJsonEncode(
        mixed $value,
        int $flags = 0,
        int $depth = 512
    ): false | string {
        return json_encode($value, $flags, $depth);
    }
}
