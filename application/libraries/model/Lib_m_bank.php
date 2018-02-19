<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lib_m_bank {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('m_bank');
	}

	// SELECT
	public function getData($params=array()) {
		// 残高取得
		return $this->CI->m_bank->getAll($params);
	}

	// SELECT
	public function getDataList($params=array()) {
		// 残高取得
		return $this->CI->m_bank->getList($params);
	}


	/**
	 * 銀行データ取得
	 * @param  string $bankId   銀行ID
	 * @param  string $branchId 支店ID※デフォルト000で銀行名取得、000以外で支店名取得
	 * @return array 銀行データ
	 */
	public function getBankData($bankId, $branchId='000')
	{
		$params = array(
			"where" => 'bank_id = ' . $bankId . ' AND branch_id = ' . $branchId
		);
		return self::getDataList($params);
	}
	
	/**
	 * データ全取得
	 *
	 */
	public function getBankAll($bankId, $branchId='000')
	{
		$params = array(
			"where" => "bank_id = " . $bankId . " AND branch_id = " . $branchId
		);
		return self::getDataList($params);
	}
	
	/**
	 * 銀行名リスト
	 * @param boolean $yucho ゆうちょ含める→true,含めない→false
	 * @return array 銀行名リスト
	 */
	public function getBankList($yucho=false)
	{
		$params = array(
			"where"    => "branch_id = '000'",
			"order_by" => 'bank_id ASC'
		);
		return self::getDataList($params);
	}
	
	/**
	 * 支店名リスト
	 * @return array 支店名リスト
	 */
	public function getBranchList($bankId=null)
	{
		if (is_null($bankId)) return null;
		
		$params = array(
			"where" => "bank_id = " . $bankId,
			"order" => 'branch_id ASC'
		);
		return self::getDataList($params);
	}
	
	
	
	
/*----------------------------------------------------------------------------------------------------*
 * 銀行名・支店名取得
 *----------------------------------------------------------------------------------------------------*/
		/**
		 * 銀行リスト取得 ※Json用
		 * @return array Json用銀行リスト
		 */
		public function getBankName()
		{
				$bankList = self::getBankList();
				$bankListInJson = array();

				foreach (self::kanaList() as $kana) {
						$shop = array();
						foreach ($bankList as $row => $bankRecord) {
								$initial = mb_substr($bankRecord['name_kana'], 0 ,1);
								if ($kana != $initial) continue;
								$shop[] = array(
										'name' => $bankRecord['name'],
										'code' => $bankRecord['bank_id'],
								);
						}
						// 各カナの店舗数
						$count = count($shop);
						// 各カナの店舗数が0件の場合は空文字セット
						if ($count <= 0) $shop = '';

						$bankListInJson[$kana] = array(
								'length' => $count,
								'shop'   => $shop
						);
				}
				return $bankListInJson;
		}

		/**
		 * 銀行支店リスト取得 ※Json用
		 * @param  string $bankId 銀行コード
		 * @return array  Json用銀行リスト
		 */
		public function getBranchName($bankId)
		{
				$branchList = self::getBranchList($bankId);

				if (count($branchList) <= 0) return null;

				$branchListInJson = array();

				foreach (self::kanaList() as $kana) {
						$shop = array();
						foreach ($branchList as $row => $branchRecord) {
								if ($branchRecord['branch_id'] == '000') continue;
								$initial = mb_substr($branchRecord['name_kana'], 0 ,1);
								if ($kana != $initial) continue;
								$shop[] = array(
										'name' => $branchRecord['name'],
										'code' => $branchRecord['branch_id']
								);
						}
						// 各カナの店舗数
						$count = count($shop);
						// 各カナの店舗数が0件の場合は空文字セット
						if ($count <= 0) $shop = '';

						$branchListInJson[$kana] = array(
								'length' => $count,
								'shop'   => $shop
						);
				}
				return $branchListInJson;
		}

		/**
		 * 半角カタカナのリスト
		 * 銀行名・支店名を頭文字(半角カナ)毎に配列にするための半角カナリスト
		 * @return array 半角カタカナのリスト
		 */
		private static function kanaList()
		{
				return array('ｱ','ｲ','ｳ','ｴ','ｵ','ｶ','ｷ','ｸ','ｹ','ｺ','ｻ','ｼ','ｽ','ｾ','ｿ','ﾀ','ﾁ','ﾂ','ﾃ','ﾄ','ﾅ','ﾆ','ﾇ','ﾈ','ﾉ','ﾊ','ﾋ','ﾌ','ﾍ','ﾎ','ﾏ','ﾐ','ﾑ','ﾒ','ﾓ','ﾔ','ﾕ','ﾖ','ﾗ','ﾘ','ﾙ','ﾚ','ﾛ','ﾜ','ｦ','ﾝ');
		}

	
	
	
	
}