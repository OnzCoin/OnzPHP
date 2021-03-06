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

use Onz\AbstractResponse;
use Onz\Model\UnconfirmedTransaction;

class ListUnconfirmedTransactionsResponse extends AbstractResponse
{
    private $transactions;


    public function success($jsonResponse)
    {
        $transactions = $jsonResponse['transactions'];

        foreach ($transactions as $trans) {
            $transaction = new UnconfirmedTransaction();
            $id = $trans['id'];
            $transaction->setType($trans['type']);
            $transaction->setAmount($trans['amount']);
            $transaction->setSenderPublicKey($trans['senderPublicKey']);
            $transaction->setTimestamp($trans['timestamp']);
            $transaction->setAsset($trans['asset']);
            $transaction->setRecipientId($trans['recipientId']);
            $transaction->setSignature($trans['signature']);
            $transaction->setId($id);
            $transaction->setFee($trans['fee']);
            $transaction->setSenderId($trans['senderId']);
            $transaction->setRelays($trans['relays']);
            $transaction->setReceivedAt($trans['receivedAt']);

            $this->transactions[$id] = $transaction;
        }
    }
}