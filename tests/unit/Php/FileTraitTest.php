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

namespace Phalcon\Tests\Unit\Php;

use Phalcon\Tests\Fixtures\Php\FileFixture;
use Phalcon\Tests\Unit\AbstractUnitTestCase;
use PHPUnit\Framework\TestCase;

use function dataDir;
use function is_resource;
use function outputDir;
use function uniqid;

/**
 * Tests the File trait
 */
final class FileTraitTest extends AbstractUnitTestCase
{
    /**
     * Tests Phalcon\Traits\Php\FileTrait
     *
     * @return void
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function testHelperPhpFileTrait(): void
    {
        $name     = $this->getNewFileName('file', 'txt');
        $contents = uniqid('contents-');
        $fileName = outputDir($name);

        $file = new FileFixture();

        /**
         * Get a csv file
         */
        $source = dataDir('assets/sample.csv');
        $handle = $file->fopen($source, 'r');
        $actual = $file->fgetCsv($handle, 0, ';');
        $result = $file->fclose($handle);
        $this->assertTrue($result);

        $expected = [
            0 => 'hi',
            1 => 'Hello',
        ];
        $this->assertEquals($expected, $actual);

        /**
         * Create the file and put data in it
         */
        $actual = $file->filePutContents($fileName, $contents);
        $this->assertGreaterThan(0, $actual);

        /**
         * Check if it exists
         */
        $actual = $file->fileExists($fileName);
        $this->assertTrue($actual);

        /**
         * Check if it is writable
         */
        $actual = $file->isWritable($fileName);
        $this->assertTrue($actual);

        /**
         * Check the contents
         */
        $expected = $contents;
        $actual   = $file->fileGetContents($fileName);
        $this->assertEquals($expected, $actual);

        /**
         * Delete it
         */
        $actual = $file->unlink($fileName);
        $this->assertTrue($actual);

        /**
         * Use fopen
         */
        $handle = $file->fopen($fileName, 'ab');
        $actual = is_resource($handle);
        $this->assertTrue($actual);

        /**
         * fwrite
         */
        $actual = $file->fwrite($handle, $contents);
        $this->assertGreaterThan(0, $actual);

        /**
         * fclose
         */
        $actual = $file->fclose($handle);
        $this->assertTrue($actual);

        $this->assertFileExists(outputDir($name));
        $this->safeDeleteFile($fileName);
    }
}
