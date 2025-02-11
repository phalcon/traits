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
        return self::staticPhpIniGet($input, $defaultValue);
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
        return self::staticPhpIniGetBool($input, $defaultValue);
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
        return self::staticPhpIniGetInt($input, $defaultValue);
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
    ): array | false {
        return self::staticPhpParseIniFile($filename, $processSections, $scannerMode);
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
    protected static function staticPhpIniGet(
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
    protected static function staticPhpIniGetBool(
        string $input,
        bool $defaultValue = false
    ): bool {
        $value = ini_get($input);
        if (false === $value) {
            return $defaultValue;
        }

        return match (strtolower($value)) {
            'true',
            'on',
            'yes',
            'y',
            '1'     => true,
            default => false,
        };
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
    protected static function staticPhpIniGetInt(
        string $input,
        int $defaultValue = 0
    ): int {
        return (int)self::staticPhpIniGet($input, (string)$defaultValue);
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
    protected static function staticPhpParseIniFile(
        string $filename,
        bool $processSections = false,
        int $scannerMode = 1
    ): array | false {
        return parse_ini_file($filename, $processSections, $scannerMode);
    }
}
