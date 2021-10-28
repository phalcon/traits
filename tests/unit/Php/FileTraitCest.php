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
use UnitTester;

use function dataDir;
use function is_resource;
use function outputDir;
use function uniqid;

/**
 * Tests the File trait
 */
class FileTraitCest
{
    /**
     * Tests Phalcon\Traits\Php\FileTrait
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2021-10-25
     */
    public function phpFileTrait(UnitTester $I)
    {
        $I->wantToTest('Php\FileTrait');

        $name     = $I->getNewFileName('file', 'txt');
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
        $I->assertTrue($result);

        $expected = [
            0 => 'hi',
            1 => 'Hello',
        ];
        $I->assertEquals($expected, $actual);

        /**
         * Parse ini file
         */
        $source = dataDir('assets/sample.ini');
        $actual = $file->parseIniFile($source);
        $I->assertTrue($result);
        $expected = [
            'parent.property'                    => 'On',
            'parent.property2'                   => 'yeah',
            'parent.property3.baseuri'           => '/phalcon/',
            'parent.property4.models.metadata'   => 'memory',
            'parent.property5.database.adapter'  => 'mysql',
            'parent.property5.database.host'     => 'localhost',
            'parent.property5.database.username' => 'user',
            'parent.property5.database.password' => 'passwd',
            'parent.property5.database.name'     => 'demo',
            'parent.property6.test'              => ['a', 'b', 'c',],
        ];
        $I->assertEquals($expected, $actual);

        /**
         * Create the file and put data in it
         */
        $actual = $file->filePutContents($fileName, $contents);
        $I->assertGreaterThan(0, $actual);

        /**
         * Check if it exists
         */
        $actual = $file->fileExists($fileName);
        $I->assertTrue($actual);

        /**
         * Check if it is writable
         */
        $actual = $file->isWritable($fileName);
        $I->assertTrue($actual);

        /**
         * Check the contents
         */
        $expected = $contents;
        $actual   = $file->fileGetContents($fileName);
        $I->assertEquals($expected, $actual);

        /**
         * Delete it
         */
        $actual = $file->unlink($fileName);
        $I->assertTrue($actual);

        /**
         * Use fopen
         */
        $handle = $file->fopen($fileName, 'ab');
        $actual = is_resource($handle);
        $I->assertTrue($actual);

        /**
         * fwrite
         */
        $actual = $file->fwrite($handle, $contents);
        $I->assertGreaterThan(0, $actual);

        /**
         * fclose
         */
        $actual = $file->fclose($handle);
        $I->assertTrue($actual);

        $I->seeFileFound($name, outputDir());
        $I->safeDeleteFile($fileName);
    }
}
