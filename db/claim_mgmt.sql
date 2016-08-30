-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 30, 2016 at 07:48 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `claim_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE IF NOT EXISTS `claims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apply_date` date NOT NULL,
  `Team_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ref_claim_status_id` int(11) NOT NULL,
  `is_submit` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_claims_Team_User1_idx` (`Team_id`,`User_id`),
  KEY `fk_claims_ref_claim_status1_idx` (`ref_claim_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `apply_date`, `Team_id`, `User_id`, `title`, `description`, `ref_claim_status_id`, `is_submit`) VALUES
(7, '0000-00-00', 1, 30, 'ravel claim', 'Travelled for project requirements.', 1, 1),
(8, '0000-00-00', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(9, '0000-00-00', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(10, '0000-00-00', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(11, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(12, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(13, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(14, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(15, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(16, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(17, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(18, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(19, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(20, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(21, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(22, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(23, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(24, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(25, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(26, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(27, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(28, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(29, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(30, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(31, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(32, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(33, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(34, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(35, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1),
(36, '2016-08-20', 1, 30, 'ravel claim', 'Travelled for project requirements.', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `claims_doc`
--

CREATE TABLE IF NOT EXISTS `claims_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_url` varchar(255) NOT NULL,
  `claims_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `upload_url_UNIQUE` (`upload_url`),
  KEY `fk_claims_doc_claims1_idx` (`claims_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `claims_doc`
--

INSERT INTO `claims_doc` (`id`, `upload_url`, `claims_id`) VALUES
(1, 'hbd.png', 34),
(2, 'clone_status.png', 34),
(3, 'claim_mgmt.sql', 34),
(5, '1472475955hbd.png', 36),
(6, '1472475955clone_status.png', 36),
(7, '1472475955claim_mgmt.sql', 36);

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE IF NOT EXISTS `Employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_id` int(11) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `mobile_number_UNIQUE` (`mobile_number`),
  KEY `fk_Employee_User_idx` (`User_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Permission`
--

CREATE TABLE IF NOT EXISTS `Permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `code_name_UNIQUE` (`code_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Permission`
--

INSERT INTO `Permission` (`id`, `name`, `code_name`) VALUES
(1, 'admin', 'create_user_post');

-- --------------------------------------------------------

--
-- Table structure for table `ref_claim_status`
--

CREATE TABLE IF NOT EXISTS `ref_claim_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ref_claim_status`
--

INSERT INTO `ref_claim_status` (`id`, `status`) VALUES
(1, 'Send for Approval'),
(2, 'Approved'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE IF NOT EXISTS `Role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`id`, `name`) VALUES
(1, 'admin'),
(3, 'employee'),
(2, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `Role_Permission`
--

CREATE TABLE IF NOT EXISTS `Role_Permission` (
  `Role_id` int(11) NOT NULL,
  `Permission_id` int(11) NOT NULL,
  PRIMARY KEY (`Role_id`,`Permission_id`),
  KEY `fk_Role_has_Permission_Permission1_idx` (`Permission_id`),
  KEY `fk_Role_has_Permission_Role1_idx` (`Role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Team`
--

CREATE TABLE IF NOT EXISTS `Team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Team`
--

INSERT INTO `Team` (`id`, `name`) VALUES
(1, 'team1'),
(2, 'team2');

-- --------------------------------------------------------

--
-- Table structure for table `Team_User_role`
--

CREATE TABLE IF NOT EXISTS `Team_User_role` (
  `Team_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Role_id` int(11) NOT NULL,
  PRIMARY KEY (`Team_id`,`User_id`),
  KEY `fk_Team_has_User_User1_idx` (`User_id`),
  KEY `fk_Team_has_User_Team1_idx` (`Team_id`),
  KEY `fk_Team_User_Role1_idx` (`Role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Team_User_role`
--

INSERT INTO `Team_User_role` (`Team_id`, `User_id`, `Role_id`) VALUES
(1, 30, 2),
(2, 30, 2),
(2, 31, 3);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `is_admin`, `is_active`, `last_login`) VALUES
(29, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '0000-00-00 00:00:00'),
(30, 'kovarthan', 'b0dd74fd8e568bd1d6d612aab0a318c3', 0, 1, '0000-00-00 00:00:00'),
(31, 'logu', 'b0dd74fd8e568bd1d6d612aab0a318c3', 0, 1, '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `fk_claims_ref_claim_status1` FOREIGN KEY (`ref_claim_status_id`) REFERENCES `ref_claim_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_claims_Team_User1` FOREIGN KEY (`Team_id`, `User_id`) REFERENCES `Team_User_role` (`Team_id`, `User_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `claims_doc`
--
ALTER TABLE `claims_doc`
  ADD CONSTRAINT `fk_claims_doc_claims1` FOREIGN KEY (`claims_id`) REFERENCES `claims` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `fk_Employee_User` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Role_Permission`
--
ALTER TABLE `Role_Permission`
  ADD CONSTRAINT `fk_Role_has_Permission_Permission1` FOREIGN KEY (`Permission_id`) REFERENCES `Permission` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Role_has_Permission_Role1` FOREIGN KEY (`Role_id`) REFERENCES `Role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Team_User_role`
--
ALTER TABLE `Team_User_role`
  ADD CONSTRAINT `fk_Team_has_User_Team1` FOREIGN KEY (`Team_id`) REFERENCES `Team` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Team_has_User_User1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Team_User_Role1` FOREIGN KEY (`Role_id`) REFERENCES `Role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
