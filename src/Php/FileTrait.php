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
use function is_writable;
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
     *
     * @return bool
     */
    protected static function phpFclose($handle): bool
    {
        return fclose($handle);
    }

    /**
     * Gets line from file pointer and parse for CSV fields
     *
     * @param resource $stream
     * @param int<0, max> $length
     * @param string   $separator
     * @param string   $enclosure
     * @param string   $escape
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
     * @param string $filename
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.file-exists.php
     */
    protected static function phpFileExists(string $filename): bool
    {
        return file_exists($filename);
    }

    /**
     * @param string        $filename
     * @param bool          $useIncludePath
     * @param resource|null $context
     * @param int           $offset
     * @param int<0, max>|null $length
     *
     * @return false|string
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
     * @param string   $filename
     * @param mixed    $data
     * @param int      $flags
     * @param resource $context
     *
     * @return false|int
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
     * @param string        $filename
     * @param string        $mode
     * @param bool          $useIncludePath
     * @param resource|null $context
     *
     * @return resource|false
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
     * @param resource $handle
     * @param string   $data
     * @param int<0, max>|null $length
     *
     * @return false|int
     */
    protected static function phpFwrite($handle, string $data, ?int $length = null): false | int
    {
        if (null === $length) {
            return fwrite($handle, $data);
        }

        return fwrite($handle, $data, $length);
    }

    /**
     * Tells whether the filename is writable
     *
     * @param string $filename
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.is-writable.php
     */
    protected static function phpIsWritable(string $filename): bool
    {
        return is_writable($filename);
    }

    /**
     * @param string        $filename
     * @param resource|null $context
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.unlink.php
     */
    protected static function phpUnlink(string $filename, $context = null): bool
    {
        return unlink($filename, $context);
    }
}
