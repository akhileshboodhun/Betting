-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 12:45 PM
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
(155, 1, 777787),
(157, 1, 1000000);

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
(1, 'Bonjour Baby', '2016-01-01', 550, 2222),
(2, 'Black Indy', '2016-05-02', 550, 1111),
(3, 'Senatla', '2019-07-19', 456, 3333),
(4, 'Zeus Star', '2018-05-09', 651, 4444);

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
  `horse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(794, 'rahul', '1992-05-13', 87);

-- --------------------------------------------------------

--
-- Table structure for table `normal_user`
--

CREATE TABLE `normal_user` (
  `user_id` int(11) NOT NULL,
  `user_dob` date NOT NULL,
  `balance` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normal_user`
--

INSERT INTO `normal_user` (`user_id`, `user_dob`, `balance`) VALUES
(160, '1998-10-21', 0),
(178, '2020-02-28', 0),
(179, '2020-02-28', 0),
(180, '2020-03-24', 0),
(181, '2020-03-26', 0),
(182, '2020-03-19', 0),
(183, '1999-10-16', 0),
(184, '2020-05-13', 0);

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
(566, 'dora');

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
(2222, 'Majestic Ranch'),
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
(155, 'akhilesh', 'akhilesh@example.com', '$2y$10$PRGBP79JZumsUYTgTtWwqONOHhPIQsrM0dtdUTIiIxqBCJT3PELVK'),
(156, 'hello', 'helloworld@gmail.com', '$2y$10$uM2y0cdZELDs2lp3iZl...IQyMDZBy15qzdHdgo6R2vrvY0difQuq'),
(157, 'Anwar Chuttoo', 'anwarchuttoo@gmail.com', '$2y$10$dQaOVjEfcYr23Mcm9zaCZeYfZhVgaheMxhn0eqgC9Pf5ATd9tNJWa'),
(160, 'kishan', 'navin@gmail.com', '$2y$10$lvvfC7/7yLPqOyxe8ZHEQ.oS4j6s9XTpqOr3G6ICoXpCJTFh8g27G'),
(161, 'kishan', 'navin@gmail.com', '$2y$10$9HWVrYcDNqXOszbDGhokD.Anuu0MO8mQZaUPUD/klEwuxYfbihLvS'),
(162, 'abcd', 'abcd@example.com', '$2y$10$pqoiJGIAPftTxx7julZ.Ru2V6lupjvms19cVpSPd7ZSNvm0AldV9e'),
(163, 'abcd', 'abcd@example.com', '$2y$10$154JK7u8nhcJYQRIST0GH.QqMH4E1V22UXB8zlaqRgMvpSGLzZExK'),
(164, 'qwerty', 'qwerty@abc.com', '$2y$10$tZ361d0cSFE1FcLcO3CcZuLpzAU1L/jbx83gU.VR5kzlv8NM4F6KK'),
(165, 'qwerty', 'qwerty@abc.com', '$2y$10$5OmJKJqhM09c0aV1qp3JqegDmzXEnN1sBrIKrjA/5XR/DLuejBKt2'),
(166, 'wiuyegfuv', 'wegvkei@dkftjhnb.com', '$2y$10$Fq8tyQmKt2UF37VX6LoXb.fKDv6rvs6c9p4ebU6UYd.z82KI8olXq'),
(167, 'zxcvbnm', 'zxcvbnnnm@asdff.com', '$2y$10$HnokSNx/buHvGGTdn.dbQOoUa0S7Jnmi7/pzzg4g2con0T7KZ9wB.'),
(168, 'anwar3', 'anwar3@gmail.com', '$2y$10$1EGJdAQU8DaXnsvdWwtRI.oKXO.MhpW53rmkjnclVBXYyHEVy7.0y'),
(169, 'asdf', 'asdf@gmail.com', '$2y$10$vdDhYfCg/PkXReFr5vYka..dWIdg0SElWkPoSmfKLAYCcyYwaT06q'),
(170, 'asdf', 'asdf@gmail.com', '$2y$10$2pLa1EAPbojdFB9AmU2G.OLoE7uu.FQHiT/tMibUFUOn1OfpX/WK6'),
(171, 'hjkl', 'hjkl@gmail.com', '$2y$10$o8XzhwCeKADgR2hY9yiJJuO69MlAtYGa/Xs3YE8bCUlUwCV42ojO2'),
(172, 'uiop', 'uiop@gmail.com', '$2y$10$tLREx/KwkVHBervnaG9nE.3Bursjh7S9GhjycMo5ZFujaPISHX4j.'),
(173, 'uiop', 'uiop@gmail.com', '$2y$10$Lbp0AzkcLwfbNSrKsvX/yOvf2gvCz8pV9Bja9Vz1BGd5gnUC85w0C'),
(174, 'rowjee', 'rowjee@gmail.com', '$2y$10$w2PYmnEqE8wy04fCkXk4VeE48Re7BI7YrrMjjBJjq59DT.bNi/8hm'),
(175, 'kishanpd', 'kishanpd@gmail.com', '$2y$10$AgxRBJJlKGurEJ.TOKijiOBtSYU4Zxb7Fgi4N1ZeA99eGQpYd8Rm2'),
(176, 'kishanpd1', 'kishanpd1@gmail.com', '$2y$10$3QQpzkUxOiVtqLLAlDxQ5OduUqGzhsbBLsdeKOPR7u9vWAeAYqDLa'),
(177, 'shahanah', 'shahanah@gmail.com', '$2y$10$744IJIpNNBOnACP7E9GcsuWUXXGUlGVYqaBsKrxAu/UB5NH50WcYG'),
(178, 'navinpd', 'navinpd@gmail.com', '$2y$10$M4ox3R.t4t8EQv5L0b/deulRloA3RH6rPDInhVLUcrkTcATs0zmqu'),
(179, 'keshavpln', 'keshavpln@gmail.com', '$2y$10$ofeK5ylTnYOfQOIdn64wN.GoU8SMLEkx5ogffD4hlbx8cHenaNLTa'),
(180, 'vbnm', 'vbnm@gmail.com', '$2y$10$0slnlqME6859tvtSOyAXd.zyNpWgf78iOaqC7oITtgHFrde6IunfC'),
(181, 'xyz', 'xyz@gmail.com', '$2y$10$yI2/ed24AoEQg9YkgVYMN.kdqbKnfFF/BHrqySqyzd.W3AzFpKnBa'),
(182, 'erty', 'erty@gmail.com', '$2y$10$/kOMgMU7uNaLsugjZAJGROhArayq15sCHCoQDqmshYdZ7VhB2PRuS'),
(183, 'john rambo', 'johnrambo@cia.us', '$2y$10$pDPfLMNRFDb7SvBrI60qsOLldcdun9AudDlNjkm7GRTUDs/Dj2Or6'),
(184, 'reeshalpedal', 'reeshalsuckscock@brazzers.com', '$2y$10$EhJFtfWBMX0x74w983U32eb7eabn10ZKb9/OtPtTYPBphkSuNDm3y');

-- --------------------------------------------------------

--
-- Structure for view `racedetails`
--
DROP TABLE IF EXISTS `racedetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `racedetails`  AS  select `race_jockey`.`jockey_id` AS `jockey_id`,`horse_race`.`horse_id` AS `horse_id`,`race`.`race_id` AS `race_id`,`race`.`race_name` AS `race_name`,`race`.`date_time` AS `date_time`,`race`.`distance` AS `distance`,`race`.`no_horses` AS `no_horses`,`horse`.`horse_name` AS `horse_name`,`horse`.`horse_dob` AS `horse_dob`,`horse`.`horse_weight` AS `horse_weight`,`horse`.`stable_id` AS `stable_id`,`jockey`.`jockey_name` AS `jockey_name`,`jockey`.`jockey_dob` AS `jockey_dob`,`jockey`.`jockey_weight` AS `jockey_weight` from ((((`race` join `horse_race` on(`race`.`race_id` = `horse_race`.`race_id`)) join `race_jockey` on(`race`.`race_id` = `race_jockey`.`race_id`)) join `horse` on(`horse_race`.`horse_id` = `horse`.`horse_id`)) join `jockey` on(`race_jockey`.`jockey_id` = `jockey`.`jockey_id`)) ;

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
  MODIFY `horse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jockey`
--
ALTER TABLE `jockey`
  MODIFY `jockey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;

--
-- AUTO_INCREMENT for table `race`
--
ALTER TABLE `race`
  MODIFY `race_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=796524;

--
-- AUTO_INCREMENT for table `stable`
--
ALTER TABLE `stable`
  MODIFY `stable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4445;

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
  ADD CONSTRAINT `horse_owner_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horse_owner_ibfk_3` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `horse_race`
--
ALTER TABLE `horse_race`
  ADD CONSTRAINT `horse_race_ibfk_2` FOREIGN KEY (`horse_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horse_race_ibfk_3` FOREIGN KEY (`race_id`) REFERENCES `horse` (`horse_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
