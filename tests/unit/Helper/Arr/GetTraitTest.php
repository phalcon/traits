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

namespace Phalcon\Tests\Unit\Helper\Arr;

use Phalcon\Tests\Fixtures\Helper\Arr\GetFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

/**
 * Tests the Get trait
 */
final class GetTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Support\Helper\Arr\GetTrait :: getArrVal()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperArrGetTrait(): void
    {
        $get        = new GetFixture();
        $collection = [
            'one'   => 1,
            'two'   => 'value',
            'three' => '123',
        ];

        // Existing key
        $this->assertSame(1, $get->get($collection, 'one'));

        // Missing key returns the default value
        $this->assertSame('def', $get->get($collection, 'missing', 'def'));

        // Missing key with no default returns null
        $this->assertNull($get->get($collection, 'missing'));

        // Existing value cast to integer
        $this->assertSame(123, $get->get($collection, 'three', null, 'integer'));
    }
}
