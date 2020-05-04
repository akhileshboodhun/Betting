-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 12:30 PM
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
-- Structure for view `vw_racesdetailed_withname`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_racesdetailed_withname`  AS  select `h`.`horse_name` AS `horse_name`,`j`.`jockey_name` AS `jockey_name`,`s`.`stable_name` AS `stable_name`,`g`.`odds` AS `odds`,`r`.`race_name` AS `race_name` from ((((`horse` `h` join `race_horse_jockey` `g`) join `race` `r`) join `stable` `s`) join `jockey` `j`) where `g`.`horse_id` = `h`.`horse_id` and `h`.`stable_id` = `s`.`stable_id` and `g`.`race_id` = `r`.`race_id` and `g`.`jockey_id` = `j`.`jockey_id` ;

--
-- VIEW `vw_racesdetailed_withname`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
