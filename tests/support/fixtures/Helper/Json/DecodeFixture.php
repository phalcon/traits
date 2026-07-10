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

use Phalcon\Traits\Support\Helper\Json\DecodeTrait;

class DecodeFixture
{
    use DecodeTrait;

    /**
     * Decodes a string using `json_decode`
     *
     * @param string      $data
     * @param bool        $associative
     * @param int<1, max> $depth
     * @param int         $options
     *
     * @return mixed
     */
    public function decode(
        string $data,
        bool $associative = false,
        int $depth = 512,
        int $options = 79
    ): mixed {
        return $this->toDecode($data, $associative, $depth, $options);
    }

    /**
     * Decodes a string relying on the trait defaults (associative false,
     * options 79)
     *
     * @param string $data
     *
     * @return mixed
     */
    public function decodeDefault(string $data): mixed
    {
        return $this->toDecode($data);
    }
}
