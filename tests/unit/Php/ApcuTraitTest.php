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

use APCUIterator;
use Phalcon\Tests\Fixtures\Php\ApcuFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

/**
 * Tests the Apcu trait
 */
final class ApcuTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\ApcuTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpApcuTrait(): void
    {
        $this->checkExtensionIsLoaded('apcu');

        $apcu = new ApcuFixture();
        $key  = 'phalcon-traits-apcu';

        $apcu->apcuDelete($key);

        // store / exists / fetch
        $this->assertTrue($apcu->apcuStore($key, 10));
        $this->assertTrue($apcu->apcuExists($key));
        $this->assertSame(10, $apcu->apcuFetch($key));

        // inc / dec
        $this->assertSame(11, $apcu->apcuInc($key));
        $this->assertSame(10, $apcu->apcuDec($key));

        // iterator
        $iterator = $apcu->apcuIterator('/^' . $key . '$/');
        $this->assertInstanceOf(APCUIterator::class, $iterator);

        // delete
        $this->assertTrue($apcu->apcuDelete($key));
        $this->assertFalse($apcu->apcuExists($key));
    }
}
