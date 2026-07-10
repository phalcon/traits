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

use Phalcon\Traits\Php\YamlTrait;

class YamlFixture
{
    use YamlTrait;

    /**
     * @param string                  $filename
     * @param int                     $pos
     * @param mixed                   $ndocs
     * @param array<string, callable> $callbacks
     *
     * @return mixed
     */
    public function parseFile(
        string $filename,
        int $pos = 0,
        mixed &$ndocs = null,
        array $callbacks = []
    ): mixed {
        return $this->phpYamlParseFile($filename, $pos, $ndocs, $callbacks);
    }
}
