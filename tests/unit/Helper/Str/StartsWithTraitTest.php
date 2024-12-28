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
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the StartsWith trait
 */
final class StartsWithTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Str\StartsWithTrait :: toStartsWith()
     *
     * @dataProvider getExamples
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function testHelperStrStartsWithFilter(
        string $haystack,
        string $needle,
        bool $insensitive,
        bool $expected
    ): void {
        $object = new StartsWithFixture();
        $actual = $object->startsWith($haystack, $needle, $insensitive);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    public static function getExamples(): array
    {
        return [
            [
                'Hello',
                'H',
                true,
                true,
            ],
            [
                'Hello',
                'He',
                true,
                true,
            ],
            [
                'Hello',
                'Hello',
                true,
                true,
            ],
            [
                '',
                '',
                true,
                false,
            ],
            [
                '',
                'Hello',
                true,
                false,
            ],
            [
                'Hello',
                'h',
                true,
                true,
            ],
            [
                'Hello',
                'he',
                true,
                true,
            ],
            [
                'Hello',
                'hello',
                true,
                true,
            ],
            [
                'Hello',
                'hello',
                false,
                false,
            ],
            [
                'Hello',
                'h',
                false,
                false,
            ],
        ];
    }
}
