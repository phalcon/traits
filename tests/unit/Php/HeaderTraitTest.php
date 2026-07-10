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

use Phalcon\Tests\Fixtures\Php\HeaderFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

/**
 * Tests the Header trait
 */
final class HeaderTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\HeaderTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpHeaderTrait(): void
    {
        $header = new HeaderFixture();

        // In the CLI SAPI no HTTP headers are ever sent
        $actual = $header->headersSent();
        $this->assertFalse($actual);
    }
}
