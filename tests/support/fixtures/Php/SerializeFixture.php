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

use Phalcon\Traits\Php\SerializeTrait;

class SerializeFixture
{
    use SerializeTrait;

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function serialize(mixed $value): string
    {
        return $this->phpSerialize($value);
    }

    /**
     * @param string $data
     * @param array{allowed_classes?: array<string>|bool, max_depth?: int} $options
     *
     * @return mixed
     */
    public function unserialize(string $data, array $options = []): mixed
    {
        return $this->phpUnserialize($data, $options);
    }
}
