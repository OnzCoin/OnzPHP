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

namespace Onz\Cli;


use Onz\Cli\Account\Balance;
use Onz\Cli\Account\Delegates;
use Onz\Cli\Account\GeneratePublicKey;
use Onz\Cli\Account\GetPublicKey;
use Onz\Cli\Account\Open;
use Onz\Cli\Account\VoteDelegates;
use Onz\Cli\Apps\GetAllInstalledApps;
use Onz\Cli\Apps\GetApp;
use Onz\Cli\Apps\GetApps;
use Onz\Cli\Apps\GetCategories;
use Onz\Cli\Apps\GetInstalledApps;
use Onz\Cli\Apps\InstallApp;
use Onz\Cli\Apps\InstallingApp;
use Onz\Cli\Apps\LaunchApp;
use Onz\Cli\Apps\LaunchedApps;
use Onz\Cli\Apps\RegisterApp;
use Onz\Cli\Apps\SearchApps;
use Onz\Cli\Apps\StopApp;
use Onz\Cli\Apps\UninstallApp;
use Onz\Cli\Apps\UninstallingApp;
use Onz\Cli\Blocks\GetBlock;
use Onz\Cli\Blocks\GetBlockchainFee;
use Onz\Cli\Blocks\GetBlockchainFees;
use Onz\Cli\Blocks\GetBlockchainHeight;
use Onz\Cli\Blocks\GetBlockchainMilestone;
use Onz\Cli\Blocks\GetBlockchainNethash;
use Onz\Cli\Blocks\GetBlockchainReward;
use Onz\Cli\Blocks\GetBlocks;
use Onz\Cli\Blocks\GetStatusInfos;
use Onz\Cli\Blocks\GetTotalSupply;
use Onz\Cli\Delegate\CreateDelegate;
use Onz\Cli\Delegate\DisableForging;
use Onz\Cli\Delegate\EnableForging;
use Onz\Cli\Delegate\GetDelegate;
use Onz\Cli\Delegate\GetDelegateCount;
use Onz\Cli\Delegate\GetDelegateList;
use Onz\Cli\Delegate\GetDelegateVoters;
use Onz\Cli\Delegate\GetDelegateVotes;
use Onz\Cli\Delegate\GetForgedByAccount;
use Onz\Cli\Delegate\GetNextForger;
use Onz\Cli\Delegate\SearchDelegate;
use Onz\Cli\Loader\BlockStatus;
use Onz\Cli\Loader\LoadingStatus;
use Onz\Cli\Loader\SynchronizationStatus;
use Onz\Cli\MultiSignature\CreateAccount;
use Onz\Cli\MultiSignature\GetAccounts;
use Onz\Cli\MultiSignature\GetPendingTransactions;
use Onz\Cli\MultiSignature\SignPendingTransaction;
use Onz\Cli\Peer\GetPeer;
use Onz\Cli\Peer\GetPeerList;
use Onz\Cli\Peer\GetPeerVersion;
use Onz\Cli\Signatures\AddSecondSignature;
use Onz\Cli\Signatures\GetSignatureFee;
use Onz\Cli\Transaction\GetQueuedTransaction;
use Onz\Cli\Transaction\GetTransaction;
use Onz\Cli\Transaction\GetUnconfirmedTransaction;
use Onz\Cli\Transaction\ListQueuedTransactions;
use Onz\Cli\Transaction\ListTransactions;
use Onz\Cli\Transaction\ListUnconfirmedTransactions;
use Onz\Cli\Transaction\SendTransaction;

class ActionFactory
{
    public function create(string $actionName)
    {
        switch ($actionName) {
            //Account
            case "info":
                return new LoadingStatus();
            case "openAccount":
                return new Open();
            case "getBalance":
                return new Balance();
            case "getPublicKey":
                return new GetPublicKey();
            case "generatePublicKey":
                return new GeneratePublicKey();
            case "getDelegates":
                return new Delegates();
            case "voteDelegates":
                return new VoteDelegates();
            //Loading
            case "getLoadingStatus":
                return new LoadingStatus();
            case "getSyncStatus":
                return new SynchronizationStatus();
            case "getBlockStatus":
                return new BlockStatus();
            //Transactions
            case "listTransactions":
                return new ListTransactions();
            case "sendTransaction":
                return new SendTransaction();
            case "getTransaction":
                return new GetTransaction();
            case "getUnconfirmedTransaction":
                return new GetUnconfirmedTransaction();
            case "listUnconfirmedTransactions":
                return new ListUnconfirmedTransactions();
            case "listQueuedTransactions":
                return new ListQueuedTransactions();
            case "getQueuedTransaction":
                return new GetQueuedTransaction();
            //Peers
            case "getPeerList":
                return new GetPeerList();
            case "getPeerVersion";
                return new GetPeerVersion();
            case "getPeer":
                return new GetPeer();
            //Blocks
            case "getBlocks":
                return new GetBlocks();
            case "getBlock":
                return new GetBlock();
            case "getBlockchainFee":
                return new GetBlockchainFee();
            case "getBlockchainFees":
                return new GetBlockchainFees();
            case "getBlockchainReward":
                return new GetBlockchainReward();
            case "getTotalSupply":
                return new GetTotalSupply();
            case "getBlockchainHeight":
                return new GetBlockchainHeight();
            case "getStatusInfos":
                return new GetStatusInfos();
            case "getBlockchainNethash":
                return new GetBlockchainNethash();
            case "getBlockchainMilestone":
                return new GetBlockchainMilestone();
            //Signatures
            case "getSignatureFee":
                return new GetSignatureFee();
            case "addSecondSignature":
                return new AddSecondSignature();
            //Delegate
            case "createDelegate":
                return new CreateDelegate();
            case "getDelegate":
                return new GetDelegate();
            case "getDelegateList":
                return new GetDelegateList();
            case "searchDelegate";
                return new SearchDelegate();
            case "getDelegateCount":
                return new GetDelegateCount();
            case "getDelegateVotes":
                return new GetDelegateVotes();
            case "getDelegateVoters":
                return new GetDelegateVoters();
            case "enableForging":
                return new EnableForging();
            case "disableForging":
                return new DisableForging();
            case "getForgedByAccount":
                return new GetForgedByAccount();
            case "getNextForger":
                return new GetNextForger();
            //Apps
            case "registerApp":
                return new RegisterApp();
            case "getApps":
                return new GetApps();
            case "getApp":
                return new GetApp();
            case 'searchApps':
                return new SearchApps();
            case 'installApp':
                return new InstallApp();
            case 'getInstalledApps':
                return new GetInstalledApps();
            case 'getAllInstalledApps':
                return new GetAllInstalledApps();
            case 'uninstallApp':
                return new UninstallApp();
            case 'launchApp':
                return new LaunchApp();
            case 'installingApp':
                return new InstallingApp();
            case 'uninstallingApp':
                return new UninstallingApp();
            case 'launchedApps':
                return new LaunchedApps();
            case 'getCategories':
                return new GetCategories();
            case 'stopApp':
                return new StopApp();
            //MultiSignature
            case 'createMultiSignatureAccount':
                return new CreateAccount();
            case 'getMultiSignatureAccounts':
                return new GetAccounts();
            case 'getPendingTransactions':
                return new GetPendingTransactions();
            case 'signPendingTransaction':
                return new SignPendingTransaction();
            default:
                throw new \Exception(sprintf("Action '%s' not implemented", $actionName));
        }
    }
}