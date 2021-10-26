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
use Phalcon\Tests\Fixtures\Helper\Str\InterpolateFixture;
use UnitTester;

/**
 * Tests the Interpolate trait
 */
class InterpolateTraitCest
{
    /**
     * Tests Phalcon\Traits\Str\InterpolateTrait :: toInterpolate()
     *
     * @dataProvider getExamples
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function helperStrInterpolateFilter(UnitTester $I, Example $example)
    {
        $I->wantToTest('Str\InterpolateTrait - ' . $example['label']);

        $expected = $example['expected'];
        $format   = $example['format'];
        $context  = $example['context'];
        $left     = $example['left'];
        $right    = $example['right'];

        $object = new InterpolateFixture();
        $actual = $object->interpolate($format, $context, $left, $right);
        $I->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    private function getExamples(): array
    {
        return [
            [
                'label'    => 'date',
                'expected' => '2020-09-09 is the date',
                'format'   => '%date% is the date',
                'context'  => [
                    'date' => '2020-09-09',
                ],
                'left'     => '%',
                'right'    => '%',
            ],
            [
                'label'    => 'date/level',
                'expected' => '2020-09-09 is the date CRITICAL is the level',
                'format'   => '%date% is the date %level% is the level',
                'context'  => [
                    'date'  => '2020-09-09',
                    'level' => 'CRITICAL'
                ],
                'left'     => '%',
                'right'    => '%',
            ],
            [
                'label'    => 'empty',
                'expected' => 'no format',
                'format'   => 'no format',
                'context'  => [
                    'date' => '2020-09-09',
                ],
                'left'     => '%',
                'right'    => '%',
            ],
            [
                'label'    => 'date',
                'expected' => '2020-09-09 is the date',
                'format'   => '%date% is the date',
                'context'  => [
                    'date' => '2020-09-09',
                ],
                'left'     => '%',
                'right'    => '%',
            ],
            [
                'label'    => 'date and context',
                'expected' => '2020-09-09 is the date AAA is context',
                'format'   => '%date% is the date %stub% is context',
                'context'  => [
                    'date' => '2020-09-09',
                    'stub' => 'AAA',
                ],
                'left'     => '%',
                'right'    => '%',
            ],
            [
                'label'    => 'date and context different placeholders',
                'expected' => '2020-09-09 is the date AAA is context',
                'format'   => '[date] is the date [stub] is context',
                'context'  => [
                    'date' => '2020-09-09',
                    'stub' => 'AAA',
                ],
                'left'     => '[',
                'right'    => ']',
            ],
            [
                'label'    => 'empty context',
                'expected' => '[date] is the date [stub] is context',
                'format'   => '[date] is the date [stub] is context',
                'context'  => [],
                'left'     => '[',
                'right'    => ']',
            ],
        ];
    }
}
