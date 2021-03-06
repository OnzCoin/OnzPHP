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

namespace Onz\Api\Peer;

use Onz\AbstractResponse;
use Onz\Model\Peer;

class GetPeerResponse extends AbstractResponse
{
    protected $peer;

    /**
     * @return Peer
     */
    public function getPeer(): Peer
    {
        return $this->peer;
    }

    /**
     * @param Peer $peer
     */
    public function setPeer(Peer $peer)
    {
        $this->peer = $peer;
    }


    public function success($jsonResponse)
    {
        $pe = $jsonResponse['peer'];

        $peer = new Peer();
        $peer->setIp($pe['ip']);
        $peer->setPort($pe['port']);
        $peer->setState($pe['state']);
        $peer->setOs($pe['os']);
        $peer->setVersion($pe['version']);
        $peer->setDappId($pe['dappid']);
        $peer->setBroadhash($pe['broadhash']);
        $peer->setHeight($pe['height']);
        $peer->setClock($pe['clock']);
        $peer->setUpdated($pe['updated']);
        $peer->setNonce($pe['nonce']);
        $this->peer = $peer;
    }
}