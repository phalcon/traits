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

namespace Phalcon\Traits\Support\Helper\Str;

use function implode;
use function mb_str_split;
use function mb_substr;
use function pathinfo;
use function str_replace;

use const PATHINFO_FILENAME;

/**
 * Accepts a file name (without extension) and returns a calculated
 * directory structure with the filename in the end
 */
trait DirFromFileTrait
{
    /**
     * @param string $file
     * @param bool   $filesystemSafe
     *
     * @return string
     */
    protected static function toDirFromFile(string $file, bool $filesystemSafe = false): string
    {
        $name  = pathinfo($file, PATHINFO_FILENAME);
        $start = mb_substr($name, 0, -2);

        if (true === $filesystemSafe && !empty($start)) {
            $start = str_replace('.', '-', $start);
        }

        if (!$start) {
            $start = mb_substr($name, 0, 1);
        }

        return implode('/', mb_str_split($start, 2)) . '/';
    }
}
