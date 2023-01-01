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

namespace Phalcon\Tests\Unit\Helper\Str;

use Codeception\Example;
use Phalcon\Tests\Fixtures\Helper\Str\DirSeparatorFixture;
use UnitTester;

use const DIRECTORY_SEPARATOR;

/**
 * Tests the DirSeparator trait
 */
class DirSeparatorTraitCest
{
    /**
     * Tests Phalcon\Traits\Str\DirFromFileTrait
     *
     * @dataProvider getExamples
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function helperStrDirFromFileTrait(
        UnitTester $I,
        Example $example
    ): void {
        $I->wantToTest('Str\DirFromFileTrait - ' . $example['label']);

        $directory = $example['directory'];
        $expected  = $example['expected'];

        $object = new DirSeparatorFixture();
        $actual = $object->dirSeparator($directory);
        $I->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    private function getExamples(): array
    {
        $directory = DIRECTORY_SEPARATOR
            . 'home'
            . DIRECTORY_SEPARATOR
            . 'phalcon';

        return [
            [
                'label'     => 'without trailing slash',
                'directory' => $directory,
                'expected'  => $directory . DIRECTORY_SEPARATOR,
            ],
            [
                'label'     => 'with trailing slash',
                'directory' => $directory . DIRECTORY_SEPARATOR,
                'expected'  => $directory . DIRECTORY_SEPARATOR,
            ],
            [
                'label'     => 'with double trailing slash',
                'directory' => $directory . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR,
                'expected'  => $directory . DIRECTORY_SEPARATOR,
            ],
            [
                'label'     => 'empty directory',
                'directory' => '',
                'expected'  => DIRECTORY_SEPARATOR,
            ],
        ];
    }
}
