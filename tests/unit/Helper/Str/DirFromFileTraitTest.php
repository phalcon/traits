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
use Phalcon\Tests\Fixtures\Helper\Str\DirFromFileFixture;
use PHPUnit\Framework\TestCase;

/**
 * Tests the DirFromFile trait
 */
final class DirFromFileTraitTest extends TestCase
{
    /**
     * Tests Phalcon\Traits\Str\DirFromFileTrait
     *
     * @dataProvider getExamples
     *
     * @return void
     * @param Example    $example
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function testHelperStrDirFromFileTrait(
        ,
        Example $example
    ): void {
        $this->wantToTest('Str\DirFromFileTrait - ' . $example['label']);

        $fileName = $example['fileName'];
        $expected = $example['expected'];

        $object = new DirFromFileFixture();
        $actual = $object->dirFromFile($fileName);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    private function getExamples(): array
    {
        return [
            [
                'label'    => 'long file name',
                'fileName' => 'abcdef12345.jpg',
                'expected' => 'ab/cd/ef/12/3/',
            ],
            [
                'label'    => 'empty file name',
                'fileName' => '',
                'expected' => '/',
            ],
        ];
    }
}
