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

use function ini_get;
use function parse_ini_file;
use function strtolower;

trait IniTrait
{
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
    protected function phpIniGet(
        string $input,
        string $defaultValue = ""
    ): string {
        return self::phpStaticIniGet($input, $defaultValue);
    }

    /**
     * Query a php.ini value and return it back as boolean
     *
     * @param string $input
     * @param bool   $defaultValue
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.ini-get.php
     * @link https://php.net/manual/en/ini.list.php
     */
    protected function phpIniGetBool(
        string $input,
        bool $defaultValue = false
    ): bool {
        return self::phpStaticIniGetBool($input, $defaultValue);
    }

    /**
     * Query a php.ini value and return it back as integer
     *
     * @param string $input
     * @param int    $defaultValue
     *
     * @return int
     *
     * @link https://php.net/manual/en/function.ini-get.php
     * @link https://php.net/manual/en/ini.list.php
     */
    protected function phpIniGetInt(string $input, int $defaultValue = 0): int
    {
        return self::phpStaticIniGetInt($input, $defaultValue);
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
    protected function phpParseIniFile(
        string $filename,
        bool $processSections = false,
        int $scannerMode = 1
    ) {
        return self::phpStaticParseIniFile($filename, $processSections, $scannerMode);
    }

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
    protected static function phpStaticIniGet(
        string $input,
        string $defaultValue = ""
    ): string {
        $value = ini_get($input);
        if (false === $value) {
            return $defaultValue;
        }

        return $value;
    }

    /**
     * Query a php.ini value and return it back as boolean
     *
     * @param string $input
     * @param bool   $defaultValue
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.ini-get.php
     * @link https://php.net/manual/en/ini.list.php
     */
    protected static function phpStaticIniGetBool(
        string $input,
        bool $defaultValue = false
    ): bool {
        $value = ini_get($input);
        if (false === $value) {
            return $defaultValue;
        }

        $value = match (strtolower($value)) {
            'true',
            'on',
            'yes',
            'y',
            '1' => true,
            default => false,
        };

        return $value;
    }

    /**
     * Query a php.ini value and return it back as integer
     *
     * @param string $input
     * @param int    $defaultValue
     *
     * @return int
     *
     * @link https://php.net/manual/en/function.ini-get.php
     * @link https://php.net/manual/en/ini.list.php
     */
    protected static function phpStaticIniGetInt(
        string $input,
        int $defaultValue = 0
    ): int {
        return (int) self::phpStaticIniGet($input, (string)$defaultValue);
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
    protected static function phpStaticParseIniFile(
        string $filename,
        bool $processSections = false,
        int $scannerMode = 1
    ) {
        return parse_ini_file($filename, $processSections, $scannerMode);
    }
}
