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
use Phalcon\Tests\Fixtures\Helper\Str\LowerFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Lower trait
 */
final class LowerTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Str\LowerTrait :: toLower()
     *
     * @dataProvider getExamples
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function testHelperStrLowerFilter(
        string $text,
        string $encoding,
        string $expected
    ): void {
        $object = new LowerFixture();
        $actual = $object->lower($text, $encoding);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    public static function getExamples(): array
    {
        return [
            [
                'HeLLo',
                'UTF-8',
                'hello',
            ],
            [
                'HELLO',
                'UTF-8',
                'hello',
            ],
            [
                'hello',
                'UTF-8',
                'hello',
            ],
            [
                '1234',
                'UTF-8',
                '1234',
            ],
            [
                '1234',
                'UTF-8',
                '1234',
            ],
            [
                'ПриВЕт Мир!',
                'UTF-8',
                'привет мир!',
            ],
            [
                'ПРИВЕТ МИР!',
                'UTF-8',
                'привет мир!',
            ],
            [
                'привет мир!',
                'UTF-8',
                'привет мир!',
            ],
            [
                'mÄnnER',
                'UTF-8',
                'männer',
            ],
            [
                'MÄNNER',
                'UTF-8',
                'männer',
            ],
            [
                'männer',
                'UTF-8',
                'männer',
            ],
            [
                'ΚαλΗμέΡΑ',
                'UTF-8',
                'καλημέρα',
            ],
            [
                'ΚΑΛΗΜΕΡΑ',
                'UTF-8',
                'καλημερα',
            ],
            [
                'καλημέρα',
                'UTF-8',
                'καλημέρα',
            ],
            [
                'καλημέρα',
                'EUC-JP',
                'καλημέ?α',
            ],
        ];
    }
}
