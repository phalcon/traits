<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Fixtures\Helper\Str;

use Phalcon\Traits\Helper\Str\DirFromFileTrait;

/**
 * Accepts a file name (without extension) and returns a calculated
 * directory structure with the filename in the end
 */
class DirFromFileFixture
{
    use DirFromFileTrait;

    /**
     * @param string $file
     *
     * @return string
     */
    public function dirFromFile(string $file): string
    {
        return $this->toDirFromFile($file);
    }
}
