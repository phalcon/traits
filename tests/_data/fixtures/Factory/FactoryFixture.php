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

namespace Phalcon\Tests\Fixtures\Factory;

use Phalcon\Traits\Factory\FactoryTrait;

class FactoryFixture
{
    use FactoryTrait;

    /**
     * Create a new instance of the adapter
     *
     * @param string $name
     * @param array  $options
     *
     * @throws FactoryExceptionFixture
     */
    public function newInstance(string $name, array $options = []): object
    {
        $definition = $this->getService($name);

        return new $definition($options);
    }

    /**
     * @return string
     */
    protected function getExceptionClass(): string
    {
        return FactoryExceptionFixture::class;
    }

    /**
     * @return string[]
     */
    protected function getServices(): array
    {
        return [
            'one'   => FactoryOneFixture::class,
            'two'   => FactoryTwoFixture::class,
        ];
    }
}
