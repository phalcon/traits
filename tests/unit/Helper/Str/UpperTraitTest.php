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
use Phalcon\Tests\Fixtures\Helper\Str\UpperFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Upper trait
 */
final class UpperTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Str\UpperTrait :: toUpper()
     *
     * @dataProvider getExamples
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function testHelperStrUpperFilter(
        string $text,
        string $encoding,
        string $expected
    ): void {
        $object = new UpperFixture();
        $actual = $object->upper($text, $encoding);
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
                'HELLO',
            ],
            [
                'HELLO',
                'UTF-8',
                'HELLO',
            ],
            [
                'hello',
                'UTF-8',
                'HELLO',
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
                'ПРИВЕТ МИР!',
            ],
            [
                'ПРИВЕТ МИР!',
                'UTF-8',
                'ПРИВЕТ МИР!',
            ],
            [
                'привет мир!',
                'UTF-8',
                'ПРИВЕТ МИР!',
            ],
            [
                'mÄnnER',
                'UTF-8',
                'MÄNNER',
            ],
            [
                'MÄNNER',
                'UTF-8',
                'MÄNNER',
            ],
            [
                'männer',
                'UTF-8',
                'MÄNNER',
            ],
            [
                'ΚαλΗμέΡΑ',
                'UTF-8',
                'ΚΑΛΗΜΈΡΑ',
            ],
            [
                'ΚΑΛΗΜΕΡΑ',
                'UTF-8',
                'ΚΑΛΗΜΕΡΑ',
            ],
            [
                'καλημέρα',
                'UTF-8',
                'ΚΑΛΗΜΈΡΑ',
            ],
            [
                'καλημέρα',
                'EUC-JP',
                'καλημέ?α',
            ],
        ];
    }
}
