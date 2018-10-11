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
use Onz\Model\Transaction;

class ListTransactionsResponse extends AbstractResponse
{
    private $transactions;
    private $count;


    public function success($jsonResponse)
    {
        $transactions = $jsonResponse['transactions'];
        $this->count = $jsonResponse['count'];

        foreach ($transactions as $trans) {
            $transaction = new Transaction();
            $id = $trans['id'];
            $transaction->setId($id);
            $transaction->setHeight($trans['height']);
            $transaction->setBlockId($trans['blockId']);
            $transaction->setType($trans['type']);
            $transaction->setTimestamp($trans['timestamp']);
            $transaction->setSenderPublicKey($trans['senderPublicKey']);
            $transaction->setSenderId($trans['senderId']);
            $transaction->setRecipientId($trans['recipientId']);
            $transaction->setRecipientPublicKey($trans['recipientPublicKey']);
            $transaction->setAmount($trans['amount']);
            $transaction->setFee($trans['fee']);
            $transaction->setSignature($trans['signature']);
            $transaction->setSignatures($trans['signatures']);
            $transaction->setConfirmations($trans['confirmations']);
            $transaction->setAsset($trans['asset']);
            $this->transactions[$id] = $transaction;
        }
    }
}