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

use function chr;
use function ord;
use function strlen;

/**
 * Converts strings to non camelized style.
 *
 * Byte-based ASCII conversion, matching the cphalcon `uncamelize()` builtin:
 * every ASCII upper-case letter is prefixed with the delimiter (except at the
 * start) and lower-cased; all other bytes pass through unchanged.
 */
trait UncamelizeTrait
{
    /**
     * @param string $text
     * @param string $delimiter
     *
     * @return string
     */
    protected static function toUncamelize(
        string $text,
        string $delimiter = '_'
    ): string {
        $result = '';
        $length = strlen($text);

        for ($i = 0; $i < $length; $i++) {
            $character = $text[$i];

            if ("\0" === $character) {
                break;
            }

            $ascii = ord($character);
            if ($ascii >= 65 && $ascii <= 90) {
                if ($i > 0) {
                    $result .= $delimiter;
                }

                $result .= chr($ascii + 32);
            } else {
                $result .= $character;
            }
        }

        return $result;
    }
}
