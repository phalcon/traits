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

use Phalcon\Traits\Php\InfoTrait;

class InfoFixture
{
    use InfoTrait;

    /**
     * Find out whether an extension is loaded
     *
     * @param string $name
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.extension-loaded.php
     */
    public function extensionLoaded($name)
    {
        return $this->phpExtensionLoaded($name);
    }

    /**
     * Return true if the given function has been defined
     *
     * @param string $function
     *
     * @return bool
     *
     * @link https://php.net/manual/en/function.function-exists.php
     */
    public function functionExists($function)
    {
        return $this->phpFunctionExists($function);
    }
}
