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

use Phalcon\Traits\Php\HeaderTrait;

class HeaderFixture
{
    use HeaderTrait;

    /**
     * Checks if or where headers have been sent
     *
     * @return bool
     */
    public function headersSent(): bool
    {
        return $this->phpHeadersSent();
    }
}
