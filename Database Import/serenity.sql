-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 03:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

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
(7, 2, 'home address', '740 boulvard montpelier, 1211', 'Montréal', 'Quebec', 'H4L 5B1', 1),
(8, 2, 'asdasd', '995 Boulevard Jules Poitras Saint-Laurent', 'Montréal', 'QC', 'H4N 3M2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_type` varchar(50) NOT NULL,
  `category_description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_type`, `category_description`) VALUES
(1, 'Anxiety', 'Anything that has to do with Anxiety falls into this category. There\'s Generalized Anxiety Disorder, Social Anxiety Disorder, Post-Traumatic Stress Disorder and Obsessive-Compulsive Disorder. Panic Disorder and Agoraphobia also falls here.'),
(2, 'Depression', 'Anything in relation to Depression falls here. For example, Manic Depression or Chronic Depression. '),
(3, 'Bipolar Disorder', 'This category encompasses anything that\'s in relation to being Bipolar. '),
(4, 'Schizophrenia', 'If you are schizophrenic, anything in relation to that will be part of this category. '),
(5, 'Eating Disorder', 'If you struggle with any of the 4 eating disorders (Anorexia, Bulimia, etc.), this category is for you. '),
(6, 'Personality Disorder', 'Information for Personality Disorders will be classified under this category. '),
(7, 'Substance Abuse Disorder', 'If you struggle with Substance Abuse, all the information you may require will fall under this category. '),
(8, 'Impulse Disorder', 'Struggling with an Impulse Disorder? Here\'s the category for you! '),
(9, 'Neurodevelopment Disorder', 'Going through a Neurodevelopment Disorder? This category will explain everything you need to know, from ADHD to Autism. ');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `chat_room_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `room_title` varchar(50) NOT NULL,
  `maximum_space` int(11) NOT NULL DEFAULT 30,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`chat_room_id`, `category_id`, `owner_id`, `room_title`, `maximum_space`, `timestamp`) VALUES
(1, 1, 2, 'asd', 20, '2019-12-04 19:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room_member`
--

CREATE TABLE `chat_room_member` (
  `member_id` int(11) NOT NULL,
  `chat_room_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat_room_message`
--

INSERT INTO `chat_room_message` (`chat_room_message_id`, `chat_room_id`, `sender_id`, `message`, `timestamp`) VALUES
(1, 1, 2, 'asd', '2019-12-04 19:35:40'),
(2, 1, 2, 'test', '2019-12-04 19:35:43'),
(3, 1, 1, 'asd', '2019-12-04 19:36:05'),
(4, 1, 1, 'asdasd', '2019-12-04 19:36:12'),
(5, 1, 1, 'but I don\'t care!', '2019-12-04 19:36:23'),
(6, 1, 1, '', '2019-12-04 19:36:36'),
(7, 1, 3, 'gsdz', '2019-12-05 23:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_content` varchar(256) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `profile_id`, `post_id`, `comment_content`, `timestamp`) VALUES
(1, 2, 1, 'asdasdasd asd', '2019-12-05 19:05:27'),
(2, 3, 7, 'asdasdasdasd', '2019-12-05 19:08:15'),
(3, 3, 7, 'asdasdasdasd', '2019-12-05 19:18:14'),
(4, 2, 29, 'Hello world', '2019-12-06 14:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `comment_reaction`
--

CREATE TABLE `comment_reaction` (
  `comment_reaction_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `reaction_type_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_reaction`
--

INSERT INTO `comment_reaction` (`comment_reaction_id`, `comment_id`, `profile_id`, `reaction_type_id`, `timestamp`) VALUES
(1, 2, 3, 1, '2019-12-06 02:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(3) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaija'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrai'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Beni'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhuta'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'B', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroo'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'C', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czechia'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolita'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabo'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'G', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'H', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'I', 'India'),
(100, 'IM', 'Isle of Ma'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japa'),
(111, 'JO', 'Jorda'),
(112, 'KZ', 'Kazakhsta'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzsta'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebano'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstei'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'M', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'A', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oma'),
(167, 'PK', 'Pakista'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'P', 'Pitcair'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunio'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federatio'),
(183, 'RW', 'Rwanda'),
(184, 'K', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'S', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spai'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelo'),
(206, 'SD', 'Suda'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Swede'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwa'),
(214, 'TJ', 'Tajikista'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'T', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenista'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekista'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'V', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yeme'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `diary_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_in` date NOT NULL,
  `diary_title` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`diary_id`, `profile_id`, `last_modified`, `created_in`, `diary_title`, `category_id`) VALUES
(3, 1, '2019-11-21 17:09:35', '0000-00-00', 'newer', 1),
(5, 1, '2019-11-21 17:21:05', '0000-00-00', 'title', 1),
(6, 1, '0000-00-00 00:00:00', '0000-00-00', 'New Diary', 1),
(7, 2, '2019-12-04 12:29:06', '2019-12-04', 'Test Diary', 2),
(9, 3, '2019-12-05 22:10:36', '2019-12-05', 'Not actually a diary. it is a shopping list', 1),
(11, 4, '2019-12-06 04:47:04', '2019-12-06', 'new diary', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diary_entry`
--

CREATE TABLE `diary_entry` (
  `diary_entry_id` int(11) NOT NULL,
  `diary_id` int(11) NOT NULL,
  `entry_title` varchar(30) NOT NULL,
  `entry` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diary_entry`
--

INSERT INTO `diary_entry` (`diary_entry_id`, `diary_id`, `entry_title`, `entry`, `timestamp`) VALUES
(1, 7, 'asd', 'asd', '2019-12-04 15:00:05'),
(3, 9, 'asd', 'asd', '2019-12-05 22:13:25'),
(4, 9, 'my life', 'hi, this is me', '2019-12-05 23:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `direct_message`
--

CREATE TABLE `direct_message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `direct_message`
--

INSERT INTO `direct_message` (`message_id`, `sender_id`, `receiver_id`, `message_content`, `timestamp`) VALUES
(1, 2, 1, 'asd', '2019-12-04 19:35:17'),
(2, 1, 2, 'asdasd asd asd asd asd ', '2019-12-04 20:48:33'),
(3, 2, 1, 'hello sir', '2019-12-05 16:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `favourited_post`
--

CREATE TABLE `favourited_post` (
  `favourited_post_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friend_link`
--

CREATE TABLE `friend_link` (
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `relationship` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friend_link`
--

INSERT INTO `friend_link` (`sender_id`, `receiver_id`, `accepted`, `timestamp`, `relationship`) VALUES
(2, 1, 1, '2019-12-04 12:54:03', 'Friends'),
(3, 1, 1, '2019-12-05 18:00:39', 'Friends'),
(3, 2, 1, '2019-12-06 14:19:00', 'Friends'),
(3, 4, 0, '2019-12-06 14:18:51', 'Friends');

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
(1, 'eliza', '$2y$10$xiGQvA9V3VaCO9LyB8eeUueDklPdSQg7kpDhgCMTpAaPoFp1zzZMG', 'eliza_gaudio@hotmail.com'),
(2, 'karim', '$2y$10$AOtodv0lD7iPDNinZ7thk.pONWJiRm2rnsAkhSvvlZr7n904fdFY6', 'karim.haddad@hotmail.com'),
(3, 'karim1', '$2y$10$kqD2V2Teax0Xon7xujZ6/eZaU4j5pYDMJY6lGY5B9DN/BMgtS1Sea', 'karim.haddad32@gmail.com'),
(4, 'loriana', '$2y$10$ZEzy1laiWSq6nXtGG.3pRO9efN1ECln0rYVaSIhf4sIpoKouqpLKm', 'loriana.maxim@hotmail.com');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `caption`, `location`, `path`, `timestamp`) VALUES
(1, '1', '1', '1', '2019-11-21 16:10:59'),
(2, NULL, NULL, 'images/5de6b0b71c741.jpg', '2019-12-03 19:00:07'),
(3, NULL, NULL, 'images/5de93b8dc7cdb.png', '2019-12-05 17:17:01'),
(4, NULL, NULL, 'images/5de93bb53681b.png', '2019-12-05 17:17:41'),
(5, NULL, NULL, 'images/5de93bbf4dab1.png', '2019-12-05 17:17:51'),
(6, NULL, NULL, 'images/5de947260b7a2.jpg', '2019-12-05 18:06:30'),
(7, NULL, NULL, 'images/5de993f3992b7.jpg', '2019-12-05 23:34:11'),
(8, NULL, NULL, 'images/5de982880c2ea.', '2019-12-05 22:19:52'),
(9, NULL, NULL, 'images/5de9cdef06037.jpg', '2019-12-06 03:41:35'),
(10, NULL, NULL, 'images/5dea58cfe0c58.png', '2019-12-06 13:34:07');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_content` text NOT NULL,
  `picture_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `profile_id`, `type`, `reference_link`, `category_id`, `timestamp`, `post_content`, `picture_id`) VALUES
(1, 1, 'Public Blog', '2', 1, '2019-12-05 19:04:56', '1', 1),
(4, 2, 'Status Update', NULL, 1, '2019-12-05 16:32:26', 'asd', NULL),
(5, 2, 'Status Update', NULL, 1, '2019-12-05 16:33:29', 'asd', NULL),
(6, 2, 'Status Update', NULL, 1, '2019-12-05 16:34:32', 'asd', NULL),
(7, 2, 'Public Blog', 'asd', 1, '2019-12-05 16:34:36', 'asd', NULL),
(8, 2, 'Private Blog', 'asd', 1, '2019-12-05 16:34:55', 'asd', NULL),
(9, 2, 'Quote Post', NULL, 2, '2019-12-05 17:17:51', '', 5),
(24, 3, 'Status Update', NULL, 6, '2019-12-05 22:59:35', ',knlk', NULL),
(25, 3, 'Status Update', NULL, 1, '2019-12-05 23:32:22', 'this semester got me like', NULL),
(27, 3, 'Private Blog', NULL, 1, '2019-12-06 13:28:55', ' What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL),
(28, 3, 'Public Blog', NULL, 6, '2019-12-06 13:31:00', ' What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL),
(29, 3, 'Quote Post', NULL, 2, '2019-12-06 13:34:07', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `post_reaction`
--

CREATE TABLE `post_reaction` (
  `post_reaction_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `reaction_type_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_reaction`
--

INSERT INTO `post_reaction` (`post_reaction_id`, `post_id`, `profile_id`, `reaction_type_id`, `timestamp`) VALUES
(1, 7, 3, 4, '2019-12-06 02:51:36');

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
(1, 'First', 'Last', 'Admin', NULL, NULL, NULL, NULL),
(2, 'karim', 'haddad', 'karim', '514-961-5959', 'karim', NULL, 2),
(3, 'karim1', 'yes', 'no', '555-555-5555', 'okay', NULL, 7),
(4, 'Karim', 'Haddad', 'KarimTheBeardedMerman', '111-111-1111', 'f', NULL, 9);

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

--
-- Dumping data for table `reaction_type`
--

INSERT INTO `reaction_type` (`reation_type_id`, `reaction_description`, `reaction_shortcut`, `reaction_path`) VALUES
(1, 'Like', NULL, 'thumbs_up.png'),
(2, 'Dislike', NULL, 'thumbs_down.png'),
(3, 'Love', NULL, 'heart_icon.png'),
(4, 'Hate', NULL, 'broken_heart.png'),
(5, 'Happy', NULL, 'happy.png'),
(6, 'Sad', NULL, 'sad.png'),
(7, 'Angry', NULL, 'angry.png');

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `recommendation_id` int(11) NOT NULL,
  `recommender_id` int(11) NOT NULL,
  `recommended_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `recommendation_type` varchar(50) DEFAULT NULL,
  `recommendation_link` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`recommendation_id`, `recommender_id`, `recommended_id`, `post_id`, `recommendation_type`, `recommendation_link`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 3, 1, 1, NULL, NULL),
(3, 3, 1, 9, NULL, NULL),
(4, 3, 1, 1, NULL, NULL),
(5, 3, 1, 1, NULL, NULL),
(6, 3, 1, 9, NULL, NULL),
(7, 3, 1, 29, NULL, NULL),
(8, 3, 1, 1, NULL, NULL),
(9, 3, 1, 28, NULL, NULL),
(10, 3, 2, 28, NULL, NULL),
(11, 1, 3, 29, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `re_post`
--

CREATE TABLE `re_post` (
  `re_post_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `re_poster_id` int(11) NOT NULL,
  `additional_content` varchar(256) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  ADD KEY `rec_prof_recommended_id_fk` (`recommended_id`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `chat_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_room_member`
--
ALTER TABLE `chat_room_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_room_message`
--
ALTER TABLE `chat_room_message`
  MODIFY `chat_room_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment_reaction`
--
ALTER TABLE `comment_reaction`
  MODIFY `comment_reaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `diary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `diary_entry`
--
ALTER TABLE `diary_entry`
  MODIFY `diary_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `direct_message`
--
ALTER TABLE `direct_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `favourited_post`
--
ALTER TABLE `favourited_post`
  MODIFY `favourited_post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_link`
--
ALTER TABLE `friend_link`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `picture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `post_reaction`
--
ALTER TABLE `post_reaction`
  MODIFY `post_reaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preferred_category`
--
ALTER TABLE `preferred_category`
  MODIFY `preferred_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_style`
--
ALTER TABLE `profile_style`
  MODIFY `profile_style_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reaction_type`
--
ALTER TABLE `reaction_type`
  MODIFY `reation_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `recommendation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `address_country_country_id` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`),
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
  ADD CONSTRAINT `rec_prof_recommended_id_fk` FOREIGN KEY (`recommended_id`) REFERENCES `profile` (`profile_id`),
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
