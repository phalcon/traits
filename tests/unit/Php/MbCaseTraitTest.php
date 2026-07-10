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

namespace Phalcon\Tests\Unit\Php;

use Phalcon\Tests\Fixtures\Php\MbCaseFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

use const MB_CASE_LOWER;
use const MB_CASE_TITLE;
use const MB_CASE_UPPER;

/**
 * Tests the MbCase trait
 */
final class MbCaseTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\MbCaseTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpMbCaseTrait(): void
    {
        $mbCase = new MbCaseFixture();

        $this->assertSame(
            'привет мир',
            $mbCase->mbConvertCase('ПРИВЕТ МИР', MB_CASE_LOWER)
        );

        $this->assertSame(
            'ПРИВЕТ МИР',
            $mbCase->mbConvertCase('привет мир', MB_CASE_UPPER)
        );

        $this->assertSame(
            'Hello World',
            $mbCase->mbConvertCase('hello world', MB_CASE_TITLE)
        );
    }
}
