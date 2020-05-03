-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 12:20 PM
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
(112, 'exponentialspee', '2017-05-19', 455, 3333);

-- --------------------------------------------------------

--
-- Table structure for table `horse_owner`
--

CREATE TABLE `horse_owner` (
  `owner_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `horse_race`
--

CREATE TABLE `horse_race` (
  `race_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `odds` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horse_race`
--

INSERT INTO `horse_race` (`race_id`, `horse_id`, `odds`) VALUES
(796536, 109, NULL),
(796536, 110, NULL),
(796536, 111, NULL),
(796536, 112, NULL),
(796537, 108, NULL),
(796537, 110, NULL),
(796537, 112, NULL),
(796538, 107, NULL),
(796538, 108, NULL),
(796538, 109, NULL),
(796538, 111, NULL);

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
(796536, 'Silicon Valley Race 1', '2020-01-01', 3000, 4),
(796537, 'Texas Champion', '2020-01-01', 2400, 3),
(796538, 'california race', '2020-01-02', 3000, 4);

-- --------------------------------------------------------

--
-- Stand-in structure for view `racedetails`
-- (See below for the actual view)
--
CREATE TABLE `racedetails` (
`jockey_id` int(11)
,`horse_id` int(11)
,`race_id` int(11)
,`race_name` varchar(75)
,`date_time` date
,`distance` int(11)
,`no_horses` int(11)
,`horse_name` varchar(15)
,`horse_dob` date
,`horse_weight` double
,`stable_id` int(11)
,`jockey_name` varchar(75)
,`jockey_dob` date
,`jockey_weight` float
);

-- --------------------------------------------------------

--
-- Table structure for table `race_jockey`
--

CREATE TABLE `race_jockey` (
  `jockey_id` int(11) NOT NULL,
  `race_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `race_temp`
--

CREATE TABLE `race_temp` (
  `race_id` int(11) NOT NULL,
  `horse_id` int(11) NOT NULL,
  `jockey_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Stand-in structure for view `vw_specific_race_info`
-- (See below for the actual view)
--
CREATE TABLE `vw_specific_race_info` (
`horse_id` int(11)
,`horse_name` varchar(15)
,`horse_dob` date
,`stable_name` varchar(75)
,`odds` int(11)
,`race_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `racedetails`
--
DROP TABLE IF EXISTS `racedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `racedetails`  AS  select `race_jockey`.`jockey_id` AS `jockey_id`,`horse_race`.`horse_id` AS `horse_id`,`race`.`race_id` AS `race_id`,`race`.`race_name` AS `race_name`,`race`.`date_time` AS `date_time`,`race`.`distance` AS `distance`,`race`.`no_horses` AS `no_horses`,`horse`.`horse_name` AS `horse_name`,`horse`.`horse_dob` AS `horse_dob`,`horse`.`horse_weight` AS `horse_weight`,`horse`.`stable_id` AS `stable_id`,`jockey`.`jockey_name` AS `jockey_name`,`jockey`.`jockey_dob` AS `jockey_dob`,`jockey`.`jockey_weight` AS `jockey_weight` from ((((`race` join `horse_race` on(`race`.`race_id` = `horse_race`.`race_id`)) join `race_jockey` on(`race`.`race_id` = `race_jockey`.`race_id`)) join `horse` on(`horse_race`.`horse_id` = `horse`.`horse_id`)) join `jockey` on(`race_jockey`.`jockey_id` = `jockey`.`jockey_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_specific_race_info`
--
DROP TABLE IF EXISTS `vw_specific_race_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_specific_race_info`  AS  select `h`.`horse_id` AS `horse_id`,`h`.`horse_name` AS `horse_name`,`h`.`horse_dob` AS `horse_dob`,`s`.`stable_name` AS `stable_name`,`d`.`odds` AS `odds`,`r`.`race_id` AS `race_id` from (((`horse` `h` join `horse_race` `d`) join `race` `r`) join `stable` `s`) where `d`.`horse_id` = `h`.`horse_id` and `h`.`stable_id` = `s`.`stable_id` and `r`.`race_id` = `d`.`race_id` ;

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
-- Indexes for table `horse_race`
--
ALTER TABLE `horse_race`
  ADD PRIMARY KEY (`race_id`,`horse_id`),
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
-- Indexes for table `race_jockey`
--
ALTER TABLE `race_jockey`
  ADD PRIMARY KEY (`jockey_id`,`race_id`),
  ADD KEY `race_id` (`race_id`);

--
-- Indexes for table `race_temp`
--
ALTER TABLE `race_temp`
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
  MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `horse`
--
ALTER TABLE `horse`
  MODIFY `horse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

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
  MODIFY `race_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=796539;

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
-- Constraints for table `horse_race`
--
ALTER TABLE `horse_race`
  ADD CONSTRAINT `horse_race_ibfk_1` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horse_race_ibfk_2` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `normal_user`
--
ALTER TABLE `normal_user`
  ADD CONSTRAINT `normal_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `race_jockey`
--
ALTER TABLE `race_jockey`
  ADD CONSTRAINT `race_jockey_ibfk_2` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `race_jockey_ibfk_3` FOREIGN KEY (`jockey_id`) REFERENCES `jockey` (`jockey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `race_temp`
--
ALTER TABLE `race_temp`
  ADD CONSTRAINT `race_temp_ibfk_1` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `race_temp_ibfk_4` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `race_temp_ibfk_5` FOREIGN KEY (`jockey_id`) REFERENCES `jockey` (`jockey_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
