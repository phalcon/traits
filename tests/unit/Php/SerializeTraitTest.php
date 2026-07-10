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

use Phalcon\Tests\Fixtures\Php\SerializeFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

/**
 * Tests the Serialize trait
 */
final class SerializeTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\SerializeTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpSerializeTrait(): void
    {
        $serialize = new SerializeFixture();
        $data      = [
            'one' => 1,
            'two' => 2,
        ];

        $serialized = $serialize->serialize($data);

        $this->assertSame($data, $serialize->unserialize($serialized));
    }
}
