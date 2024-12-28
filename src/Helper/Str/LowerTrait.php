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

use const MB_CASE_LOWER;

/**
 * Lowercases a string using mbstring
 */
trait LowerTrait
{
    /**
     * @param string $text
     * @param string $encoding
     *
     * @return string
     */
    protected static function staticToLower(
        string $text,
        string $encoding = 'UTF-8'
    ): string {
        return mb_convert_case($text, MB_CASE_LOWER, $encoding);
    }

    /**
     * @param string $text
     * @param string $encoding
     *
     * @return string
     */
    protected function toLower(
        string $text,
        string $encoding = 'UTF-8'
    ): string {
        return self::staticToLower($text, $encoding);
    }
}
