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

use Phalcon\Traits\Php\OpensslTrait;

class OpensslFixture
{
    use OpensslTrait;

    /**
     * @param string $cipher
     *
     * @return int|false
     */
    public function cipherIvLength(string $cipher): int | false
    {
        return $this->phpOpensslCipherIvLength($cipher);
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public function randomPseudoBytes(int $length): string
    {
        return $this->phpOpensslRandomPseudoBytes($length);
    }
}
