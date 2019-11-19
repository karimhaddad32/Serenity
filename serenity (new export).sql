-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 08:19 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serenity`
--
CREATE DATABASE IF NOT EXISTS `serenity` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `serenity`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `profile_id`, `description`, `street_address`, `city`, `province`, `postal_code`, `country_id`) VALUES
(3, 1, NULL, '123', 'Montreal', 'QC', NULL, 1),
(5, 1, 'sdsdf', 'sdfsd', 'sdf', 'sdfsdf', 'sdfsdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_type` varchar(50) NOT NULL,
  `category_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `chat_room_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `room_title` varchar(50) NOT NULL,
  `maximum_space` int(11) NOT NULL DEFAULT '30',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat_room_member`
--

CREATE TABLE `chat_room_member` (
  `member_id` int(11) NOT NULL,
  `chat_room_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chat_room_message`
--

CREATE TABLE `chat_room_message` (
  `chat_room_message_id` int(11) NOT NULL,
  `chat_room_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_content` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment_reaction`
--

CREATE TABLE `comment_reaction` (
  `comment_reaction_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `reaction_type_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'CA', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `diary_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_in` date NOT NULL,
  `diary_title` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diary_entry`
--

CREATE TABLE `diary_entry` (
  `diary_entry_id` int(11) NOT NULL,
  `diary_id` int(11) NOT NULL,
  `entry_title` varchar(30) NOT NULL,
  `entry` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `direct_message`
--

CREATE TABLE `direct_message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `favourited_post`
--

CREATE TABLE `favourited_post` (
  `favourited_post_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friend_link`
--

CREATE TABLE `friend_link` (
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `accepted` bit(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `relationship` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`user_id`, `username`, `password`, `email_address`) VALUES
(1, 'eliza', '$2y$10$xiGQvA9V3VaCO9LyB8eeUueDklPdSQg7kpDhgCMTpAaPoFp1zzZMG', 'eliza_gaudio@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `notification_type_id` int(11) NOT NULL,
  `notification_link` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seen` bit(1) NOT NULL,
  `opened` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification_type`
--

CREATE TABLE `notification_type` (
  `notification_type_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `caption` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `path` varchar(260) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `reference_link` varchar(256) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_content` text NOT NULL,
  `picture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post_reaction`
--

CREATE TABLE `post_reaction` (
  `post_reaction_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `reaction_type_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preferred_category`
--

CREATE TABLE `preferred_category` (
  `preferred_category_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `profile_style_id` int(11) DEFAULT NULL,
  `profile_picture` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `last_name`, `username`, `phone_number`, `gender`, `profile_style_id`, `profile_picture`) VALUES
(1, 'First', 'Last', 'Admin', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_style`
--

CREATE TABLE `profile_style` (
  `profile_style_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `background_image_id` int(11) DEFAULT NULL,
  `font_color_id` int(11) DEFAULT NULL,
  `font_style_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reaction_type`
--

CREATE TABLE `reaction_type` (
  `reation_type_id` int(11) NOT NULL,
  `reaction_description` varchar(30) NOT NULL,
  `reaction_shortcut` varchar(20) DEFAULT NULL,
  `reaction_path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `recommendation_id` int(11) NOT NULL,
  `recommender_id` int(11) NOT NULL,
  `recommnded_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `recommendation_type` varchar(50) NOT NULL,
  `recommendation_link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `re_post`
--

CREATE TABLE `re_post` (
  `re_post_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `re_poster_id` int(11) NOT NULL,
  `additional_content` varchar(256) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `re_post_comment`
--

CREATE TABLE `re_post_comment` (
  `comment_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `re_post_id` int(11) NOT NULL,
  `comment_content` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `re_post_comment_reaction`
--

CREATE TABLE `re_post_comment_reaction` (
  `re_post_comment_reaction_id` int(11) NOT NULL,
  `re_post_comment_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `reaction_type_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `target_type` varchar(20) NOT NULL,
  `target_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tagger_id` int(11) NOT NULL,
  `tagged_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comment_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `address_city_country_id_fk` (`country_id`),
  ADD KEY `address_profile_profile_id_fk` (`profile_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`chat_room_id`),
  ADD KEY `chat_room_category_cat_id_fk` (`category_id`),
  ADD KEY `chat_room_category_owner_id_fk` (`owner_id`);

--
-- Indexes for table `chat_room_member`
--
ALTER TABLE `chat_room_member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `chat_room_chat_member_chat_id_fk` (`chat_room_id`),
  ADD KEY `chat_room_profile_profile_id_fk` (`profile_id`);

--
-- Indexes for table `chat_room_message`
--
ALTER TABLE `chat_room_message`
  ADD PRIMARY KEY (`chat_room_message_id`),
  ADD KEY `chat_room_chat_message_chat_id_fk` (`chat_room_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_profile_profile_id_fk` (`profile_id`);

--
-- Indexes for table `comment_reaction`
--
ALTER TABLE `comment_reaction`
  ADD PRIMARY KEY (`comment_reaction_id`),
  ADD KEY `comment_reaction_comment_comment_id_fk` (`comment_id`),
  ADD KEY `comment_reaction_profile_profile_id_fk` (`profile_id`),
  ADD KEY `comment_react_react_type_type_id_fk` (`reaction_type_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`diary_id`),
  ADD KEY `diary_profile_profile_id_fk` (`profile_id`),
  ADD KEY `diary_cat_cat_id_fk` (`category_id`);

--
-- Indexes for table `diary_entry`
--
ALTER TABLE `diary_entry`
  ADD PRIMARY KEY (`diary_entry_id`),
  ADD KEY `diary_entry_diary_diary_id_fk` (`diary_id`);

--
-- Indexes for table `direct_message`
--
ALTER TABLE `direct_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `favourited_post`
--
ALTER TABLE `favourited_post`
  ADD PRIMARY KEY (`favourited_post_id`);

--
-- Indexes for table `friend_link`
--
ALTER TABLE `friend_link`
  ADD PRIMARY KEY (`sender_id`,`receiver_id`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `NONCLUSTERED` (`email_address`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_type`
--
ALTER TABLE `notification_type`
  ADD PRIMARY KEY (`notification_type_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_profile_profile_id_fk` (`profile_id`),
  ADD KEY `post_category_cat_id_fk` (`category_id`),
  ADD KEY `post_picture_pic_id_fk` (`picture_id`);

--
-- Indexes for table `post_reaction`
--
ALTER TABLE `post_reaction`
  ADD PRIMARY KEY (`post_reaction_id`),
  ADD KEY `post_react_react_type_react_type_id_fk` (`reaction_type_id`),
  ADD KEY `post_react_profile_profile_id_fk` (`profile_id`),
  ADD KEY `post_react_post_post_id_fk` (`post_id`);

--
-- Indexes for table `preferred_category`
--
ALTER TABLE `preferred_category`
  ADD PRIMARY KEY (`preferred_category_id`),
  ADD KEY `pref_category_profile_prof_id_fk` (`profile_id`),
  ADD KEY `pref_cat_category_cat_id_fk` (`category_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profile_prof_style_prof_style_id_fk` (`profile_style_id`),
  ADD KEY `prof_picture_prof_pic_fk` (`profile_picture`);

--
-- Indexes for table `profile_style`
--
ALTER TABLE `profile_style`
  ADD PRIMARY KEY (`profile_style_id`),
  ADD KEY `prof_style_prof_prof_id_fk` (`profile_id`),
  ADD KEY `prof_style_pic_back_pic_id_fk` (`background_image_id`);

--
-- Indexes for table `reaction_type`
--
ALTER TABLE `reaction_type`
  ADD PRIMARY KEY (`reation_type_id`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`recommendation_id`),
  ADD KEY `rec_post_post_id_fk` (`post_id`),
  ADD KEY `rec_prof_recommender_id_fk` (`recommender_id`),
  ADD KEY `rec_prof_recommended_id_fk` (`recommnded_id`);

--
-- Indexes for table `re_post`
--
ALTER TABLE `re_post`
  ADD PRIMARY KEY (`re_post_id`),
  ADD KEY `repost_post_post_id_fk` (`post_id`),
  ADD KEY `re_post_profile_profile_id_fk` (`re_poster_id`);

--
-- Indexes for table `re_post_comment`
--
ALTER TABLE `re_post_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `re_post_comm_profile_profile_id` (`profile_id`),
  ADD KEY `re_post_comm_re_post_post_id` (`re_post_id`);

--
-- Indexes for table `re_post_comment_reaction`
--
ALTER TABLE `re_post_comment_reaction`
  ADD PRIMARY KEY (`re_post_comment_reaction_id`),
  ADD KEY `re_post_comm_reac_reac_reac_id` (`reaction_type_id`),
  ADD KEY `re_post_comm_reac_re_post_comm_comm_id` (`re_post_comment_id`),
  ADD KEY `re_post_comm_reac_profile_profile_id` (`profile_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `subscription_profile_profile_id` (`profile_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `tag_profile_tagger_id` (`tagger_id`),
  ADD KEY `tag_profile_tagged_id` (`tagged_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `chat_room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_room_member`
--
ALTER TABLE `chat_room_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_room_message`
--
ALTER TABLE `chat_room_message`
  MODIFY `chat_room_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment_reaction`
--
ALTER TABLE `comment_reaction`
  MODIFY `comment_reaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `diary_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diary_entry`
--
ALTER TABLE `diary_entry`
  MODIFY `diary_entry_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `direct_message`
--
ALTER TABLE `direct_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourited_post`
--
ALTER TABLE `favourited_post`
  MODIFY `favourited_post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_link`
--
ALTER TABLE `friend_link`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_type`
--
ALTER TABLE `notification_type`
  MODIFY `notification_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_reaction`
--
ALTER TABLE `post_reaction`
  MODIFY `post_reaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferred_category`
--
ALTER TABLE `preferred_category`
  MODIFY `preferred_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_style`
--
ALTER TABLE `profile_style`
  MODIFY `profile_style_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reaction_type`
--
ALTER TABLE `reaction_type`
  MODIFY `reation_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `recommendation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_post`
--
ALTER TABLE `re_post`
  MODIFY `re_post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_post_comment`
--
ALTER TABLE `re_post_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `re_post_comment_reaction`
--
ALTER TABLE `re_post_comment_reaction`
  MODIFY `re_post_comment_reaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_city_country_id_fk` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
  ADD CONSTRAINT `address_profile_profile_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD CONSTRAINT `chat_room_category_cat_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `chat_room_category_owner_id_fk` FOREIGN KEY (`owner_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `chat_room_member`
--
ALTER TABLE `chat_room_member`
  ADD CONSTRAINT `chat_room_chat_member_chat_id_fk` FOREIGN KEY (`chat_room_id`) REFERENCES `chat_room` (`chat_room_id`),
  ADD CONSTRAINT `chat_room_profile_profile_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `chat_room_message`
--
ALTER TABLE `chat_room_message`
  ADD CONSTRAINT `chat_room_chat_message_chat_id_fk` FOREIGN KEY (`chat_room_id`) REFERENCES `chat_room` (`chat_room_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_profile_profile_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `comment_reaction`
--
ALTER TABLE `comment_reaction`
  ADD CONSTRAINT `comment_react_react_type_type_id_fk` FOREIGN KEY (`reaction_type_id`) REFERENCES `reaction_type` (`reation_type_id`),
  ADD CONSTRAINT `comment_reaction_comment_comment_id_fk` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`comment_id`),
  ADD CONSTRAINT `comment_reaction_profile_profile_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `diary`
--
ALTER TABLE `diary`
  ADD CONSTRAINT `diary_cat_cat_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `diary_profile_profile_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `diary_entry`
--
ALTER TABLE `diary_entry`
  ADD CONSTRAINT `diary_entry_diary_diary_id_fk` FOREIGN KEY (`diary_id`) REFERENCES `diary` (`diary_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_category_cat_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `post_picture_pic_id_fk` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `post_profile_profile_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `post_reaction`
--
ALTER TABLE `post_reaction`
  ADD CONSTRAINT `post_react_post_post_id_fk` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `post_react_profile_profile_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `post_react_react_type_react_type_id_fk` FOREIGN KEY (`reaction_type_id`) REFERENCES `reaction_type` (`reation_type_id`);

--
-- Constraints for table `preferred_category`
--
ALTER TABLE `preferred_category`
  ADD CONSTRAINT `pref_cat_category_cat_id_fk` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `pref_category_profile_prof_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `prof_picture_prof_pic_fk` FOREIGN KEY (`profile_picture`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `profile_prof_style_prof_style_id_fk` FOREIGN KEY (`profile_style_id`) REFERENCES `profile_style` (`profile_style_id`);

--
-- Constraints for table `profile_style`
--
ALTER TABLE `profile_style`
  ADD CONSTRAINT `prof_style_pic_back_pic_id_fk` FOREIGN KEY (`background_image_id`) REFERENCES `picture` (`picture_id`),
  ADD CONSTRAINT `prof_style_prof_prof_id_fk` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD CONSTRAINT `rec_post_post_id_fk` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`),
  ADD CONSTRAINT `rec_prof_recommended_id_fk` FOREIGN KEY (`recommnded_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `rec_prof_recommender_id_fk` FOREIGN KEY (`recommender_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `re_post`
--
ALTER TABLE `re_post`
  ADD CONSTRAINT `re_post_profile_profile_id_fk` FOREIGN KEY (`re_poster_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `repost_post_post_id_fk` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `re_post_comment`
--
ALTER TABLE `re_post_comment`
  ADD CONSTRAINT `re_post_comm_profile_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `re_post_comm_re_post_post_id` FOREIGN KEY (`re_post_id`) REFERENCES `re_post` (`re_post_id`);

--
-- Constraints for table `re_post_comment_reaction`
--
ALTER TABLE `re_post_comment_reaction`
  ADD CONSTRAINT `re_post_comm_reac_profile_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `re_post_comm_reac_re_post_comm_comm_id` FOREIGN KEY (`re_post_comment_id`) REFERENCES `re_post_comment` (`comment_id`),
  ADD CONSTRAINT `re_post_comm_reac_reac_reac_id` FOREIGN KEY (`reaction_type_id`) REFERENCES `reaction_type` (`reation_type_id`);

--
-- Constraints for table `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_profile_profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`profile_id`);

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_profile_tagged_id` FOREIGN KEY (`tagged_id`) REFERENCES `profile` (`profile_id`),
  ADD CONSTRAINT `tag_profile_tagger_id` FOREIGN KEY (`tagger_id`) REFERENCES `profile` (`profile_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
