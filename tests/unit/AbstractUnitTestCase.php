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

namespace Phalcon\Tests\Unit;

use Phalcon\Talon\PHPUnit\AbstractUnitTestCase as TalonUnitTestCase;

use function file_exists;
use function gc_collect_cycles;
use function is_file;
use function uniqid;
use function unlink;

abstract class AbstractUnitTestCase extends TalonUnitTestCase
{
    /**
     * Returns a unique file name
     *
     * @param string $prefix A prefix for the file
     * @param string $suffix A suffix for the file
     *
     * @return string
     */
    public function getNewFileName(
        string $prefix = '',
        string $suffix = 'log'
    ): string {
        $prefix = ($prefix) ? $prefix . '_' : '';
        $suffix = ($suffix) ?: 'log';

        return uniqid($prefix, true) . '.' . $suffix;
    }

    /**
     * Deletes a file if it exists
     *
     * @param string $filename
     *
     * @return void
     */
    public function safeDeleteFile(string $filename): void
    {
        if (file_exists($filename) && is_file($filename)) {
            gc_collect_cycles();
            unlink($filename);
        }
    }
}
