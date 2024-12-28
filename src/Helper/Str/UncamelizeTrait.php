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

/**
 * Converts strings to non camelized style
 */
trait UncamelizeTrait
{
    /**
     * @param string $text
     * @param string $delimiter
     *
     * @return string
     */
    public static function staticToUncamelize(
        string $text,
        string $delimiter = '_'
    ): string {
        $text = (string)preg_replace(
            '/[A-Z]/',
            $delimiter . '\\0',
            lcfirst($text)
        );

        return mb_convert_case($text, MB_CASE_LOWER, 'UTF-8');
    }

    /**
     * @param string $text
     * @param string $delimiter
     *
     * @return string
     */
    public function toUncamelize(
        string $text,
        string $delimiter = '_'
    ): string {
        return self::staticToUncamelize($text, $delimiter);
    }
}
