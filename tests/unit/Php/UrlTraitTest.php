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

use Phalcon\Tests\Fixtures\Php\UrlFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

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
        $source = 'Testing-Data/phalcon';

        $expected = 'Testing-Data%2Fphalcon';
        $actual   = $url->rawUrlEncode($source);
        $this->assertEquals($expected, $actual);

        $actual = $url->rawUrlDecode($expected);
        $this->assertEquals($source, $actual);

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
        $actual = $url->parseUrl($source);
        $this->assertEquals($expected, $actual);
    }
}
