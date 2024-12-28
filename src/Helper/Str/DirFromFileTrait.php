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

namespace Phalcon\Traits\Helper\Str;

use function implode;
use function mb_str_split;
use function mb_substr;
use function pathinfo;

use const PATHINFO_FILENAME;

/**
 * Accepts a file name (without extension) and returns a calculated
 * directory structure with the filename in the end
 */
trait DirFromFileTrait
{
    /**
     * @param string $file
     *
     * @return string
     */
    protected static function staticToDirFromFile(string $file): string
    {
        $name  = pathinfo($file, PATHINFO_FILENAME);
        $start = mb_substr($name, 0, -2);

        if (!$start) {
            $start = mb_substr($name, 0, 1);
        }

        return implode('/', mb_str_split($start, 2)) . '/';
    }

    /**
     * @param string $file
     *
     * @return string
     */
    protected function toDirFromFile(string $file): string
    {
        return self::staticToDirFromFile($file);
    }
}
