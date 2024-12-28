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
use Phalcon\Tests\Fixtures\Helper\Str\EndsWithFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the EndsWith trait
 */
final class EndsWithTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Str\EndsWithTrait :: toEndsWith()
     *
     * @dataProvider getExamples
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function testHelperStrEndsWithFilter(
        string $haystack,
        string $needle,
        bool $insensitive,
        bool $expected
    ): void {
        $object = new EndsWithFixture();
        $actual = $object->endsWith($haystack, $needle, $insensitive);
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
                'o',
                true,
                true,
            ],
            [
                'Hello',
                'lo',
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
                'O',
                true,
                true,
            ],
            [
                'Hello',
                'LO',
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
                'O',
                false,
                false,
            ],
        ];
    }
}
