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

use function rtrim;

use const DIRECTORY_SEPARATOR;

/**
 * Accepts a directory name and ensures that it ends with
 * DIRECTORY_SEPARATOR
 */
trait DirSeparatorTrait
{
    /**
     * @param string $directory
     *
     * @return string
     */
    protected static function staticToDirSeparator(string $directory): string
    {
        return rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * @param string $directory
     *
     * @return string
     */
    protected function toDirSeparator(string $directory): string
    {
        return self::staticToDirSeparator($directory);
    }
}
