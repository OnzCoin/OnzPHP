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

namespace Onz\Api\Transaction;

use Onz\AbstractRequest;
use Onz\Cli\Parameters;

class GetUnconfirmedTransactionRequest extends AbstractRequest
{
    private $id;

    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function setEndpoint()
    {
        $this->endpoint = "/api/transactions/unconfirmed/get";
    }

    public function getPayload()
    {
        return [
            Parameters::ID => $this->id
        ];
    }

    public function setType()
    {
        $this->type = self::GET;

    }
}