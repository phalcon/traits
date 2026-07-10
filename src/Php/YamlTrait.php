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

use function yaml_parse_file;

/**
 * YAML based wrapper methods
 */
trait YamlTrait
{
    /**
     * Parse a YAML stream from a file
     *
     * @param string                  $filename
     * @param int                     $pos
     * @param mixed                   $ndocs
     * @param array<string, callable> $callbacks
     *
     * @return mixed
     *
     * @link https://php.net/manual/en/function.yaml-parse-file.php
     */
    protected static function phpYamlParseFile(
        string $filename,
        int $pos = 0,
        mixed &$ndocs = null,
        array $callbacks = []
    ): mixed {
        return yaml_parse_file($filename, $pos, $ndocs, $callbacks);
    }
}
