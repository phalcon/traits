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
use Phalcon\Tests\Fixtures\Helper\Str\DirSeparatorFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

use const DIRECTORY_SEPARATOR;

/**
 * Tests the DirSeparator trait
 */
final class DirSeparatorTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Str\DirFromFileTrait
     *
     * @dataProvider getExamples
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2021-10-26
     */
    public function testHelperStrDirSeparatorTrait(
        string $directory,
        string $expected
    ): void {
        $object = new DirSeparatorFixture();
        $actual = $object->dirSeparator($directory);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array[]
     */
    public static function getExamples(): array
    {
        $directory = DIRECTORY_SEPARATOR
            . 'home'
            . DIRECTORY_SEPARATOR
            . 'phalcon';

        return [
            [
                $directory,
                $directory . DIRECTORY_SEPARATOR,
            ],
            [
                $directory . DIRECTORY_SEPARATOR,
                $directory . DIRECTORY_SEPARATOR,
            ],
            [
                $directory . DIRECTORY_SEPARATOR . DIRECTORY_SEPARATOR,
                $directory . DIRECTORY_SEPARATOR,
            ],
            [
                '',
                DIRECTORY_SEPARATOR,
            ],
        ];
    }
}
