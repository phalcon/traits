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

use Phalcon\Tests\Fixtures\Php\YamlFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;

use function dataDir;

/**
 * Tests the Yaml trait
 */
final class YamlTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\YamlTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpYamlTrait(): void
    {
        $this->checkExtensionIsLoaded('yaml');

        $yaml     = new YamlFixture();
        $actual   = $yaml->parseFile(dataDir('assets/sample.yaml'));
        $expected = [
            'name'    => 'Phalcon',
            'version' => 6,
            'enabled' => true,
        ];

        $this->assertSame($expected, $actual);
    }
}
