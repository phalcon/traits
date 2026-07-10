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

use function strpos;
use function strtr;

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
    protected static function toInterpolate(
        string $input,
        array $context = [],
        string $left = '%',
        string $right = '%'
    ): string {
        if (empty($context)) {
            return $input;
        }

        if (false === strpos($input, $left)) {
            return $input;
        }

        $replace = [];
        foreach ($context as $key => $value) {
            $replace[$left . $key . $right] = $value;
        }

        return strtr($input, $replace);
    }
}
