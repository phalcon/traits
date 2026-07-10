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

use Phalcon\Traits\Php\HashTrait;

class HashFixture
{
    use HashTrait;

    /**
     * @param string $algorithm
     * @param string $data
     * @param bool   $binary
     *
     * @return string
     */
    public function hash(string $algorithm, string $data, bool $binary = false): string
    {
        return $this->phpHash($algorithm, $data, $binary);
    }

    /**
     * @param string $knownString
     * @param string $userString
     *
     * @return bool
     */
    public function hashEquals(string $knownString, string $userString): bool
    {
        return $this->phpHashEquals($knownString, $userString);
    }

    /**
     * @param string $algorithm
     * @param string $data
     * @param string $key
     * @param bool   $binary
     *
     * @return string
     */
    public function hashHmac(
        string $algorithm,
        string $data,
        string $key,
        bool $binary = false
    ): string {
        return $this->phpHashHmac($algorithm, $data, $key, $binary);
    }
}
