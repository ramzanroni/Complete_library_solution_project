-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 07:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_project_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'mdramzanroni76@gmail.com', 'ramzan1298');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `quantity` int(200) NOT NULL,
  `department` varchar(222) NOT NULL,
  `image` text NOT NULL,
  `base_quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `edition`, `status`, `quantity`, `department`, `image`, `base_quantity`) VALUES
(1, 'The Lying Life of Adults', 'Neapolitan Novel', '3', 'available', 7, 'Business', '839441.jpg', 0),
(2, 'Rodham', 'Curtis Sittenfeld ', '1', 'available', 0, 'Politics', '750458.jpg', 0),
(3, 'Transcendent Kingdom: A Novel', 'Homegoing', '1', 'available', 7, 'Motivation', '495250.jpg', 0),
(4, 'The Glass Hotel: A novel', 'Emily St. John Mandel', '1', 'available', 13, 'Entertainment', '160429.jpg', 0),
(7, 'Woodstock', 'Janine Fallon-Mower', '4', 'available', 12, 'Motivation', '469745.jpg', 12),
(8, 'Mount Pleasant', ' Claudine Waterbury', '3', 'available', 7, 'Entertainment', '623450.jpg', 7),
(9, 'Klara and the Sun', 'Kazuo Ishiguro', '2', 'available', 12, 'Entertainment', '65580.jpg', 12),
(10, 'My Year Abroad: A Novel', 'Chang-Rae Lee', '4', 'available', 0, 'Motivation', '730166.jpg', 0),
(11, 'Detransition, Baby: A Novel', 'Torrey Peters', '1', 'available', 21, 'Entertainment', '196966.jpg', 21),
(12, 'Of Women and Salt', 'Gabriela Garcia', '2', 'available', 1, 'Inspersion', '995887.jpg', 1),
(13, 'Caul Baby', 'Nadia Owusu', '2', 'available', 12, 'Inspersion', '118644.jpg', 12),
(14, 'No One Is Talking About This', 'Patricia Lockwood', '1', 'available', 11, 'Story', '123796.jpg', 12),
(15, 'How Beautiful We Were', 'Imbolo Mbue', '1', 'available', 0, 'Entertainment', '347369.jpg', 0),
(16, 'The Removed', 'Brandon Hobson', '3', 'available', 2, 'Entertainment', '742619.jpg', 2),
(17, 'The Kindest Lie', 'Nancy Johnson', '2', 'available', 1, 'Story', '76122.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `status`) VALUES
(1, 'Ramzan Ali', 'mdramzanroni76@gmail.com', 'This is test....!', 1),
(2, 'Nafisa ', 'nafisayasmin17@gmail.com', 'This is Test', 1),
(3, 'Md. Juel Hossain', 'juelhossian466@gmail.com', 'Hello This is Test', 1),
(4, 'Ramzan', 'nafisayasmin17@gmail.com', 'Thsi is test....!', 1),
(5, 'Ramzan Ali', 'mdramzanroni76@gmail.com', 'Test', 0),
(6, 'Roni', 'mdramzanroni76@gmail.com', 'ok', 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(11) NOT NULL,
  `issue_id` int(255) NOT NULL,
  `book_id` int(20) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `status` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `fine` int(200) NOT NULL,
  `issue_date` date NOT NULL DEFAULT current_timestamp(),
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `issue_id`, `book_id`, `book_name`, `status`, `user_id`, `fine`, `issue_date`, `return_date`) VALUES
(1, 491327523, 3, 'Transcendent Kingdom: A Novel', 'success', 1, 735, '2021-03-22', '2021-04-21'),
(2, 365195635, 1, 'The Lying Life of Adults', 'success', 1, 695, '2021-03-30', '2021-04-17'),
(4, 782191904, 1, 'The Lying Life of Adults', 'accept', 2, 10, '2021-04-10', '0000-00-00'),
(5, 772129939, 3, 'Transcendent Kingdom: A Novel', 'accept', 2, 0, '2021-08-20', '0000-00-00'),
(6, 878208032, 14, 'No One Is Talking About This', 'success', 4, 0, '2021-04-24', '2021-04-24'),
(7, 748875098, 3, 'Transcendent Kingdom: A Novel', 'panding', 1, 0, '2021-08-20', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `institute` varchar(222) NOT NULL,
  `phone` int(40) NOT NULL,
  `student_id` int(40) NOT NULL,
  `semester` int(11) NOT NULL,
  `department` varchar(225) NOT NULL,
  `password` text NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `address`, `date_of_birth`, `gender`, `institute`, `phone`, `student_id`, `semester`, `department`, `password`, `status`) VALUES
(1, 'Ramzan Ali', 'mdramzanroni76@gmail.com', '603 Shamim Sharani Road, West Shewra para, Mirpur, Dhaka-1216', '2021-08-20', 'Male', 'Green University of Bangladesh', 1516158298, 191015111, 8, 'CSE', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
