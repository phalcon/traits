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

use Phalcon\Traits\Php\IniTrait;

class IniFixture
{
    use IniTrait;

    /**
     * Gets the value of a configuration option
     *
     * @param string $input
     * @param string $defaultValue
     *
     * @return string
     *
     * @link https://php.net/manual/en/function.ini-get.php
     * @link https://php.net/manual/en/ini.list.php
     */
    public function iniGet(string $input, string $defaultValue = ""): string
    {
        return $this->phpIniGet($input, $defaultValue);
    }

    /**
     * Gets the value of a boolean configuration option
     *
     * @param string $input
     * @param bool   $defaultValue
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.ini-get.php
     * @link https://php.net/manual/en/ini.list.php
     */
    public function iniGetBool(string $input, bool $defaultValue = false): bool
    {
        return $this->phpIniGetBool($input, $defaultValue);
    }

    /**
     * Gets the value of an integer configuration option
     *
     * @param string $input
     * @param int    $defaultValue
     *
     * @return int
     *
     * @link https://php.net/manual/en/function.ini-get.php
     * @link https://php.net/manual/en/ini.list.php
     */
    public function iniGetInt(string $input, int $defaultValue = 0): int
    {
        return $this->phpIniGetInt($input, $defaultValue);
    }

    /**
     * Parse a configuration file
     *
     * @param string $filename
     * @param bool   $processSections
     * @param int    $scannerMode
     *
     * @return array|false
     *
     * @link https://php.net/manual/en/function.parse-ini-file.php
     */
    public function parseIniFile(
        string $filename,
        bool $processSections = false,
        int $scannerMode = 1
    ) {
        return $this->phpParseIniFile(
            $filename,
            $processSections,
            $scannerMode
        );
    }
}
