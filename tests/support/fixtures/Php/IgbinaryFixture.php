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

use Phalcon\Traits\Php\IgbinaryTrait;

class IgbinaryFixture
{
    use IgbinaryTrait;

    /**
     * @param mixed $value
     *
     * @return string|null
     */
    public function serialize(mixed $value): string | null
    {
        return $this->phpIgbinarySerialize($value);
    }

    /**
     * @param string $value
     *
     * @return mixed
     */
    public function unserialize(string $value): mixed
    {
        return $this->phpIgbinaryUnserialize($value);
    }
}
