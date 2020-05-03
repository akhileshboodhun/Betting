-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 12:37 AM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `is_admin`, `balance`) VALUES
(155, 1, 777787);

-- --------------------------------------------------------

--
-- Table structure for table `bets`
--

CREATE TABLE `bets` (
  `bet_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bet_odd` double NOT NULL,
  `bet_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `horse`
--

CREATE TABLE `horse` (
  `horse_id` int(11) NOT NULL,
  `horse_name` varchar(15) NOT NULL,
  `horse_dob` date NOT NULL,
  `horse_weight` double NOT NULL,
  `stable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horse`
--

INSERT INTO `horse` (`horse_id`, `horse_name`, `horse_dob`, `horse_weight`, `stable_id`) VALUES
(107, 'Kings Empire', '2020-01-17', 460, 1111),
(108, 'Black Indy', '2019-12-04', 456, 2222),
(109, 'speedy', '2019-06-12', 498, 3333),
(110, 'lightning bolt', '2017-05-18', 387, 1222),
(111, 'bulletformyvall', '2015-06-12', 465, 2223),
(112, 'exponentialspee', '2017-05-19', 455, 3333),
(114, 'Flash', '2016-10-09', 460, 1222),
(115, 'Stallion', '2018-07-10', 550, 2222);

-- --------------------------------------------------------

--
-- Table structure for table `horse_owner`
--

CREATE TABLE `horse_owner` (
  `owner_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horse_owner`
--

INSERT INTO `horse_owner` (`owner_id`, `horse_id`) VALUES
(1, 114),
(2, 111),
(3, 112),
(4, 107),
(4, 108),
(5, 115);

-- --------------------------------------------------------

--
-- Table structure for table `jockey`
--

CREATE TABLE `jockey` (
  `jockey_id` int(11) NOT NULL,
  `jockey_name` varchar(75) NOT NULL,
  `jockey_dob` date NOT NULL,
  `jockey_weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jockey`
--

INSERT INTO `jockey` (`jockey_id`, `jockey_name`, `jockey_dob`, `jockey_weight`) VALUES
(795, 'rishikesh', '1999-10-10', 60),
(796, 'kanigan', '2000-01-05', 75);

-- --------------------------------------------------------

--
-- Table structure for table `normal_user`
--

CREATE TABLE `normal_user` (
  `user_id` int(11) NOT NULL,
  `user_dob` date NOT NULL,
  `balance` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(11) NOT NULL,
  `owner_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `owner_name`) VALUES
(1, 'TOM'),
(2, 'Reeshal'),
(3, 'Dishan'),
(4, 'Kishan'),
(5, 'KEVIN');

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `race_id` int(11) NOT NULL,
  `race_name` varchar(75) NOT NULL,
  `date_time` date NOT NULL,
  `distance` int(11) NOT NULL,
  `no_horses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race`
--

INSERT INTO `race` (`race_id`, `race_name`, `date_time`, `distance`, `no_horses`) VALUES
(796540, 'Silicon Valley Race 1', '2020-04-28', 2400, 3);

-- --------------------------------------------------------

--
-- Table structure for table `race_horse_jockey`
--

CREATE TABLE `race_horse_jockey` (
  `race_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `jockey_id` int(11) NOT NULL,
  `odds` double DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `race_horse_jockey`
--

INSERT INTO `race_horse_jockey` (`race_id`, `horse_id`, `jockey_id`, `odds`) VALUES
(796540, 107, 796, 1),
(796540, 108, 796, 1),
(796540, 109, 796, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stable`
--

CREATE TABLE `stable` (
  `stable_id` int(11) NOT NULL,
  `stable_name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stable`
--

INSERT INTO `stable` (`stable_id`, `stable_name`) VALUES
(1111, 'Wild Horses Ranch'),
(1222, 'JET RANCH'),
(2222, 'Majestic Ranch'),
(2223, 'CHICK RANCH'),
(3333, 'Green Forest Stables'),
(4444, 'Horse Paradise');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `t_amount` double NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp(),
  `transaction_type` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`) VALUES
(155, 'akhilesh', 'akhilesh@example.com', '$2y$10$PRGBP79JZumsUYTgTtWwqONOHhPIQsrM0dtdUTIiIxqBCJT3PELVK');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_all_horses_admin`
-- (See below for the actual view)
--
CREATE TABLE `vw_all_horses_admin` (
`horse_id` int(11)
,`horse_name` varchar(15)
,`horse_dob` date
,`horse_weight` double
,`stable_name` varchar(75)
,`owner_name` varchar(75)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_specific_race_info`
-- (See below for the actual view)
--
CREATE TABLE `vw_specific_race_info` (
`horse_id` int(11)
,`horse_name` varchar(15)
,`jockey_id` int(11)
,`jockey_name` varchar(75)
,`stable_name` varchar(75)
,`odds` double
,`race_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_all_horses_admin`
--
DROP TABLE IF EXISTS `vw_all_horses_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_all_horses_admin`  AS  select `h`.`horse_id` AS `horse_id`,`h`.`horse_name` AS `horse_name`,`h`.`horse_dob` AS `horse_dob`,`h`.`horse_weight` AS `horse_weight`,`s`.`stable_name` AS `stable_name`,`o`.`owner_name` AS `owner_name` from (((`horse` `h` join `horse_owner` `w`) join `owner` `o`) join `stable` `s`) where `h`.`horse_id` = `w`.`horse_id` and `h`.`stable_id` = `s`.`stable_id` and `w`.`owner_id` = `o`.`owner_id` ;

-- --------------------------------------------------------

--
-- Structure for view `vw_specific_race_info`
--
DROP TABLE IF EXISTS `vw_specific_race_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_specific_race_info`  AS  select `h`.`horse_id` AS `horse_id`,`h`.`horse_name` AS `horse_name`,`j`.`jockey_id` AS `jockey_id`,`j`.`jockey_name` AS `jockey_name`,`s`.`stable_name` AS `stable_name`,`g`.`odds` AS `odds`,`r`.`race_id` AS `race_id` from ((((`horse` `h` join `race_horse_jockey` `g`) join `race` `r`) join `stable` `s`) join `jockey` `j`) where `g`.`horse_id` = `h`.`horse_id` and `h`.`stable_id` = `s`.`stable_id` and `g`.`race_id` = `r`.`race_id` and `g`.`jockey_id` = `j`.`jockey_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`bet_id`),
  ADD KEY `horse_id` (`horse_id`),
  ADD KEY `race_id` (`race_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `horse`
--
ALTER TABLE `horse`
  ADD PRIMARY KEY (`horse_id`),
  ADD KEY `stable_id` (`stable_id`);

--
-- Indexes for table `horse_owner`
--
ALTER TABLE `horse_owner`
  ADD PRIMARY KEY (`owner_id`,`horse_id`),
  ADD KEY `horse_id` (`horse_id`);

--
-- Indexes for table `jockey`
--
ALTER TABLE `jockey`
  ADD PRIMARY KEY (`jockey_id`);

--
-- Indexes for table `normal_user`
--
ALTER TABLE `normal_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`race_id`);

--
-- Indexes for table `race_horse_jockey`
--
ALTER TABLE `race_horse_jockey`
  ADD PRIMARY KEY (`race_id`,`horse_id`,`jockey_id`),
  ADD KEY `horse_id` (`horse_id`),
  ADD KEY `jockey_id` (`jockey_id`);

--
-- Indexes for table `stable`
--
ALTER TABLE `stable`
  ADD PRIMARY KEY (`stable_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `horse`
--
ALTER TABLE `horse`
  MODIFY `horse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `jockey`
--
ALTER TABLE `jockey`
  MODIFY `jockey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=797;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
  MODIFY `race_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=796542;

--
-- AUTO_INCREMENT for table `stable`
--
ALTER TABLE `stable`
  MODIFY `stable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4445;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bets`
--
ALTER TABLE `bets`
  ADD CONSTRAINT `bets_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bets_ibfk_4` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bets_ibfk_5` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horse`
--
ALTER TABLE `horse`
  ADD CONSTRAINT `horse_ibfk_1` FOREIGN KEY (`stable_id`) REFERENCES `stable` (`stable_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horse_owner`
--
ALTER TABLE `horse_owner`
  ADD CONSTRAINT `horse_owner_ibfk_3` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horse_owner_ibfk_4` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_user`
--
ALTER TABLE `normal_user`
  ADD CONSTRAINT `normal_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `race_horse_jockey`
--
ALTER TABLE `race_horse_jockey`
  ADD CONSTRAINT `race_horse_jockey_ibfk_1` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `race_horse_jockey_ibfk_4` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `race_horse_jockey_ibfk_5` FOREIGN KEY (`jockey_id`) REFERENCES `jockey` (`jockey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
