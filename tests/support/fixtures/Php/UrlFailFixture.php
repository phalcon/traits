<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Fixtures\Php;

class UrlFailFixture extends UrlFixture
{
    /**
     * @param string $input
     * @param bool   $strict
     *
     * @return string|false
     *
     * @link https://www.php.net/manual/en/function.base64-decode.php
     */
    protected function phpBase64Decode(
        string $input,
        bool $strict = false
    ): string|false {
        return false;
    }
}
