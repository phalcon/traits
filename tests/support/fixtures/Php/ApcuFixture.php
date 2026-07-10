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

namespace Phalcon\Tests\Fixtures\Php;

use APCUIterator;
use Phalcon\Traits\Php\ApcuTrait;

class ApcuFixture
{
    use ApcuTrait;

    /**
     * @param string $key
     * @param int    $step
     *
     * @return bool|int
     */
    public function apcuDec(string $key, int $step = 1): bool | int
    {
        return $this->phpApcuDec($key, $step);
    }

    /**
     * @param array<string>|string $key
     *
     * @return array<array-key, mixed>|bool
     */
    public function apcuDelete(array | string $key): bool | array
    {
        return $this->phpApcuDelete($key);
    }

    /**
     * @param array<string>|string $key
     *
     * @return array<array-key, mixed>|bool
     */
    public function apcuExists(array | string $key): bool | array
    {
        return $this->phpApcuExists($key);
    }

    /**
     * @param array<string>|string $key
     *
     * @return mixed
     */
    public function apcuFetch(array | string $key): mixed
    {
        return $this->phpApcuFetch($key);
    }

    /**
     * @param string $key
     * @param int    $step
     *
     * @return bool|int
     */
    public function apcuInc(string $key, int $step = 1): bool | int
    {
        return $this->phpApcuInc($key, $step);
    }

    /**
     * @param string $pattern
     *
     * @return APCUIterator|bool
     */
    public function apcuIterator(string $pattern): APCUIterator | bool
    {
        return $this->phpApcuIterator($pattern);
    }

    /**
     * @param array<array-key, mixed>|string $key
     * @param mixed                          $payload
     * @param int                            $ttl
     *
     * @return array<array-key, mixed>|bool
     */
    public function apcuStore(array | string $key, mixed $payload, int $ttl = 0): bool | array
    {
        return $this->phpApcuStore($key, $payload, $ttl);
    }
}
