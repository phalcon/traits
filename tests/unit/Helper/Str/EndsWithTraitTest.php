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
use PHPUnit\Framework\TestCase;

/**
 * Tests the EndsWith trait
 */
final class EndsWithTraitTest extends TestCase
{
    /**
     * Tests Phalcon\Traits\Str\EndsWithTrait :: toEndsWith()
     *
     * @dataProvider getExamples
     *
     * @return void
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function helperStrEndsWithFilter(
        ,
        Example $example
    ): void {
        $this->wantToTest('Str\EndsWithTrait - ' . $example['label']);

        $haystack    = $example['haystack'];
        $needle      = $example['needle'];
        $insensitive = $example['insensitive'];
        $expected    = $example['expected'];

        $object = new EndsWithFixture();
        $actual = $object->endsWith($haystack, $needle, $insensitive);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    private function getExamples(): array
    {
        return [
            [
                'label'       => 'string one character',
                'haystack'    => 'Hello',
                'needle'      => 'o',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string two character',
                'haystack'    => 'Hello',
                'needle'      => 'lo',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string full word',
                'haystack'    => 'Hello',
                'needle'      => 'Hello',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'empty strings',
                'haystack'    => '',
                'needle'      => '',
                'insensitive' => true,
                'expected'    => false,
            ],
            [
                'label'       => 'empty haystack',
                'haystack'    => '',
                'needle'      => 'Hello',
                'insensitive' => true,
                'expected'    => false,
            ],
            [
                'label'       => 'string one character case insensitive',
                'haystack'    => 'Hello',
                'needle'      => 'O',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string two character case insensitive',
                'haystack'    => 'Hello',
                'needle'      => 'LO',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string full word case insensitive',
                'haystack'    => 'Hello',
                'needle'      => 'hello',
                'insensitive' => true,
                'expected'    => true,
            ],
            [
                'label'       => 'string full word case sensitive',
                'haystack'    => 'Hello',
                'needle'      => 'hello',
                'insensitive' => false,
                'expected'    => false,
            ],
            [
                'label'       => 'string one character case sensitive',
                'haystack'    => 'Hello',
                'needle'      => 'O',
                'insensitive' => false,
                'expected'    => false,
            ],
        ];
    }
}
