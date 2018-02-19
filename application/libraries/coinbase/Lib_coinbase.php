<?php

use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;

class Lib_coinbase {

/*
■ coinbase受信トランザクション取得用APIキー
・API Key
fcBxwdnYJ0mYjXzR
・API Secret
VHb75bIQbuYIjiHr6AhYHdnyVjc46qhg
 */

	const API_KEY       = 'cvh2VoPv8QcP2pjY';
	const API_SECRET    = 'yWuDE2yZHGh6JYQXoBLx12V1KVBTvqXC';
	const BTC_WALLET_ID = '7776d01d-b3d6-56ba-be41-30be6d04480d';
	const ETH_WALLET_ID = 'e6b14013-e8b4-550d-bc2f-3b4c559445a5';

	// 旧関根さんアカウント
	// const API_KEY       = 'v2s8kLmmAcktn3Mv';
	// const API_SECRET    = 'j0SgODqwR0zma6gvcL7bIo3B90RaokFS';
	// const BTC_WALLET_ID = '1ae930fd-3411-5223-807f-76eb530edd04';
	
	// 関根さんアカウント
	// const API_KEY       = 'd9gX9VuzY13w1hrV';
	// const API_SECRET    = 'w9NLODCXLAcDS8qaplZ0JQwqqiaGYXLM';
	// const BTC_WALLET_ID = '1ae930fd-3411-5223-807f-76eb530edd04';
	
	// // 関根さんアカウント 2017/12/19
	// const API_KEY       = '325xL6T7kIezdDck';
	// const API_SECRET    = '1Oulx8jNe7dmJr8Y3YEFCtbyXqwzxcoa';
	// const BTC_WALLET_ID = '1ae930fd-3411-5223-807f-76eb530edd04';
	
	/**
	 * Coinbaseアカウントにアクセス
	 *
	 */
	public function setClient() {
		$apiKey        = self::API_KEY;
		$apiSecret     = self::API_SECRET;
		$configuration = Configuration::apiKey($apiKey, $apiSecret);
		return Client::create($configuration);
	}

	/*
	 * ウォレット取得
	 * return object
	 */
	public function getWallet() {
		$accountId = self::BTC_WALLET_ID;
		$account   = $this->client->getAccount($accountId);
		return $account;
	}
}