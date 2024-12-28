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

namespace Phalcon\Tests\Fixtures\Php;

use Phalcon\Traits\Php\JsonTrait;

class JsonFixture
{
    use JsonTrait;

    /**
     * @param mixed $value
     * @param int   $flags
     * @param int   $depth
     *
     * @return false|string
     *
     * @link https://php.net/manual/en/function.json-encode.php
     */
    public function jsonEncode($value, int $flags = 0, int $depth = 512)
    {
        return $this->phpJsonEncode($value, $flags, $depth);
    }

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
    public function jsonDecode(
        string $json,
        ?bool $associative = null,
        int $depth = 512,
        int $flags = 0
    ) {
        return $this->phpJsonDecode($json, $associative, $flags, $depth);
    }
}
