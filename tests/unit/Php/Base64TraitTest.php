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

namespace Phalcon\Tests\Unit\Php;

use Phalcon\Tests\Fixtures\Php\Base64Fixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

/**
 * Tests the Base64 trait
 */
final class Base64TraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\Base64Trait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-30
     */
    public function testHelperPhpBase64Trait(): void
    {
        $base64 = new Base64Fixture();
        $source = 'Testing-Data/phalcon';

        $expected = 'VGVzdGluZy1EYXRhL3BoYWxjb24=';
        $actual   = $base64->base64Encode($source);
        $this->assertEquals($expected, $actual);

        $actual = $base64->base64Decode($expected);
        $this->assertEquals($source, $actual);

        $expected = 'VGVzdGluZy1EYXRhL3BoYWxjb24';
        $actual   = $base64->encodeUrl($source);
        $this->assertEquals($expected, $actual);

        $actual = $base64->decodeUrl($expected);
        $this->assertEquals($source, $actual);
    }
}
