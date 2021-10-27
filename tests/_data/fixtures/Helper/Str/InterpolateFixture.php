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

use Phalcon\Traits\Helper\Str\InterpolateTrait;

class InterpolateFixture
{
    use InterpolateTrait;

    /**
     * Interpolates context values into the message placeholders
     *
     * @see http://www.php-fig.org/psr/psr-3/ Section 1.2 Message
     *
     * @param string $input
     * @param array  $context
     * @param string $left
     * @param string $right
     *
     * @return string
     */
    public function interpolate(
        string $input,
        array $context = [],
        string $left = '%',
        string $right = '%'
    ): string {
        return $this->toInterpolate($input, $context, $left, $right);
    }
}
