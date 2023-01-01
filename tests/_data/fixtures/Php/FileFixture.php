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

use Phalcon\Traits\Php\FileTrait;

class FileFixture
{
    use FileTrait;

    /**
     * @param string $filename
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.file-exists.php
     */
    public function fileExists($filename)
    {
        return $this->phpFileExists($filename);
    }

    /**
     * @param string $filename
     *
     * @return string|false
     *
     * @link https://php.net/manual/en/function.file-get-contents.php
     */
    public function fileGetContents($filename)
    {
        return $this->phpFileGetContents($filename);
    }

    /**
     * @param string $filename
     * @param mixed $data
     * @param int $flags
     * @param resource $context
     *
     * @return int|false
     *
     * @link https://php.net/manual/en/function.file-put-contents.php
     */
    public function filePutContents(
        $filename,
        $data,
        $flags = 0,
        $context = null
    ) {
        return $this->phpFilePutContents($filename, $data, $flags, $context);
    }

    /**
     * Closes an open file pointer
     *
     * @link https://php.net/manual/en/function.fclose.php
     *
     * @param resource $handle
     *
     * @return bool
     */
    public function fclose($handle)
    {
        return $this->phpFclose($handle);
    }

    /**
     * Gets line from file pointer and parse for CSV fields
     *
     * @param resource $stream
     * @param int      $length
     * @param string   $separator
     * @param string   $enclosure
     * @param string   $escape
     *
     * @return array|null|false
     *
     * @link https://php.net/manual/en/function.fgetcsv.php
     */
    public function fgetCsv(
        $stream,
        $length = 0,
        $separator = ',',
        $enclosure = '"',
        $escape = '\\'
    ) {
        return $this->phpFgetCsv(
            $stream,
            $length,
            $separator,
            $enclosure,
            $escape
        );
    }


    /**
     * @param string $filename
     * @param string $mode
     *
     * @return resource|false
     *
     * @link https://php.net/manual/en/function.fopen.php
     */
    public function fopen($filename, $mode)
    {
        return $this->phpFopen($filename, $mode);
    }

    /**
     * Binary-safe file write
     *
     * @link https://php.net/manual/en/function.fwrite.php
     *
     * @param resource $handle
     * @param string   $data
     *
     * @return int|false
     */
    public function fwrite($handle, string $data)
    {
        return $this->phpFwrite($handle, $data);
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
    public function isWritable($filename): bool
    {
        return $this->phpIsWritable($filename);
    }

    /**
     * @param string $filename
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.unlink.php
     */
    public function unlink($filename)
    {
        return $this->phpUnlink($filename);
    }
}
