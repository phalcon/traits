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

use Phalcon\Tests\Fixtures\Php\InfoFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

/**
 * Tests the Info trait
 */
final class InfoTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\InfoTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpInfoTrait(): void
    {
        $info = new InfoFixture();

        $actual = $info->extensionLoaded('mbstring');
        $this->assertTrue($actual);

        $actual = $info->functionExists('function_exists');
        $this->assertTrue($actual);
    }
}
