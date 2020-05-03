-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 11:10 AM
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
-- Structure for view `vw_specific_race_info`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_specific_race_info`  AS  select `h`.`horse_id` AS `horse_id`,`h`.`horse_name` AS `horse_name`,`h`.`horse_dob` AS `horse_dob`,`s`.`stable_name` AS `stable_name`,`d`.`odds` AS `odds`,`r`.`race_id` AS `race_id` from (((`horse` `h` join `horse_race` `d`) join `race` `r`) join `stable` `s`) where `d`.`horse_id` = `h`.`horse_id` and `h`.`stable_id` = `s`.`stable_id` and `r`.`race_id` = `d`.`race_id` ;

--
-- VIEW `vw_specific_race_info`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
