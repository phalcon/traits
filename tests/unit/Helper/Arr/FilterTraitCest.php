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

namespace Phalcon\Tests\Unit\Factory;

use Codeception\Example;
use Phalcon\Tests\Fixtures\Helper\Arr\FilterFixture;
use UnitTester;

/**
 * Tests the Filter trait
 */
class FilterTraitCest
{
    /**
     * Tests Phalcon\Traits\Arr\FilterTrait :: toFilter()
     *
     * @dataProvider getExamples
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function factoryFilterTraitToFilter(UnitTester $I, Example $example)
    {
        $I->wantToTest('Arr\FilterTrait - ' . $example['label']);

        $filter = new FilterFixture();

        $expected = $example['expected'];
        $source   = $example['source'];
        $method   = $example['method'];
        $actual   = $filter->filter($source, $method);

        $I->assertEquals($expected, $actual);
    }

    /**
     * @return array<array-key, array<string, mixed>>
     */
    private function getExamples(): array
    {
        return [
            [
                'label'    => 'array greater than',
                'source'   => [
                    0 => 1,
                    1 => 2,
                    2 => 3,
                    3 => 4,
                    4 => 5,
                ],
                'expected' => [
                    2 => 3,
                    3 => 4,
                    4 => 5,
                ],
                'method'   => function ($element) {
                    return $element > 2;
                },
            ],
            [
                'label'    => 'array not false or null',
                'source'   => [
                    0 => "one",
                    1 => "two",
                    2 => null,
                    3 => false,
                    4 => 4,
                ],
                'expected' => [
                    0 => "one",
                    1 => "two",
                    4 => 4,
                ],
                'method'   => function ($element) {
                    return null !== $element && false !== $element;
                },
            ],
            [
                'label'    => 'no callback',
                'source'   => [
                    0 => "one",
                    1 => "two",
                    2 => null,
                    3 => false,
                    4 => 4,
                ],
                'expected' => [
                    0 => "one",
                    1 => "two",
                    2 => null,
                    3 => false,
                    4 => 4,
                ],
                'method'   => null,
            ],
        ];
    }
}
