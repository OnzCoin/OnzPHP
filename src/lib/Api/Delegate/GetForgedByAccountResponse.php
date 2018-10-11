<?php
/**
 * OnzPhp - A PHP wrapper for the ONZ API
 * Copyright (c) 2018  OnzCoin <hi@onzcoin.com>
 *
 * OnzPhpis free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OnzPhpis distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with LiskPhp.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Onz\Api\Delegate;

use Onz\AbstractResponse;

class GetForgedByAccountResponse extends AbstractResponse
{
    /** @var int Fees */
    private $fees;

    /** @var int */
    private $rewards;

    /** @var int */
    private $forged;

    /** @var int */
    private $count;

    public function success($jsonResponse)
    {
        $this->fees = intval($jsonResponse['fees']);
        $this->rewards = intval($jsonResponse['rewards']);
        $this->forged = intval($jsonResponse['forged']);
        $this->count = intval($jsonResponse['count']);
    }

    /**
     * @return int
     */
    public function getFees(): int
    {
        return $this->fees;
    }

    /**
     * @return int
     */
    public function getRewards(): int
    {
        return $this->rewards;
    }

    /**
     * @return int
     */
    public function getForged(): int
    {
        return $this->forged;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }


}