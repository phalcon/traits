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

use Phalcon\Tests\Fixtures\Php\IniFixture;
use PHPUnit\Framework\TestCase;

use function dataDir;

/**
 * Tests the Ini trait
 */
final class IniTraitTest extends TestCase
{
    /**
     * Tests Phalcon\Traits\Php\IniTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2023-01-01
     */
    public function phpInfoTrait(): void
    {
        $this->wantToTest('Php\IniTrait');

        $ini = new IniFixture();

        /**
         * Parse ini file
         */
        $source   = dataDir('assets/sample.ini');
        $actual   = $ini->parseIniFile($source);
        $expected = [
            'parent.property'                    => 'On',
            'parent.property2'                   => 'yeah',
            'parent.property3.baseuri'           => '/phalcon/',
            'parent.property4.models.metadata'   => 'memory',
            'parent.property5.database.adapter'  => 'mysql',
            'parent.property5.database.host'     => 'localhost',
            'parent.property5.database.username' => 'user',
            'parent.property5.database.password' => 'passwd',
            'parent.property5.database.name'     => 'demo',
            'parent.property6.test'              => ['a', 'b', 'c',],
        ];
        $this->assertEquals($expected, $actual);

        // Unknown
        $expected = '1234';
        $actual   = $ini->iniGet('unknown', '1234');
        $this->assertSame($expected, $actual);

        // Get - This is set in codeception.yml
        $expected = '256M';
        $actual   = $ini->iniGet('memory_limit');
        $this->assertSame($expected, $actual);

        // Get Bool
        $actual = $ini->iniGetBool('expose_php');
        $this->assertTrue($actual);

        // Unknown
        $actual = $ini->iniGetBool('unknown', true);
        $this->assertTrue($actual);

        // Get Int
        $expected = 256;
        $actual   = $ini->iniGetInt('memory_limit');
        $this->assertSame($expected, $actual);

        // Unknown
        $expected = 1234;
        $actual   = $ini->iniGetInt('unknown', 1234);
        $this->assertSame($expected, $actual);
    }
}
