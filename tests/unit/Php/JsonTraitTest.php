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

use Phalcon\Tests\Fixtures\Php\JsonFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Json trait
 */
final class JsonTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\JsonTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpJsonTrait(): void
    {
        $json = new JsonFixture();
        $data = [
            'one' => 'two',
            'three',
        ];

        $expected = '{"one":"two","0":"three"}';
        $actual   = $json->jsonEncode($data);
        $this->assertEquals($expected, $actual);

        $data     = '{"one":"two","0":"three"}';
        $expected = [
            'one' => 'two',
            'three',
        ];
        $actual   = $json->jsonDecode($data, true);
        $this->assertEquals($expected, $actual);
    }
}
