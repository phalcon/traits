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
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Interpolate trait
 */
final class InterpolateTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Str\InterpolateTrait :: toInterpolate()
     *
     * @dataProvider getExamples
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function testHelperStrInterpolateFilter(
        string $expected,
        string $format,
        array $context,
        string $left,
        string $right
    ): void {
        $object = new InterpolateFixture();
        $actual = $object->interpolate($format, $context, $left, $right);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    public static function getExamples(): array
    {
        return [
            [
                '2020-09-08 is the date',
                '%date% is the date',
                [
                    'date' => '2020-09-08',
                ],
                '%',
                '%',
            ],
            [
                '2020-09-09 is the date CRITICAL is the level',
                '%date% is the date %level% is the level',
                [
                    'date'  => '2020-09-09',
                    'level' => 'CRITICAL',
                ],
                '%',
                '%',
            ],
            [
                'no format',
                'no format',
                [
                    'date' => '2020-09-09',
                ],
                '%',
                '%',
            ],
            [
                '2020-09-09 is the date',
                '%date% is the date',
                [
                    'date' => '2020-09-09',
                ],
                '%',
                '%',
            ],
            [
                '2020-09-09 is the date AAA is context',
                '%date% is the date %stub% is context',
                [
                    'date' => '2020-09-09',
                    'stub' => 'AAA',
                ],
                '%',
                '%',
            ],
            [
                '2020-09-09 is the date AAA is context',
                '[date] is the date [stub] is context',
                [
                    'date' => '2020-09-09',
                    'stub' => 'AAA',
                ],
                '[',
                ']',
            ],
            [
                '[date] is the date [stub] is context',
                '[date] is the date [stub] is context',
                [],
                '[',
                ']',
            ],
        ];
    }
}
