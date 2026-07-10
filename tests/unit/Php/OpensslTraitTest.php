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

use Phalcon\Tests\Fixtures\Php\OpensslFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

use function strlen;

/**
 * Tests the Openssl trait
 */
final class OpensslTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\OpensslTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpOpensslTrait(): void
    {
        $this->checkExtensionIsLoaded('openssl');

        $openssl = new OpensslFixture();

        // aes-256-cbc uses a 16-byte IV
        $this->assertSame(16, $openssl->cipherIvLength('aes-256-cbc'));

        $bytes = $openssl->randomPseudoBytes(16);
        $this->assertSame(16, strlen($bytes));
    }
}
