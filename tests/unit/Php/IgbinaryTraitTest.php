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

use Phalcon\Tests\Fixtures\Php\IgbinaryFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

/**
 * Tests the Igbinary trait
 */
final class IgbinaryTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\IgbinaryTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpIgbinaryTrait(): void
    {
        $this->checkExtensionIsLoaded('igbinary');

        $igbinary = new IgbinaryFixture();
        $data     = [
            'one' => 1,
            'two' => 2,
        ];

        $serialized = $igbinary->serialize($data);
        $this->assertIsString($serialized);

        $actual = $igbinary->unserialize($serialized);
        $this->assertSame($data, $actual);
    }
}
