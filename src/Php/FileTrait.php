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

use function fclose;
use function fgetcsv;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function fopen;
use function fwrite;
use function is_dir;
use function is_writable;
use function mkdir;
use function unlink;

/**
 * File based wrapper methods
 */
trait FileTrait
{
    /**
     * Closes an open file pointer
     *
     * @link https://php.net/manual/en/function.fclose.php
     *
     * @param resource $handle
     */
    protected static function phpFclose($handle): bool
    {
        return fclose($handle);
    }

    /**
     * Gets line from file pointer and parse for CSV fields
     *
     * @param resource    $stream
     * @param int<0, max> $length
     *
     * @return array<array-key, mixed>|false
     *
     * @link https://php.net/manual/en/function.fgetcsv.php
     */
    protected static function phpFgetCsv(
        $stream,
        int $length = 0,
        string $separator = ',',
        ?string $enclosure = null,
        ?string $escape = null
    ): array | false {
        if (null === $enclosure) {
            $enclosure = '"';
        }

        if (null === $escape) {
            $escape = '\\';
        }

        return fgetcsv($stream, $length, $separator, $enclosure, $escape);
    }

    /**
     * @link https://php.net/manual/en/function.file-exists.php
     */
    protected static function phpFileExists(string $filename): bool
    {
        return file_exists($filename);
    }

    /**
     * @param resource|null    $context
     * @param int<0, max>|null $length
     *
     * @link https://php.net/manual/en/function.file-get-contents.php
     */
    protected static function phpFileGetContents(
        string $filename,
        bool $useIncludePath = false,
        $context = null,
        int $offset = 0,
        ?int $length = null
    ): false | string {
        if (null === $length) {
            return file_get_contents($filename, $useIncludePath, $context, $offset);
        }

        return file_get_contents($filename, $useIncludePath, $context, $offset, $length);
    }

    /**
     * @param mixed    $data
     * @param resource $context
     *
     * @link https://php.net/manual/en/function.file-put-contents.php
     */
    protected static function phpFilePutContents(
        string $filename,
        $data,
        int $flags = 0,
        $context = null
    ): false | int {
        return file_put_contents($filename, $data, $flags, $context);
    }

    /**
     * @param resource|null $context
     *
     * @return false|resource
     *
     * @link https://php.net/manual/en/function.fopen.php
     */
    protected static function phpFopen(
        string $filename,
        string $mode,
        bool $useIncludePath = false,
        $context = null
    ) {
        return fopen($filename, $mode, $useIncludePath, $context);
    }

    /**
     * Binary-safe file write
     *
     * @link https://php.net/manual/en/function.fwrite.php
     *
     * @param resource         $handle
     * @param int<0, max>|null $length
     */
    protected static function phpFwrite($handle, string $data, ?int $length = null): false | int
    {
        if (null === $length) {
            return fwrite($handle, $data);
        }

        return fwrite($handle, $data, $length);
    }

    /**
     * Tells whether the filename is a directory
     *
     * @link https://php.net/manual/en/function.is-dir.php
     */
    protected static function phpIsDir(string $filename): bool
    {
        return is_dir($filename);
    }

    /**
     * Tells whether the filename is writable
     *
     * @link https://php.net/manual/en/function.is-writable.php
     */
    protected static function phpIsWritable(string $filename): bool
    {
        return is_writable($filename);
    }

    /**
     * Makes a directory
     *
     * @param resource|null $context
     *
     * @link https://php.net/manual/en/function.mkdir.php
     */
    protected static function phpMkdir(
        string $directory,
        int $permissions = 0777,
        bool $recursive = false,
        $context = null
    ): bool {
        return mkdir($directory, $permissions, $recursive, $context);
    }

    /**
     * @param resource|null $context
     *
     * @link https://php.net/manual/en/function.unlink.php
     */
    protected static function phpUnlink(string $filename, $context = null): bool
    {
        return unlink($filename, $context);
    }
}
