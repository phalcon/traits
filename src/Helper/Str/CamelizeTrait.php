<?php

/**
 * This file is part of the Phalcon.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Traits\Helper\Str;

use function array_map;
use function implode;
use function lcfirst;
use function preg_split;
use function str_replace;
use function ucfirst;

use const PREG_SPLIT_DELIM_CAPTURE;
use const PREG_SPLIT_NO_EMPTY;

/**
 * Converts strings to upperCamelCase or lowerCamelCase
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
    public static function staticToCamelize(
        string $text,
        string $delimiters = '\-_',
        bool $lowerFirst = false
    ): string {
        $exploded = self::staticProcessArray($text, $delimiters);

        $output = array_map(
            function ($element) {
                return ucfirst(mb_strtolower($element));
            },
            $exploded
        );

        $result = implode('', $output);

        if (true === $lowerFirst) {
            $result = lcfirst($result);
        }

        return $result;
    }

    /**
     * @param string $text
     * @param string $delimiters
     * @param bool   $lowerFirst
     *
     * @return string
     */
    public function toCamelize(
        string $text,
        string $delimiters = '\-_',
        bool $lowerFirst = false
    ): string {
        return self::staticToCamelize($text, $delimiters, $lowerFirst);
    }

    /**
     * @param string      $text
     * @param string|null $delimiters
     *
     * @return array<array-key, string>
     */
    protected static function staticProcessArray(
        string $text,
        string $delimiters = '\-_'
    ): array {
        /**
         * Escape the `-` if it exists so that it does not get interpreted
         * as a range. First remove any escaping for the `-` if present and then
         * add it again - just to be on the safe side
         */
        $delimiters = str_replace(['\-', '-'], ['-', '\-'], $delimiters);

        $result = preg_split(
            '/[' . $delimiters . ']+/',
            $text,
            -1,
            PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
        );

        return (false === $result) ? [] : $result;
    }
}
