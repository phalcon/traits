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

namespace Phalcon\Traits\Factory;

use Exception;

use function array_merge;

/**
 * Methods allowing a mapper based factory to operate. Supports injected
 * services, getting a service by name (key), initialization and setting of
 * the exception class (when exceptions are needed to be thrown)
 *
 * @property string $exceptionClass
 * @property array  $mapper
 */
trait FactoryTrait
{
    /**
     * @var array<string, object>
     */
    private array $instances = [];

    /**
     * @var string[]
     */
    private array $mapper = [];

    /**
     * Returns the exception class for the factory
     *
     * @return string
     */
    abstract protected function getExceptionClass(): string;

    /**
     * Returns a service based on the name; throws exception if it does not
     * exist
     *
     * @param string $name
     *
     * @return mixed
     * @throws Exception
     */
    protected function getService(string $name): string
    {
        if (true !== isset($this->mapper[$name])) {
            $exceptionClass = $this->getExceptionClass();
            throw new $exceptionClass(
                'Service ' . $name . ' is not registered'
            );
        }

        return $this->mapper[$name];
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
    protected function getCachedInstance(string $name, mixed ...$arguments): object
    {
        if (true !== isset($this->instances[$name])) {
            $definition = $this->getService($name);
            $this->instances[$name] = new $definition(...$arguments);
        }

        return $this->instances[$name];
    }

    /**
     * Returns the services for the factory
     *
     * @return string[]
     */
    abstract protected function getServices(): array;

    /**
     * Initializes services
     *
     * @param string[] $services
     */
    protected function init(array $services = []): void
    {
        $this->mapper = array_merge($this->getServices(), $services);
    }
}
