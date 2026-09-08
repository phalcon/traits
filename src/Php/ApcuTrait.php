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

namespace Phalcon\Traits\Php;

use APCUIterator;

use function apcu_dec;
use function apcu_delete;
use function apcu_exists;
use function apcu_fetch;
use function apcu_inc;
use function apcu_store;

/**
 * APCu based wrapper methods
 */
trait ApcuTrait
{
    /**
     * @link https://php.net/manual/en/function.apcu-dec.php
     */
    protected static function phpApcuDec(string $key, int $step = 1): bool | int
    {
        return apcu_dec($key, $step);
    }

    /**
     * @param array<string>|string $key
     *
     * @return array<array-key, mixed>|bool
     *
     * @link https://php.net/manual/en/function.apcu-delete.php
     */
    protected static function phpApcuDelete(array | string $key): array | bool
    {
        return apcu_delete($key);
    }

    /**
     * @param array<string>|string $key
     *
     * @return array<array-key, mixed>|bool
     *
     * @link https://php.net/manual/en/function.apcu-exists.php
     */
    protected static function phpApcuExists(array | string $key): array | bool
    {
        return apcu_exists($key);
    }

    /**
     * @param array<string>|string $key
     *
     * @link https://php.net/manual/en/function.apcu-fetch.php
     */
    protected static function phpApcuFetch(array | string $key): mixed
    {
        return apcu_fetch($key);
    }

    /**
     * @link https://php.net/manual/en/function.apcu-inc.php
     */
    protected static function phpApcuInc(string $key, int $step = 1): bool | int
    {
        return apcu_inc($key, $step);
    }

    /**
     * @link https://php.net/manual/en/class.apcuiterator.php
     */
    protected static function phpApcuIterator(string $pattern): APCUIterator | bool
    {
        return new APCUIterator($pattern);
    }

    /**
     * @param array<array-key, mixed>|string $key
     *
     * @return array<array-key, mixed>|bool
     *
     * @link https://php.net/manual/en/function.apcu-store.php
     */
    protected static function phpApcuStore(
        array | string $key,
        mixed $payload,
        int $ttl = 0
    ): array | bool {
        return apcu_store($key, $payload, $ttl);
    }
}
