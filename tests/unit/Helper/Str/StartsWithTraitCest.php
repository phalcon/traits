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
use Phalcon\Tests\Fixtures\Helper\Str\StartsWithFixture;
use UnitTester;

/**
 * Tests the StartsWith trait
 */
class StartsWithTraitCest
{
    /**
     * Tests Phalcon\Traits\Str\StartsWithTrait :: toStartsWith()
     *
     * @dataProvider getExamples
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function helperStrStartsWithFilter(
        UnitTester $I,
        Example $example
    ): void {
        $I->wantToTest('Str\StartsWithTrait - ' . $example['label']);

        $haystack    = $example['haystack'];
        $needle      = $example['needle'];
        $insensitive = $example['insensitive'];
        $expected    = $example['expected'];

        $object = new StartsWithFixture();
        $actual = $object->startsWith($haystack, $needle, $insensitive);
        $I->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    private function getExamples(): array
    {
        return [
            [
                'label'       => 'string one character',
                'haystack'    => 'Hello',
                'needle'      => 'H',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string two character',
                'haystack'    => 'Hello',
                'needle'      => 'He',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string full word',
                'haystack'    => 'Hello',
                'needle'      => 'Hello',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'empty strings',
                'haystack'    => '',
                'needle'      => '',
                'insensitive' => true,
                'expected'    => false,
            ],
            [
                'label'       => 'empty haystack',
                'haystack'    => '',
                'needle'      => 'Hello',
                'insensitive' => true,
                'expected'    => false,
            ],
            [
                'label'       => 'string one character case insensitive',
                'haystack'    => 'Hello',
                'needle'      => 'h',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string two character case insensitive',
                'haystack'    => 'Hello',
                'needle'      => 'he',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string full word case insensitive',
                'haystack'    => 'Hello',
                'needle'      => 'hello',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string full word case sensitive',
                'haystack'    => 'Hello',
                'needle'      => 'hello',
                'insensitive' => false,
                'expected'    => false,
            ],
            [
                'label'       => 'string one character case sensitive',
                'haystack'    => 'Hello',
                'needle'      => 'h',
                'insensitive' => false,
                'expected'    => false,
            ],
        ];
    }
}
