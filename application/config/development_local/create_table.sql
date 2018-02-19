-- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成日時: 2018 年 2 月 08 日 02:28
-- サーバのバージョン: 5.1.73
-- PHP のバージョン: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `cryptopie_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `log_login`
--

CREATE TABLE IF NOT EXISTS `log_login` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `login_id` int(20) DEFAULT NULL COMMENT 'ログイン時に発行したハッシュ化したユニークなID ',
  `user_id` int(20) DEFAULT NULL COMMENT 't_user.id or t_corp.id',
  `ip` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'IPアドレス',
  `user_agent` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ユーザーエージェント',
  `login_time` timestamp NULL DEFAULT NULL COMMENT 'ログイン日時',
  `status1` tinyint(1) DEFAULT NULL COMMENT '成功=1,失敗=2',
  `status2` tinyint(1) DEFAULT NULL COMMENT '成功=1,失敗=2',
  `ng_flag` tinyint(1) DEFAULT NULL COMMENT '0=正常、1=30分ロック対象者',
  `name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 't_user.family_name t_user.first_name or t_corp.corp_name',
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `log_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Log time 30 minutes when ng_flag equal 1',
  `google_auth_code` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Secret key',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'ログイン日時',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='ログインログ管理テーブル' AUTO_INCREMENT=383 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `log_pass`
--

CREATE TABLE IF NOT EXISTS `log_pass` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `mail` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'mailアドレス',
  `status` tinyint(1) DEFAULT NULL COMMENT 'メール送信　成功=1,失敗=0',
  `log_time` timestamp NULL DEFAULT NULL COMMENT 'メール送信時刻',
  `user_id` int(10) DEFAULT NULL COMMENT '会員ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='メールリマインダーログ' AUTO_INCREMENT=99 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_admin_status`
--

CREATE TABLE IF NOT EXISTS `m_admin_status` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理者種別マスタ' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_api`
--

CREATE TABLE IF NOT EXISTS `m_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KYE',
  `name` varchar(100) DEFAULT NULL COMMENT 'API名',
  `api_kye` varchar(100) DEFAULT NULL COMMENT 'APIキー',
  `api_secret` varchar(100) DEFAULT NULL COMMENT '秘密鍵',
  `m_currency_ids` text COMMENT 'm_wallet FK 使用通貨 カンマ区切り',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='cryptopieウォレット管理テーブル' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_bank`
--

CREATE TABLE IF NOT EXISTS `m_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `bank_id` char(6) COLLATE utf8_unicode_ci NOT NULL COMMENT '銀行コード',
  `branch_id` char(6) COLLATE utf8_unicode_ci NOT NULL COMMENT '支店コード',
  `name_kana` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '銀行名かな',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '銀行名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='銀行マスタ' AUTO_INCREMENT=32862 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_country`
--

CREATE TABLE IF NOT EXISTS `m_country` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `country_name` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '国名',
  `country_code` char(10) CHARACTER SET utf8 NOT NULL COMMENT '国コード',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='国別マスタ' AUTO_INCREMENT=250 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_currency`
--

CREATE TABLE IF NOT EXISTS `m_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `name` char(10) DEFAULT NULL COMMENT '通貨名',
  `deleted_flag` tinyint(1) DEFAULT '0' COMMENT '削除フラグ',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  `deleted_at` datetime DEFAULT NULL COMMENT '削除日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='通貨マスター' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_faq_category`
--

CREATE TABLE IF NOT EXISTS `m_faq_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KYE',
  `name` varchar(50) DEFAULT NULL COMMENT 'カテゴリー名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_media`
--

CREATE TABLE IF NOT EXISTS `m_media` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='メディアマスタ';

-- --------------------------------------------------------

--
-- テーブルの構造 `m_pref`
--

CREATE TABLE IF NOT EXISTS `m_pref` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='都道府県マスタ' AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_ticker_adjustment`
--

CREATE TABLE IF NOT EXISTS `m_ticker_adjustment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `m_currency_id` int(11) DEFAULT NULL COMMENT 'm_currency FK',
  `ticker_api_id` int(11) DEFAULT NULL COMMENT '1=coincheck, 2=bitflyer',
  `adjustment` varchar(50) DEFAULT NULL COMMENT '調整率（％）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='販売価格調整率管理テーブル' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_trade_string`
--

CREATE TABLE IF NOT EXISTS `m_trade_string` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `name` char(10) DEFAULT NULL COMMENT '売買種別',
  `deleted_flag` tinyint(1) DEFAULT '0' COMMENT '削除フラグ',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  `deleted_at` datetime DEFAULT NULL COMMENT '削除日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='通貨マスター' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `m_wallet`
--

CREATE TABLE IF NOT EXISTS `m_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KYE',
  `m_api_id` int(11) DEFAULT NULL COMMENT 'm_api FK',
  `m_wallet_id` varchar(250) DEFAULT NULL COMMENT 'ウォレットID',
  `m_currency_id` int(11) DEFAULT NULL COMMENT 'm_currency FK',
  `usable` tinyint(1) DEFAULT '0' COMMENT 'アクティブ真偽',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='cryptopieウォレット管理テーブル' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_admin_user`
--

CREATE TABLE IF NOT EXISTS `t_admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KYE',
  `status_id` int(11) DEFAULT NULL COMMENT 'm_admin_status FK',
  `name` varchar(100) DEFAULT NULL COMMENT '名前',
  `name_kana` varchar(100) DEFAULT NULL COMMENT '名前カナ',
  `login_id` varchar(50) DEFAULT NULL COMMENT 'ログインID',
  `password` varchar(50) DEFAULT NULL COMMENT 'パスワード',
  `last_login_at` int(11) DEFAULT NULL COMMENT '最終ログイン時刻',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  `deleted_at` datetime DEFAULT NULL COMMENT '削除日時',
  `deleted_flag` tinyint(1) DEFAULT '0' COMMENT '削除フラグ',
  `google_auth_code` varchar(16) DEFAULT NULL COMMENT 'Secret key',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_agency`
--

CREATE TABLE IF NOT EXISTS `t_agency` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `group_id` int(11) DEFAULT NULL COMMENT 'グループID',
  `parent_id` int(11) DEFAULT NULL COMMENT '紹介者ID FK',
  `commission` char(10) DEFAULT '0' COMMENT 'コミッション配当',
  `percentage` int(11) DEFAULT '0' COMMENT 'パーセンテージ',
  `user_type` tinyint(4) DEFAULT NULL COMMENT '個人=1、法人=2',
  `family_name` char(30) DEFAULT NULL COMMENT '個人：苗字',
  `family_name_kana` char(30) DEFAULT NULL COMMENT '個人：苗字（フリガナ）',
  `first_name` char(30) DEFAULT NULL COMMENT '個人：名前',
  `first_name_kana` char(30) DEFAULT NULL COMMENT '個人：名前（フリガナ）',
  `corp_name` varchar(100) DEFAULT NULL COMMENT '法人：法人名（漢字）',
  `corp_name_kana` varchar(100) DEFAULT NULL COMMENT '法人：法人名（フリガナ）',
  `ceo_name` varchar(100) DEFAULT NULL COMMENT '法人：代表者名（漢字）',
  `ceo_name_kana` varchar(100) DEFAULT NULL COMMENT '法人：代表者名（フリガナ）',
  `ceo_first_name` char(30) DEFAULT NULL COMMENT '法人：代表者名名前',
  `ceo_first_name_kana` char(30) DEFAULT NULL COMMENT '法人：代表者名名前（フリガナ）',
  `pre_name` char(30) DEFAULT NULL COMMENT '法人：担当者苗字',
  `pre_name_kana` char(30) DEFAULT NULL COMMENT '法人：担当者苗字（フリガナ）',
  `pre_first_name` char(30) DEFAULT NULL COMMENT '法人：担当者名前',
  `pre_first_name_kana` char(30) DEFAULT NULL COMMENT '法人：担当者名前（フリガナ）',
  `year` smallint(4) DEFAULT NULL COMMENT '生(設立)年月日　年',
  `month` tinyint(2) DEFAULT NULL COMMENT '生(設立)年月日　月',
  `day` tinyint(2) DEFAULT NULL COMMENT '生(設立)年月日　日',
  `tel1` char(5) DEFAULT NULL COMMENT '電話番号',
  `tel2` char(5) DEFAULT NULL COMMENT '電話番号',
  `tel3` char(5) DEFAULT NULL COMMENT '電話番号',
  `mail` text COMMENT 'メールアドレス',
  `post1` char(3) DEFAULT NULL COMMENT '郵便番号',
  `post2` char(4) DEFAULT NULL COMMENT '郵便番号',
  `pref_id` tinyint(2) DEFAULT NULL COMMENT 'm_pref FK',
  `city` varchar(100) DEFAULT NULL COMMENT '市区町村',
  `address` varchar(200) DEFAULT NULL COMMENT '住所（番地）',
  `building` varchar(200) DEFAULT NULL COMMENT '建物',
  `password` varchar(255) DEFAULT NULL COMMENT 'パスワード',
  `status` tinyint(4) DEFAULT '0' COMMENT '登録状態  0=未登録, 1=登録済み',
  `google_auth_code` varchar(250) DEFAULT NULL COMMENT '二段階認証コード',
  `setting_login` tinyint(1) DEFAULT '0' COMMENT '二段階認証ログイン使用設定',
  `inserted_at` datetime DEFAULT NULL COMMENT '紹介日',
  `registered_at` datetime DEFAULT NULL COMMENT '代理店登録日',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='代理店管理テーブル' AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_balance`
--

CREATE TABLE IF NOT EXISTS `t_balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `user_type` tinyint(4) DEFAULT NULL COMMENT 'ユーザー種別 1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `m_currency_id` tinyint(4) DEFAULT NULL COMMENT 'm_currency FK',
  `amount` varchar(100) DEFAULT NULL COMMENT '残高',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='残高管理テーブル' AUTO_INCREMENT=661 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_bank`
--

CREATE TABLE IF NOT EXISTS `t_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY',
  `user_type` tinyint(4) DEFAULT NULL COMMENT '1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `bankcode` char(10) DEFAULT NULL COMMENT '銀行コード',
  `bankname` varchar(250) DEFAULT NULL COMMENT '銀行名',
  `branchcode` char(10) DEFAULT NULL COMMENT '支店コード',
  `branchname` varchar(250) DEFAULT NULL COMMENT '支店名',
  `accountsubtype` int(11) DEFAULT NULL COMMENT '口座区分 1=普通, 2=当座預金, 4=貯蓄預金, 9=その他',
  `acnumber` varchar(250) DEFAULT NULL COMMENT '口座番号',
  `ackana` varchar(250) DEFAULT NULL COMMENT '口座名義',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ユーザー受信アドレス管理テーブル' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_btc_ticker`
--

CREATE TABLE IF NOT EXISTS `t_btc_ticker` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `exchange` varchar(50) DEFAULT NULL COMMENT '取引所名',
  `bid` varchar(50) DEFAULT NULL COMMENT '売り値',
  `ask` varchar(50) DEFAULT NULL COMMENT '買い値',
  `adj_bid` varchar(50) DEFAULT NULL COMMENT '調整買い値',
  `adj_ask` varchar(50) DEFAULT NULL COMMENT '調整売り値',
  `adjustment` varchar(50) DEFAULT NULL COMMENT '調整率',
  `volume` varchar(50) DEFAULT NULL COMMENT '取引量',
  `day_volume` varchar(50) DEFAULT NULL COMMENT '24時間での取引量',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='BTC ticker管理テーブル' AUTO_INCREMENT=1467423 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_contact`
--

CREATE TABLE IF NOT EXISTS `t_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KYE',
  `name` varchar(11) DEFAULT NULL COMMENT '名前',
  `mail` varchar(100) DEFAULT NULL COMMENT 'メールアドレス',
  `subject` text COMMENT '件名',
  `text` text COMMENT 'お問合せ内容',
  `response_status` int(11) NOT NULL DEFAULT '0' COMMENT '最終対応状況',
  `responder_id` int(11) DEFAULT NULL COMMENT '最終対応者ID',
  `responded_at` datetime DEFAULT NULL COMMENT '最終対応時刻',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  `deleted_at` datetime DEFAULT NULL COMMENT '削除日時',
  `deleted_flag` int(1) NOT NULL COMMENT '削除フラグ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_corp`
--

CREATE TABLE IF NOT EXISTS `t_corp` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `media_id` tinyint(2) NOT NULL COMMENT 'm_media FK',
  `agency_id` int(11) DEFAULT NULL COMMENT 't_agency FK',
  `corp_name` varchar(100) NOT NULL COMMENT '法人名（漢字）',
  `corp_name_kana` varchar(100) NOT NULL COMMENT '法人名（フリガナ）',
  `ceo_name` varchar(100) NOT NULL COMMENT '代表者名（漢字）',
  `ceo_name_kana` varchar(100) NOT NULL COMMENT '代表者名（フリガナ）',
  `ceo_first_name` char(30) NOT NULL COMMENT '代表者名名前',
  `ceo_first_name_kana` char(30) NOT NULL COMMENT '代表者名名前（フリガナ）',
  `pre_name` char(30) NOT NULL COMMENT '担当者苗字',
  `pre_name_kana` char(30) NOT NULL COMMENT '担当者苗字（フリガナ）',
  `pre_first_name` char(30) NOT NULL COMMENT '担当者名前',
  `pre_first_name_kana` char(30) NOT NULL COMMENT '担当者名前（フリガナ）',
  `pre_post1` char(3) NOT NULL COMMENT '取引責任者郵便番号',
  `pre_post2` char(4) NOT NULL COMMENT '取引責任者郵便番号',
  `pre_pref_id` tinyint(2) NOT NULL COMMENT '取引責任者m_pref FK',
  `pre_city` varchar(100) NOT NULL COMMENT '取引責任者市区町村',
  `pre_address` varchar(200) NOT NULL COMMENT '取引責任者住所（番地）',
  `pre_building` varchar(200) NOT NULL COMMENT '取引責任者建物',
  `pre_tel1` char(5) NOT NULL COMMENT '取引責任者電話番号',
  `pre_tel2` char(5) NOT NULL COMMENT '取引責任者電話番号',
  `pre_tel3` char(5) NOT NULL COMMENT '取引責任者電話番号',
  `year` smallint(4) NOT NULL COMMENT '設立年月日　年',
  `month` tinyint(2) NOT NULL COMMENT '設立年月日　月',
  `day` tinyint(2) NOT NULL COMMENT '設立年月日　日',
  `tel1` char(5) NOT NULL COMMENT '電話番号',
  `tel2` char(5) NOT NULL COMMENT '電話番号',
  `tel3` char(5) NOT NULL COMMENT '電話番号',
  `mail` text NOT NULL COMMENT 'メールアドレス',
  `post1` char(3) NOT NULL COMMENT '郵便番号',
  `post2` char(4) NOT NULL COMMENT '郵便番号',
  `pref_id` tinyint(2) NOT NULL COMMENT 'm_pref FK',
  `city` varchar(100) NOT NULL COMMENT '市区町村',
  `address` varchar(200) NOT NULL COMMENT '住所（番地）',
  `building` varchar(200) NOT NULL COMMENT '建物',
  `overseas_address_flag` tinyint(1) DEFAULT NULL COMMENT '海外居住者=1',
  `overseas_adr1` varchar(200) DEFAULT NULL COMMENT 'AddressLine1',
  `overseas_adr2` varchar(200) DEFAULT NULL COMMENT 'AddressLine2',
  `overseas_city` varchar(200) DEFAULT NULL COMMENT 'City',
  `overseas_state` varchar(200) DEFAULT NULL COMMENT 'State/Region',
  `overseas_zip` varchar(200) DEFAULT NULL COMMENT 'Zipcode',
  `overseas_country_id` int(10) DEFAULT NULL COMMENT 'm_country FK',
  `password` varchar(256) NOT NULL,
  `home_type` tinyint(1) DEFAULT NULL COMMENT '自宅形態 ',
  `stay_year` tinyint(2) NOT NULL COMMENT '居住年数',
  `job` tinyint(2) NOT NULL COMMENT '雇用体系',
  `job_name` varchar(50) NOT NULL COMMENT '勤務先名',
  `job_post1` char(3) NOT NULL COMMENT '勤務先の郵便番号3桁',
  `job_post2` char(7) NOT NULL COMMENT '勤務先の郵便番号7桁',
  `job_address` text NOT NULL COMMENT '勤務先の住所',
  `job_tel1` char(4) NOT NULL COMMENT '勤務先電話番号',
  `job_tel2` char(4) NOT NULL COMMENT '勤務先電話番号',
  `job_tel3` char(4) NOT NULL COMMENT '勤務先電話番号',
  `job_year` tinyint(2) NOT NULL COMMENT '勤続年数',
  `guarantee` tinyint(2) NOT NULL COMMENT 'ご年収(昨年度)',
  `debt1` tinyint(2) NOT NULL COMMENT '既存のお借り入れ',
  `debt2` tinyint(2) NOT NULL COMMENT 'お支払い延滞の有無',
  `famiry` tinyint(2) NOT NULL COMMENT '家族構成 (独身or既婚)',
  `investment_asset` tinyint(2) NOT NULL COMMENT '投資可能資産を ご選択ください。',
  `investment_asset_flag` tinyint(1) NOT NULL COMMENT '投資可能資産はご自身の資産でお間違えありませんか？ はい=1,いいえ=2',
  `income` tinyint(2) NOT NULL COMMENT '主な収入源をご選択ください。',
  `purpose1` tinyint(1) NOT NULL COMMENT '取引目的1',
  `purpose2` tinyint(1) NOT NULL COMMENT '取引目的2',
  `purpose3` tinyint(1) NOT NULL COMMENT '取引目的3',
  `purpose4` tinyint(1) NOT NULL COMMENT '取引目的4',
  `subscription` tinyint(1) NOT NULL COMMENT '申込の経緯をご選択ください。',
  `subscription_text` varchar(100) NOT NULL COMMENT 'その他をご選択された方は具体的な申込経緯をご記入ください。',
  `fx_trade` tinyint(2) NOT NULL COMMENT 'FX・CFD取引のご経験をご選択ください。',
  `cash_trade` tinyint(2) NOT NULL COMMENT '現物株式取引のご経験をご選択ください。',
  `credit_trade` tinyint(2) NOT NULL COMMENT '信用株式取引のご経験をご選択ください。',
  `option_trade` tinyint(2) NOT NULL COMMENT '先物オプション取引のご経験をご選択ください。',
  `item_trade` tinyint(2) NOT NULL COMMENT '商品先物取引のご経験をご選択ください。',
  `agree_1` tinyint(1) NOT NULL COMMENT '収益移転防止法に関する項目1',
  `agree_2` tinyint(1) NOT NULL COMMENT '収益移転防止法に関する項目2',
  `agree_3` tinyint(1) NOT NULL COMMENT '収益移転防止法に関する項目3',
  `status` tinyint(1) NOT NULL COMMENT '会員ステータス：不備=0,会員登録登録完了=1,本人確認書類登録完了=2,郵送物確送信対象者=3,登録完了者＝4',
  `advance_flag` tinyint(1) NOT NULL COMMENT '事前登録者=1',
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '新規登録日時',
  `token` varchar(256) DEFAULT NULL,
  `token_expired` timestamp NULL DEFAULT NULL,
  `file_certificate` varchar(200) DEFAULT NULL COMMENT '登記事項証明書 登録済み＝1',
  `image_id` varchar(200) DEFAULT NULL COMMENT 'IDセルフィー 登録済み＝1',
  `image_front` varchar(200) DEFAULT NULL COMMENT '本人確認書類 表面 登録済み＝1',
  `image_back` varchar(200) DEFAULT NULL COMMENT '本人確認書類 裏面  登録済み＝1',
  `list_image` varchar(200) DEFAULT NULL COMMENT '本人確認書類  登録済み＝1',
  `amount_sales` tinyint(1) DEFAULT NULL COMMENT '前期売上高',
  `net_income` tinyint(1) DEFAULT NULL COMMENT '前期純利益',
  `net_worth` tinyint(1) DEFAULT NULL COMMENT '純資産',
  `business` varchar(200) NOT NULL COMMENT '主な事業内容',
  `google_auth_code` varchar(250) DEFAULT NULL COMMENT '二段階認証コード',
  `setting_login` tinyint(1) DEFAULT '0' COMMENT 'setting use for google auth two factor when login',
  `setting_transfer_coin` tinyint(1) DEFAULT '0' COMMENT 'setting use for google auth two factor when transfer coin',
  `payment_id` int(11) DEFAULT NULL COMMENT '名義ID 個人=先頭奇数, 法人=先頭偶数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='事前登録（法人）管理テーブル' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_email_temp`
--

CREATE TABLE IF NOT EXISTS `t_email_temp` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `mail` text NOT NULL COMMENT 'メールアドレス',
  `password` varchar(256) NOT NULL,
  `agency_id` int(11) DEFAULT NULL COMMENT 't_agency FK',
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '仮登録日付',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '仮更新日付',
  `token` varchar(256) DEFAULT NULL,
  `token_expired` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='仮登録管理テーブル' AUTO_INCREMENT=633 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_error_log`
--

CREATE TABLE IF NOT EXISTS `t_error_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `user_type` tinyint(4) DEFAULT NULL COMMENT 'ユーザー種別 1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `url` text COMMENT 'URL',
  `controller` varchar(50) DEFAULT NULL COMMENT 'コントローラー',
  `action` varchar(50) DEFAULT NULL COMMENT 'アクション',
  `benchmark` varchar(50) DEFAULT NULL COMMENT '処理時間',
  `post_params` text COMMENT 'POSTパラメータ',
  `get_params` text COMMENT 'GETパラメータ',
  `session_params` text COMMENT 'SESSIONパラメータ',
  `queries` text COMMENT '実行SQL',
  `error` text COMMENT 'エラー',
  `inserted_at` datetime DEFAULT NULL COMMENT '発生日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='エラーログ管理テーブル' AUTO_INCREMENT=136 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_faq`
--

CREATE TABLE IF NOT EXISTS `t_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KYE',
  `category_id` int(11) DEFAULT NULL COMMENT 'm_faq_category FK',
  `question` varchar(100) DEFAULT NULL COMMENT '質問',
  `answer` text COMMENT '答え',
  `inputter_id` int(11) DEFAULT NULL COMMENT '登録者ID',
  `editor_id` int(11) DEFAULT NULL COMMENT '編集者ID',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  `deleted_at` datetime DEFAULT NULL COMMENT '削除日時',
  `deleted_flag` int(1) NOT NULL COMMENT '削除フラグ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_jpy_deposit_history`
--

CREATE TABLE IF NOT EXISTS `t_jpy_deposit_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `payment_id` int(11) DEFAULT NULL COMMENT '名義ID 個人=先頭奇数, 法人=先頭偶数',
  `user_type` tinyint(4) DEFAULT NULL COMMENT 'ユーザー種別 1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `ackana` varchar(100) DEFAULT NULL COMMENT '口座名義',
  `amount` varchar(100) DEFAULT NULL COMMENT '入金額',
  `payment_at` datetime DEFAULT NULL COMMENT '入金確認日',
  `bankname` varchar(100) DEFAULT NULL COMMENT '銀行名',
  `branchname` varchar(100) DEFAULT NULL COMMENT '支店名',
  `acnumber` int(11) DEFAULT NULL COMMENT '口座番号',
  `t_admin_user_id1` int(11) DEFAULT NULL COMMENT 't_admin_user FK（登録）',
  `t_admin_user_id2` int(11) DEFAULT NULL COMMENT 't_admin_user FK（承認）',
  `t_admin_user_id3` int(11) DEFAULT NULL COMMENT 't_admin_user FK（不備）',
  `defect_id` int(11) DEFAULT NULL COMMENT '不備理由 1=名義ID未記入, 2=口座名義違い, 3=不明',
  `note` text COMMENT '備考',
  `status` tinyint(4) DEFAULT NULL COMMENT 'ステータス 0=未承認, 1=承認, 2=不備',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `defected_at` datetime DEFAULT NULL COMMENT '不備日時',
  `approved_at` datetime DEFAULT NULL COMMENT '承認日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日本円 入金履歴テーブル' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_jpy_history`
--

CREATE TABLE IF NOT EXISTS `t_jpy_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `order_id` varchar(100) DEFAULT NULL COMMENT '注文ID',
  `user_type` tinyint(4) DEFAULT NULL COMMENT 'ユーザー種別 1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `t_bank_id` int(11) DEFAULT NULL COMMENT 't_bank FK',
  `type` tinyint(4) DEFAULT NULL COMMENT '送受信種別 1=send, 2=receive',
  `amount` varchar(100) DEFAULT NULL COMMENT '数量',
  `fee` varchar(100) DEFAULT NULL COMMENT '手数料',
  `status` tinyint(4) DEFAULT NULL COMMENT 'ステータス',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='日本円 入出金履歴テーブル' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_pre_corp`
--

CREATE TABLE IF NOT EXISTS `t_pre_corp` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `media_id` tinyint(2) NOT NULL COMMENT 'm_media FK',
  `corp_name` varchar(100) NOT NULL COMMENT '法人名（漢字）',
  `corp_name_kana` varchar(100) NOT NULL COMMENT '法人名（フリガナ）',
  `ceo_name` varchar(100) NOT NULL COMMENT '代表者名（漢字）',
  `ceo_name_kana` varchar(100) NOT NULL COMMENT '代表者名（フリガナ）',
  `ceo_first_name` char(30) NOT NULL COMMENT '代表者名名前',
  `ceo_first_name_kana` char(30) NOT NULL COMMENT '代表者名名前（フリガナ）',
  `pre_name` char(30) NOT NULL COMMENT '担当者苗字',
  `pre_name_kana` char(30) NOT NULL COMMENT '担当者苗字（フリガナ）',
  `pre_first_name` char(30) NOT NULL COMMENT '担当者名前',
  `pre_first_name_kana` char(30) NOT NULL COMMENT '担当者名前（フリガナ）',
  `year` smallint(4) NOT NULL COMMENT '設立年月日　年',
  `month` tinyint(2) NOT NULL COMMENT '設立年月日　月',
  `day` tinyint(2) NOT NULL COMMENT '設立年月日　日',
  `tel1` char(5) NOT NULL COMMENT '電話番号',
  `tel2` char(5) NOT NULL COMMENT '電話番号',
  `tel3` char(5) NOT NULL COMMENT '電話番号',
  `mail` text NOT NULL COMMENT 'メールアドレス',
  `post1` char(3) NOT NULL COMMENT '郵便番号',
  `post2` char(4) NOT NULL COMMENT '郵便番号',
  `pref_id` tinyint(2) NOT NULL COMMENT 'm_pref FK',
  `city` varchar(100) NOT NULL COMMENT '市区町村',
  `address` varchar(200) NOT NULL COMMENT '住所（番地）',
  `building` varchar(200) NOT NULL COMMENT '建物',
  `password` char(8) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '新規登録日時',
  `deleted_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='事前登録（法人）管理テーブル' AUTO_INCREMENT=24 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_pre_user`
--

CREATE TABLE IF NOT EXISTS `t_pre_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `media_id` tinyint(2) NOT NULL COMMENT 'm_media FK',
  `family_name` char(30) NOT NULL COMMENT '苗字',
  `family_name_kana` char(30) NOT NULL COMMENT '苗字（フリガナ）',
  `first_name` char(30) NOT NULL COMMENT '名前',
  `first_name_kana` char(30) NOT NULL COMMENT '名前（フリガナ）',
  `year` smallint(4) NOT NULL COMMENT '生年月日　年',
  `month` tinyint(2) NOT NULL COMMENT '生年月日　月',
  `day` tinyint(2) NOT NULL COMMENT '生年月日　日',
  `tel1` char(5) NOT NULL COMMENT '電話番号　',
  `tel2` char(5) NOT NULL COMMENT '電話番号',
  `tel3` char(5) NOT NULL COMMENT '電話番号',
  `mail` text NOT NULL COMMENT 'メールアドレス',
  `post1` char(3) NOT NULL COMMENT '郵便番号',
  `post2` char(4) NOT NULL COMMENT '郵便番号',
  `pref_id` tinyint(2) NOT NULL COMMENT 'm_pref FK',
  `city` varchar(100) NOT NULL COMMENT '市区町村',
  `address` varchar(200) NOT NULL COMMENT '住所（番地）',
  `building` varchar(200) NOT NULL COMMENT '建物',
  `password` char(12) NOT NULL,
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '新規登録日時',
  `deleted_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '削除フラグ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='事前登録（個人）管理テーブル' AUTO_INCREMENT=1052 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_send_address`
--

CREATE TABLE IF NOT EXISTS `t_send_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `user_type` tinyint(4) DEFAULT NULL COMMENT 'ユーザー種別 1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `m_currency_id` tinyint(4) DEFAULT NULL COMMENT 'm_currency FK',
  `name` varchar(100) DEFAULT NULL COMMENT '名称',
  `address` varchar(200) DEFAULT NULL COMMENT '送信先アドレス',
  `delete_flag` tinyint(4) DEFAULT '0' COMMENT '削除フラグ',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  `deleted_at` datetime DEFAULT NULL COMMENT '削除日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='外部送信アドレス管理テーブル' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_shop_history`
--

CREATE TABLE IF NOT EXISTS `t_shop_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `order_id` varchar(200) DEFAULT NULL COMMENT '注文ID',
  `user_type` tinyint(4) DEFAULT NULL COMMENT 'ユーザー種別　1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `buy_currency_id` tinyint(4) DEFAULT NULL COMMENT 'm_currency FK 受け取る通貨',
  `sell_currency_id` tinyint(4) DEFAULT NULL COMMENT 'm_currency FK 支払う通貨',
  `type` tinyint(4) DEFAULT NULL COMMENT '売買種別 1=buy, 2=sell',
  `price` varchar(100) DEFAULT NULL COMMENT '未調整価格',
  `buy_jpy_price` varchar(100) DEFAULT NULL COMMENT '購入通貨 日本円価格',
  `buy_amount` varchar(100) DEFAULT NULL COMMENT '購入数量',
  `sell_amount` varchar(100) DEFAULT NULL COMMENT '売却数量',
  `fee_currency` tinyint(4) DEFAULT NULL COMMENT 'm_currency FK 手数料通貨',
  `fee` varchar(100) DEFAULT NULL COMMENT '手数料',
  `status` tinyint(4) DEFAULT NULL COMMENT 'ステータス',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='販売所履歴テーブル' AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'PKEY',
  `media_id` tinyint(2) NOT NULL COMMENT 'm_media FK',
  `agency_id` int(11) DEFAULT NULL COMMENT 't_agency FK',
  `family_name` char(30) NOT NULL COMMENT '苗字',
  `family_name_kana` char(30) NOT NULL COMMENT '苗字（フリガナ）',
  `first_name` char(30) NOT NULL COMMENT '名前',
  `first_name_kana` char(30) NOT NULL COMMENT '名前（フリガナ）',
  `year` smallint(4) NOT NULL COMMENT '生年月日　年',
  `month` tinyint(2) NOT NULL COMMENT '生年月日　月',
  `day` tinyint(2) NOT NULL COMMENT '生年月日　日',
  `tel1` char(5) NOT NULL COMMENT '電話番号',
  `tel2` char(5) NOT NULL COMMENT '電話番号',
  `tel3` char(5) NOT NULL COMMENT '電話番号',
  `mail` text NOT NULL COMMENT 'メールアドレス',
  `post1` char(3) NOT NULL COMMENT '郵便番号',
  `post2` char(4) NOT NULL COMMENT '郵便番号',
  `pref_id` tinyint(2) NOT NULL COMMENT 'm_pref FK',
  `city` varchar(100) NOT NULL COMMENT '市区町村',
  `address` varchar(200) NOT NULL COMMENT '住所（番地）',
  `building` varchar(200) NOT NULL COMMENT '建物',
  `overseas_address_flag` tinyint(1) DEFAULT NULL COMMENT '海外居住者=1',
  `overseas_adr1` varchar(200) DEFAULT NULL COMMENT 'AddressLine1',
  `overseas_adr2` varchar(200) DEFAULT NULL COMMENT 'AddressLine2',
  `overseas_city` varchar(200) DEFAULT NULL COMMENT 'City',
  `overseas_state` varchar(200) DEFAULT NULL COMMENT 'State/Region',
  `overseas_zip` varchar(200) DEFAULT NULL COMMENT 'Zipcode',
  `overseas_country_id` int(10) DEFAULT NULL COMMENT 'm_country FK',
  `password` varchar(256) NOT NULL,
  `home_type` tinyint(1) DEFAULT NULL COMMENT '自宅形態 ',
  `stay_year` tinyint(2) NOT NULL COMMENT '居住年数',
  `job` tinyint(2) NOT NULL COMMENT '雇用体系',
  `job_name` varchar(50) NOT NULL COMMENT '勤務先名',
  `job_post1` char(3) NOT NULL COMMENT '勤務先の郵便番号3桁',
  `job_post2` char(7) NOT NULL COMMENT '勤務先の郵便番号7桁',
  `job_address` text NOT NULL COMMENT '勤務先の住所',
  `job_tel1` char(4) NOT NULL COMMENT '勤務先電話番号',
  `job_tel2` char(4) NOT NULL COMMENT '勤務先電話番号',
  `job_tel3` char(4) NOT NULL COMMENT '勤務先電話番号',
  `job_year` tinyint(2) NOT NULL COMMENT '勤続年数',
  `guarantee` tinyint(2) NOT NULL COMMENT 'ご年収(昨年度)',
  `debt1` tinyint(2) NOT NULL COMMENT '既存のお借り入れ',
  `debt2` tinyint(2) NOT NULL COMMENT 'お支払い延滞の有無',
  `famiry` tinyint(2) NOT NULL COMMENT '家族構成 (独身or既婚)',
  `investment_asset` tinyint(2) NOT NULL COMMENT '投資可能資産を ご選択ください                                                                                                                                                                                                                                             。',
  `investment_asset_flag` tinyint(1) NOT NULL COMMENT '投資可能資産はご自身の資 産でお間違え',
  `income` tinyint(2) NOT NULL COMMENT '主な収入源をご選択ください。',
  `purpose1` tinyint(1) NOT NULL COMMENT '取引目的1',
  `purpose2` tinyint(1) NOT NULL COMMENT '取引目的2',
  `purpose3` tinyint(1) NOT NULL COMMENT '取引目的3',
  `purpose4` tinyint(1) NOT NULL COMMENT '取引目的4',
  `subscription` tinyint(1) NOT NULL COMMENT '申込の経緯をご選択ください。',
  `subscription_text` varchar(100) NOT NULL COMMENT 'その他をご選択された方は具体的な申込',
  `fx_trade` tinyint(2) NOT NULL COMMENT 'FX・CFD取引のご経験をご選択ください。',
  `cash_trade` tinyint(2) NOT NULL COMMENT '現物株式取引のご経験をご選択ください',
  `credit_trade` tinyint(2) NOT NULL COMMENT '信用株式取引のご経験をご選択ください',
  `option_trade` tinyint(2) NOT NULL COMMENT '先物オプション取引のご経験をご選択く',
  `item_trade` tinyint(2) NOT NULL COMMENT '商品先物取引のご経験をご選択ください',
  `agree_1` tinyint(1) NOT NULL COMMENT '収益移転防止法に関する項目1',
  `agree_2` tinyint(1) NOT NULL COMMENT '収益移転防止法に関する項目2',
  `agree_3` tinyint(1) NOT NULL COMMENT '収益移転防止法に関する項目3',
  `status` tinyint(1) NOT NULL COMMENT '会員ステータス：不備=0,会員登録登録完了=1,本人確認書類登録完了=2,郵送物確送信対象者=3,登録完了者＝4',
  `advance_flag` tinyint(1) NOT NULL COMMENT '事前登録者=1',
  `inserted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `token` varchar(256) DEFAULT NULL,
  `token_expired` timestamp NULL DEFAULT NULL,
  `image_id` varchar(200) DEFAULT NULL COMMENT 'IDセルフィー 登録済み＝1',
  `image_front` varchar(200) DEFAULT NULL COMMENT '本人確認書類 表面 登録済み＝1',
  `image_back` varchar(200) DEFAULT NULL COMMENT '本人確認書類 裏面  登録済み＝1',
  `list_image` varchar(200) DEFAULT NULL COMMENT '本人確認書類  登録済み＝1',
  `google_auth_code` varchar(250) DEFAULT NULL COMMENT '二段階認証コード',
  `setting_login` tinyint(1) DEFAULT '0' COMMENT 'setting use for google auth two factor when login',
  `setting_transfer_coin` tinyint(1) DEFAULT '0' COMMENT 'setting use for google auth two factor when transfer coin',
  `payment_id` int(11) DEFAULT NULL COMMENT '名義ID 個人=先頭奇数, 法人=先頭偶数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='事前登録（個人）管理テーブル' AUTO_INCREMENT=1368 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_user_status`
--

CREATE TABLE IF NOT EXISTS `t_user_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY',
  `user_type` tinyint(4) DEFAULT NULL COMMENT '1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `new` int(10) DEFAULT '1' COMMENT '会員登録 1=完了, 2=不備',
  `new_date` datetime DEFAULT NULL COMMENT '会員登録日',
  `id_check` int(10) DEFAULT '0' COMMENT '本人確認書類登録 0=未登録, 1=完了, 2=不備',
  `id_check_date` datetime DEFAULT NULL COMMENT '本人確認書類登録日',
  `post` int(10) DEFAULT '0' COMMENT '郵送物送信 0=未郵送, 1=郵送済み, 2=不備',
  `post_date` datetime DEFAULT NULL COMMENT '郵送物送信日',
  `usable` int(10) DEFAULT '0' COMMENT '登録完了 0=未完了, 1=完了, 2=不備',
  `usable_date` datetime DEFAULT NULL COMMENT '登録完了日',
  `t_admin_user_id` int(11) DEFAULT NULL COMMENT 't_admin_user FK 最終更新者',
  `updated_at` datetime DEFAULT NULL COMMENT '最終更新日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ユーザー受信アドレス管理テーブル' AUTO_INCREMENT=327 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_virtual_history`
--

CREATE TABLE IF NOT EXISTS `t_virtual_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KEY',
  `order_id` varchar(100) DEFAULT NULL COMMENT '注文ID',
  `user_type` tinyint(4) DEFAULT NULL COMMENT 'ユーザー種別 1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `type` tinyint(4) DEFAULT NULL COMMENT '送受信種別 1=send(送信), 2=receive(受信)',
  `m_currency_id` tinyint(4) DEFAULT NULL COMMENT 'm_currency FK 送受信通貨',
  `amount` varchar(100) DEFAULT NULL COMMENT '数量',
  `user_address` varchar(100) DEFAULT NULL COMMENT 'ユーザー受信アドレス',
  `from_address` varchar(100) DEFAULT NULL COMMENT '送信元アドレス',
  `to_address` varchar(100) DEFAULT NULL COMMENT '送信先アドレス',
  `tx_hash` varchar(200) DEFAULT NULL COMMENT 'トランザクションID',
  `fee` varchar(100) DEFAULT NULL COMMENT '手数料',
  `transaction_fee` varchar(100) DEFAULT NULL COMMENT 'トランザクション手数料',
  `status` tinyint(4) DEFAULT NULL COMMENT 'ステータス',
  `created_at` datetime DEFAULT NULL COMMENT 'トランザクション作成日時',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='仮想通貨 送受信履歴テーブル' AUTO_INCREMENT=79 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_virtual_wallet`
--

CREATE TABLE IF NOT EXISTS `t_virtual_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY',
  `user_type` tinyint(4) DEFAULT NULL COMMENT '1=user, 2=corp',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user(t_corp) FK',
  `m_wallet_id` tinyint(4) DEFAULT NULL COMMENT 'm_wallet FK',
  `address_id` varchar(250) DEFAULT NULL COMMENT '受信アドレスID',
  `address` varchar(250) DEFAULT NULL COMMENT '受信アドレス',
  `inserted_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ユーザー受信アドレス管理テーブル' AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_wallet`
--

CREATE TABLE IF NOT EXISTS `t_wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'P_KYE',
  `user_id` int(11) DEFAULT NULL COMMENT 't_user FK',
  `wallet_id` varchar(100) DEFAULT NULL COMMENT 'ウォレットID',
  `address` text COMMENT '受取アドレス一覧',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
