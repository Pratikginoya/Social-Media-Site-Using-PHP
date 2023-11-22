-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 02:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pratik_social_media_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `user`, `friend_id`) VALUES
(6, 3, 10),
(10, 3, 15),
(11, 10, 9),
(12, 9, 10),
(13, 10, 3),
(14, 15, 3),
(15, 9, 15),
(16, 15, 9),
(17, 11, 3),
(18, 3, 11),
(19, 11, 15),
(20, 15, 11),
(21, 13, 9),
(22, 9, 13),
(23, 13, 15),
(24, 15, 13),
(25, 10, 15),
(26, 15, 10);

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`id`, `from`, `to`) VALUES
(12, 3, 14),
(75, 13, 4),
(85, 10, 3),
(129, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message_by` int(11) NOT NULL,
  `message_to` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message_by`, `message_to`, `message`) VALUES
(1, 15, 3, 'hello'),
(4, 15, 3, 'hello'),
(5, 3, 15, 'hello'),
(22, 15, 3, 'sdfsaf'),
(23, 3, 15, 'hii'),
(32, 15, 3, 'hii'),
(33, 15, 3, 'hii'),
(34, 3, 11, 'heelo'),
(62, 3, 15, 'helo'),
(88, 3, 11, 'Hii'),
(104, 3, 11, 'gsdfg'),
(105, 3, 11, 'gdfg'),
(106, 3, 11, 'sdfgdgf'),
(107, 3, 11, 'gfghsd'),
(108, 3, 11, 'sdfgdfg'),
(119, 3, 11, 'wqasd'),
(120, 3, 11, 'gxvzxv'),
(129, 15, 3, 'Heeloooo'),
(130, 15, 3, 'asdfsaf'),
(131, 15, 3, 'sdfsadf'),
(132, 9, 10, 'hii'),
(133, 9, 10, 'hello\r\n'),
(134, 9, 10, 'How are you...?'),
(135, 9, 15, 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` text NOT NULL,
  `music` text NOT NULL,
  `image` text NOT NULL,
  `video` text NOT NULL,
  `camera` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `user_id`, `text`, `time`, `music`, `image`, `video`, `camera`) VALUES
(18, 15, 'Hello....', 'Sep,26 2023 03:17:35 PM', '', '', '', '614626-09-2023-11-47-488a0290a5d049fa4c0c3ce988758102ca.jpg'),
(19, 14, 'Hello.....How are you..?', 'Sep,26 2023 03:26:10 PM', '', '675526-09-2023-11-56-30pexels-anjana-c-674010.jpg', '', ''),
(20, 13, 'Hello.....\r\nDo you want to buy it..?', 'Sep,26 2023 03:26:35 PM', '', '768326-09-2023-11-57-19s-half-triangel-black-one-nb-nicky-boy-original-imagmhzyv6b64vfb.jpeg', '', ''),
(21, 3, 'Hello', 'Sep,26 2023 03:28:11 PM', '', '', '', '414926-09-2023-11-58-331.jpg'),
(22, 12, 'sdfasf', 'Sep,26 2023 03:29:05 PM', '', '', '', ''),
(23, 11, 'Hello', 'Sep,26 2023 03:30:28 PM', '', '49226-09-2023-12-05-11pexels-anjana-c-674010.jpg', '', ''),
(24, 10, 'Hello', 'Sep,27 2023 06:45:22 PM', '', '', '903727-09-2023-15-16-12.mp4', ''),
(25, 9, 'Hello', 'Sep,27 2023 06:55:56 PM', '', '', '363927-09-2023-15-26-44a.mp4', ''),
(26, 3, 'Hello', 'Sep,27 2023 07:02:20 PM', '', '', '794127-09-2023-15-33-06video_preview_h264 (2).mp4', ''),
(27, 3, 'Hello', 'Sep,29 2023 04:32:31 PM', '', '', '', '476929-09-2023-13-02-42about-01.jpg'),
(28, 3, 'Hello', 'Sep,29 2023 04:32:42 PM', '', '159429-09-2023-13-02-58gallery-03.jpg', '', ''),
(29, 9, 'Hello', 'Sep,30 2023 11:08:00 AM', '', '668230-09-2023-07-38-47about-01.jpg', '', ''),
(30, 9, 'Hellow', 'Oct,02 2023 05:49:17 PM', '', '872602-10-2023-14-19-48blog-02.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `cmt_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `cmt_by` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `cmt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`cmt_id`, `post_id`, `cmt_by`, `reply_by`, `cmt`) VALUES
(98, 24, 9, 0, 'Good Morning...'),
(102, 30, 15, 0, 'hello'),
(103, 23, 11, 0, 'helo'),
(104, 23, 11, 0, 'hii'),
(113, 28, 11, 0, 'hii...'),
(114, 27, 11, 0, 'hii'),
(116, 26, 11, 0, 'ok'),
(120, 26, 11, 0, 'hii'),
(122, 21, 11, 0, 'hi'),
(123, 23, 11, 0, 'hii'),
(124, 23, 11, 0, 'hiii'),
(125, 23, 11, 0, 'ok'),
(150, 18, 9, 0, 'hii'),
(158, 25, 9, 0, 'Hii'),
(168, 21, 3, 0, 'hii'),
(170, 24, 3, 0, 'Hellow.... How are you...?'),
(171, 28, 3, 0, 'sfasf'),
(172, 28, 3, 0, 'sdfasdf'),
(175, 27, 3, 0, 'Gm');

-- --------------------------------------------------------

--
-- Table structure for table `user_register`
--

CREATE TABLE `user_register` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `profile_pic` text NOT NULL DEFAULT 'default001.jpg',
  `cover_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_register`
--

INSERT INTO `user_register` (`id`, `name`, `username`, `password`, `gender`, `email`, `profile_pic`, `cover_pic`) VALUES
(3, 'Pratik Ginoya', 'p r ginoya', 'admin@1234', 'Male', 'pratikginoya194@gmail.com', 'banner-02.jpg', ''),
(4, 'Admin', 'admin', 'admin1', 'Male', 'admin@g.com', 'default001.jpg', ''),
(9, 'Raj', 'raj', 'raj123', 'Male', 'raj@g.com', 'gallery-03.jpg', ''),
(10, 'Ajay', 'ajay', 'ajay123', 'Male', 'ajay@g.com', 'default001.jpg', ''),
(11, 'Vijay', 'vijay', 'vijay123', 'Male', 'vijay@g.com', 'default001.jpg', ''),
(12, 'Akshay', 'akshay', 'akshay123', 'Male', 'akshay@g.com', 'default001.jpg', ''),
(13, 'Vishal', 'vishal', 'vishal123', 'Male', 'vishal@g.com', 'default001.jpg', ''),
(14, 'Niraj', 'niraj', 'niraj123', 'Male', 'niraj@g.com', 'default001.jpg', ''),
(15, 'Kishan', 'kishan', 'kishan123', 'Male', 'kishan@g.com', 'product-03.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
