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
use PHPUnit\Framework\TestCase;

/**
 * Tests the factory trait
 */
final class FactoryTraitTest extends TestCase
{
    /**
     * Tests Phalcon\Traits\Arr\FactoryTrait :: newInstance()
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function factoryFactoryTraitNewInstance(): void
    {
        $I->wantToTest('Arr\FactoryTrait - newInstance()');

        $factory = new FactoryFixture();

        $class  = FactoryOneFixture::class;
        $actual = $factory->newInstance('one');
        $I->assertInstanceOf($class, $actual);
    }

    /**
     * Tests Phalcon\Traits\Arr\FactoryTrait :: newInstance() with init
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function factoryFactoryTraitNewInstanceWithInit(): void
    {
        $I->wantToTest('Arr\FactoryTrait - newInstance() with init');

        $options = ['three' => FactoryThreeFixture::class];
        $factory = new FactoryFixture($options);

        $class  = FactoryOneFixture::class;
        $actual = $factory->newInstance('one');
        $I->assertInstanceOf($class, $actual);

        $class  = FactoryThreeFixture::class;
        $actual = $factory->newInstance('three');
        $I->assertInstanceOf($class, $actual);
    }

    /**
     * Tests Phalcon\Traits\Arr\FactoryTrait :: newInstance() - exception
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function factoryFactoryTraitNewInstanceException(): void
    {
        $I->wantToTest('Arr\FactoryTrait - newInstance() - exception');

        $I->expectThrowable(
            new FactoryExceptionFixture(
                "Service unknown is not registered"
            ),
            function () {
                $factory = new FactoryFixture();

                $factory->newInstance('unknown');
            }
        );
    }
}
