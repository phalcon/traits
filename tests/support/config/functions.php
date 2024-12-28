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

/*******************************************************************************
 * Directories
 *******************************************************************************/
/**
 * Returns the root dir
 */
if (!function_exists('rootDir')) {
    function rootDir(string $fileName = ''): string
    {
        return dirname(dirname(dirname(dirname(__FILE__))))
            . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/**
 * Returns the data folder
 */
if (!function_exists('dataDir')) {
    function dataDir(string $fileName = ''): string
    {
        return rootDir()
            . 'tests' . DIRECTORY_SEPARATOR
            . 'support' . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/**
 * Returns the output folder
 */
if (!function_exists('outputDir')) {
    function outputDir(string $fileName = ''): string
    {
        return rootDir()
            . 'tests' . DIRECTORY_SEPARATOR
            . '_output' . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/*******************************************************************************
 * Utility
 *******************************************************************************/
if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        if (defined($key)) {
            return constant($key);
        }

        if (getenv($key) !== false) {
            return getenv($key);
        }

        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('defineFromEnv')) {
    function defineFromEnv(string $name)
    {
        if (defined($name)) {
            return;
        }

        define($name, env($name));
    }
}
