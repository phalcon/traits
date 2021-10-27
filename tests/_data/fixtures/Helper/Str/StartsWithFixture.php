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

namespace Phalcon\Tests\Fixtures\Helper\Str;

use Phalcon\Traits\Helper\Str\StartsWithTrait;

class StartsWithFixture
{
    use StartsWithTrait;

    /**
     * Check if a string ends with a given string
     *
     * @param string $haystack
     * @param string $needle
     * @param bool   $ignoreCase
     *
     * @return bool
     */
    public function startsWith(
        string $haystack,
        string $needle,
        bool $ignoreCase = true
    ): bool {
        return $this->toStartsWith($haystack, $needle, $ignoreCase);
    }
}
