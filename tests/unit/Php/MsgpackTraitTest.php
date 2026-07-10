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

use Phalcon\Tests\Fixtures\Php\MsgpackFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

/**
 * Tests the Msgpack trait
 */
final class MsgpackTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\MsgpackTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpMsgpackTrait(): void
    {
        $this->checkExtensionIsLoaded('msgpack');

        $msgpack = new MsgpackFixture();
        $data    = [
            'one' => 1,
            'two' => 2,
        ];

        $packed = $msgpack->pack($data);

        $this->assertSame($data, $msgpack->unpack($packed));
    }
}
