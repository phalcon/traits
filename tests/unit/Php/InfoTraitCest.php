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

use Phalcon\Tests\Fixtures\Php\InfoFixture;
use UnitTester;

/**
 * Tests the Info trait
 */
class InfoTraitCest
{
    /**
     * Tests Phalcon\Traits\Php\InfoTrait
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function phpInfoTrait(UnitTester $I)
    {
        $I->wantToTest('Php\InfoTrait');

        $info = new InfoFixture();

        $actual = $info->extensionLoaded('mbstring');
        $I->assertTrue($actual);

        $actual = $info->functionExists('function_exists');
        $I->assertTrue($actual);

        $expected = '/tmp';
        $actual   = $info->iniGet('session.save_path');
        $I->assertEquals($expected, $actual);
    }
}
