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

use PHPUnit\Framework\SkippedTestSuiteError;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;

use function array_slice;
use function array_unshift;
use function call_user_func_array;
use function extension_loaded;
use function file_exists;
use function func_get_args;
use function gc_collect_cycles;
use function glob;
use function is_dir;
use function is_file;
use function is_object;
use function rmdir;
use function rtrim;
use function sprintf;
use function substr;
use function uniqid;
use function unlink;

use const DIRECTORY_SEPARATOR;
use const GLOB_MARK;

abstract class AbstractUnitTestCase extends TestCase
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
