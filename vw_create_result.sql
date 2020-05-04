-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 05:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `betting`
--

-- --------------------------------------------------------

--
-- Structure for view `vw_create_result`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_create_result`  AS  select `d`.`horse_id` AS `horse_id`,`h`.`horse_name` AS `horse_name`,`d`.`jockey_id` AS `jockey_id`,`j`.`jockey_name` AS `jockey_name`,`r`.`race_id` AS `race_id`,`r`.`race_name` AS `race_name` from (((`race_horse_jockey` `d` join `race` `r`) join `vw_all_horses_admin` `h`) join `jockey` `j`) where `d`.`race_id` = `r`.`race_id` and !(`d`.`race_id` in (select `vw_results`.`race_id` from `vw_results`)) and `d`.`horse_id` = `h`.`horse_id` and `d`.`jockey_id` = `j`.`jockey_id` ;

--
-- VIEW `vw_create_result`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
