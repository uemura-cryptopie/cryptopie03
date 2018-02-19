<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Date {


	function __construct()
	{
		$this->CI =& get_instance();
	}


	/**
	 * 年を取得
	 * $back 何年前から
	 * $years 何年間
	 */
	public function yearList($back, $years, $format='Y') {
		$result = array();
		for ($i = 0; $i <= $years; $i++) {
			$year = date($format, strtotime("-".$back-$i." year"));
			$result[$year] = $year;
		}

		return $result;
	}

	/**
	 * 月を取得
	 */
	public function monthList($format='n') {
		$result = array();
		for ($i = 1; $i <= 12; $i++) {
			$result[$i] = $i;
		}

		return $result;
	}

	/**
	 * 日を取得
	 */
	public function dateList($format='j') {
		$result = array();
		for ($i = 1; $i <= 31; $i++) {
			$result[$i] = $i;
		}

		return $result;
	}

}
