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

use Exception;
use Phalcon\Traits\Factory\FactoryTrait;

class FactoryFixture
{
    use FactoryTrait;

    /**
     * @param array $services
     */
    public function __construct(array $services = [])
    {
        $this->init($services);
    }

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
     * Return an object from the instances pool. If it does not exist, create it
     *
     * @param string $name
     * @param mixed  ...$arguments
     *
     * @return object|mixed
     * @throws Exception
     */
    public function getInstance(string $name, mixed ...$arguments): object
    {
        return $this->getCachedInstance($name, ...$arguments);
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
            'one' => FactoryOneFixture::class,
            'two' => FactoryTwoFixture::class,
        ];
    }
}
