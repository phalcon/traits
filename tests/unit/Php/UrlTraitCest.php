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
use Phalcon\Tests\Fixtures\Php\UrlFixture;
use UnitTester;

/**
 * Tests the URL trait
 */
class UrlTraitCest
{
    /**
     * Tests Phalcon\Traits\Php\UrlTrait
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-30
     */
    public function phpUrlTrait(UnitTester $I): void
    {
        $I->wantToTest('Php\UrlTrait');

        $url    = new UrlFixture();
        $source = "Testing-Data/phalcon";

        $expected = 'VGVzdGluZy1EYXRhL3BoYWxjb24=';
        $actual   = $url->base64Encode($source);
        $I->assertEquals($expected, $actual);

        $expected = $source;
        $data     = $actual;
        $actual   = $url->base64Decode($data);
        $I->assertEquals($expected, $actual);

        $expected = 'VGVzdGluZy1EYXRhL3BoYWxjb24';
        $actual   = $url->base64EncodeUrl($source);
        $I->assertEquals($expected, $actual);

        $expected = $source;
        $data     = $actual;
        $actual   = $url->base64DecodeUrl($data);
        $I->assertEquals($expected, $actual);

        $expected = 'Testing-Data%2Fphalcon';
        $actual   = $url->rawUrlEncode($source);
        $I->assertEquals($expected, $actual);

        $expected = $source;
        $data     = $actual;
        $actual   = $url->rawUrlDecode($data);
        $I->assertEquals($expected, $actual);

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
        $I->assertEquals($expected, $actual);
    }

    /**
     * Tests Phalcon\Traits\Php\UrlTrait - base64_decode error
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-30
     */
    public function phpUrlTraitBase64DecodeError(UnitTester $I): void
    {
        $I->wantToTest('Php\UrlTrait :: base64_decode error');

        $url = Stub::make(
            UrlFixture::class,
            [
                'phpBase64Decode' => false,
            ]
        );

        $source = "Testing-Data/phalcon";
        $actual = $url->base64DecodeUrl($source);
        $I->assertEmpty($actual);
    }
}
