-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-07-15 21:38
-- 서버 버전: 10.1.31-MariaDB
-- PHP 버전: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `devdb`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `userid` varchar(32) NOT NULL COMMENT '아이디',
  `name` varchar(16) NOT NULL COMMENT '이름',
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL COMMENT '패스워드',
  `created_at` datetime NOT NULL COMMENT '가입날짜',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '갱신날짜'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`id`, `userid`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '관리자', 'admin@email.com', '$2y$10$lXWy5hdeMpUhH3YQkzF7fOvGP7RQGyRsfytBB0x5rdz1/2Ta4pery', '2018-07-15 00:00:00', '2018-07-15 06:38:11'),
(11, 'id', '123', 'id@email.com', '$2y$10$2LqjntScj26cJAjVA2lVxe.DUybeEJOs9hp7RFsVDmaFBgEiiz94.', '2018-07-15 21:37:12', '2018-07-15 12:37:35');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
