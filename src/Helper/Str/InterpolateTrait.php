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

/**
 * Interpolates context values into the message placeholders
 *
 * @see http://www.php-fig.org/psr/psr-3/ Section 1.2 Message
 */
trait InterpolateTrait
{
    /**
     * @param string   $input
     * @param string[] $context
     * @param string   $left
     * @param string   $right
     *
     * @return string
     */
    protected static function staticToInterpolate(
        string $input,
        array $context = [],
        string $left = '%',
        string $right = '%'
    ): string {
        if (empty($context)) {
            return $input;
        }

        $replace = [];
        foreach ($context as $key => $value) {
            $replace[$left . $key . $right] = $value;
        }

        return strtr($input, $replace);
    }

    /**
     * @param string   $input
     * @param string[] $context
     * @param string   $left
     * @param string   $right
     *
     * @return string
     */
    protected function toInterpolate(
        string $input,
        array $context = [],
        string $left = '%',
        string $right = '%'
    ): string {
        return self::staticToInterpolate($input, $context, $left, $right);
    }
}
