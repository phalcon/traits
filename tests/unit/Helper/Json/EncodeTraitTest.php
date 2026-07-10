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
use Phalcon\Tests\Fixtures\Helper\Json\EncodeFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

final class EncodeTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Support\Helper\Json\EncodeTrait - encodes
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testHelperJsonEncodeTrait(): void
    {
        $object = new EncodeFixture();

        $this->assertSame('[1,2,3]', $object->encode([1, 2, 3]));
    }

    /**
     * Tests Support\Helper\Json\EncodeTrait - default options (79)
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testHelperJsonEncodeTraitDefaultOptions(): void
    {
        $object = new EncodeFixture();

        // 79 includes JSON_HEX_TAG so `<` is escaped as \\u003C, and no pretty-print
        $this->assertSame('"\\u003C"', $object->encodeDefault('<'));
        $this->assertSame('{"a":"b"}', $object->encodeDefault(['a' => 'b']));
    }

    /**
     * Tests Support\Helper\Json\EncodeTrait - throws on failure
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testHelperJsonEncodeTraitThrowsException(): void
    {
        $object = new EncodeFixture();

        $this->expectException(JsonException::class);

        $object->encode("\xB1\x31");
    }
}
