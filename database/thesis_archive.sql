-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 03:58 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis_archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive_lists`
--

CREATE TABLE `archive_lists` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `user1` varchar(150) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive_lists`
--

INSERT INTO `archive_lists` (`id`, `title`, `year`, `batch`, `user1`, `added_at`) VALUES
(1, 'Online Booking System', '4th year', 'GAMMA', 'Mobarak Guro, Shantelle Knapp, Princess Lane, Chantal Foley', '2020-11-18 18:36:55'),
(2, 'RFID-based Attendance Monitoring with SMS Notification System', '3rd Year', 'DELTA', '', '2020-11-18 20:17:54'),
(3, 'RFID Enabled Passport Verification using C#.net', '2nd year', 'ALPHA', '', '2020-11-18 20:18:07'),
(4, 'GIS Based Information System for Construction Management using QGIS', '3rd Year', 'FALCON', '', '2020-11-18 20:18:19'),
(5, 'Automatic School Gate Opener using RFID Reader', '4th year', 'BETA', '', '2020-11-18 20:18:33'),
(6, 'Arduino Based Digital Temperature Sensor', '4th year', 'CHARLIE', '', '2020-11-18 20:18:52'),
(7, 'Fire alarm System using Arduino with SMS', '4th year', 'DELTA', '', '2020-11-18 20:19:03'),
(8, 'Coin Operated Car Wash System with Income Collection Report', '4th year', 'FALCON', '', '2020-11-18 20:19:15'),
(9, 'Online Grade Query with SMS and Mobile Support App (iOS, Android, Windows)', '4th year', 'DELTA', '', '2020-11-18 20:19:28'),
(10, 'Video Conferencing App in Android/iOS/Windows using Apache Cordova', '4th year', 'DELTA', '', '2020-11-18 20:20:12'),
(11, 'Mobile Based ePrescribing App with Admin Panel', '4th year', 'ALPHA', '', '2020-11-18 20:20:26'),
(12, 'Business Terminology Dictionary App', '4th year', 'ALPHA', '', '2020-11-18 20:20:37'),
(13, 'Mobile Based Weather Forecast Application using Open Weather Map API', '3rd Year', 'BETA', '', '2020-11-18 20:20:53'),
(14, 'Restaurant Locator using Zomato API', '3rd Year', 'CHARLIE', '', '2020-11-18 20:21:09'),
(15, 'Web-based Construction Project Management System', '2nd year', 'CHARLIE', '', '2020-11-18 20:21:35'),
(16, 'Web and Mobile Based School Publication System with Forum', '3rd Year', 'FALCON', '', '2020-11-18 20:21:51'),
(17, 'Web and Mobile Green House Management System', '3rd Year', 'GAMMA', '', '2020-11-18 20:22:03'),
(18, 'Web Based Language Teaching Program', '3rd Year', 'GAMMA', '', '2020-11-18 20:22:19'),
(19, 'Storage Luxury System', '3RD YEAR', 'GAMMA', '', '2020-11-18 22:16:32'),
(22, 'RFID Based Animal Identification System', 'SHS', 'DELTA', '', '2020-11-18 22:19:20'),
(23, 'English and Spelling Learning App in Android for Kinder Students', '3RD YEAR', 'FALCON', '', '2020-11-18 22:21:13'),
(24, 'Mobile app Hotel Reservation System with SMS Notification using iTexMo API', '1ST YEAR', 'ALPHA', '', '2020-11-18 22:23:20'),
(25, 'Arduino Base Digital Temperature Sensor', 'SHS', 'ALPHA', '', '2020-11-19 01:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `users_lists`
--

CREATE TABLE `users_lists` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_lists`
--

INSERT INTO `users_lists` (`id`, `username`, `password`, `access`) VALUES
(1, 'adminzane', 'admin123', 'admintrator'),
(2, 'user', 'pass123', 'user'),
(3, 'adminkuno', 'adminadmin', 'administrator'),
(4, 'student', 'student123', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive_lists`
--
ALTER TABLE `archive_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_lists`
--
ALTER TABLE `users_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archive_lists`
--
ALTER TABLE `archive_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_lists`
--
ALTER TABLE `users_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
