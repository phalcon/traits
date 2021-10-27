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

use Phalcon\Traits\Helper\Str\UpperTrait;

class UpperFixture
{
    use UpperTrait;

    /**
     * Uppercases a string using mbstring
     *
     * @param string $text
     * @param string $encoding
     *
     * @return string
     */
    public function upper(
        string $text,
        string $encoding = 'UTF-8'
    ): string {
        return $this->toUpper($text, $encoding);
    }
}
