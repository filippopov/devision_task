-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 11:05 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devision_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `crops` varchar(255) NOT NULL,
  `area` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`id`, `name`, `crops`, `area`) VALUES
(16, 'Wheat Field', 'wheat', 1245.9),
(17, 'Corn Field', 'Corn', 1890.3),
(18, 'Barley Field', 'Barley', 876.4),
(19, 'Reed Field', 'Reed', 657.45),
(20, 'Apple Field', 'Apple', 3243.8);

-- --------------------------------------------------------

--
-- Table structure for table `plot_tractor`
--

CREATE TABLE `plot_tractor` (
  `id` int(11) NOT NULL,
  `plot_id` int(11) NOT NULL DEFAULT '0',
  `area` float NOT NULL DEFAULT '0',
  `tractor_id` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plot_tractor`
--

INSERT INTO `plot_tractor` (`id`, `plot_id`, `area`, `tractor_id`, `date`) VALUES
(19, 16, 678, 63, '2018-03-28 13:55:00'),
(20, 16, 456, 65, '2018-03-28 12:50:00'),
(21, 19, 344, 65, '2018-03-27 12:40:00'),
(22, 20, 1235, 66, '2018-03-31 17:55:00'),
(23, 19, 333, 65, '2018-04-03 12:50:00'),
(24, 19, 222, 62, '2018-05-16 11:25:00'),
(25, 17, 1090.6, 65, '2018-06-06 12:50:00'),
(26, 18, 677, 63, '2018-03-29 00:45:00'),
(27, 17, 122, 62, '2018-06-07 11:45:00'),
(28, 18, 444, 64, '2018-03-29 16:50:00'),
(29, 17, 1222, 63, '2018-03-30 21:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `tractors`
--

CREATE TABLE `tractors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tractors`
--

INSERT INTO `tractors` (`id`, `name`) VALUES
(62, 'tractor1'),
(63, 'tractor2'),
(64, 'tractor3'),
(65, 'tractor4'),
(66, 'tractor5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(18, 'Filip', '$2y$13$4w/4/6B.mWxLqrlNouyxUOvD6cj3/SFimfzvvT5KYxStP.mAxRssy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `plot_tractor`
--
ALTER TABLE `plot_tractor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_plot_tractor_plots` (`plot_id`),
  ADD KEY `FK_plot_tractor_tractors` (`tractor_id`);

--
-- Indexes for table `tractors`
--
ALTER TABLE `tractors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `plot_tractor`
--
ALTER TABLE `plot_tractor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tractors`
--
ALTER TABLE `tractors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `plot_tractor`
--
ALTER TABLE `plot_tractor`
  ADD CONSTRAINT `FK_plot_tractor_plots` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`id`),
  ADD CONSTRAINT `FK_plot_tractor_tractors` FOREIGN KEY (`tractor_id`) REFERENCES `tractors` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
