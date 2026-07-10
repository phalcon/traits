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

namespace Phalcon\Traits\Support\Helper\Str;

use function lcfirst;
use function strlen;
use function strpos;
use function strtolower;
use function strtoupper;

/**
 * Converts strings to upperCamelCase or lowerCamelCase.
 *
 * Byte-based ASCII conversion, matching the cphalcon `camelize()` builtin:
 * every delimiter character starts a new segment whose first character is
 * upper-cased and the rest lower-cased.
 */
trait CamelizeTrait
{
    /**
     * @param string $text
     * @param string $delimiters
     * @param bool   $lowerFirst
     *
     * @return string
     */
    public static function toCamelize(
        string $text,
        string $delimiters = '-_',
        bool $lowerFirst = false
    ): string {
        $result       = '';
        $preDelimiter = true;
        $length       = strlen($text);

        for ($i = 0; $i < $length; $i++) {
            $character = $text[$i];

            if (false !== strpos($delimiters, $character)) {
                $preDelimiter = true;

                continue;
            }

            if ($preDelimiter) {
                $result      .= strtoupper($character);
                $preDelimiter = false;
            } else {
                $result .= strtolower($character);
            }
        }

        if (true === $lowerFirst) {
            $result = lcfirst($result);
        }

        return $result;
    }
}
