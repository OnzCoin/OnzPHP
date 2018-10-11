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
use Onz\Cli\Parameters;
use Onz\Exception\DelegateNotFoundException;
use Onz\Model\Delegate;

class GetDelegateResponse extends AbstractResponse
{
    private $delegate;


    public function success($jsonResponse)
    {
        $transaction = $jsonResponse['delegate'];

        $del = new Delegate($transaction[Parameters::ADDRESS]);
        $del->setUsername($transaction[Parameters::DELEGATE_USERNAME]);
        $del->setPublicKey($transaction[Parameters::SENDER_PUBLIC_KEY]);
        $del->setVote($transaction['vote']);
        $del->setProducedblocks($transaction['producedblocks']);
        $del->setMissedblocks($transaction['missedblocks']);
        $del->setRate($transaction['rate']);
        $del->setRank($transaction['rank']);
        $del->setApproval($transaction['approval']);
        $del->setProductivity($transaction['productivity']);

        $this->delegate = $del;

    }

    /**
     * @return Delegate
     */
    public function getDelegate()
    {
        return $this->delegate;
    }

    /**
     * @param mixed $delegate
     */
    public function setDelegate($delegate)
    {
        $this->delegate = $delegate;
    }

    protected function error($errorMessage)
    {
        if ($errorMessage === "Delegate not found") {
            throw new DelegateNotFoundException($errorMessage);
        } else {
            parent::error($errorMessage);
        }
    }


}