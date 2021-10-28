-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 03:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `chapter` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `firstname`, `lastname`, `phonenumber`, `email`, `category`, `chapter`, `subject`, `address`, `bio`, `image`, `createdat`) VALUES
(3, 'Abdulhammed', 'Fuad', '07067752068', 'zfuad6454@gmail.com', 'imperfectly-perfect', 1, 'Just', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'Don jhs jhsdu jhsdiw kjsheiow sjkhiah kjashioa', '36787636.png', '2021-10-21 10:58:36'),
(4, 'Tajudeen Modasola', 'Aish', '07067752068', 'aish@gmail.com', 'blemished', 2, 'Just', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'hdsi jsdgh jksegh ejkhq jkhsa AJKHWI', '36787636.png', '2021-10-21 11:01:23'),
(5, 'Abdulhammed', 'Ibrahim', '07067752068', 'fuskidmori@gmail.com', 'imperfectly-perfect', 3, 'Contest', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'kljsek erjkhw klhreiw  jw', '27966159.png', '2021-10-21 11:02:25'),
(6, 'Subair', 'Ridwan', '07067752068', 'ridwan@gmail.com', 'imperfectly-perfect', 4, 'Love', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'bsdiue rejkew jkshuwr wejkhwei', '27966159.png', '2021-10-21 11:04:36'),
(7, 'Subair', 'Sofiyat', '04779386276223', 'fuskeed@gmail.com', 'blemished', 1, 'Delay', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'jhios erhwei erjkhwr jksehk qejkhqiw', '26661347.png', '2021-10-21 11:05:44'),
(8, 'Subair', 'Seyidat', '09086627562', 'seyibabe@gmail.com', 'blemished', 2, 'Just', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'sdkhs sdfjkhws klsjhe klehiw klhi', '22554793.png', '2021-10-21 11:06:41'),
(9, 'Subair', 'Ibrahim', '07890735626221', 'ibrahim@gmail.com', 'blemished', 3, 'Contests', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'lheiow rjhweihe', '61829152.png', '2021-10-21 11:07:47'),
(10, 'Subair', 'Hassan', '08084653522', 'hassan@gmail.com', 'imperfectly-perfect', 4, 'Delay', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'sdjkbjbsd dfjhhsf jkhdsjhs kldkls', '43616393.png', '2021-10-21 11:08:32'),
(11, 'Abdul-Azeez', 'Sofiyat', '037365647827263', 'softy@gmail.com', 'blemished', 1, 'Contest', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'klhksd jhskjwen', '94441914.png', '2021-10-21 11:09:23'),
(12, 'Abdul-Azeez', 'Naheem', '09087651410', 'naheem@gmail.com', 'imperfectly-perfect', 2, 'Just', 'Oluyole Street, Ijokodo', 'hirhis jsdhuse kheaiwe klehsioejw', '74571911.png', '2021-10-21 11:10:32'),
(13, 'Abdul-Azeez', 'Lateefat', '09087356245272', 'lateefat@gmail.com', 'blemished', 3, 'Just', 'Oluyole Street, Ijokodo', 'hhr krwebioywe 4ioue riouwei', '71288187.png', '2021-10-21 11:11:39'),
(14, 'Abdul-Azeez', 'Mordiyat', '09087652441', 'mordiyat@gmail.com', 'blemished', 4, 'Love', 'Oluyole Street, Ijokodo', 'khwi wehhwe wejkhie klwehioeq', '22637058.png', '2021-10-21 11:12:33'),
(15, 'Abdul-Azeez', 'Moryam', '0800735255373723', 'moree@gmail.com', 'imperfectly-perfect', 1, 'Delay', '19, Onajirin Street, Igbolomu, Ikorodu, Lagos-State', 'klher heriwer ihweiohwe ihweuihqwe', '72834275.png', '2021-10-21 11:13:29'),
(16, 'Abdul-Azeez', 'Sa\'ad', '090976524262', 'sadu@gmail.com', 'imperfectly-perfect', 3, 'Just', 'Oluyole Street, Ijokodo', 'dshhs sjkhieh weklhiowehioe', '83967938.png', '2021-10-21 11:15:11'),
(17, 'Abimbola', 'Fathia', '08097534566', 'fathia@gmail.com', 'imperfectly-perfect', 2, 'Love', 'Oluyole Street, Ijokodo', 'hrhiosw drjhweinkl', '67333688.png', '2021-10-21 11:30:54'),
(18, 'Ajide', 'Raimat', '09087678763', 'raimbabe@gmail.com', 'imperfectly-perfect', 3, 'Beauty', 'Oluyole Street, Ijokodo', 'We don;t have any special thing to say jhor', '63012346.png', '2021-10-26 11:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `chapter` varchar(50) NOT NULL,
  `createdat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `chapter`, `createdat`) VALUES
(1, 'Lagos State Chapter', '2021-10-21 10:03:23'),
(2, 'Ogun State Chapter', '2021-10-21 10:03:23'),
(3, 'Oyo State Chapter', '2021-10-21 10:03:28'),
(4, 'Osun State Chapter', '2021-10-21 10:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `message` text NOT NULL,
  `datesent` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `subject`, `message`, `datesent`) VALUES
(1, 'Tajudeen Modasola', 'aish@gmail.com', 'Love', 'I can\'t just erase you from my Mind', '2021-10-21 09:56:07'),
(2, 'Abdulhammed', 'zfuad6454@gmail.com', 'Contest', 'lhsdi sdjkhkd kashkha jkasbkj', '2021-10-21 14:03:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
