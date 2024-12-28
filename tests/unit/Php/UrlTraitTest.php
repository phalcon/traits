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

use Codeception\Stub;
use Phalcon\Tests\Fixtures\Php\UrlFailFixture;
use Phalcon\Tests\Fixtures\Php\UrlFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the URL trait
 */
final class UrlTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\UrlTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-30
     */
    public function testHelperPhpUrlTrait(): void
    {
        $url    = new UrlFixture();
        $source = "Testing-Data/phalcon";

        $expected = 'VGVzdGluZy1EYXRhL3BoYWxjb24=';
        $actual   = $url->base64Encode($source);
        $this->assertEquals($expected, $actual);

        $expected = $source;
        $data     = $actual;
        $actual   = $url->base64Decode($data);
        $this->assertEquals($expected, $actual);

        $expected = 'VGVzdGluZy1EYXRhL3BoYWxjb24';
        $actual   = $url->base64EncodeUrl($source);
        $this->assertEquals($expected, $actual);

        $expected = $source;
        $data     = $actual;
        $actual   = $url->base64DecodeUrl($data);
        $this->assertEquals($expected, $actual);

        $expected = 'Testing-Data%2Fphalcon';
        $actual   = $url->rawUrlEncode($source);
        $this->assertEquals($expected, $actual);

        $expected = $source;
        $data     = $actual;
        $actual   = $url->rawUrlDecode($data);
        $this->assertEquals($expected, $actual);

        $source   = 'https://phalcon:secret@dev.phalcon.ld:8000/action?param=value#frag';
        $expected = [
            'scheme'   => 'https',
            'host'     => 'dev.phalcon.ld',
            'port'     => 8000,
            'user'     => 'phalcon',
            'pass'     => 'secret',
            'path'     => '/action',
            'query'    => 'param=value',
            'fragment' => 'frag',
        ];
        $actual   = $url->parseUrl($source);
        $this->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Traits\Php\UrlTrait - base64_decode error
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-30
     */
    public function testHelperPhpUrlTraitBase64DecodeError(): void
    {
        $url = new UrlFailFixture();

        $source = "Testing-Data/phalcon";
        $actual = $url->base64DecodeUrl($source);
        $this->assertEmpty($actual);
    }
}
