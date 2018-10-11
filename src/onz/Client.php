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

namespace Onz;


use Onz\Api\Account\BalanceRequest;
use Onz\Api\Account\BalanceResponse;
use Onz\Api\Account\DelegatesRequest;
use Onz\Api\Account\DelegatesResponse;
use Onz\Api\Account\GeneratePublicKeyRequest;
use Onz\Api\Account\GeneratePublicKeyResponse;
use Onz\Api\Account\GetPublicKeyRequest;
use Onz\Api\Account\GetPublicKeyResponse;
use Onz\Api\Account\OpenRequest;
use Onz\Api\Account\OpenResponse;
use Onz\Api\Account\VoteDelegatesRequest;
use Onz\Api\Account\VoteDelegatesResponse;
use Onz\Api\Apps\CreateAccountResponse;
use Onz\Api\Apps\GetAllInstalledAppsRequest;
use Onz\Api\Apps\GetAllInstalledAppsResponse;
use Onz\Api\Apps\GetAppRequest;
use Onz\Api\Apps\GetAppResponse;
use Onz\Api\Apps\GetAppsRequest;
use Onz\Api\Apps\GetAppsResponse;
use Onz\Api\Apps\GetCategoriesRequest;
use Onz\Api\Apps\GetCategoriesResponse;
use Onz\Api\Apps\GetInstalledAppsRequest;
use Onz\Api\Apps\GetInstalledAppsResponse;
use Onz\Api\Apps\InstallAppRequest;
use Onz\Api\Apps\InstallingAppRequest;
use Onz\Api\Apps\InstallingAppResponse;
use Onz\Api\Apps\LaunchAppRequest;
use Onz\Api\Apps\LaunchAppResponse;
use Onz\Api\Apps\LaunchedAppsRequest;
use Onz\Api\Apps\LaunchedAppsResponse;
use Onz\Api\Apps\RegisterAppRequest;
use Onz\Api\Apps\RegisterAppResponse;
use Onz\Api\Apps\SearchAppsRequest;
use Onz\Api\Apps\SearchAppsResponse;
use Onz\Api\Apps\StopAppRequest;
use Onz\Api\Apps\StopAppResponse;
use Onz\Api\Apps\UninstallAppRequest;
use Onz\Api\Apps\UninstallAppResponse;
use Onz\Api\Apps\UninstallingAppRequest;
use Onz\Api\Apps\UninstallingAppResponse;
use Onz\Api\Blocks\GetBlockchainFeeRequest;
use Onz\Api\Blocks\GetBlockchainFeeResponse;
use Onz\Api\Blocks\GetBlockchainFeesRequest;
use Onz\Api\Blocks\GetBlockchainFeesResponse;
use Onz\Api\Blocks\GetBlockchainHeightRequest;
use Onz\Api\Blocks\GetBlockchainHeightResponse;
use Onz\Api\Blocks\GetBlockchainMilestoneRequest;
use Onz\Api\Blocks\GetBlockchainMilestoneResponse;
use Onz\Api\Blocks\GetBlockchainNethashRequest;
use Onz\Api\Blocks\GetBlockchainNethashResponse;
use Onz\Api\Blocks\GetBlockchainRewardRequest;
use Onz\Api\Blocks\GetBlockchainRewardResponse;
use Onz\Api\Blocks\GetBlockRequest;
use Onz\Api\Blocks\GetBlockResponse;
use Onz\Api\Blocks\GetBlocksRequest;
use Onz\Api\Blocks\GetBlocksResponse;
use Onz\Api\Blocks\GetStatusInfoRequest;
use Onz\Api\Blocks\GetStatusInfoResponse;
use Onz\Api\Blocks\GetTotalSupplyRequest;
use Onz\Api\Blocks\GetTotalSupplyResponse;
use Onz\Api\Delegate\CreateDelegateRequest;
use Onz\Api\Delegate\CreateDelegateResponse;
use Onz\Api\Delegate\DisableForgingRequest;
use Onz\Api\Delegate\DisableForgingResponse;
use Onz\Api\Delegate\EnableForgingRequest;
use Onz\Api\Delegate\EnableForgingResponse;
use Onz\Api\Delegate\GetDelegateCountRequest;
use Onz\Api\Delegate\GetDelegateCountResponse;
use Onz\Api\Delegate\GetDelegateListRequest;
use Onz\Api\Delegate\GetDelegateListResponse;
use Onz\Api\Delegate\GetDelegateRequest;
use Onz\Api\Delegate\GetDelegateResponse;
use Onz\Api\Delegate\GetDelegateVotersRequest;
use Onz\Api\Delegate\GetDelegateVotersResponse;
use Onz\Api\Delegate\GetDelegateVotesRequest;
use Onz\Api\Delegate\GetDelegateVotesResponse;
use Onz\Api\Delegate\GetForgedByAccountRequest;
use Onz\Api\Delegate\GetForgedByAccountResponse;
use Onz\Api\Delegate\GetNextForgerRequest;
use Onz\Api\Delegate\GetNextForgerResponse;
use Onz\Api\Delegate\SearchDelegateRequest;
use Onz\Api\Delegate\SearchDelegateResponse;
use Onz\Api\Loader\BlockStatusRequest;
use Onz\Api\Loader\BlockStatusResponse;
use Onz\Api\Loader\LoadingStatusRequest;
use Onz\Api\Loader\LoadingStatusResponse;
use Onz\Api\Loader\SynchronizationStatusRequest;
use Onz\Api\Loader\SynchronizationStatusResponse;
use Onz\Api\MultiSignature\CreateAccountRequest as CreateMultiSignatureAccountRequest;
use Onz\Api\MultiSignature\CreateAccountResponse as CreateMultiSignatureAccountResponse;
use Onz\Api\MultiSignature\GetAccountsRequest;
use Onz\Api\MultiSignature\GetAccountsResponse;
use Onz\Api\MultiSignature\GetPendingTransactionsRequest;
use Onz\Api\MultiSignature\GetPendingTransactionsResponse;
use Onz\Api\MultiSignature\SignPendingTransactionRequest;
use Onz\Api\MultiSignature\SignPendingTransactionResponse;
use Onz\Api\Peer\GetPeerListResponse;
use Onz\Api\Peer\GetPeerRequest;
use Onz\Api\Peer\GetPeerResponse;
use Onz\Api\Peer\GetPeerVersionRequest;
use Onz\Api\Peer\GetPeerVersionResponse;
use Onz\Api\Signatures\AddSecondSignatureRequest;
use Onz\Api\Signatures\AddSecondSignatureResponse;
use Onz\Api\Signatures\GetSignatureFeeRequest;
use Onz\Api\Signatures\GetSignatureFeeResponse;
use Onz\Api\Transaction\GetQueuedTransactionRequest;
use Onz\Api\Transaction\GetQueuedTransactionResponse;
use Onz\Api\Transaction\GetUnconfirmedTransactionRequest;
use Onz\Api\Transaction\GetUnconfirmedTransactionResponse;
use Onz\Api\Transaction\ListQueuedTransactionsRequest;
use Onz\Api\Transaction\ListQueuedTransactionsResponse;
use Onz\Api\Transaction\ListTransactionsRequest;
use Onz\Api\Transaction\ListTransactionsResponse;
use Onz\Api\Transaction\ListUnconfirmedTransactionsRequest;
use Onz\Api\Transaction\ListUnconfirmedTransactionsResponse;
use Onz\Api\Transaction\SendTransactionRequest;
use Onz\Api\Transaction\SendTransactionResponse;
use Onz\Requestor\TcdentClient;

class Client
{
    /** @var string Endpoint to which request should be send. */
    private $endpoint = "";

    /** @var null|TcdentClient */
    private $client = null;

    public function __construct(string $endpoint)
    {
        $this->endpoint = $endpoint;
        $this->client = new TcdentClient($this->endpoint);
    }

    /**
     * @param string $address
     * @return BalanceResponse
     * @throws Error
     * @throws \Exception
     */
    public function getBalance(string $address): BalanceResponse
    {
        $request = new BalanceRequest($address);
        $jsonResponse = $this->client->query($request);
        $balanceResponse = new BalanceResponse($jsonResponse);
        return $balanceResponse;
    }

    public function getPublicKey(string $address): GetPublicKeyResponse
    {
        return new GetPublicKeyResponse($this->client->query(new GetPublicKeyRequest($address)));
    }

    public function openAccount(string $secret)
    {
        return new OpenResponse($this->client->query(new OpenRequest($secret)));
    }

    public function generatePublicKey($secret)
    {
        return new GeneratePublicKeyResponse($this->client->query(new GeneratePublicKeyRequest($secret)));
    }

    public function getAccountInfo($address)
    {
        return new ListTransactionsResponse($this->client->query(new ListTransactionsRequest($address)));
    }

    public function getDelegates($address)
    {
        return new DelegatesResponse($this->client->query(new DelegatesRequest($address)));
    }

    /**
     * ToDo: NOT Working with exception: "a.asset.votes.join is not a function"
     * Check again or make github PR request!
     *
     * @param $delegates
     * @param $secret
     * @param null $secondSecret
     * @param null $publicKey
     * @return VoteDelegatesResponse
     */
    public function voteDelegates($delegates, $secret, $secondSecret = null, $publicKey = null)
    {
        return new VoteDelegatesResponse(
            $this->client->query(
                new VoteDelegatesRequest($delegates, $secret, $publicKey, $secondSecret)));
    }

    public function getLoadingStatus()
    {
        return new LoadingStatusResponse($this->client->query(new LoadingStatusRequest()));
    }

    public function getSynchronizationStatus()
    {
        return new SynchronizationStatusResponse($this->client->query(new SynchronizationStatusRequest()));
    }

    public function getBlockStatus()
    {
        return new BlockStatusResponse($this->client->query(new BlockStatusRequest()));
    }

    public function listTransactions(
        $blockId = null,
        $senderId = null,
        $recipientId = null,
        $limit = null,
        $offset = null,
        $orderBy = null
    ) {
        $request = (new ListTransactionsRequest())
            ->setBlockId($blockId)
            ->setSenderId($senderId)
            ->setRecipientId($recipientId)
            ->setLimit($limit)
            ->setOffset($offset)
            ->setOrderBy($orderBy);
        return new ListTransactionsResponse($this->client->query($request));
    }

    public function sendTransaction($secret, $amount, $recipientId, $publicKey = null, $secondSecret = null)
    {
        $request = (new SendTransactionRequest())
            ->setSecret($secret)
            ->setAmount($amount)
            ->setRecipientId($recipientId);
        if ($publicKey !== null) {
            $request->setPublicKey($publicKey);
        }
        if ($secondSecret !== null) {
            $request->setSecondSecret($secondSecret);
        }
        return new SendTransactionResponse($this->client->query($request));
    }

    public function getTransaction($id)
    {
        return new GetBlocksResponse($this->client->query(new GetBlocksRequest($id)));
    }

    public function getUnconfirmedTransaction($id)
    {
        return new GetUnconfirmedTransactionResponse($this->client->query(new GetUnconfirmedTransactionRequest($id)));
    }


    public function listUnconfirmedTransactions()
    {
        return new ListUnconfirmedTransactionsResponse($this->client->query(new ListUnconfirmedTransactionsRequest()));
    }


    public function listQueuedTransactions()
    {
        return new ListQueuedTransactionsResponse($this->client->query(new ListQueuedTransactionsRequest()));
    }


    public function getQueuedTransaction($id)
    {
        return new GetQueuedTransactionResponse($this->client->query(new GetQueuedTransactionRequest($id)));
    }

    public function getPeerList(
        $state = null,
        $os = null,
        $version = null,
        $limit = null,
        $offset = null,
        $orderBy = null
    ) {
        $request = (new CreateDelegateRequest())
            ->setState($state)
            ->setOs($os)
            ->setVersion($version)
            ->setLimit($limit)
            ->setOffset($offset)
            ->setOrderBy($orderBy);
        return new GetPeerListResponse($this->client->query($request));
    }

    public function getPeerVersion()
    {
        return new GetPeerVersionResponse($this->client->query(new GetPeerVersionRequest()));
    }

    public function getPeer($ip, $port)
    {
        return new GetPeerResponse($this->client->query(new GetPeerRequest($ip, $port)));
    }

    public function getBlocks(
        $totalFee = null,
        $totalAmount = null,
        $previousBlock = null,
        $height = null,
        $generatorPublicKey = null,
        $limit = null,
        $offset = null,
        $orderBy = null
    ) {
        $request = (new GetBlocksRequest())
            ->setTotalFee($totalFee)
            ->setTotalAmount($totalAmount)
            ->setPreviousBlock($previousBlock)
            ->setHeight($height)
            ->setGeneratorPublicKey($generatorPublicKey)
            ->setLimit($limit)
            ->setOffset($offset)
            ->setOrderBy($orderBy);
        return new GetBlocksResponse($this->client->query($request));
    }

    public function getBlock($id)
    {
        return new GetBlockResponse($this->client->query(new GetBlockRequest($id)));
    }

    public function getBlockchainFee()
    {
        return new GetBlockchainFeeResponse($this->client->query(new GetBlockchainFeeRequest()));
    }


    public function getBlockchainFees()
    {
        return new GetBlockchainFeesResponse($this->client->query(new GetBlockchainFeesRequest()));
    }

    public function getBlockchainReward()
    {
        return new GetBlockchainRewardResponse($this->client->query(new GetBlockchainRewardRequest()));
    }

    public function getTotalSupply()
    {
        return new GetTotalSupplyResponse($this->client->query(new GetTotalSupplyRequest()));
    }

    public function getBlockchainHeight()
    {
        return new GetBlockchainHeightResponse($this->client->query(new GetBlockchainHeightRequest()));
    }

    public function getStatusInfos()
    {
        return new GetStatusInfoResponse($this->client->query(new GetStatusInfoRequest()));
    }


    public function getBlockchainNethash()
    {
        return new GetBlockchainNethashResponse($this->client->query(new GetBlockchainNethashRequest()));
    }


    public function getBlockchainMilestone()
    {
        return new GetBlockchainMilestoneResponse($this->client->query(new GetBlockchainMilestoneRequest()));
    }

    //signature

    public function getSignatureFee()
    {
        return new GetSignatureFeeResponse($this->client->query(new GetSignatureFeeRequest()));
    }

    public function addSecondSignature($secret, $secondSecret, $publicKey = null)
    {
        return new AddSecondSignatureResponse(
            $this->client->query(new AddSecondSignatureRequest($secret, $secondSecret, $publicKey))
        );
    }

    //delegates

    public function createDelegate($secret, $username, $secondSecret = null)
    {
        return new CreateDelegateResponse($this->client->query(
            new CreateDelegateRequest($secret, $username, $secondSecret))
        );
    }

    /**
     * @param null $publicKey
     * @param null $username
     * @return GetDelegateResponse
     */
    public function getDelegate($publicKey = null, $username = null)
    {
        return new GetDelegateResponse($this->client->query(
            (new GetDelegateRequest())
                ->setUsername($username)
                ->setPublicKey($publicKey))
        );
    }

    /**
     * @param null $publicKey
     * @return GetDelegateResponse
     */
    public function getDelegateByPubKey($publicKey = null)
    {
        return new GetDelegateResponse($this->client->query(
            (new GetDelegateRequest())
                ->setPublicKey($publicKey))
        );
    }

    /**
     * @param null $username
     * @return GetDelegateResponse
     */
    public function getDelegateByUsername($username = null)
    {
        return new GetDelegateResponse($this->client->query(
            (new GetDelegateRequest())
                ->setUsername($username))
        );
    }



    public function getDelegateList($limit = null, $offset = null, $orderBy = null)
    {
        return new GetDelegateListResponse($this->client->query(
            new GetDelegateListRequest($limit, $offset, $orderBy))
        );
    }

    public function searchDelegate($username = null, $orderBy = null)
    {
        return new SearchDelegateResponse($this->client->query(
            new SearchDelegateRequest($username, $orderBy))
        );
    }

    public function getDelegateCount()
    {
        return new GetDelegateCountResponse($this->client->query(new GetDelegateCountRequest()));
    }

    public function getDelegateVotes($address)
    {
        return new GetDelegateVotesResponse($this->client->query(new GetDelegateVotesRequest($address)));
    }

    /**
     * @param $publicKey
     * @return GetDelegateVotersResponse
     */
    public function getDelegateVoters($publicKey)
    {
        return new GetDelegateVotersResponse($this->client->query(new GetDelegateVotersRequest($publicKey)));
    }

    public function enableForging($secret)
    {
        return new EnableForgingResponse($this->client->query(new EnableForgingRequest($secret)));
    }

    public function disableForging($secret)
    {
        return new DisableForgingResponse($this->client->query(new DisableForgingRequest($secret)));
    }

    /**
     * @param $generatorPublicKey
     * @param null $start
     * @param null $end
     * @return GetForgedByAccountResponse
     */
    public function getForgedByAccount($generatorPublicKey, $start = null, $end = null)
    {
        return new GetForgedByAccountResponse($this->client->query(
            new GetForgedByAccountRequest($generatorPublicKey, $start, $end)));
    }


    public function getNextForger($limit = null)
    {
        return new GetNextForgerResponse($this->client->query(new GetNextForgerRequest($limit)));
    }

    //Apps
    public function registerApp(
        $secret,
        $category,
        $name,
        $type,
        $link,
        $secondSecret = null,
        $publicKey = null,
        $description = null,
        $tags = null,
        $icon = null
    ) {
        $request = new RegisterAppRequest($secret, $category, $name, $type, $link);
        if ($secondSecret !== null) {
            $request->setSecondSecret($secondSecret);
        }
        if ($publicKey !== null) {
            $request->setPublicKey($publicKey);
        }
        if ($description !== null) {
            $request->setDescription($description);
        }
        if ($tags !== null) {
            $request->setTags($tags);
        }
        if ($icon !== null) {
            $request->setIcon($icon);
        }

        return new RegisterAppResponse($this->client->query($request));
    }


    public function getApps(
        $category = null,
        $name = null,
        $appType = null,
        $link = null,
        $limit = null,
        $offset = null,
        $orderBy = null
    ) {

        $request = new GetAppsRequest();

        if ($category !== null) {
            $request->setCategory($category);
        }

        if ($name !== null) {
            $request->setName($name);
        }

        if ($appType !== null) {
            $request->setAppType($appType);
        }

        if ($link !== null) {
            $request->setLink($link);
        }

        if ($limit !== null) {
            $request->setLimit($limit);
        }

        if ($offset !== null) {
            $request->setOffset($offset);
        }

        if ($orderBy !== null) {
            $request->setOrderBy($orderBy);
        }

        return new GetAppsResponse($this->client->query($request));
    }

    public function getApp($id)
    {
        return new GetAppResponse($this->client->query(new GetAppRequest($id)));
    }

    public function searchApps($q = null, $category = null, $installed = null)
    {
        return new SearchAppsResponse($this->client->query(new SearchAppsRequest($q, $category, $installed)));
    }

    /**
     * ToDo: Not working with error message "Error: Invalid master passphrase"
     * @param $id
     * @return CreateAccountResponse
     */
    public function installApp($id)
    {
        return new CreateAccountResponse($this->client->query(new InstallAppRequest($id)));
    }

    public function getInstalledApps()
    {
        return new GetInstalledAppsResponse($this->client->query(new GetInstalledAppsRequest()));
    }

    public function getAllInstalledApps()
    {
        return new GetAllInstalledAppsResponse($this->client->query(new GetAllInstalledAppsRequest()));
    }

    public function uninstallApp($id)
    {
        return new UninstallAppResponse($this->client->query(new UninstallAppRequest($id)));
    }

    public function launchApp($id, $params = [])
    {
        return new LaunchAppResponse($this->client->query(new LaunchAppRequest($id, $params)));
    }

    public function installingApp()
    {
        return new InstallingAppResponse($this->client->query(new InstallingAppRequest()));
    }

    public function uninstallingApp()
    {
        return new UninstallingAppResponse($this->client->query(new UninstallingAppRequest()));
    }

    public function launchedApps()
    {
        return new LaunchedAppsResponse($this->client->query(new LaunchedAppsRequest()));
    }

    public function getCategories()
    {
        return new GetCategoriesResponse($this->client->query(new GetCategoriesRequest()));
    }

    public function stopApp($id)
    {
        return new StopAppResponse($this->client->query(new StopAppRequest($id)));
    }

    //MultiSignature
    public function createMultiSignatureAccount($secret, $lifetime, $min, $keysgroup, $secondSecret = null)
    {
        return new CreateMultiSignatureAccountResponse(
            $this->client->query(
                new CreateMultiSignatureAccountRequest($secret, $lifetime, $min, $keysgroup, $secondSecret)
            )
        );
    }

    public function getMultiSignatureAccounts($publicKey)
    {
        return new GetAccountsResponse($this->client->query(new GetAccountsRequest($publicKey)));
    }


    public function getPendingTransactions($publicKey)
    {
        return new GetPendingTransactionsResponse($this->client->query(new GetPendingTransactionsRequest($publicKey)));
    }

    public function signPendingTransaction($secret, $transactionId, $publicKey = null)
    {
        return new SignPendingTransactionResponse($this->client->query(
            new SignPendingTransactionRequest($secret, $transactionId, $publicKey)
        ));
    }

}
