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

use Onz\AbstractRequest;
use Onz\Cli\Parameters;

class GetDelegateVotesRequest extends AbstractRequest
{

    private $address;

    public function __construct($address)
    {
        parent::__construct();
        $this->address = $address;
    }

    public function setEndpoint()
    {
        $this->endpoint = "/api/accounts/delegates/";
    }

    public function getPayload()
    {
        $params = [
            Parameters::ADDRESS => $this->address
        ];

        return $params;
    }

    public function setType()
    {
        $this->type = self::GET;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }





}