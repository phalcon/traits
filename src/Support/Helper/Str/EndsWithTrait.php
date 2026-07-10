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

use function mb_strtolower;
use function str_ends_with;

/**
 * Check if a string ends with a given string
 */
trait EndsWithTrait
{
    /**
     * @param string $haystack
     * @param string $needle
     * @param bool   $ignoreCase
     *
     * @return bool
     */
    protected static function toEndsWith(
        string $haystack,
        string $needle,
        bool $ignoreCase = true
    ): bool {
        if ('' === $haystack || '' === $needle) {
            return false;
        }

        if ($ignoreCase) {
            $needle   = mb_strtolower($needle);
            $haystack = mb_strtolower($haystack);
        }

        return str_ends_with($haystack, $needle);
    }
}
