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

namespace Phalcon\Tests\Unit\Helper\Arr;

use Codeception\Example;
use Phalcon\Tests\Fixtures\Helper\Arr\FilterFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Filter trait
 */
final class FilterTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Arr\FilterTrait :: toFilter()
     *
     * @dataProvider getExamples
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-25
     */
    public function testHelperArrFilterTraitToFilter(
        array $source,
        array $expected,
        ?callable $method
    ): void {
        $filter = new FilterFixture();

        $actual   = $filter->filter($source, $method);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array<array-key, array<string, mixed>>
     */
    public static function getExamples(): array
    {
        return [
            [
                [
                    0 => 1,
                    1 => 2,
                    2 => 3,
                    3 => 4,
                    4 => 5,
                ],
                [
                    2 => 3,
                    3 => 4,
                    4 => 5,
                ],
                function ($element) {
                    return $element > 2;
                },
            ],
            [
                [
                    0 => "one",
                    1 => "two",
                    2 => null,
                    3 => false,
                    4 => 4,
                ],
                [
                    0 => "one",
                    1 => "two",
                    4 => 4,
                ],
                function ($element) {
                    return null !== $element && false !== $element;
                },
            ],
            [
                [
                    0 => "one",
                    1 => "two",
                    2 => null,
                    3 => false,
                    4 => 4,
                ],
                [
                    0 => "one",
                    1 => "two",
                    2 => null,
                    3 => false,
                    4 => 4,
                ],
                null,
            ],
        ];
    }
}
