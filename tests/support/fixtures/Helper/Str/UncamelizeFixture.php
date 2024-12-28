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

use Phalcon\Traits\Helper\Str\UncamelizeTrait;

class UncamelizeFixture
{
    use UncamelizeTrait;

    /**
     * Uncamelizes a string
     *
     * @param string $text
     * @param string $delimiters
     *
     * @return string
     */
    public function Uncamelize(
        string $text,
        string $delimiter = '_'
    ): string {
        return $this->toUncamelize($text, $delimiter);
    }
}
