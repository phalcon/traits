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

use Phalcon\Traits\Helper\Str\CamelizeTrait;

class CamelizeFixture
{
    use CamelizeTrait;

    /**
     * Camelizes a string
     *
     * @param string $text
     * @param string $delimiters
     * @param bool   $lowerFirst
     *
     * @return string
     */
    public function camelize(
        string $text,
        string $delimiters,
        bool $lowerFirst
    ): string {
        return $this->toCamelize($text, $delimiters, $lowerFirst);
    }
}
