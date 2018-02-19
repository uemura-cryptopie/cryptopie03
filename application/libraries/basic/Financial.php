<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Financial {

	function __construct()
	{
		$this->CI =& get_instance();
	}

	public function residentialForm($data = null) {
		$result = array(
			'1' => '持ち家（自己所有）',
			'2' => '持ち家（家族所有）',
			'3' => '借家',
			'4' => '社宅・官舎・寮',
			'5' => '賃貸マンション・アパート'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function residenceYears($data = null) {
		$text = '年未満';
		$result = array(
			'1' => '１' . $text,
			'2' => '２' . $text,
			'3' => '３' . $text,
			'4' => '４' . $text,
			'5' => '５' . $text,
			'6' => '６' . $text,
			'7' => '７' . $text,
			'8' => '８' . $text,
			'9' => '９' . $text,
			'10' => '１０' . $text,
			'11' => '１０年以上'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function employmentSystem($data = null) {
		$result = array(
			"1" => '会社員',
			"2" => '会社役員',
			"3" => '公務員',
			"4" => '団体職員',
			"5" => '医師・その他医療関係',
			"6" => '弁護士・会計士・税理士',
			"7" => '教職員',
			"8" => '自営業',
			"9" => 'パート・アルバイト',
			"10" => '専業主婦',
			"11" => '年金受給者',
			"12" => '学生',
			"13" => '無職',
			"14" => 'その他'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function serviceLength($data = null) {
		return $this->residenceYears($data);
	}

	public function annualIncome($data = null) {
		$result = array(
			"1" => '300万円未満',
			"2" => '301万円～400万円',
			"3" => '401万円～500万円',
			"4" => '501万円～600万円',
			"5" => '601万円～700万円',
			"6" => '701万円～800万円',
			"7" => '801万円～900万円',
			"8" => '901万円～1000万円',
			"9" => '1001万円以上'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function borrowing($data = null) {
		$result = array(
			"1" => '無し',
			"2" => '住宅ローン',
			"3" => '教育ローン',
			"4" => 'オートローン（自動車・バイク等',
			"5" => '銀行系カードローン',
			"6" => '消費者金融'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function paymentOverdue($data = null) {
		$result = array(
			"1" => '無し',
			"2" => '1～3回程度',
			"3" => '4～10回程度',
			"4" => '11回以上'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function familyStructure($data = null) {
		$result = array(
			"1" => '独身（家族同居）',
			"2" => '既婚（家族同居）',
			"3" => '既婚（同居無し）',
			"4" => '独身（一人暮らし）'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function investableAssets($data = null) {
		$result = array(
			"1" => '30万円未満',
			"2" => '30万円～100万円未満',
			"3" => '100万円～250万円未満',
			"4" => '250万円～500万円未満',
			"5" => '500万円～1000万円未満',
			"6" => '1000万円～2500万円未満',
			"7" => '2500万円～5000万円未満',
			"8" => '5000万円～1億円未満',
			"9" => '1億円以上'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function investableAssetsRadio($data = null) {
		$result = array(
			'1' => 'はい',
			'2' => 'いいえ'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function select01($data = null) {
		$result = array(
			"1" => '給与所得',
			"2" => '事業所得',
			"3" => '利子・配当・投資収益',
			"4" => '年金・恩給',
			"5" => '所得なし'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function checkbox($data = null) {
		$result = array(
			'1' => '仮想通貨を購入して、国内外への送金、決済のため',
			'2' => '仮想通貨の価格変動による売買益のため',
			'3' => '中・長期投資のため',
			'4' => '分散投資を行うため'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function select02($data = null) {
		$result = array(
			"1" => '当社ホームページ',
			"2" => '他サイト',
			"3" => '雑誌',
			"4" => '新聞',
			"5" => '家族の紹介',
			"6" => '知人の紹介',
			"7" => 'ブログ',
			"8" => 'その他'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function select03($data = null) {
		$result = array(
			"1" => '5年以上',
			"2" => '5年未満',
			"3" => '4年未満',
			"4" => '3年未満',
			"5" => '2年未満',
			"6" => '1年未満',
			"7" => '未経験'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function select04($data = null) {
		$result = array(
			"1" => '5年以上',
			"2" => '5年未満',
			"3" => '4年未満',
			"4" => '3年未満',
			"5" => '2年未満',
			"6" => '1年未満',
			"7" => '未経験'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function select05($data = null) {
		$result = array(
			"1" =>'5年以上',
			"2" =>'5年未満',
			"3" =>'4年未満',
			"4" =>'3年未満',
			"5" =>'2年未満',
			"6" =>'1年未満',
			"7" =>'未経験'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function select06($data = null) {
		$result = array(
			"1" => '5年以上',
			"2" => '5年未満',
			"3" => '4年未満',
			"4" => '3年未満',
			"5" => '2年未満',
			"6" => '1年未満',
			"7" => '未経験'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	public function select07($data = null) {
		$result = array(
			"1" => '5年以上',
			"2" => '5年未満',
			"3" => '4年未満',
			"4" => '3年未満',
			"5" => '2年未満',
			"6" => '1年未満',
			"7" => '未経験'
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	/**
	 * Amount sales use for corp
	 */
	public function amountSales($data = null) {
		$result = array(
			"1" => "0～999万9999円",
			"2" => "1000万円～4999万9999円",
			"3" => "5000万円～9999万9999円",
			"4" => "1億円～2億9999万9999円",
			"5" => "3億円～4億9999万9999円",
			"6" => "5億円～9億9999万9999円",
			"7" => "10億円以上",
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	/**
	 * Net income use for corp
	 */
	public function netIncome($data = null) {
		$result = array(
			"1" => "0～499万9999円",
			"2" => "500万円～999万9999円",
			"3" => "1000万円～2999万9999円",
			"4" => "3000万円～4999万9999円",
			"5" => "5000万円～9999万9999円",
			"6" => "1億円以上",
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;
	}

	/**
	 * Net worth use for corp
	 */
	public function netWorth($data = null) {
		$result = array(
			"1" => "0～999万9999円",
			"2" => "1000万円～4999万9999円",
			"3" => "5000万円～9999万9999円",
			"4" => "1億円～2億9999万9999円",
			"5" => "3億円～4億9999万9999円",
			"6" => "5億円～9億9999万9999円",
			"7" => "10億円以上",
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;		
	}

	/**
	 * subscription use for corp
	 */
	public function subscription($data = null) {
		$result = array(
			"1" => "当社ホームページ",
			"2" => "他サイト",
			"3" => "雑誌",
			"4" => "新聞",
			"5" => "家族の紹介",
			"6" => "知人の紹介",
			"7" => "ブログ",
			"8" => "その他",
		);
		if (!empty($result[$data])) {
			return $result[$data];
		}
		return $result;			
	}
}