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

use Phalcon\Traits\Php\MsgpackTrait;

class MsgpackFixture
{
    use MsgpackTrait;

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function pack(mixed $value): string
    {
        return $this->phpMsgpackPack($value);
    }

    /**
     * @param string $value
     *
     * @return mixed
     */
    public function unpack(string $value): mixed
    {
        return $this->phpMsgpackUnpack($value);
    }
}
