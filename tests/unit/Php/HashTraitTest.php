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

use Phalcon\Tests\Fixtures\Php\HashFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

use function hash;
use function hash_hmac;

/**
 * Tests the Hash trait
 */
final class HashTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\HashTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpHashTrait(): void
    {
        $hash = new HashFixture();

        // hash
        $expected = hash('sha256', 'Phalcon Framework');
        $actual   = $hash->hash('sha256', 'Phalcon Framework');
        $this->assertSame($expected, $actual);

        // hashEquals
        $this->assertTrue($hash->hashEquals($expected, $actual));
        $this->assertFalse($hash->hashEquals($expected, 'not-a-match'));

        // hashHmac
        $expected = hash_hmac('sha256', 'Phalcon Framework', 'secret');
        $actual   = $hash->hashHmac('sha256', 'Phalcon Framework', 'secret');
        $this->assertSame($expected, $actual);
    }
}
