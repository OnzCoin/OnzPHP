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
namespace Onz\Api\Account;

use Onz\AbstractRequest;


class BalanceRequest extends AbstractRequest
{
    private $address;

    public function __construct($secret)
    {
        parent::__construct();
        $this->address = $secret;
    }

    public function setEndpoint()
    {
        $this->endpoint = "api/accounts/getBalance";
    }

    public function getPayload()
    {
        return ['address' => $this->address];
    }

    public function setType()
    {
        $this->type = self::GET;
    }
}