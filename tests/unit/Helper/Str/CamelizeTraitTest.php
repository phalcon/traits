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

namespace Phalcon\Tests\Unit\Helper\Str;

use Codeception\Example;
use Phalcon\Tests\Fixtures\Helper\Str\CamelizeFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

final class CamelizeTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Str\CamelizeTrait
     *
     * @dataProvider getSources
     *
     * @return void
     *
     * @author       Phalcon Team <team@phalcon.io>
     * @since        2020-09-09
     */
    public function testHelperStrCamelize(
        string $value,
        string $expected,
        ?string $delimiter,
        bool $lowercase
    ): void {
        $object    = new CamelizeFixture();
        $delimiter = $delimiter ?: '\-_';

        $actual = $object->toCamelize($value, $delimiter, $lowercase);
        $this->assertSame($expected, $actual);
    }

    /**
     * @return array
     */
    public static function getSources(): array
    {
        return [
            ['camelize', 'Camelize', null, false],
            ['CameLiZe', 'Camelize', null, false],
            ['cAmeLize', 'Camelize', null, false],
            ['123camelize', '123camelize', null, false],
            ['c_a_m_e_l_i_z_e', 'CAMELIZE', null, false],
            ['Camelize', 'Camelize', null, false],
            ['camel_ize', 'CamelIze', null, false],
            ['CameLize', 'Camelize', null, false],
            ['c_a-m_e-l_i-z_e', 'CAMELIZE', null, false],
            ['came_li_ze', 'CameLiZe', null, false],
            ['=_camelize', '=Camelize', '_', false],
            ['camelize', 'Camelize', '_', false],
            ['came_li_ze', 'CameLiZe', '_', false],
            ['came#li#ze', 'CameLiZe', '#', false],
            ['came li ze', 'CameLiZe', ' ', false],
            ['came.li^ze', 'CameLiZe', '.^', false],
            ['c_a-m_e-l_i-z_e', 'CAMELIZE', '-_', false],
            ['came.li.ze', 'CameLiZe', '.', false],
            ['came-li-ze', 'CameLiZe', '-', false],
            ['c+a+m+e+l+i+z+e', 'CAMELIZE', '+', false],
            ['customer-session', 'CustomerSession', null, false],
            ['customer Session', 'CustomerSession', ' -_', false],
            ['customer-Session', 'CustomerSession', ' -_', false],
            ['customer-session', 'customerSession', null, true],
            ['customer Session', 'customerSession', ' -_', true],
            ['customer-Session', 'customerSession', ' -_', true],
        ];
    }
}
