<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lib_string {


	function __construct()
	{
		$this->CI =& get_instance();
	}


	/**
	 * BTC表示フォーマット
	 */
	public function btcFormatView($amount) {
		if (empty($amount)) return 0;
		// 末尾の0を削除
		$amount = (float)$amount;
		// 整数部分と小数点部分に分解
		$amount = explode('.', $amount);
		// 整数部分をフォーマット
		$amount[0] = number_format($amount[0]);
		// 小数点部分の4桁目以降をsupanで囲む
		if (isset($amount[1])) {
			$amount[1] = substr_replace($amount[1], '<span>', 3, 0).'</span>';
		}
		// 分解した数値を戻す
		return implode('.', $amount);
	}

	/**
	 * 自作 number_format
	 */
	public function myNumberFormat($number) {
		$number = explode('.', $number);
		
		// 末尾の0を削除
		if (isset($number[1])) {
			$number[1] = preg_replace("/0+$/", '', $number[1]);
			// 空だったら配列のキーを削除
			if (empty($number[1])) {
				unset($number[1]);
			};
		}
		
		// 整数部分と小数点部分に分解
		// 整数部分をフォーマット
		$number[0] = ($number[0] != '-0') ? number_format((int)$number[0]) : $number[0];
		// 分解した数値を戻す
		return implode('.', $number);
	}

	// 文字列の途中を省略して最大幅以内にする
	// string $str        = 対象文字列
	// int    $maxWidth   = 最大幅 (mb_strwidth準拠)
	// int    $cutPos     = 省略位置。正の値は先頭から(0が先頭)、負の値は末尾からの幅。Falseで中央。
	// string $trimMarker = 省略記号にする文字列
	// @return string
	function sMidTrim ($str, $maxWidth, $cutPos = False, $trimMarker = '..') {

		// 文字列の幅を取得
		$strWidth = mb_strwidth($str);
		if($strWidth <= $maxWidth) { return $str; }

		// マーカーの幅を取得
		$tmWidth = mb_strwidth($trimMarker);
		if($tmWidth + 2 > $maxWidth) { return $str; }

		// カットすべき幅を算出
		$cutoffWidth = $tmWidth + $strWidth - $maxWidth;

		// カットの始点(幅)を算出
		$remain = $strWidth - $cutoffWidth;
		if(!is_int($cutPos)) {
			// 無指定時は中央
			$cutBeginWidth = ceil( $remain / 2 );
		}
		elseif($cutPos >= 0) {
			// 正の値
			if($cutPos > $remain) { $cutPos = $remain; }
			$cutBeginWidth = $cutPos;
		}
		else {
			// 負の値
			$cutBeginWidth = $remain + $cutPos;
			if(0 > $cutBeginWidth) { $cutBeginWidth = 0; }
		}

		// 先頭文字列を切り出す
		$headStr = mb_strimwidth($str, 0, $cutBeginWidth);

		// 末尾文字列を切り出す
		$pos = mb_strlen( mb_strimwidth($str, 0, $cutBeginWidth + $cutoffWidth) );
		$tailStr = mb_substr($str, $pos);

		return $headStr.$trimMarker.$tailStr;
	}
}
