<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Fixtures\Helper\Json;

use Phalcon\Traits\Support\Helper\Json\EncodeTrait;

class EncodeFixture
{
    use EncodeTrait;

    /**
     * Encodes data using `json_encode`
     *
     * @param mixed       $data
     * @param int         $options
     * @param int<1, max> $depth
     *
     * @return string
     */
    public function encode(
        mixed $data,
        int $options = 79,
        int $depth = 512
    ): string {
        return $this->toEncode($data, $options, $depth);
    }

    /**
     * Encodes data relying on the trait defaults (options 79, depth 512)
     *
     * @param mixed $data
     *
     * @return string
     */
    public function encodeDefault(mixed $data): string
    {
        return $this->toEncode($data);
    }
}
