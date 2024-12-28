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
use PHPUnit\Framework\TestCase;

/**
 * Tests the Upper trait
 */
final class UpperTraitTest extends TestCase
{
    /**
     * Tests Phalcon\Traits\Str\UpperTrait :: toUpper()
     *
     * @dataProvider getExamples
     *
     * @return void
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function helperStrUpperFilter(, Example $example): void
    {
        $this->wantToTest('Str\UpperTrait - ' . $example['label']);

        $text     = $example['text'];
        $encoding = $example['encoding'];
        $expected = $example['expected'];

        $object = new UpperFixture();
        $actual = $object->upper($text, $encoding);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    private function getExamples(): array
    {
        return [
            [
                'label'    => 'english string mixed',
                'text'     => 'HeLLo',
                'encoding' => 'UTF-8',
                'expected' => 'HELLO',
            ],
            [
                'label'    => 'english string all uppercase',
                'text'     => 'HELLO',
                'encoding' => 'UTF-8',
                'expected' => 'HELLO',
            ],
            [
                'label'    => 'english string all lowercase',
                'text'     => 'hello',
                'encoding' => 'UTF-8',
                'expected' => 'HELLO',
            ],
            [
                'label'    => 'string number',
                'text'     => '1234',
                'encoding' => 'UTF-8',
                'expected' => '1234',
            ],
            [
                'label'    => 'string number',
                'text'     => '1234',
                'encoding' => 'UTF-8',
                'expected' => '1234',
            ],
            [
                'label'    => 'russian string mixed',
                'text'     => 'ПриВЕт Мир!',
                'encoding' => 'UTF-8',
                'expected' => 'ПРИВЕТ МИР!',
            ],
            [
                'label'    => 'russian string all uppercase',
                'text'     => 'ПРИВЕТ МИР!',
                'encoding' => 'UTF-8',
                'expected' => 'ПРИВЕТ МИР!',
            ],
            [
                'label'    => 'russian string all lowercase',
                'text'     => 'привет мир!',
                'encoding' => 'UTF-8',
                'expected' => 'ПРИВЕТ МИР!',
            ],
            [
                'label'    => 'german string mixed',
                'text'     => 'mÄnnER',
                'encoding' => 'UTF-8',
                'expected' => 'MÄNNER',
            ],
            [
                'label'    => 'german string all uppercase',
                'text'     => 'MÄNNER',
                'encoding' => 'UTF-8',
                'expected' => 'MÄNNER',
            ],
            [
                'label'    => 'german string all lowercase',
                'text'     => 'männer',
                'encoding' => 'UTF-8',
                'expected' => 'MÄNNER',
            ],
            [
                'label'    => 'greek string mixed',
                'text'     => 'ΚαλΗμέΡΑ',
                'encoding' => 'UTF-8',
                'expected' => 'ΚΑΛΗΜΈΡΑ',
            ],
            [
                'label'    => 'greek string all uppercase',
                'text'     => 'ΚΑΛΗΜΕΡΑ',
                'encoding' => 'UTF-8',
                'expected' => 'ΚΑΛΗΜΕΡΑ',
            ],
            [
                'label'    => 'greek string all lowercase',
                'text'     => 'καλημέρα',
                'encoding' => 'UTF-8',
                'expected' => 'ΚΑΛΗΜΈΡΑ',
            ],
            [
                'label'    => 'greek string EUC-JP encoding',
                'text'     => 'καλημέρα',
                'encoding' => 'EUC-JP',
                'expected' => 'καλημέ?α',
            ],
        ];
    }
}
