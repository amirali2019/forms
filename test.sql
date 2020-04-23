-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 09:44 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answers` varchar(600) NOT NULL,
  `form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answers`, `form_id`, `user_id`) VALUES
(1, 23, 'Aamir Ali', 34, 0),
(2, 24, 'Masood Ali', 34, 0),
(3, 25, '[\"Iron Man\",\"Thor\"]', 34, 0),
(4, 26, 'Male', 34, 0),
(5, 23, 'Aamir Ali', 34, 1),
(6, 24, 'dfsgdfgsdfg', 34, 1),
(7, 25, '[\"Thor\",\"Hulk\"]', 34, 1),
(8, 26, 'Male', 34, 1),
(9, 27, 'His Transformation.', 0, 0),
(10, 28, '[\"Goten\",\"Gohan\",\"Vageta\",\"Goku\"]', 0, 0),
(11, 27, 'His Transformation.', 0, 0),
(12, 28, '[\"Goten\",\"Gohan\",\"Vageta\",\"Goku\"]', 0, 0),
(13, 27, 'His Transformation.', 0, 0),
(14, 28, '[\"Goten\",\"Gohan\",\"Vageta\",\"Goku\"]', 0, 0),
(15, 27, 'His Transformation.', 35, 1),
(16, 28, '[\"Goten\",\"Trunks\",\"Gohan\"]', 35, 1),
(17, 27, 'His Super Sayian Transformation.', 35, 2),
(18, 28, '[\"Boo\",\"Trunks\",\"Gohan\",\"Vageta\",\"Goku\"]', 35, 2),
(19, 23, 'Faizan Ali', 34, 2),
(20, 24, 'Masood Ali', 34, 2),
(21, 25, '[\"Thor\"]', 34, 2),
(22, 26, 'Male', 34, 2),
(23, 27, 'His Transformation.', 35, 5),
(24, 28, '[\"Boo\",\"Trunks\",\"Vageta\"]', 35, 5),
(25, 29, 'Amir Ali', 36, 5),
(26, 30, '[\"Iron Man\",\"Hulk\"]', 36, 5),
(27, 31, 'Answer', 37, 5),
(28, 32, '[\"dfsgdsfgdfg\",\"fdgsdfgdfgds\"]', 37, 5);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(300) NOT NULL,
  `user_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `title`, `description`, `user_id`) VALUES
(34, 'Personal Information', 'Enter About yourself', 0),
(35, 'Dragon Ball Z', 'Enter Dragon Ball Z Information', 0),
(36, 'Demo Form', 'Form Description Demo', 0),
(37, 'Information Form', 'Form Description', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `text` varchar(250) NOT NULL,
  `form_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `options` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `text`, `form_id`, `type_id`, `options`) VALUES
(23, 'What is Your Name', 34, 1, ''),
(24, 'What is Your Fathers Name', 34, 1, ''),
(25, 'Select Marvels Avenger', 34, 2, '[\"Iron Man\",\"Thor\",\"Hulk\"]'),
(26, 'Select Gender', 34, 4, '[\"Female\",\"Male\"]'),
(27, 'What is so cool about Goku', 35, 1, ''),
(28, 'Select Your Favorite Characters ', 35, 2, '[\"Boo\",\"Goten\",\"Trunks\",\"Gohan\",\"Vageta\",\"Krilin\",\"Goku\"]'),
(29, 'What is Your Name', 36, 1, ''),
(30, 'Select Marvel Avengers', 36, 2, '[\"Iron Man\",\"Thor\",\"Hulk\"]'),
(31, 'wqeqeqwewqe', 37, 1, ''),
(32, 'qweqweqwe', 37, 2, '[\"dfsgdsfgdfg\",\"dsgdfsgdfg\",\"fdgsdfgdfgds\"]');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `input_type` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `input_type`) VALUES
(1, 'text'),
(2, 'checkbox'),
(3, 'radio'),
(4, 'dropdown');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
