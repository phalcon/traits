<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Traits\Helper\Str;

use function mb_convert_case;

use const MB_CASE_UPPER;

/**
 * Uppercases a string using mbstring
 */
trait UpperTrait
{
    /**
     * @param string $text
     * @param string $encoding
     *
     * @return string
     */
    protected static function staticToUpper(
        string $text,
        string $encoding = 'UTF-8'
    ): string {
        return mb_convert_case($text, MB_CASE_UPPER, $encoding);
    }

    /**
     * @param string $text
     * @param string $encoding
     *
     * @return string
     */
    protected function toUpper(
        string $text,
        string $encoding = 'UTF-8'
    ): string {
        return self::staticToUpper($text, $encoding);
    }
}
