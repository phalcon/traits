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

use function base64_decode;
use function base64_encode;
use function parse_url;
use function rawurldecode;
use function rawurlencode;
use function rtrim;
use function strlen;
use function substr;

/**
 * URL based wrapper methods.
 *
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
trait UrlTrait
{
    /**
     * @param string $input
     * @param bool   $strict
     *
     * @return string
     */
    protected function doBase64DecodeUrl(
        string $input,
        bool $strict = false
    ): string {
        $input = strtr($input, "-_", "+/")
            . substr("===", (strlen($input) + 3) % 4);

        $result = $this->phpBase64Decode($input, $strict);

        return false !== $result ? $result : '';
    }

    /**
     * @param string $input
     *
     * @return string
     */
    protected function doBase64EncodeUrl(string $input): string
    {
        return rtrim(
            strtr($this->phpBase64Encode($input), "+/", "-_"),
            "="
        );
    }

    /**
     * @param string $input
     * @param bool   $strict
     *
     * @return string|false
     *
     * @link https://www.php.net/manual/en/function.base64-decode.php
     */
    protected function phpBase64Decode(
        string $input,
        bool $strict = false
    ): string | false {
        return base64_decode($input, $strict);
    }

    /**
     * @param string $input
     *
     * @return string
     *
     * @link https://www.php.net/manual/en/function.base64-encode.php
     */
    protected function phpBase64Encode(string $input): string
    {
        return base64_encode($input);
    }

    /**
     * @param string $url
     * @param int    $component
     *
     * @return TParseUrl|false|int|string|null
     *
     * @link https://www.php.net/manual/en/function.parse-url.php
     */
    protected function phpParseUrl(string $url, int $component = -1): array | false | int | string | null
    {
        return parse_url($url, $component);
    }

    /**
     * @param string $string
     *
     * @return string
     *
     * @link https://www.php.net/manual/en/function.rawurldecode.php
     */
    protected function phpRawUrlDecode(string $string): string
    {
        return rawurldecode($string);
    }

    /**
     * @param string $string
     *
     * @return string
     *
     * @link https://www.php.net/manual/en/function.rawurlencode.php
     */
    protected function phpRawUrlEncode(string $string): string
    {
        return rawurlencode($string);
    }
}
