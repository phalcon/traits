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
use UnitTester;

/**
 * Tests the Json trait
 */
class JsonTraitCest
{
    /**
     * Tests Phalcon\Traits\Php\JsonTrait
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function phpJsonTrait(UnitTester $I): void
    {
        $I->wantToTest('Php\JsonTrait');

        $json = new JsonFixture();
        $data = [
            'one' => 'two',
            'three',
        ];

        $expected = '{"one":"two","0":"three"}';
        $actual   = $json->jsonEncode($data);
        $I->assertEquals($expected, $actual);

        $data     = '{"one":"two","0":"three"}';
        $expected = [
            'one' => 'two',
            'three',
        ];
        $actual   = $json->jsonDecode($data, true);
        $I->assertEquals($expected, $actual);
    }
}
