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

namespace Phalcon\Tests\Unit\Helper\Json;

use JsonException;
use Phalcon\Tests\Fixtures\Helper\Json\DecodeFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

final class DecodeTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Support\Helper\Json\DecodeTrait - decodes
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testHelperJsonDecodeTrait(): void
    {
        $object = new DecodeFixture();

        $this->assertSame([1, 2, 3], $object->decode('[1,2,3]', true));
    }

    /**
     * Tests Support\Helper\Json\DecodeTrait - throws on failure
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testHelperJsonDecodeTraitThrowsException(): void
    {
        $object = new DecodeFixture();

        $this->expectException(JsonException::class);

        $object->decode('{"invalid": }');
    }

    /**
     * Tests Support\Helper\Json\DecodeTrait - associative defaults to false
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testHelperJsonDecodeTraitDefaultAssociative(): void
    {
        $object = new DecodeFixture();

        // associative defaults to false -> an object decodes to \stdClass
        $this->assertEquals((object) ['a' => 1], $object->decodeDefault('{"a":1}'));
    }
}
