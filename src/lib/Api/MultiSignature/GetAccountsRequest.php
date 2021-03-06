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

namespace Onz\Api\MultiSignature;

use Onz\AbstractRequest;
use Onz\Cli\Parameters;


class GetAccountsRequest extends AbstractRequest
{
    private $publicKey;

    public function __construct($publicKey)
    {
        parent::__construct();
        $this->publicKey = $publicKey;
    }

    public function setEndpoint()
    {
        $this->endpoint = "/api/multisignatures/accounts";
    }


    public function setType()
    {
        $this->type = self::GET;
    }

    public function getPayload()
    {

        return [
            Parameters::SENDER_PUBLIC_KEY => $this->publicKey
        ];
    }

    /**
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param mixed $publicKey
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
    }


}