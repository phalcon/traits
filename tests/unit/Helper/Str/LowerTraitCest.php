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
use UnitTester;

/**
 * Tests the Lower trait
 */
class LowerTraitCest
{
    /**
     * Tests Phalcon\Traits\Str\LowerTrait :: toLower()
     *
     * @dataProvider getExamples
     *
     * @param UnitTester $I
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function helperStrLowerFilter(UnitTester $I, Example $example): void
    {
        $I->wantToTest('Str\LowerTrait - ' . $example['label']);

        $text     = $example['text'];
        $encoding = $example['encoding'];
        $expected = $example['expected'];

        $object = new LowerFixture();
        $actual = $object->lower($text, $encoding);
        $I->assertEquals($expected, $actual);
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
                'expected' => 'hello',
            ],
            [
                'label'    => 'english string all uppercase',
                'text'     => 'HELLO',
                'encoding' => 'UTF-8',
                'expected' => 'hello',
            ],
            [
                'label'    => 'english string all lowercase',
                'text'     => 'hello',
                'encoding' => 'UTF-8',
                'expected' => 'hello',
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
                'text'     => '???????????? ??????!',
                'encoding' => 'UTF-8',
                'expected' => '???????????? ??????!',
            ],
            [
                'label'    => 'russian string all uppercase',
                'text'     => '???????????? ??????!',
                'encoding' => 'UTF-8',
                'expected' => '???????????? ??????!',
            ],
            [
                'label'    => 'russian string all lowercase',
                'text'     => '???????????? ??????!',
                'encoding' => 'UTF-8',
                'expected' => '???????????? ??????!',
            ],
            [
                'label'    => 'german string mixed',
                'text'     => 'm??nnER',
                'encoding' => 'UTF-8',
                'expected' => 'm??nner',
            ],
            [
                'label'    => 'german string all uppercase',
                'text'     => 'M??NNER',
                'encoding' => 'UTF-8',
                'expected' => 'm??nner',
            ],
            [
                'label'    => 'german string all lowercase',
                'text'     => 'm??nner',
                'encoding' => 'UTF-8',
                'expected' => 'm??nner',
            ],
            [
                'label'    => 'greek string mixed',
                'text'     => '????????????????',
                'encoding' => 'UTF-8',
                'expected' => '????????????????',
            ],
            [
                'label'    => 'greek string all uppercase',
                'text'     => '????????????????',
                'encoding' => 'UTF-8',
                'expected' => '????????????????',
            ],
            [
                'label'    => 'greek string all lowercase',
                'text'     => '????????????????',
                'encoding' => 'UTF-8',
                'expected' => '????????????????',
            ],
            [
                'label'    => 'greek string EUC-JP encoding',
                'text'     => '????????????????',
                'encoding' => 'EUC-JP',
                'expected' => '???????????????',
            ],
        ];
    }
}
