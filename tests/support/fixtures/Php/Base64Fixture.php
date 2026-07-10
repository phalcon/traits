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

use Phalcon\Traits\Php\Base64Trait;

class Base64Fixture
{
    use Base64Trait;

    /**
     * @param string $input
     * @param bool   $strict
     *
     * @return string|false
     *
     * @link https://www.php.net/manual/en/function.base64-decode.php
     */
    public function base64Decode(string $input, bool $strict = false): string | false
    {
        return $this->phpBase64Decode($input, $strict);
    }

    /**
     * @param string $input
     *
     * @return string
     *
     * @link https://www.php.net/manual/en/function.base64-encode.php
     */
    public function base64Encode(string $input): string
    {
        return $this->phpBase64Encode($input);
    }

    /**
     * @param string $input
     *
     * @return string
     */
    public function decodeUrl(string $input): string
    {
        return $this->doDecodeUrl($input);
    }

    /**
     * @param string $input
     *
     * @return string
     */
    public function encodeUrl(string $input): string
    {
        return $this->doEncodeUrl($input);
    }
}
