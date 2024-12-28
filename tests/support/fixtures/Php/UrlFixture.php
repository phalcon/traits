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

use Phalcon\Traits\Php\UrlTrait;

/**
 * @phpstan-type TParseUrl = array{
 *       scheme: string,
 *       host: string,
 *       port: int,
 *       user: string,
 *       pass: string,
 *       query: string,
 *       path: string,
 *       fragment: string
 *  }
 */
class UrlFixture
{
    use UrlTrait;

    /**
     * @param string $input
     * @param bool   $strict
     *
     * @return string
     */
    public function base64DecodeUrl(string $input, bool $strict = false): string
    {
        return $this->doBase64DecodeUrl($input, $strict);
    }

    /**
     * @param string $input
     *
     * @return string
     */
    public function base64EncodeUrl(string $input): string
    {
        return $this->doBase64EncodeUrl($input);
    }

    /**
     * @param string $input
     * @param bool   $strict
     *
     * @return string|false
     *
     * @link https://www.php.net/manual/en/function.base64-decode.php
     */
    public function base64Decode(string $input, bool $strict = false)
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
     * @param string $url
     * @param int    $component
     *
     * @return TParseUrl|false|int|string|null
     *
     * @link https://www.php.net/manual/en/function.parse-url.php
     */
    public function parseUrl(string $url, int $component = -1): array|false|int|string|null
    {
        return $this->phpParseUrl($url, $component);
    }

    /**
     * @param string $string
     *
     * @return string
     *
     * @link https://www.php.net/manual/en/function.rawurldecode.php
     */
    public function rawUrlDecode(string $string): string
    {
        return $this->phpRawUrlDecode($string);
    }

    /**
     * @param string $string
     *
     * @return string
     *
     * @link https://www.php.net/manual/en/function.rawurlencode.php
     */
    public function rawUrlEncode(string $string): string
    {
        return $this->phpRawUrlEncode($string);
    }
}
