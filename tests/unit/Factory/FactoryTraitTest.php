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

namespace Phalcon\Tests\Unit\Factory;

use Phalcon\Tests\Fixtures\Factory\FactoryExceptionFixture;
use Phalcon\Tests\Fixtures\Factory\FactoryFixture;
use Phalcon\Tests\Fixtures\Factory\FactoryOneFixture;
use Phalcon\Tests\Fixtures\Factory\FactoryThreeFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

use function spl_object_hash;

/**
 * Tests the factory trait
 */
final class FactoryTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Arr\FactoryTrait :: newInstance()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testFactoryFactoryTraitNewInstance(): void
    {
        $factory = new FactoryFixture();

        $class  = FactoryOneFixture::class;
        $actual = $factory->newInstance('one');
        $this->assertInstanceOf($class, $actual);
    }

    /**
     * Tests Phalcon\Traits\Arr\FactoryTrait :: newInstance() with init
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testFactoryFactoryTraitNewInstanceWithInit(): void
    {
        $options = ['three' => FactoryThreeFixture::class];
        $factory = new FactoryFixture($options);

        $class  = FactoryOneFixture::class;
        $actual = $factory->newInstance('one');
        $this->assertInstanceOf($class, $actual);

        $class  = FactoryThreeFixture::class;
        $actual = $factory->newInstance('three');
        $this->assertInstanceOf($class, $actual);
    }

    /**
     * Tests Phalcon\Traits\Arr\FactoryTrait :: newInstance() with init
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testFactoryFactoryTraitCachedInstance(): void
    {
        $factory = new FactoryFixture();

        $class = FactoryOneFixture::class;
        $one   = $factory->newInstance('one');
        $this->assertInstanceOf($class, $one);

        /**
         * Get it again, it should not be the same
         */
        $two = $factory->newInstance('one');
        $oneHash = spl_object_hash($one);
        $twoHash = spl_object_hash($two);
        $this->assertNotSame($oneHash, $twoHash);

        /**
         * Cached
         */
        $class = FactoryOneFixture::class;
        $one   = $factory->getInstance('one');
        $this->assertInstanceOf($class, $one);

        /**
         * Get it again, it should not be the same
         */
        $two = $factory->getInstance('one');
        $oneHash = spl_object_hash($one);
        $twoHash = spl_object_hash($two);
        $this->assertSame($oneHash, $twoHash);
    }

    /**
     * Tests Phalcon\Traits\Arr\FactoryTrait :: newInstance() - exception
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testFactoryFactoryTraitNewInstanceException(): void
    {
        $this->expectException(FactoryExceptionFixture::class);
        $this->expectExceptionMessage("Service unknown is not registered");

        $factory = new FactoryFixture();

        $factory->newInstance('unknown');
    }
}
