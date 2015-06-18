-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: May 27, 2015 at 04:50 PM
=======
-- Generation Time: May 25, 2015 at 06:55 AM
>>>>>>> master
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `g-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE IF NOT EXISTS `assessment` (
  `assessment_id` int(255) NOT NULL AUTO_INCREMENT,
  `assessment_name` varchar(100) NOT NULL,
  `total_marks` int(255) NOT NULL,
  `assessment_status` varchar(100) NOT NULL,
  `drill_id` int(255) NOT NULL,
  `teacher_id` int(255) NOT NULL,
  `school_id` int(255) NOT NULL,
<<<<<<< HEAD
  PRIMARY KEY (`assessment_id`),
=======
  PRIMARY KEY (`assessment_id`,`teacher_id`),
>>>>>>> master
  KEY `FK_assessment_drill` (`drill_id`),
  KEY `FK_assessment_teacher` (`teacher_id`),
  KEY `FK_assessment_school` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`assessment_id`, `assessment_name`, `total_marks`, `assessment_status`, `drill_id`, `teacher_id`, `school_id`) VALUES
<<<<<<< HEAD
(2, 'A1', 10, '1', 1, 40, 1),
(3, 'A2', 10, '1', 1, 40, 1);
=======
(1, 'Test1', 10, '0', 1, 47, 1),
(2, 'T2', 20, '0', 1, 47, 1),
(3, 'TT2', 30, '0', 1, 47, 1);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `assessment_log`
--

CREATE TABLE IF NOT EXISTS `assessment_log` (
  `student_id` int(255) NOT NULL,
  `question_id` int(255) NOT NULL,
  `assessment_id` int(255) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `answer_status` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`,`question_id`,`assessment_id`),
  KEY `FK_assessment_log_question` (`question_id`),
  KEY `FK_assessment_log_assessment` (`assessment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drill`
--

CREATE TABLE IF NOT EXISTS `drill` (
  `drill_id` int(255) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(1000) NOT NULL,
  `drill_name` varchar(150) NOT NULL,
  `drill_description` varchar(1000) DEFAULT NULL,
  `drill_story` varchar(2000) DEFAULT NULL,
  `drill_path` varchar(300) NOT NULL,
  `drill_image` varchar(100) NOT NULL,
  PRIMARY KEY (`drill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `drill`
--

INSERT INTO `drill` (`drill_id`, `topic_name`, `drill_name`, `drill_description`, `drill_story`, `drill_path`, `drill_image`) VALUES
(1, 'Addition', 'Endless Adder', 'Teaches the concept of Addition', 'Help Mike, the city boy, to master the art of addition by collecting the correct numbers in order to reach the required sum.', 'games/runner', 'assets/images/runner_banner.jpg'),
(2, 'Subtraction', 'Life of a Bee', 'Practice your concepts of Subtraction', 'Dora the honey bee is in danger, there are spiders everywhere. She needs hep finding her correct home.', 'games/LifeofBee', 'assets/images/lifeofbee.png'),
(3, 'Highest/Lowest', 'Balloon Party', 'Teaches the concept of Highest / Lowest numbers', 'This is a simple beach party game, find the required balloon to win as fast as you can.', 'games/balloon_party', 'assets/images/BalloonParty_tile.png'),
(4, 'Even/Odd', 'Catchy', 'Teaches the concept of Even / Odd numbers', 'Hank has been given a task to catch the apples with even numbers on them. Help him master the art of even numbers.', 'games/play_cachy_even_odd', 'assets/images/catchy-tile.png'),
(6, 'Multiples', 'Catchy', 'Teaches the concept of multiples of a number', 'Jack loves this game to find multiples of a number. Help him catch the apple having multiple of given number.', 'games/play_cachy_multiples_of_5', 'assets/images/catchy-tile-2.png'),
(7, 'Ascending', 'Speed Racer', 'Teaches the concept of Ascending Order of Numbers', 'Help Flinstone learn driving by picking up numbers in Ascending order.', 'games/racerAscending', 'assets/images/racergame.png'),
(8, 'Descending', 'Speed Racer', 'Teaches the concept of Descending Order of Numbers', 'Help Flinstone learn driving by picking up numbers in Descending order.', 'games/racerDescending', 'assets/images/racergame.png');

-- --------------------------------------------------------

--
-- Table structure for table `gamelogic`
--

CREATE TABLE IF NOT EXISTS `gamelogic` (
  `log_id` int(255) NOT NULL AUTO_INCREMENT,
  `complexity_level` int(50) NOT NULL,
  `percentage` double NOT NULL,
  `drill_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `FK_game_student` (`student_id`),
  KEY `FK_game_drill` (`drill_id`)
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `gamelogic`
--

INSERT INTO `gamelogic` (`log_id`, `complexity_level`, `percentage`, `drill_id`, `student_id`) VALUES
(1, 2, 55, 2, 42),
(2, 2, 34, 1, 45),
(3, 2, 0, 1, 45),
(4, 2, 0, 1, 45),
(5, 2, 0, 1, 45),
(6, 0, 3, 3, 45),
(7, 2, 0, 1, 45),
(8, 2, 2, 1, 45),
(9, 2, 2, 1, 45);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `gradesheet`
--

CREATE TABLE IF NOT EXISTS `gradesheet` (
  `student_id` int(255) NOT NULL,
  `assessment_id` int(255) NOT NULL,
  `marks_obtained` int(20) NOT NULL,
  PRIMARY KEY (`student_id`,`assessment_id`),
  KEY `FK_gradesheet_assessment` (`assessment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradesheet`
--

INSERT INTO `gradesheet` (`student_id`, `assessment_id`, `marks_obtained`) VALUES
<<<<<<< HEAD
(37, 2, 8),
(37, 3, 9),
(41, 2, 10),
(41, 3, 10);
=======
(37, 1, 10),
(37, 2, 5),
(45, 2, 10),
(46, 1, 5),
(46, 2, 10);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `person_id` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `parent_password` varchar(100) NOT NULL,
  `school_id` int(255) NOT NULL,
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_login_school` (`school_id`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`person_id`, `username`, `password`, `type`, `parent_password`, `school_id`) VALUES
(32, 'admin', 'dbavOTe8181uxXKLxigyFmZGibTzmLK1k7CTMvBxmDbr8Mf6e1qM2xhZdKvh1D5bhkfLHSsQMSsBLy9FbXc1NQ==', 'admin', '', 1),
<<<<<<< HEAD
(37, 'adil', 'ePwCxbdzxwXRKnT8E5peb0RBksKmu/BmAbn7laE+wXeZfCSem1ySINhfV5hMiTsFw21cqw4EBTDkVdm8i2WkzQ==', 'student', 'du1CLaWIFWg7oHs1xOwKmkcsEDtJOavJzwegvmbZO4O6IqiW0kgW3xlKoYIcHhOabQfXhLVeGxZn6ZS3E8LR7w==', 1),
(40, 'Adil Sarwar', 'byFNDjdAW7dZIM+WIzcBcVsH/atGKKS4qU93ztB8hBiltBt77gCsAGNqBu+Ip7e5+6bKiCq2fKo66IkYHpTUfg==', 'teacher', '', 1),
(41, 'Tahla Naveed', 'VKL0GE9EFaVmaF0n5IMjZ5AXdcWuvS61BSbWcOFXdx4+N077yxIekLLBdGKGh0vY6NX5h6oIqnlMO0AoGpKHLw==', 'student', 'WgJUi81p6eIaSLO2rbQnbmvOdgm50Juefww8ASYmhP/MIEGQj1iF7BWoqKL8Oze+l8hdkE1wiefANTIDzZffgQ==', 1),
(47, 'talha', 'KRPLous5nDlasKMWvu43AOF1aFsG3RCW9dq36/dvZ4SvGMULbOZiqXCB2dOa+UKYRdKmk9iQO1WzQEZ04+bMQw==', 'student', 'VZahN9sPlQHNmoHTd626cp3ITkCHhBqu+ZWl+ED9+UU7B8pm27OX9iReybvzUbRQk9TaDFFiKB8mcnNEuOm3Gg==', 1),
(53, 'yasir', 'Ppvq0eKkGmhX/bmTiju7N+ABzdpABW8NDRzDJzZpeHQlym6Y+rqD/n489h5si2F+kWYy+4Un5mkwFvBzjZsjWA==', 'student', 'tbVSZm2ieD+2n8pvfUFA1ycqhv6aExt1Pc4klPh/TaSLoIXXxk9EPEf52qPJ2f/DDThzq1d+8KeOGNfTQRUgpA==', 2);
=======
(37, 'adil', 'du1CLaWIFWg7oHs1xOwKmkcsEDtJOavJzwegvmbZO4O6IqiW0kgW3xlKoYIcHhOabQfXhLVeGxZn6ZS3E8LR7w==', 'student', 'sPb2WMKFDGf8UXfH6hDKgZGFVDZ3hzKYoQgrIJxOijpbCsVkjmaHPY01xRVsu/HkcM2pePwQHm/HkpCloisQgQ==', 1),
(39, 'adilteacher', 'yV6L4sDh5MWeYlK675Zqx7s9eJCEM5vHU2qY47IjulCMqTzFOpTbSQdJcaktEup4A5xLFYZ+XUa/mTd2Zq9lRg==', 'teacher', '', 1),
(40, 'adit', 'byFNDjdAW7dZIM+WIzcBcVsH/atGKKS4qU93ztB8hBiltBt77gCsAGNqBu+Ip7e5+6bKiCq2fKo66IkYHpTUfg==', 'teacher', '', 1),
(41, 'tahla', 'nxRIQz/XKJf3Un6nNpq/2eDQGDJaLorCjAa3Yd/9y9uGXv/JlkbgEq4sETefoMtDOpU2KSuGXlVjUgjM6M5s4A==', 'student', 'WgJUi81p6eIaSLO2rbQnbmvOdgm50Juefww8ASYmhP/MIEGQj1iF7BWoqKL8Oze+l8hdkE1wiefANTIDzZffgQ==', 1),
(42, 'raheel', 'LhvKlXdlYvXFgXvOxMjLxZyZwB3vbZgp5tc5Aiu8C7DYqfwAA4yBa85byj/1cxOVGFEnNRDWyy6EtAp7RB0lFQ==', 'student', 'z8fN64zUuHANdeUrAf8Jx43Uk4NUbb+zf1tzcLiEGsJEv833I0hdtxdYPd2CMTGZgn2JQyL40MDCTRD9pusktQ==', 1),
(43, 'zaid', 'Qcp2qbXj9s/6TeSK/Zs1vyNwmPFThYq08asuXugIMzsyTYKJP64NlVqSYv32HDEFgycQTtUzpHiGT+zzWY/aGw==', 'student', 'N2NdvL9h0ibZbnXlcCA73uoZ0JUtEracoN0PSiueiOo91b9YjmtFVkLxdkcOkkQvhqRs9LI96iD8rTmogBgO9A==', 1),
(44, 'teach', 'jt2nsCq/D14XcGYhQ4ef3hGkahlogENkru9QFs4TPXtm7AOsdO9SCMzSPDNStW7FX0UHj9U/r8VWEXqiUpmEZw==', 'teacher', '', 1),
(45, 'trix', 'WBEZuGgE6byRry98PyZgX1mOqmdEGwun5SMn96hJKyCHXpxe/gyP3JLNJTzk4P1f132Vu2KlkreyWj1VJ4PqOw==', 'student', 'k3+mgHcVKog0JOQLNsFJc2QLh74hPZwCWKosFm/zZcSq0BqfD37UdFnVQBbtbTWkwGYiMXqyWTHxzYcQrm5pUQ==', 1),
(46, 'adil123', 'FKR1J6NFMNsceGQUzrJmm311QdBuWdYnaRKo2bejxA5bXdtYU9tPmnQkp8/DqHGsuJQt1HpPaU2t3QP85qPEIw==', 'student', '4Ebq3TI8ysQxg+LxJZGHK9joxtWOIIBgDO03Bp9R9u/MgsZCwcZ0x6lVNxfMWoMNyh2283a1+WBkCTAfaOUkFw==', 1),
(47, 'teacher', '/ugzT2V09Egu6eRhKD7Z3Zh0YqFCo9ufbf1Kj+QIOxqQoak2l6AjjNZuSIb7jyC+g2So9ej+J3I81bisU9fvlw==', 'teacher', '', 1),
(48, 'teacher2', 'ejkrQ9aNQH98iXvo10FR5M7Z73XFiVaupKInaNXJkWpjpJkQ5O8WAKzTUNzvimdBfYO9HVlqAaM5Jmmkd5vSCA==', 'teacher', '', 1);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `password_requests`
--

CREATE TABLE IF NOT EXISTS `password_requests` (
  `request_id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `request_date` date NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `username` (`username`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `password_requests`
--

INSERT INTO `password_requests` (`request_id`, `username`, `request_date`) VALUES
(1, 'teacher2', '2015-05-24');
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
<<<<<<< HEAD
  `email` varchar(100) NOT NULL,
  `pic_path` varchar(100) NOT NULL,
  `level_in_game` int(11) NOT NULL DEFAULT '0',
  `drill_level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;
=======
  `ContactNumber` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `level_in_game` int(11) NOT NULL DEFAULT '0',
  `drill_level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;
>>>>>>> master

--
-- Dumping data for table `person`
--

<<<<<<< HEAD
INSERT INTO `person` (`person_id`, `first_name`, `last_name`, `address`, `email`, `pic_path`, `level_in_game`, `drill_level`) VALUES
(32, 'zain', 'malak', 'cantt', 'xyz@malik.com', '', 0, 1),
(37, 'Adil', 'Sarwar', 'haiders home', 'Adil.sarwar11l4405@Gmail.com', 'student_pic.png', 1, 1),
(40, 'Adil', 'sarwar', 'wapda town', 'adi@yahoo.com', '', 0, 1),
(41, 'Talha', 'Naveed', 'lkjasd', 'talhanaveed123@gmail.com', 'student_pic.png', 1, 2),
(47, 'Talha', 'Naveed', 'Valencia', 'Talha@gmail.com', 'student_pic.png', 0, 6),
(53, 'Yaisr', 'shah', 'Lahore', 'yasir@gmail.com', 'student_pic.png', 0, 1);
=======
INSERT INTO `person` (`person_id`, `first_name`, `last_name`, `address`, `ContactNumber`, `email`, `level_in_game`, `drill_level`) VALUES
(32, 'zain', 'malak', 'cantt', '03347563256', 'xyz@malik.com', 0, 0),
(37, 'Adil', 'Sarwar', 'haiders home', NULL, 'adil@gmail.com', 0, 0),
(39, 'Adil', 'Sarwar', 'wapda', NULL, 'adiboy@gmail.com', 0, 0),
(40, 'Adil', 'sarwar', 'wapda town', NULL, 'adi@yahoo.com', 0, 0),
(41, 'Talha', 'Naveed', 'lkjasd', NULL, 'talha@naveed.com', 0, 0),
(42, 'Raheel', 'Sarwar', 'Wapda Town', NULL, 'raheel@gmail.com', 0, 0),
(43, 'zaid', 'tariq', 'wapda town', NULL, 'zain@gmail.com', 0, 0),
(44, 'teacher', 'aaaa', 'asdasda', NULL, 'teach@gmail.com', 0, 0),
(45, 'Talha', 'Naveed', 'House #118, Block H-1 P.E.C.H.S Valancia Lahore, Pakistan', NULL, 'talhanaveed123@gmail.com', 2, 4),
(46, 'Talha', 'Khan', 'House #118, Block H-1 P.E.C.H.S Valancia Lahore, Pakistan', NULL, 'talhanaveed1as23@gmail.com', 0, 0),
(47, 'test', 'teacher', 'test', NULL, 'test@hotmail.com', 0, 0),
(48, 'Test2', ' ', 'test2', NULL, 'test2@hotmail.com', 0, 0);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(255) NOT NULL AUTO_INCREMENT,
  `statement` varchar(1000) NOT NULL,
  `option1` varchar(1000) DEFAULT NULL,
  `option2` varchar(1000) DEFAULT NULL,
  `option3` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) NOT NULL,
  `complexity_level` int(50) NOT NULL,
  `question_status` varchar(50) NOT NULL,
  `assessment_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `assessment_id` (`assessment_id`)
<<<<<<< HEAD
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `statement`, `option1`, `option2`, `option3`, `answer`, `complexity_level`, `question_status`, `assessment_id`) VALUES
(1, '2+2', '2', '1', '4', '4', 1, '0', 1),
(2, '3+10', '11', '5', '20', '13', 1, '0', 2),
(3, '2+3', '2', '1', '4', '5', 1, '0', 2),
(4, '40+11', '61', '31', '53', '51', 1, '0', 3),
(5, '20+32', '34', '31', '62', '52', 1, '0', 3),
(6, '10+50', '10', '32', '40', '60', 1, '0', 3);
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `school_id` int(255) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(100) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`) VALUES
(1, 'Educators'),
(2, 'BeaconHouse'),
(3, 'Fast-Nu');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `FK_assessment_drill` FOREIGN KEY (`drill_id`) REFERENCES `drill` (`drill_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_assessment_school` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_assessment_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assessment_log`
--
ALTER TABLE `assessment_log`
  ADD CONSTRAINT `FK-assessment_log_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_assessment_log_assessment` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`assessment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_assessment_log_student` FOREIGN KEY (`student_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gamelogic`
--
ALTER TABLE `gamelogic`
  ADD CONSTRAINT `FK_game_drill` FOREIGN KEY (`drill_id`) REFERENCES `drill` (`drill_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_game_student` FOREIGN KEY (`student_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gradesheet`
--
ALTER TABLE `gradesheet`
  ADD CONSTRAINT `FK_gradesheet_assessment` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`assessment_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_gradesheet_student` FOREIGN KEY (`student_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_login` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_login_school` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password_requests`
--
ALTER TABLE `password_requests`
  ADD CONSTRAINT `password_requests_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_assid_question` FOREIGN KEY (`assessment_id`) REFERENCES `assessment` (`assessment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
