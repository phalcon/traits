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

use function parse_url;
use function rawurldecode;
use function rawurlencode;

/**
 * URL based wrapper methods.
 *
 * @phpstan-type TParseUrl = array{
 *       scheme?: string,
 *       host?: string,
 *       port?: int<0, 65535>,
 *       user?: string,
 *       pass?: string,
 *       path?: string,
 *       query?: string,
 *       fragment?: string
 *  }
 */
trait UrlTrait
{
    /**
     * @param string $url
     * @param int    $component
     *
     * @return TParseUrl|false|int|string|null
     *
     * @link https://www.php.net/manual/en/function.parse-url.php
     */
    protected static function phpParseUrl(string $url, int $component = -1): array | false | int | string | null
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
    protected static function phpRawUrlDecode(string $string): string
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
    protected static function phpRawUrlEncode(string $string): string
    {
        return rawurlencode($string);
    }
}
