-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 01:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `blockID` int(11) NOT NULL,
  `blockerID` int(11) NOT NULL,
  `blockedID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `blockOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`blockID`, `blockerID`, `blockedID`, `status`, `blockOn`) VALUES
(3, 10, 14, 0, '2020-01-14 01:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `comment_parent_id` int(11) NOT NULL,
  `commentReplyID` decimal(20,0) NOT NULL,
  `replyID` decimal(20,0) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `commentOn` int(11) NOT NULL,
  `commentBy` decimal(20,0) NOT NULL,
  `commentAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `followOn` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `messageTo` int(11) NOT NULL,
  `messageFrom` int(11) NOT NULL,
  `messageOn` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `ID` int(11) NOT NULL,
  `notificationFor` int(11) NOT NULL,
  `notificationFrom` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `type` enum('postReact','commentReact','comment','share','message','request','mention') NOT NULL,
  `notificationOn` datetime NOT NULL,
  `notificationCount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `friendStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `notificationFor`, `notificationFrom`, `postid`, `type`, `notificationOn`, `notificationCount`, `status`, `friendStatus`) VALUES
(1, 10, 11, 1, 'postReact', '2023-07-04 09:56:59', 0, 0, 0),
(2, 11, 10, 8, 'postReact', '2023-07-04 13:50:07', 0, 0, 0),
(3, 10, 11, 9, 'postReact', '2023-07-04 13:51:09', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `post` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `postBy` int(11) DEFAULT NULL,
  `sharedFrom` int(11) DEFAULT NULL,
  `shareId` int(11) DEFAULT NULL,
  `sharedBy` int(11) DEFAULT NULL,
  `postImage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `imageId` text DEFAULT NULL,
  `likesCount` int(11) DEFAULT NULL,
  `shareCount` int(11) DEFAULT NULL,
  `postedOn` datetime DEFAULT NULL,
  `shareText` text DEFAULT NULL,
  `profilePhoto` text DEFAULT NULL,
  `coverPhoto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `userId`, `post`, `postBy`, `sharedFrom`, `shareId`, `sharedBy`, `postImage`, `imageId`, `likesCount`, `shareCount`, `postedOn`, `shareText`, `profilePhoto`, `coverPhoto`) VALUES
(1, 10, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 10, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-06-21 13:08:51', NULL, NULL, NULL),
(8, 11, 'Hi, this is me ayushi <img alt=\"👋\" class=\"emojioneemoji\" src=\"https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f44b.png\">', 11, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-07-04 09:52:56', NULL, NULL, NULL),
(9, 10, '<img alt=\"😁\" class=\"emojioneemoji\" src=\"https://cdn.jsdelivr.net/emojione/assets/3.1/png/32/1f601.png\">', 10, NULL, NULL, NULL, '', NULL, NULL, NULL, '2023-07-04 10:01:25', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `currentCity` varchar(255) DEFAULT NULL,
  `shortBio` text DEFAULT NULL,
  `aboutYou` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `profilePic` text DEFAULT NULL,
  `coverPic` text DEFAULT NULL,
  `politicalViews` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `highSchool` text DEFAULT NULL,
  `college` text DEFAULT NULL,
  `university` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `workplace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `professional` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `otherPlace` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `socialLink` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `relationship` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `quotes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `otherName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `lifeEvent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `userId`, `currentCity`, `shortBio`, `aboutYou`, `birthday`, `firstName`, `lastName`, `profilePic`, `coverPic`, `politicalViews`, `religion`, `highSchool`, `college`, `university`, `country`, `website`, `language`, `hometown`, `gender`, `workplace`, `professional`, `otherPlace`, `address`, `socialLink`, `relationship`, `quotes`, `otherName`, `lifeEvent`) VALUES
(6, 10, NULL, NULL, NULL, '1998-02-02', 'Ayush', 'Chaturvedi', 'user/10/profilePhoto/1674402775386.jpg', 'user/10/coverPhoto/4.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'male', '', '', '', '', '', '', '', '', ''),
(7, 11, NULL, NULL, NULL, '1999-02-28', 'Ayushi', 'Jaiswal', 'assets/image/defaultProfile.png', 'assets/image/defaultCover.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'female', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `reactID` int(11) NOT NULL,
  `reactBy` int(11) NOT NULL,
  `reactOn` int(11) NOT NULL,
  `reactCommentOn` int(11) NOT NULL,
  `reactReplyOn` int(11) NOT NULL,
  `reactType` enum('like','love','haha','wow','sad','angry') CHARACTER SET utf8 NOT NULL,
  `reactTimeOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `react`
--

INSERT INTO `react` (`reactID`, `reactBy`, `reactOn`, `reactCommentOn`, `reactReplyOn`, `reactType`, `reactTimeOn`) VALUES
(40, 10, 9, 0, 0, 'love', '2023-07-04 13:49:43'),
(41, 10, 8, 0, 0, 'love', '2023-07-04 13:50:07'),
(43, 11, 8, 0, 0, 'sad', '2023-07-04 13:50:54'),
(44, 11, 9, 0, 0, 'haha', '2023-07-04 13:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestid` int(11) NOT NULL,
  `reqtReceiver` int(11) NOT NULL,
  `reqtSender` int(11) NOT NULL,
  `reqStatus` int(11) NOT NULL,
  `requestOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`, `user_id`) VALUES
(28, 'f70cd6d5173a17e5e432ae45939fbece0a4ff9d7', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `screenName` varchar(255) NOT NULL,
  `userLink` text NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `screenName`, `userLink`, `email`, `mobile`, `password`, `birthday`, `gender`) VALUES
(10, 'Ayush', 'Chaturvedi', 'ayush_chaturvedi', 'ayush_chaturvedi', NULL, '9993832158', '$2y$10$J8vpWjtmGKCkwJd76f62ueG.HhkRSGvWKWfpg.Bd7JhlZttEDhcmm', '1998-02-02', 'male'),
(11, 'Ayushi', 'Jaiswal', 'ayushi_jaiswal', 'ayushi_jaiswal', 'ayushchaturvedi789@gmail.com', NULL, '$2y$10$MceQETtjc1Do0NTHWgjtheXkUcdyaVp.dAXBZplHfFIfoZRFsYKNS', '1999-02-28', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`blockID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `postForien` (`userId`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profileForein` (`userId`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`reactID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `blockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `reactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `postForien` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profileForein` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
