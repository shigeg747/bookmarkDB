-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 1 月 09 日 10:28
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `shigeg_ccdb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `oyaji_dc_table`
--

CREATE TABLE `oyaji_dc_table` (
  `id` int(12) NOT NULL,
  `type` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `oyaji_dc_table`
--

INSERT INTO `oyaji_dc_table` (`id`, `type`, `title`, `url`) VALUES
(72, 'テーブル', '上海', 'https://y.honkakuha.success-games.net/game/su-35-shanghai/'),
(73, 'パズル', 'クルクルジャングル', 'http://ycp.synk-casualgames.com/game/?gameId=sy-s182-kurukurujungle'),
(74, 'テーブル', '将棋', 'https://sdin.jp/browser/board/shogi/'),
(76, 'タイピング', '寿司打', 'http://typingx0.net/sushida/'),
(79, 'テーブル', '麻雀', 'http://yahoo-mbga.jp/game/12003436/play?'),
(81, 'テーブル', 'ソリティア', 'http://yahoo-mbga.jp/game/12009657/play?installed=8498685'),
(82, 'テーブル', 'オセロ', 'https://y.honkakuha.success-games.net/game/su-74-reversi2/'),
(83, 'パズル', 'NEON DOTS', 'https://www.p-game.jp/game188/'),
(85, 'タイピング', '桃太郎たいぴんぐ', 'https://pokedebi.com/game/momotype/'),
(86, 'その他', 'オリジナル炎のブロック崩し', 'https://shigeg747.github.io/firedblock/');

-- --------------------------------------------------------

--
-- テーブルの構造 `oyaji_user_table`
--

CREATE TABLE `oyaji_user_table` (
  `id` int(12) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `user_pw` varchar(64) NOT NULL,
  `life_flg` varchar(64) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `oyaji_user_table`
--

INSERT INTO `oyaji_user_table` (`id`, `user_name`, `user_id`, `user_pw`, `life_flg`, `indate`) VALUES
(3, 'おおはらしげる', 'shigeg', 'shigegshigeg', '0', '2021-01-08 22:03:20'),
(4, 'てすと', 'test', 'test', '0', '2021-01-09 01:36:19'),
(5, 'ゲームセンターあらし', 'arashi', 'arashi', '0', '2021-01-09 02:11:46');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `oyaji_dc_table`
--
ALTER TABLE `oyaji_dc_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `oyaji_user_table`
--
ALTER TABLE `oyaji_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `oyaji_dc_table`
--
ALTER TABLE `oyaji_dc_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- テーブルのAUTO_INCREMENT `oyaji_user_table`
--
ALTER TABLE `oyaji_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
