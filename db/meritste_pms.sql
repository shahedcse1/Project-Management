-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 11:53 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meritste_pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigndata`
--

CREATE TABLE IF NOT EXISTS `assigndata` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `assign_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigndata`
--

INSERT INTO `assigndata` (`id`, `task_id`, `assign_id`) VALUES
(10, 55, 57),
(11, 55, 58),
(12, 56, 66),
(14, 54, 72),
(17, 59, 73),
(18, 59, 74),
(27, 60, 73),
(28, 60, 74),
(29, 60, 80),
(30, 60, 81);

-- --------------------------------------------------------

--
-- Table structure for table `completionstatus`
--

CREATE TABLE IF NOT EXISTS `completionstatus` (
  `id` int(11) NOT NULL,
  `completion_status` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `completionstatus`
--

INSERT INTO `completionstatus` (`id`, `completion_status`, `description`, `date`) VALUES
(1, 'Task On Progress', '', '2019-02-13 14:22:34'),
(2, 'Task  Complete', '', '2019-02-13 14:22:34'),
(3, 'Task Close', '', '2019-02-17 12:43:21');

-- --------------------------------------------------------

--
-- Table structure for table `followupdata`
--

CREATE TABLE IF NOT EXISTS `followupdata` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `followup_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followupdata`
--

INSERT INTO `followupdata` (`id`, `task_id`, `followup_id`) VALUES
(6, 55, 49),
(7, 56, 65),
(9, 54, 49),
(11, 59, 49),
(20, 60, 49),
(21, 60, 76),
(22, 60, 77),
(23, 60, 79);

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE IF NOT EXISTS `priority` (
  `id` int(11) NOT NULL,
  `priority_name` varchar(100) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `priority_name`, `description`, `date`) VALUES
(1, 'Low', NULL, '2019-02-11 17:26:49'),
(2, 'Medium', NULL, '2019-02-11 17:26:49'),
(3, 'High', NULL, '2019-02-11 17:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `status`, `priority`, `location`, `description`, `file_name`, `created_date`, `created_by`) VALUES
(11, 'TEKNAF 01', 1, 3, 'TEKNAF, COX''S BAZAR\r\nTEKNAF BATTALION (2 BGB)', '# Border Surveillance and Response System (BSRS)\r\n# Project Coverage Area:\r\n   * Sabrang BOP\r\n   * Sahaporirdwip BOP\r\n   * Jaliapara\r\n   * 2 Battalion HQ', 'TEKNAF-100519-A-4-.jpg', '2019-06-11 08:39:48', '1234'),
(12, 'DNJ-01 (DINAJPUR)', 1, 3, 'Dinajpur\r\nJoypurhat Battalion (20 BGB)', '# Border Surveillance and Response System (BSRS)\r\n#Project Coverage Area:\r\n    *Hili BOP\r\n  ', 'DINAJPUR.jpg', '2019-06-11 07:49:44', '1234'),
(13, 'HSS-01 to HSS-08 (HAPANIA)', 1, 3, 'Nouga, Hapania\r\nHapania Battalion (16 BGB)', '# Border Surveillance and Response System (BSRS)\r\n#Project Coverage Area:\r\n    *Hapania BOP', 'Hapania-ill-160519.jpg', '2019-06-11 07:51:14', '1234'),
(15, 'VEHICLE SCANNER (AMRAKHALI)', 1, 3, 'Jessore\r\nJessore Battalion (49 BGB)', 'Amrakhali', '', '2019-06-11 06:56:35', '1234'),
(16, 'PUTKHALI-BSRS', 1, 3, 'Jessore\r\nKhulna Battalion (21 BGB)', '# Border Surveillance and Response System (BSRS)\r\n#Project Coverage Area:\r\n    *Putkhali ', 'putkhali.JPG', '2019-06-11 08:25:58', '1234'),
(17, 'NTMC', 1, 3, 'Dhaka', '#NTMC:\r\n  *Bagage Scanner\r\n  *Transtile\r\n  *Network Jammer\r\n  *Bollard', '', '2019-06-11 11:44:19', '1234'),
(18, 'IUB-Access Control', 1, 3, 'Dhaka', '#IUB-\r\n   *Bagage Scanner\r\n   *Transtile\r\n   *RFID\r\n\r\n', '', '2019-06-11 11:32:58', '1234'),
(19, 'MINISTRY', 1, 3, 'Dhaka', '#MINISTRTY:\r\n   *Bagage Scanner\r\n   *RFID\r\n   *Thermal Image Camera\r\n   *Transtile', '', '2019-06-11 11:42:21', '1234'),
(20, 'CNJ-01 (Chapainawabganj)', 1, 3, 'Chapainawabganj\r\nChapainawabganj Battalion (53 BGB)', '# Border Surveillance and Response System (BSRS)\r\n#Project Coverage Area:\r\n    *Johurpur\r\n    *Bakerali', 'Chapai-160519.jpg', '2019-06-11 07:56:41', '1234'),
(21, 'TEKNAF-Ext', 1, 3, 'Cox''s Bazar\r\nCox''s Bazar Battalion (34 BGB)', '# Border Surveillance and Response System (BSRS)\r\n#Project Coverage Area:\r\n    *Ghumdum BOP\r\n    *Tumbru BOP', 'cox.jpg', '2019-06-11 08:42:54', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL,
  `task_name` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `report_to` int(11) NOT NULL,
  `assign_by` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `completion` int(11) NOT NULL DEFAULT '1',
  `completion_startDate` date NOT NULL,
  `completion_endDate` date NOT NULL,
  `comments` varchar(255) NOT NULL,
  `progress` int(11) DEFAULT NULL,
  `progress_details` varchar(256) DEFAULT NULL,
  `evaluation` int(11) DEFAULT NULL,
  `closeDate` date DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_name`, `status`, `priority`, `report_to`, `assign_by`, `project_id`, `type`, `completion`, `completion_startDate`, `completion_endDate`, `comments`, `progress`, `progress_details`, `evaluation`, `closeDate`, `created_by`, `created_date`) VALUES
(54, 'test', 1, 3, 49, 49, 0, 1, 3, '2019-03-14', '2019-03-14', 'test', 60, NULL, 4, '2019-03-25', '1234', '2019-03-20 11:41:34'),
(55, 'rezwana ', 1, 2, 49, 49, 0, 1, 3, '2019-02-26', '2019-02-26', 'test', 100, NULL, 5, '2019-03-04', '1234', '2019-03-10 06:26:46'),
(56, 'Test task', 1, 3, 65, 65, 0, 1, 2, '2019-03-10', '2019-03-30', '', 60, NULL, NULL, '0000-00-00', '1234', '2019-03-11 17:55:20'),
(59, 'Test Data', 1, 2, 49, 49, 0, 1, 1, '2019-03-06', '2019-03-06', '', NULL, NULL, NULL, NULL, '1234', '2019-03-21 09:10:13'),
(60, 'test', 1, 2, 76, 76, 0, 1, 1, '2019-06-18', '2019-06-18', 'wswswsws', 20, NULL, NULL, '0000-00-00', '1234', '2019-06-26 08:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `tasktype`
--

CREATE TABLE IF NOT EXISTS `tasktype` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasktype`
--

INSERT INTO `tasktype` (`id`, `type_name`, `description`, `date`) VALUES
(1, 'Individual', '', '2019-02-13 14:35:16'),
(2, 'Project Wise', '', '2019-02-13 14:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `role_name`, `description`) VALUES
(1, 'Site Admin', 'Site Setup'),
(2, 'Super Admin', 'Super Admin'),
(3, 'User', 'Viewer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_pin` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `random_salt` varchar(32) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_pin`, `name`, `email`, `random_salt`, `password`, `phone`, `status`, `role`, `image_path`, `created_by`, `created_date`) VALUES
(49, '1234', 'Rezwana Rashid', '1234', 'a8fcaa98f67d941037173e42d7be606d', 'bd2f44f1d8c732778bc6a34b8c0394803bb0add0c37f27a82c75eb543bf5a6ae', '9', 1, 1, 's34804l__1.jpg', '1234', '2019-06-23 07:47:11'),
(73, '8', '1234', 'rashidrezwana6@gmail.com', 'f1563caa8b9092cdbeca52f2abe918c0', '6b450e953ec115892f2ed11d7de8273f1aadba030917a6f1d5031c4718279d59', '01931429384', 1, 3, 'login.png', '8', '2019-03-20 06:13:11'),
(74, '12345', 'Test User', 'rashidrezwana6@gmail.com', '74b0a5f98699cd2653eb0f1f3e60cb4b', '744bbed7ac6d3c34d9b8e1f0f0e7b1ca235e02ee7241c9658eff25cc5f70244b', '01931429384', 1, 3, 'login.png', '12345', '2019-03-21 03:09:21'),
(75, '1324', 'Irin Akter', 'irindiu15@gmail.com', 'dc9469ef18dcc0cb467d488d00c3d0ce', '1db4902638545879ae959d7a2c8fa549190a2a596954b556c70fd68ac3387aeb', '01515216902', 1, 2, 'Page0001.jpg', '1324', '2019-06-11 23:08:53'),
(76, '5874', 'Md. Iftekhar Kabir', 'iftekhar@meritstec.com', '57b55908ff2a322a4aa3c1baee5a7f33', 'ccd20d81ddb79db98ff6220ee67d56fbea03b5ce083a924137fa12807b77ca30', '01732433833', 1, 1, 'login.png', '1234', '2019-06-10 05:05:30'),
(77, '0987', 'Md. Shahadat Hoissain', 'shaoun@meritstec.com', 'c72c767deda28e1568229d2546e46821', 'ac5fbfc7176b9c29dc9331216ac05d7851a5792ad3a1ade0f34af7bdcaf0e3bf', '01715777774', 1, 1, 'login.png', '1234', '2019-06-10 05:06:35'),
(78, '4321', 'Toriqul Islam (Pappu)', 'pappu.toriqul@yahoo.com', 'cadb77eaae0e84436830eef915cf1353', 'd90503b5921eb4cd94e80e362cb877c6f3b012b28bf72fc3590edd66eca8b777', '01710130092', 1, 2, 'ACLD-138608 copy.jpg', '1234', '2019-06-11 04:15:28'),
(79, '1357', 'Md. Sajjatul Islam (Metoo)', 'sajjatul@meritstec.com', '46b81ece4e436f2a56a86caee73591a3', '56ba603e4389cc6ccf4b4993ff5de258568f644166acab48891a4d69269131de', '01710908885', 1, 1, 'login.png', '1234', '2019-06-18 06:19:16'),
(80, '3157', 'MD. HABIBUR RAHMAN', 'habibiiuc@gmail.com', '03d8169145cc8364de0ac24730f6d12b', '9b5f724e1c1eb5dce2b55c21102c9f3ddda0ac93d0f34666e0262893a179eca2', '01718583396', 1, 3, 'login.png', '1234', '2019-06-10 22:40:50'),
(81, '5678', 'AZHARUL ISLAM ZIHAD', 'zihad.aust@gmail.com', 'd9fd58d14bdc915a6c75d804467a3798', '78ecc3b3f83aad5ff804d8936578b68cf705557f61e5eec0f0d2fe97f3ae4971', '01672693138', 1, 3, 'login.png', '1234', '2019-06-10 22:49:58'),
(82, '3421', 'MD. SOHEL KHAN', 'sohelk90bd@gmail.com', '4a980c9b67da2afb0f92f3c73820dfc5', '08b1b0dc5d69b0e5261ba64504418ae8e1b9dd848bbf1364349ab7a035d29a06', '01734513630', 1, 3, 'login.png', '1234', '2019-06-10 22:55:09'),
(83, '3214', 'MD. MONIR HOSSAIN', 'monirahmed595@gmail.com', '6664f8e01f8624d2ad4beb4f138fcae6', 'e9d4a4800adf008a5a45546b276dbccd100f8e620313b24a4444511172557520', '01680189150', 1, 3, 'login.png', '1234', '2019-06-10 23:01:28'),
(84, '1112', 'MD. RAJIBUL ISLAM', 'rajibislam2709@gmail.com', '6cf25dba6ed05f24c5814bac19257520', '82743da127bf4bcd57ef6ae9850862be2463902991dec66888c2dd23be518b8a', '01675312738', 1, 3, 'login.png', '1234', '2019-06-10 23:05:35'),
(85, '1113', 'MD. MASUM BILLAH', 'mbillah029@gmail.com', 'df1471151f83888084ecaadb292d6e8f', 'fcacd362bf07af319b7fa1da15a4460f066921e9b07e08402b99a300f8b0e4ed', '01751476346', 1, 3, 'login.png', '1234', '2019-06-10 23:09:20'),
(86, '1378', 'ALTAF HOSSAIN', 'mdaltaf49@gmail.com', '866727f6a8f4faeb59c62db68c22c5cd', '1dce78208efac3bd0d1bead05f7e5bf407c7b2e9482b13d9530eeca9c97af4d7', '01771425517', 1, 3, 'login.png', '1234', '2019-06-10 23:25:35'),
(87, '2567', 'NAZIM UDDIN', 'nazimuddin3967@gmail.com', '31f65213e9fcb1ced207010f7723cab5', 'e0df94485499965e7542625688a3999f4a224b6e8d3f8c4fe1a3cd13b751ef81', '01886968000', 1, 3, 'login.png', '1234', '2019-06-10 23:27:41'),
(88, '2788', 'MD. MAHIR HASAN CHOWDHURY', 'mahirhasanchowdhury@gmail.com', '67f9c42d37c62d3dc11d9cfdc1ccf65c', 'b607fd4f17ef5341e838142244db830ae729678f9ad0b1b533d5625cc6e9f2a9', '01305780160', 1, 3, 'login.png', '1234', '2019-06-10 23:36:01'),
(89, '6987', 'TANVIR AHMED', 'tanvirst3@gmail.com', '236fa013e1397a814ed087621a3c06f1', '13ae592bf573f849bd602c20a674fddf0a15efcf6e839da79972c6b867d40f54', '01851474026', 1, 3, 'login.png', '1234', '2019-06-10 23:52:40'),
(90, '7766', 'MD. ARICK HASAN RANA', 'hasanarickpro@gmail.com', 'a1f229a2a6af0ba111fa435bccd633a7', 'c322ebcf9c0acca2a3506596244a5ebc38bae52d54d176b89c930e359177bd10', '01713581933', 1, 3, 'login.png', '1234', '2019-06-11 00:10:47'),
(91, '2987', 'SOHEL RANA', 'sohelrana23983@gmail.com', 'd594a4fbdb724064cc00bb0664e2a6e4', '260264313a2afc35a5150df161f9a721edbe5eb8d3cce2786bfcdb2d742e32b5', '01718002628', 1, 3, 'login.png', '1234', '2019-06-11 00:17:22'),
(92, '7689', 'MD. SHAFIQUZZAMAN', 'shamim.shafiquzzaman@gmil.com', 'f18ec13d5d0280bb529d798f643190f4', 'a02a6313baec705dda42ae9f492e1098c8780f4afe5ccd2f5c7f92e463b15cf8', '01729589582', 1, 3, 'login.png', '1234', '2019-06-11 00:21:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigndata`
--
ALTER TABLE `assigndata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completionstatus`
--
ALTER TABLE `completionstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followupdata`
--
ALTER TABLE `followupdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasktype`
--
ALTER TABLE `tasktype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigndata`
--
ALTER TABLE `assigndata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `completionstatus`
--
ALTER TABLE `completionstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `followupdata`
--
ALTER TABLE `followupdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tasktype`
--
ALTER TABLE `tasktype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
