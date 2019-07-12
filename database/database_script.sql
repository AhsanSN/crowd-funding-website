-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2019 at 10:18 AM
-- Server version: 10.1.40-MariaDB
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
-- Database: `anomozco_noor`
--

-- --------------------------------------------------------

--
-- Table structure for table `fik_blogComments`
--

CREATE TABLE `fik_blogComments` (
  `id` int(32) NOT NULL,
  `blogId` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `datePosted` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fik_blogs`
--

CREATE TABLE `fik_blogs` (
  `id` int(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `excerpt` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(256) NOT NULL,
  `category` varchar(64) NOT NULL,
  `datePosted` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `aboutMe` varchar(256) NOT NULL,
  `views` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_blogs`
--

INSERT INTO `fik_blogs` (`id`, `title`, `excerpt`, `description`, `image`, `category`, `datePosted`, `userId`, `aboutMe`, `views`) VALUES
(1, 'blog 1', 'blog 1 excerpt', 'desc', 'defaultCover.png', 'tech', 1238123, '1', 'i m great', 26),
(2, 'blog 2', 'laksdn', 'laksdn', 'defaultCover.png', 'text', 981273123, '1', 'askndasd', 3),
(3, 'dasd', 'asd', 'asd', 'image-1635747_960_720.jpg', 'Tech', 1560512195, '1', 'hey', 2),
(4, 'aksld', 'lkasd', 'asd', 'wheat.jpg', 'Tech', 1560516008, '1', 'asd', 1),
(5, 'b21', 'asdasd', 'aslkdnaskldn', 'defaultCover.png', 'Tech', 1560783660, '1', 'asd', 1),
(6, 'p2', 'ads', '<div>lkasdkasd<img src=\"uploads/blue.png\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\"><img src=\"uploads/copy.jpg\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\"></div><div><br></div><div><br></div><br>', 'defaultCover.png', 'Tech', 1560783836, '1', 'asd', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fik_cart`
--

CREATE TABLE `fik_cart` (
  `id` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `object` varchar(256) NOT NULL,
  `quantity` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_cart`
--

INSERT INTO `fik_cart` (`id`, `userId`, `object`, `quantity`) VALUES
(186, '1', '17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fik_changePasswordRequest`
--

CREATE TABLE `fik_changePasswordRequest` (
  `id` int(32) NOT NULL,
  `token` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_changePasswordRequest`
--

INSERT INTO `fik_changePasswordRequest` (`id`, `token`, `email`) VALUES
(1, 'dfbaaf448000681b78c5e62e88c48fcc', 'sa02908@st.habib.edu.pk'),
(2, '8152a553666ecedb043bee73607f6991', 'sa02908@st.habib.edu.pk'),
(3, 'd0533911c88d972be921ad63ef7eb3ad', 'suheylnizamoglu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `fik_contributions`
--

CREATE TABLE `fik_contributions` (
  `id` int(32) NOT NULL,
  `postId` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `timeDone` int(128) NOT NULL,
  `contribution` varchar(256) NOT NULL,
  `quantity` int(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_contributions`
--

INSERT INTO `fik_contributions` (`id`, `postId`, `userId`, `timeDone`, `contribution`, `quantity`) VALUES
(1, 2, '3', 213213123, '1', 0),
(489, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759369, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(6, 172, '1', 1560858938, '2', 1),
(10, 15, '1', 1561106803, '2', 1),
(11, 15, '1', 1561106828, '2', 1),
(488, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759368, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(487, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759368, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(486, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759324, '18', 1),
(456, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672652, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(485, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759324, '18', 1),
(484, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759073, 'ec617144ff2c89736719d8b636dfe78a', 1),
(483, 2, '8f33134eacc9067d9a710226db7b4f07', 1562757525, '5968406e99c2d10164452ac410db67f1', 1),
(45, 0, '1', 1561129201, '2', 1),
(46, 0, '1', 1561129204, '2', 1),
(47, 0, '1', 1561129204, '2', 1),
(48, 0, '1', 1561129204, '2', 1),
(49, 0, '1', 1561129305, '2', 1),
(50, 0, '1', 1561129306, '2', 1),
(51, 0, '1', 1561129306, '2', 1),
(52, 0, '1', 1561129306, '2', 1),
(53, 0, '1', 1561129307, '2', 1),
(54, 0, '1', 1561129441, '2', 1),
(55, 0, '1', 1561129441, '2', 1),
(56, 0, '1', 1561129441, '2', 1),
(57, 0, '1', 1561129441, '2', 1),
(58, 0, '1', 1561129442, '2', 1),
(59, 0, '1', 1561129671, '2', 1),
(60, 0, '1', 1561129672, '2', 1),
(61, 0, '1', 1561129717, '2', 2),
(62, 0, '1', 1561129717, '2', 2),
(63, 0, '1', 1561129790, '2', 1),
(64, 0, '1', 1561129790, '2', 1),
(65, 0, '1', 1561129790, '2', 1),
(66, 0, '1', 1561129790, '2', 1),
(67, 0, '1', 1561129790, '2', 1),
(68, 0, '1', 1561129790, '2', 1),
(69, 0, '1', 1561129791, '2', 1),
(70, 0, '1', 1561129817, '2', 1),
(71, 0, '1', 1561129817, '2', 1),
(72, 0, '1', 1561129817, '2', 1),
(73, 0, '1', 1561129817, '2', 1),
(74, 0, '1', 1561129818, '2', 1),
(75, 0, '1', 1561129844, '2', 1),
(76, 0, '1', 1561129844, '2', 1),
(482, 19, '1', 1562756917, '883caebaa0b94407e089f4c8f0406c9f', 1),
(481, 2, '8f33134eacc9067d9a710226db7b4f07', 1562754240, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(480, 2, '8f33134eacc9067d9a710226db7b4f07', 1562754240, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(479, 2, '8f33134eacc9067d9a710226db7b4f07', 1562754202, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(469, 2, '8f33134eacc9067d9a710226db7b4f07', 1562674622, '18', 1),
(478, 2, '8f33134eacc9067d9a710226db7b4f07', 1562754202, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(477, 2, '8f33134eacc9067d9a710226db7b4f07', 1562754174, '4ac4f4b9ebca6674dedcbbcba1952ea0', 1),
(466, 2, '8f33134eacc9067d9a710226db7b4f07', 1562674541, '5968406e99c2d10164452ac410db67f1', 1),
(465, 2, '8f33134eacc9067d9a710226db7b4f07', 1562674541, '5968406e99c2d10164452ac410db67f1', 1),
(464, 2, '8f33134eacc9067d9a710226db7b4f07', 1562674538, '18', 1),
(463, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672682, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(462, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672666, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(461, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672666, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(460, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672664, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(459, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672664, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(458, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672653, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(457, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672653, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(455, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672652, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(175, 39, '1', 1562067994, '16', 1),
(176, 39, '1', 1562067994, '16', 1),
(177, 39, '1', 1562067994, '16', 1),
(178, 39, '1', 1562067994, '16', 1),
(179, 39, '1', 1562067994, '16', 1),
(180, 39, '1', 1562067995, '16', 1),
(181, 39, '1', 1562067995, '16', 1),
(182, 39, '1', 1562067995, '16', 1),
(183, 39, '1', 1562067995, '16', 1),
(454, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672501, 'ec617144ff2c89736719d8b636dfe78a', 1),
(453, 2, '8f33134eacc9067d9a710226db7b4f07', 1562672006, 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(452, 2, '8f33134eacc9067d9a710226db7b4f07', 1562670294, 'ec617144ff2c89736719d8b636dfe78a', 1),
(451, 2, '8f33134eacc9067d9a710226db7b4f07', 1562670231, 'ec617144ff2c89736719d8b636dfe78a', 1),
(450, 2, '1', 1562668124, '17', 1),
(449, 2, '1', 1562668124, '17', 1),
(448, 45, '1', 1562667804, '14', 1),
(447, 45, '1', 1562667804, '14', 1),
(446, 45, '1', 1562667416, '883caebaa0b94407e089f4c8f0406c9f', 1),
(445, 45, '1', 1562667416, '883caebaa0b94407e089f4c8f0406c9f', 1),
(444, 45, '1', 1562667415, '883caebaa0b94407e089f4c8f0406c9f', 1),
(443, 45, '1', 1562667415, '883caebaa0b94407e089f4c8f0406c9f', 1),
(442, 45, '1', 1562667414, '883caebaa0b94407e089f4c8f0406c9f', 1),
(441, 45, '1', 1562667414, '883caebaa0b94407e089f4c8f0406c9f', 1),
(440, 45, '1', 1562667411, '883caebaa0b94407e089f4c8f0406c9f', 1),
(439, 45, '1', 1562667411, '883caebaa0b94407e089f4c8f0406c9f', 1),
(438, 45, '1', 1562667399, '883caebaa0b94407e089f4c8f0406c9f', 1),
(437, 45, '1', 1562667399, '883caebaa0b94407e089f4c8f0406c9f', 1),
(436, 45, '1', 1562667276, '', 1),
(435, 45, '1', 1562667276, '', 1),
(434, 45, '1', 1562666380, '883caebaa0b94407e089f4c8f0406c9f', 10),
(433, 45, '1', 1562666126, '883caebaa0b94407e089f4c8f0406c9f', 10),
(432, 45, '1', 1562666044, '883caebaa0b94407e089f4c8f0406c9f', 10),
(431, 45, '1', 1562665937, '883caebaa0b94407e089f4c8f0406c9f', 10),
(430, 2, '1', 1562664710, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(428, 2, '8f33134eacc9067d9a710226db7b4f07', 1562601223, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(429, 45, '1', 1562664366, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(425, 2, '8f33134eacc9067d9a710226db7b4f07', 1562600540, '15', 1),
(424, 2, '1', 1562600314, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(423, 2, '1', 1562600312, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(422, 39, '1', 1562578773, '883caebaa0b94407e089f4c8f0406c9f', 10),
(421, 0, '1', 1562578693, '883caebaa0b94407e089f4c8f0406c9f', 120),
(420, 0, '1', 1562578638, '14', 8),
(419, 39, '1', 1562577770, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(417, 2, '1', 1562163988, '16', 1),
(415, 2, '1', 1562163835, '16', 1),
(387, 2, '1', 1562163639, '16', 1),
(384, 2, '1', 1562163542, '16', 1),
(383, 2, '1', 1562163412, '16', 1),
(382, 2, '1', 1562163412, '16', 1),
(381, 2, '1', 1562163412, '16', 1),
(380, 2, '1', 1562163411, '16', 1),
(379, 2, '1', 1562163411, '16', 1),
(378, 2, '1', 1562163411, '16', 1),
(377, 2, '1', 1562163411, '16', 1),
(376, 2, '1', 1562163411, '16', 1),
(490, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759369, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(491, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759384, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(492, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759384, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(493, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759385, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(494, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759385, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(495, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759613, '15', 1),
(496, 2, '8f33134eacc9067d9a710226db7b4f07', 1562759613, '15', 1),
(506, 2, '8f33134eacc9067d9a710226db7b4f07', 1562761383, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(499, 2, '8f33134eacc9067d9a710226db7b4f07', 1562760248, 'f693fd750bd7d7ebf150fa6c9118717d', 1),
(507, 2, '8f33134eacc9067d9a710226db7b4f07', 1562761417, 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(505, 2, '8f33134eacc9067d9a710226db7b4f07', 1562760512, '17', 5),
(508, 2, '8f33134eacc9067d9a710226db7b4f07', 1562761417, 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(509, 2, '8f33134eacc9067d9a710226db7b4f07', 1562761744, 'ec617144ff2c89736719d8b636dfe78a', 1),
(510, 2, '8f33134eacc9067d9a710226db7b4f07', 1562761781, '17', 1),
(511, 2, '8f33134eacc9067d9a710226db7b4f07', 1562762309, '9892bf01b944967108a473baaac47831', 4),
(512, 2, '8f33134eacc9067d9a710226db7b4f07', 1562768659, 'ec617144ff2c89736719d8b636dfe78a', 1),
(513, 2, '1', 1562768714, '17', 1),
(514, 2, '1', 1562768757, '17', 1),
(515, 2, '1', 1562768886, '5968406e99c2d10164452ac410db67f1', 1),
(516, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769055, '17', 1),
(517, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769076, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(518, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769093, 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(519, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769121, '5968406e99c2d10164452ac410db67f1', 1),
(520, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769252, '15', 1),
(521, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769375, '15', 1),
(522, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769396, 'f693fd750bd7d7ebf150fa6c9118717d', 1),
(523, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769414, '9892bf01b944967108a473baaac47831', 1),
(524, 2, '8f33134eacc9067d9a710226db7b4f07', 1562769451, '4ac4f4b9ebca6674dedcbbcba1952ea0', 1),
(525, 2, '8f33134eacc9067d9a710226db7b4f07', 1562771368, '17', 1),
(526, 2, '8f33134eacc9067d9a710226db7b4f07', 1562771415, '18', 1),
(527, 2, '8f33134eacc9067d9a710226db7b4f07', 1562771440, 'ec617144ff2c89736719d8b636dfe78a', 1),
(528, 2, '8f33134eacc9067d9a710226db7b4f07', 1562772437, '9892bf01b944967108a473baaac47831', 1),
(529, 2, '8f33134eacc9067d9a710226db7b4f07', 1562772485, '4ac4f4b9ebca6674dedcbbcba1952ea0', 1),
(530, 2, '8f33134eacc9067d9a710226db7b4f07', 1562772712, '5968406e99c2d10164452ac410db67f1', 1),
(531, 2, '8f33134eacc9067d9a710226db7b4f07', 1562773013, 'ec617144ff2c89736719d8b636dfe78a', 1),
(532, 2, '8f33134eacc9067d9a710226db7b4f07', 1562779577, '9892bf01b944967108a473baaac47831', 1),
(533, 2, '8f33134eacc9067d9a710226db7b4f07', 1562779607, '15', 1),
(534, 2, '8f33134eacc9067d9a710226db7b4f07', 1562795140, '4ac4f4b9ebca6674dedcbbcba1952ea0', 2),
(535, 2, '8f33134eacc9067d9a710226db7b4f07', 1562833622, '5968406e99c2d10164452ac410db67f1', 1),
(536, 2, '8f33134eacc9067d9a710226db7b4f07', 1562837034, '18785a6e863d96882b67f51ec7f691d9', 1),
(537, 2, '8f33134eacc9067d9a710226db7b4f07', 1562837417, '18785a6e863d96882b67f51ec7f691d9', 5),
(538, 2, '8f33134eacc9067d9a710226db7b4f07', 1562845305, '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(539, 2, '8f33134eacc9067d9a710226db7b4f07', 1562863419, 'b2d5e6dbc0a98d106d70dafe524fc365', 2),
(540, 2, '8f33134eacc9067d9a710226db7b4f07', 1562863881, 'f693fd750bd7d7ebf150fa6c9118717d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fik_draftBlogs`
--

CREATE TABLE `fik_draftBlogs` (
  `id` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `title` varchar(64) NOT NULL,
  `excerpt` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `coverPhoto` varchar(256) NOT NULL,
  `aboutMe` varchar(256) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_draftBlogs`
--

INSERT INTO `fik_draftBlogs` (`id`, `userId`, `title`, `excerpt`, `description`, `coverPhoto`, `aboutMe`, `category`) VALUES
(1, '10', 'dasd', 'asd', 'asd', '', 'hey', 'Tech'),
(2, '100', 'lknasd', 'lknsa', 'das', '', 'asd', 'Tech'),
(3, '1', 'lknads', 'lkasd', 'lksnad', 'blue.png', 'lnasdasd', 'mobile'),
(4, '14', '', '', '', 'defaultCover.png', '', ''),
(5, '0', '', '', '', 'defaultCover.png', '', ''),
(6, '1891966077', '', '', '', 'defaultCover.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fik_draftProjects`
--

CREATE TABLE `fik_draftProjects` (
  `id` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `title` varchar(64) NOT NULL,
  `excerpt` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `goal` int(32) NOT NULL,
  `coverPhoto` varchar(256) NOT NULL,
  `aboutMe` varchar(256) NOT NULL,
  `category` varchar(64) NOT NULL,
  `postRewardId` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_draftProjects`
--

INSERT INTO `fik_draftProjects` (`id`, `userId`, `title`, `excerpt`, `description`, `goal`, `coverPhoto`, `aboutMe`, `category`, `postRewardId`) VALUES
(2, '5', 'asd', 'askld', 'lkasdn', 0, '', 'about me\r\n', 'Tech', ''),
(3, '0', 'hey', 'asd', 'asdsad', 0, 'movie.mp4', 'about me\r\n', 'Tech', ''),
(4, '1', 'lknads', 'lknasd', '<br>', 0, 'tohumsandigi.png', 'asd', 'mobile', '2c5a84902d52bbb53e523e6d104115b4'),
(6, '14', '', '', '', 0, 'defaultCover.png', '', '', ''),
(5, '13', 'lkansd', 'asd', 'asd', 0, 'defaultCover.png', 'asjd', 'Tech', ''),
(7, '1891966077', '', '', '', 0, 'defaultCover.png', '', '', ''),
(8, '1649397821', '', '', '', 0, 'defaultCover.png', '', '', ''),
(9, '58c413ef481159135b092de727cd61ae', ';kknasd', ';assd;', ';llmads;lmasd', 0, 'defaultCover.png', 'asdasd', 'mobile', ''),
(10, '', '', '', '', 0, 'defaultCover.png', '', '', ''),
(11, '8f33134eacc9067d9a710226db7b4f07', 'bjb&#xF6;jb&#xF6;jb&#xF6;m', 'mvmnv&#xF6;x&#xF6;bmnmb&#xF6;bmcncmvmvvb', 'b&#xF6;b&#xE7;jlv&#xF6;b&#xF6;vmh&#xF6;jcj&#xE7;n&#xE7;b&#xF6;&#xF6;b&#xF6;bnn&#xF6;&#xF6;&#xF6;&#xF6;mb&#xF6;n&#xF6;m', 9000, 'defaultCover.png', 'Fikir Bahc&#x131;van&#x131; n&#x131; Burak Salba&#x15F;&#x131; ile kurmaya cal&#x131;&#x15F;&#x131;yoruz bakal&#x131;m nerden nere. F&#x130;K&#x130;R BAHCIVANI K&#x130;TLE FONLAMA PLATFORMU.', 'Food', 'cdc6a7dedb0fbac4403d9ba11d2b1ec6'),
(12, '44164bfc47fe340a021a1898d64a0602', '', '', '', 0, 'defaultCover.png', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fik_inventory`
--

CREATE TABLE `fik_inventory` (
  `id` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `object` varchar(256) NOT NULL,
  `quantity` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_inventory`
--

INSERT INTO `fik_inventory` (`id`, `userId`, `object`, `quantity`) VALUES
(28, '8f33134eacc9067d9a710226db7b4f07', 'ec617144ff2c89736719d8b636dfe78a', 0),
(29, '1', '17', 0),
(30, '1', '5968406e99c2d10164452ac410db67f1', 0),
(31, '8f33134eacc9067d9a710226db7b4f07', '17', 0),
(32, '8f33134eacc9067d9a710226db7b4f07', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 0),
(33, '8f33134eacc9067d9a710226db7b4f07', 'b2d5e6dbc0a98d106d70dafe524fc365', 0),
(34, '8f33134eacc9067d9a710226db7b4f07', '5968406e99c2d10164452ac410db67f1', 0),
(35, '8f33134eacc9067d9a710226db7b4f07', '15', 0),
(36, '8f33134eacc9067d9a710226db7b4f07', 'f693fd750bd7d7ebf150fa6c9118717d', 0),
(37, '8f33134eacc9067d9a710226db7b4f07', '9892bf01b944967108a473baaac47831', 0),
(38, '8f33134eacc9067d9a710226db7b4f07', '4ac4f4b9ebca6674dedcbbcba1952ea0', 0),
(39, '8f33134eacc9067d9a710226db7b4f07', '18', 0),
(40, '8f33134eacc9067d9a710226db7b4f07', '18785a6e863d96882b67f51ec7f691d9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fik_orderItems`
--

CREATE TABLE `fik_orderItems` (
  `id` int(32) NOT NULL,
  `orderId` varchar(256) NOT NULL,
  `item` varchar(256) NOT NULL,
  `quantity` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_orderItems`
--

INSERT INTO `fik_orderItems` (`id`, `orderId`, `item`, `quantity`) VALUES
(1, 'edad48dd4e97609b8b1507339d273402', '17', 1),
(2, '37ea1282f08cee8d1c0660e2cc521519', '17', 1),
(3, 'c41c15edeb32a853e4b31fdf12987f0e', '17', 1),
(4, '1eef8966d6947a53cf9c381bec040ef3', '17', 1),
(5, '3451515c582ef0ebf6cc45bc392b31bc', '17', 1),
(6, '7d12883422b042741f81d1e34dd90089', '17', 1),
(7, 'c98fa0ad753424f1821e60615a6afee2', '17', 1),
(8, '69868c08959431a79bdeabd3c304fefc', '17', 1),
(9, '3fc62665d33499172c6467397fec68c8', '17', 1),
(10, 'e622a6cd9d25104960f89d073b56ccd2', '17', 1),
(11, '0fbc5ae66ff7246b9dfd9a8822d3488e', '17', 1),
(12, '61efb122dde816eea32b196579fa7332', '17', 1),
(13, '4ee550e28d44de2792b4465915cec9c9', '17', 1),
(14, 'abb54fda7065458d05aabaea432145fb', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(15, 'abb54fda7065458d05aabaea432145fb', '883caebaa0b94407e089f4c8f0406c9f', 30),
(16, 'fc2b13907ea9536857c6ea3690b13d40', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(17, 'fc2b13907ea9536857c6ea3690b13d40', '883caebaa0b94407e089f4c8f0406c9f', 30),
(18, '6a78b302baa14e4737a93c3de361fce7', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(19, '6a78b302baa14e4737a93c3de361fce7', '883caebaa0b94407e089f4c8f0406c9f', 30),
(20, '5f02dcd843c5c00d7faa3f5400779209', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(21, '5f02dcd843c5c00d7faa3f5400779209', '883caebaa0b94407e089f4c8f0406c9f', 30),
(22, '479a99a389f3b0e99c29ec92bcd09f9c', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(23, '479a99a389f3b0e99c29ec92bcd09f9c', '883caebaa0b94407e089f4c8f0406c9f', 30),
(24, 'c8c9922de69c94b82d78251da6cb9729', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(25, 'c8c9922de69c94b82d78251da6cb9729', '883caebaa0b94407e089f4c8f0406c9f', 30),
(26, '1300548cd416821e67b504a64505c924', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(27, '1300548cd416821e67b504a64505c924', '883caebaa0b94407e089f4c8f0406c9f', 30),
(28, 'dd3b594cbefabaf65cbbc7f375f7c994', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(29, 'dd3b594cbefabaf65cbbc7f375f7c994', '883caebaa0b94407e089f4c8f0406c9f', 30),
(30, 'e242ff432eb8db8bd736764f729f0158', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(31, 'e242ff432eb8db8bd736764f729f0158', '883caebaa0b94407e089f4c8f0406c9f', 30),
(32, '8198430b9e3a46a3b0dadaff19b7b37d', '18', 1),
(33, '8198430b9e3a46a3b0dadaff19b7b37d', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(34, '8198430b9e3a46a3b0dadaff19b7b37d', '883caebaa0b94407e089f4c8f0406c9f', 30),
(35, 'fbf3b3a3a457ff45edc8d1452a88b0aa', '18', 1),
(36, 'fbf3b3a3a457ff45edc8d1452a88b0aa', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(37, 'fbf3b3a3a457ff45edc8d1452a88b0aa', '883caebaa0b94407e089f4c8f0406c9f', 30),
(38, 'ad62f3b8f32543e0a5d7d2e6fb19f7d1', '18', 1),
(39, 'ad62f3b8f32543e0a5d7d2e6fb19f7d1', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(40, 'ad62f3b8f32543e0a5d7d2e6fb19f7d1', '883caebaa0b94407e089f4c8f0406c9f', 30),
(41, '8b73ad2aa71c722c34139b18f912c083', '14', 4),
(42, '2d6033502ddccf3f6aea8ec674184ae2', '883caebaa0b94407e089f4c8f0406c9f', 10),
(43, 'cffcf025f05f5a224c1085de275613e4', '883caebaa0b94407e089f4c8f0406c9f', 10),
(44, '1c96788eceecde68f78b393de6c53c78', '14', 4),
(45, 'a3f126fd144abd778e87e25b6702f814', '883caebaa0b94407e089f4c8f0406c9f', 10),
(46, '6430fb882b5a161634750938c54752ec', '883caebaa0b94407e089f4c8f0406c9f', 10),
(47, '72a873fa7965dcc766a99701a46b23b4', '15', 1),
(48, 'e1ac2828c03224cebf37c10d4f351582', '5968406e99c2d10164452ac410db67f1', 1),
(49, 'b211c8e7335e7f4dd7ea71bbaedd8fe6', '15', 1),
(50, '6699d9829e109cd6a1fdb4d29596017e', '16', 2),
(51, '33925db7e0c03cc24842425bd66c9114', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(52, '2959c35221e4b9aae422782b6c095433', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(53, '2959c35221e4b9aae422782b6c095433', '14', 4),
(54, '5bd2df88d1521247ade3ef391df2a391', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(55, '824f63f492e533d6328ae61f6f799a6f', '883caebaa0b94407e089f4c8f0406c9f', 10),
(56, 'b3e1c7ee70240d97f377f9a3d0679fe9', '883caebaa0b94407e089f4c8f0406c9f', 10),
(57, '3d7cad18cdce04e94264436c98d158db', '883caebaa0b94407e089f4c8f0406c9f', 10),
(58, '61b0bcbb5275c79e574be09f535ea4cd', '883caebaa0b94407e089f4c8f0406c9f', 10),
(59, '4b623b4d2b0582eeb3dfcb73537ba250', '883caebaa0b94407e089f4c8f0406c9f', 10),
(60, '99d61e3f52e1e17e65b4b6ec08c4f8bd', 'ec617144ff2c89736719d8b636dfe78a', 1),
(61, '2bf0bf28f3d64d7d8bffb08f5e6fe56f', 'ec617144ff2c89736719d8b636dfe78a', 1),
(62, '8d0b2deb7fc749ce87dc224c2610022f', 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(63, '8d0b2deb7fc749ce87dc224c2610022f', '5968406e99c2d10164452ac410db67f1', 1),
(64, '8d0b2deb7fc749ce87dc224c2610022f', '18', 2),
(65, '1c5809dba68753f304ce0b7d35257daa', 'ec617144ff2c89736719d8b636dfe78a', 1),
(66, '4b55bf18cdc389db32090d8a7cf13267', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 9),
(67, '2cd77ed9deb7bcd72afc11b31722fbc6', '883caebaa0b94407e089f4c8f0406c9f', 50),
(68, '4f65f647effaf37f53ef7bc933083ff3', '16', 2),
(69, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '4ac4f4b9ebca6674dedcbbcba1952ea0', 1),
(70, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', 'f693fd750bd7d7ebf150fa6c9118717d', 1),
(71, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '15', 1),
(72, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '5968406e99c2d10164452ac410db67f1', 1),
(73, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(74, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 10),
(75, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', 'ec617144ff2c89736719d8b636dfe78a', 1),
(76, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '18', 1),
(77, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '17', 2),
(78, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '16', 2),
(79, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '14', 4),
(80, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', '883caebaa0b94407e089f4c8f0406c9f', 10),
(81, '0d658c9b76234651e722e9347587b4c7', '883caebaa0b94407e089f4c8f0406c9f', 10),
(82, '0d658c9b76234651e722e9347587b4c7', '14', 8),
(83, '0d658c9b76234651e722e9347587b4c7', '16', 2),
(84, '5f178d0ce8a62f94d73c85f683f1fbfd', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(85, 'b490485c324977d9de834ba98f0794dd', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(86, 'b490485c324977d9de834ba98f0794dd', '18', 1),
(87, 'b490485c324977d9de834ba98f0794dd', '17', 2),
(88, 'b490485c324977d9de834ba98f0794dd', '14', 4),
(89, 'e901b03d3c5a7ad1353b72ef7021d9cd', '17', 1),
(90, 'af757d4e6111532069cfaeb3bd7adbe3', 'ec617144ff2c89736719d8b636dfe78a', 1),
(91, 'af757d4e6111532069cfaeb3bd7adbe3', '14', 4),
(92, 'af757d4e6111532069cfaeb3bd7adbe3', 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(93, 'af757d4e6111532069cfaeb3bd7adbe3', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(94, 'af757d4e6111532069cfaeb3bd7adbe3', '17', 1),
(95, 'c452594bfaf56213364ba20c7c13601d', '9892bf01b944967108a473baaac47831', 4),
(96, 'b589245a22568877a5bc2f4a15fd3446', 'ec617144ff2c89736719d8b636dfe78a', 1),
(97, 'eb2aba12023460055cf6fdd0551619e4', '17', 1),
(98, '454e50065bc1a7f9cef4feba8bcd0158', '17', 1),
(99, 'e1680710927ff8696186bc840e2173f0', '5968406e99c2d10164452ac410db67f1', 1),
(100, '190ab996d9583947d46b9b5f7ae9fee2', '17', 1),
(101, '9d0d3c72e3a1ad8bbac61e1e57b0798e', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(102, '2900144ec25112a177550451ea02bc0b', 'b2d5e6dbc0a98d106d70dafe524fc365', 1),
(103, '5c75f6961f3b11b1be98cd50f601b879', '5968406e99c2d10164452ac410db67f1', 1),
(104, '4666dd463be1d50c71afe5155ef5fb21', '15', 1),
(105, '3fdb8bfa19267bed28ed07381cbacf07', '15', 1),
(106, '7a63fb0d695e09b87c09e63462312325', 'f693fd750bd7d7ebf150fa6c9118717d', 1),
(107, 'b278996071ee60dfae3502fbcac49fea', '9892bf01b944967108a473baaac47831', 1),
(108, '7cf6601623890932c8fb6cba768a7362', '4ac4f4b9ebca6674dedcbbcba1952ea0', 1),
(109, '4e046faf15de4e46687daa32ee6b3299', '17', 1),
(110, '702fccdba922661e73f86242fa17bde5', '18', 1),
(111, '32ea98b26d86d6edf2f50696c4843720', 'ec617144ff2c89736719d8b636dfe78a', 1),
(112, '43b25c4fa722e9f4202c48d34d29f3ed', '9892bf01b944967108a473baaac47831', 1),
(113, 'd7776b2b0f07353de1b8396300456ba9', '4ac4f4b9ebca6674dedcbbcba1952ea0', 1),
(114, '4089526b1107a574357342fec4e3a670', '5968406e99c2d10164452ac410db67f1', 1),
(115, '26f90bc42d0a2fa333ff444572a30c1e', 'ec617144ff2c89736719d8b636dfe78a', 1),
(116, 'f2d880fd2e040ba39264ac40bb137477', '9892bf01b944967108a473baaac47831', 1),
(117, 'a5090a3c32e74de70576c23646419ed1', '15', 1),
(118, 'df998dba27b954751d4b7f34dff4543c', '4ac4f4b9ebca6674dedcbbcba1952ea0', 2),
(119, '1f092dc311596955ad40e110591787f7', '5968406e99c2d10164452ac410db67f1', 1),
(120, 'db6ca6786702f3b54a97232be657031a', '18785a6e863d96882b67f51ec7f691d9', 1),
(121, '5c706d2507fe409c2a714e1120f54828', '18785a6e863d96882b67f51ec7f691d9', 5),
(122, 'd7276281d27f0246f295961e329a126e', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 1),
(123, '4dbe482a315006788f09ea3e7c26a28f', 'b2d5e6dbc0a98d106d70dafe524fc365', 2),
(124, 'd636922aa9d5ca6b31f51171fd7c7bd2', 'f693fd750bd7d7ebf150fa6c9118717d', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fik_orders`
--

CREATE TABLE `fik_orders` (
  `id` int(32) NOT NULL,
  `orderId` varchar(256) NOT NULL,
  `datePlaced` int(128) NOT NULL,
  `totalAmount` float(32,3) NOT NULL,
  `KDV` float(32,3) NOT NULL,
  `withoutKDV` float(32,3) NOT NULL,
  `status` varchar(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `country` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `streetAddress` varchar(256) NOT NULL,
  `AgreeOption` varchar(64) NOT NULL,
  `identityNumber` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_orders`
--

INSERT INTO `fik_orders` (`id`, `orderId`, `datePlaced`, `totalAmount`, `KDV`, `withoutKDV`, `status`, `userId`, `country`, `state`, `city`, `streetAddress`, `AgreeOption`, `identityNumber`) VALUES
(1, 'ae1ab139710b72314f9559e28b8f57ea', 0, 10.000, 1.530, 8.470, 'waiting', '', '', '', '', '', '', ''),
(2, '6efe473136b0518e2ca1422a95820e32', 1561996201, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(3, '257f4bc017e2c7c59905600a26c09a4f', 1562062254, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(4, '6d3963a64d9ffa0e7537383bd0f9dc5e', 1562062335, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(5, '5f1479866ef7f1f49b69a481c3f2b4f8', 1562062373, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(6, 'f187a2810d2c2cfaff3feda3c7220dff', 1562062446, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(7, 'ec0e769471b0683ef8e27f139728fc20', 1562062476, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(8, 'edad48dd4e97609b8b1507339d273402', 1562062487, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(9, '37ea1282f08cee8d1c0660e2cc521519', 1562062516, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(10, 'c41c15edeb32a853e4b31fdf12987f0e', 1562062617, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(11, 'b92d03d5604970319fb32bc712c23804', 1562067246, 0.000, 0.000, 0.000, 'waiting', '', '', '', '', '', '', ''),
(12, '1eef8966d6947a53cf9c381bec040ef3', 1562067262, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(13, '3451515c582ef0ebf6cc45bc392b31bc', 1562067276, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(14, '7d12883422b042741f81d1e34dd90089', 1562067280, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(15, 'c98fa0ad753424f1821e60615a6afee2', 1562067433, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(16, '69868c08959431a79bdeabd3c304fefc', 1562067444, 10.000, 1.530, 8.470, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', '', ''),
(17, '3fc62665d33499172c6467397fec68c8', 1562067524, 10.000, 1.530, 8.470, 'waiting', '1', '', '', '', '', '', ''),
(18, 'e622a6cd9d25104960f89d073b56ccd2', 1562067547, 10.000, 1.530, 8.470, 'waiting', '1', 'Pakistan', 'Sindh', 'Kadhan', 'block 3 a', '', ''),
(19, '$orderId', 0, 0.000, 0.000, 0.000, 'waiting', '$session_userId', '$country', '$state', '$city', '$streetAddress', '$AgreeOption', ''),
(20, '0fbc5ae66ff7246b9dfd9a8822d3488e', 1562075154, 10.000, 1.530, 8.470, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToFikir', ''),
(21, '61efb122dde816eea32b196579fa7332', 1562075193, 10.000, 1.530, 8.470, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(22, '4ee550e28d44de2792b4465915cec9c9', 1562075350, 10.000, 1.530, 8.470, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(23, '55232d438beb7561a744e4bbc8e79f30', 1562402936, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#305;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToMe', ''),
(24, '18bb09c6450b774cd481507f64796f15', 1562402979, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#305;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToMe', ''),
(25, '5e445d459c6a6a4c8f24fadd9d50110c', 1562403011, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#305;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToMe', ''),
(26, '1600024d88281e219be6103175434db9', 1562403015, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToMe', ''),
(27, '1b10068da933e6548f72a4d73f62a315', 1562403037, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#305;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToMe', ''),
(28, 'abb54fda7065458d05aabaea432145fb', 1562576956, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(29, 'fc2b13907ea9536857c6ea3690b13d40', 1562577030, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(30, '6a78b302baa14e4737a93c3de361fce7', 1562577066, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(31, '5f02dcd843c5c00d7faa3f5400779209', 1562577090, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(32, '479a99a389f3b0e99c29ec92bcd09f9c', 1562577107, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(33, 'c8c9922de69c94b82d78251da6cb9729', 1562577114, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(34, '1300548cd416821e67b504a64505c924', 1562577140, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(35, 'dd3b594cbefabaf65cbbc7f375f7c994', 1562577150, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(36, 'e242ff432eb8db8bd736764f729f0158', 1562577179, 13.000, 1.980, 11.020, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(37, '8198430b9e3a46a3b0dadaff19b7b37d', 1562577224, 15.500, 2.360, 13.140, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(38, 'fbf3b3a3a457ff45edc8d1452a88b0aa', 1562577305, 15.500, 2.360, 13.140, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(39, 'ad62f3b8f32543e0a5d7d2e6fb19f7d1', 1562577326, 15.500, 2.360, 13.140, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(40, '8b73ad2aa71c722c34139b18f912c083', 1562577448, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(41, 'b297312b24541f4137b747e6977c9d51', 1562577718, 0.000, 0.000, 0.000, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(42, '2d6033502ddccf3f6aea8ec674184ae2', 1562577813, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(43, 'cffcf025f05f5a224c1085de275613e4', 1562577890, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(44, '1c96788eceecde68f78b393de6c53c78', 1562578339, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(45, 'a3f126fd144abd778e87e25b6702f814', 1562578693, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(46, '6430fb882b5a161634750938c54752ec', 1562578772, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(47, '72a873fa7965dcc766a99701a46b23b4', 1562595344, 100.000, 15.250, 84.750, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Albania', 'Diber', 'Klos', 'dfgdfgdfg', 'moneyToMe', ''),
(48, 'e1ac2828c03224cebf37c10d4f351582', 1562595622, 50.000, 7.630, 42.370, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Argentina', 'Neuquen', 'Anelo', 'Street Address...zxvzv', 'moneyToMe', ''),
(49, 'b211c8e7335e7f4dd7ea71bbaedd8fe6', 1562600950, 100.000, 15.250, 84.750, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Azerbaijan', 'Fuezuli', 'Horadiz', 'Street Address...', 'moneyToMe', ''),
(50, '6699d9829e109cd6a1fdb4d29596017e', 1562601089, 1.000, 0.150, 0.850, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToMe', ''),
(51, '33925db7e0c03cc24842425bd66c9114', 1562601189, 10.000, 1.530, 8.470, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToMe', ''),
(52, '2959c35221e4b9aae422782b6c095433', 1562664366, 11.000, 1.680, 9.320, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(53, '5bd2df88d1521247ade3ef391df2a391', 1562664593, 10.000, 1.530, 8.470, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(54, '824f63f492e533d6328ae61f6f799a6f', 1562665936, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(55, 'b3e1c7ee70240d97f377f9a3d0679fe9', 1562666035, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(56, '3d7cad18cdce04e94264436c98d158db', 1562666119, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(57, '61b0bcbb5275c79e574be09f535ea4cd', 1562666369, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(58, '4b623b4d2b0582eeb3dfcb73537ba250', 1562666413, 1.000, 0.150, 0.850, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', ''),
(59, '99d61e3f52e1e17e65b4b6ec08c4f8bd', 1562670231, 5.000, 0.760, 4.240, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToFikir', ''),
(60, '2bf0bf28f3d64d7d8bffb08f5e6fe56f', 1562670294, 5.000, 0.760, 4.240, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToFikir', ''),
(61, '45fde1c221e60d50437c79fc2da9760f', 1562671098, 0.000, 0.000, 0.000, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToMe', 'jasdl'),
(62, '37c6db4d941ae4d43d6df96db6c1ca65', 1562671211, 0.000, 0.000, 0.000, 'waiting', '1', 'Turkey', 'Isparta', 'Sarkikaraagac', 'good', 'moneyToFikir', ';lamsd'),
(63, '8d0b2deb7fc749ce87dc224c2610022f', 1562672005, 80.000, 12.200, 67.800, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToFikir', '3422342'),
(64, '1c5809dba68753f304ce0b7d35257daa', 1562672501, 5.000, 0.760, 4.240, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToFikir', '423'),
(65, '4b55bf18cdc389db32090d8a7cf13267', 1562672626, 90.000, 13.730, 76.270, 'waiting', '8f33134eacc9067d9a710226db7b4f07', '', '', '', 'Street Address...', 'moneyToFikir', '3422342'),
(66, '2cd77ed9deb7bcd72afc11b31722fbc6', 1562688274, 5.000, 0.760, 4.240, 'waiting', '1', '', '', '', '', 'moneyToMe', '09129038'),
(67, '925cc5092e7869276d6a54b67fbe619e', 1562688493, 0.000, 0.000, 0.000, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToMe', ''),
(68, '4bef6954dc9b33cc254630772f622fb5', 1562688511, 0.000, 0.000, 0.000, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToMe', '9813092213'),
(69, 'c11f8d0be619fc2bce073fd5f7c5d22f', 1562688528, 0.000, 0.000, 0.000, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToMe', 'Afghanistan'),
(70, '4f65f647effaf37f53ef7bc933083ff3', 1562690759, 1.000, 0.150, 0.850, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(71, 'bd7ac57ae90c4cfb39e6f66ce3b01a80', 1562747392, 1537.500, 234.530, 1302.970, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(72, '0d658c9b76234651e722e9347587b4c7', 1562747454, 4.000, 0.610, 3.390, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToMe', '0912398123'),
(73, '5f178d0ce8a62f94d73c85f683f1fbfd', 1562750559, 10.000, 1.530, 8.470, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(74, '0e29492f42606f0c594d733bd76ea34a', 1562750584, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(75, 'ce5f44124c82ca26b87bae8a06d8296e', 1562757019, 0.000, 0.000, 0.000, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToMe', '01823098120'),
(76, 'b490485c324977d9de834ba98f0794dd', 1562757458, 15.500, 2.360, 13.140, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(77, 'e901b03d3c5a7ad1353b72ef7021d9cd', 1562760512, 1.000, 0.150, 0.850, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(78, 'af757d4e6111532069cfaeb3bd7adbe3', 1562761361, 42.000, 6.410, 35.590, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(79, 'c452594bfaf56213364ba20c7c13601d', 1562762309, 2000.000, 305.080, 1694.920, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(80, 'b589245a22568877a5bc2f4a15fd3446', 1562768658, 5.000, 0.760, 4.240, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(81, 'eb2aba12023460055cf6fdd0551619e4', 1562768714, 1.000, 0.150, 0.850, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToFikir', '00000000000'),
(82, '454e50065bc1a7f9cef4feba8bcd0158', 1562768757, 1.000, 0.150, 0.850, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToFikir', '00000000000'),
(83, 'e1680710927ff8696186bc840e2173f0', 1562768885, 50.000, 7.630, 42.370, 'waiting', '1', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Street Address...ma;lsdm;asmdasd', 'moneyToFikir', '00000000000'),
(84, '190ab996d9583947d46b9b5f7ae9fee2', 1562769055, 1.000, 0.150, 0.850, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(85, '9d0d3c72e3a1ad8bbac61e1e57b0798e', 1562769076, 10.000, 1.530, 8.470, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(86, '2900144ec25112a177550451ea02bc0b', 1562769092, 25.000, 3.810, 21.190, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(87, '5c75f6961f3b11b1be98cd50f601b879', 1562769121, 50.000, 7.630, 42.370, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(88, '4666dd463be1d50c71afe5155ef5fb21', 1562769251, 100.000, 15.250, 84.750, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(89, '3c4feb1fdb96d740594d55da60450a27', 1562769275, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(90, 'c3146dfc687781de846d2eb64ad74532', 1562769323, 0.000, 0.000, 0.000, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToMe', '33888383883'),
(91, '3fdb8bfa19267bed28ed07381cbacf07', 1562769375, 100.000, 15.250, 84.750, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(92, '7a63fb0d695e09b87c09e63462312325', 1562769395, 250.000, 38.140, 211.860, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(93, 'b278996071ee60dfae3502fbcac49fea', 1562769414, 500.000, 76.270, 423.730, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(94, '7cf6601623890932c8fb6cba768a7362', 1562769450, 1000.000, 152.540, 847.460, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(95, '4e046faf15de4e46687daa32ee6b3299', 1562771368, 1.000, 0.150, 0.850, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(96, '702fccdba922661e73f86242fa17bde5', 1562771415, 2.500, 0.380, 2.120, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(97, '32ea98b26d86d6edf2f50696c4843720', 1562771440, 5.000, 0.760, 4.240, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(98, '43b25c4fa722e9f4202c48d34d29f3ed', 1562772437, 500.000, 76.270, 423.730, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(99, 'd7776b2b0f07353de1b8396300456ba9', 1562772485, 1000.000, 152.540, 847.460, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(100, '4089526b1107a574357342fec4e3a670', 1562772712, 50.000, 7.630, 42.370, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(101, '26f90bc42d0a2fa333ff444572a30c1e', 1562773013, 5.000, 0.760, 4.240, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '33888383883'),
(102, 'f2d880fd2e040ba39264ac40bb137477', 1562779576, 5000.000, 762.710, 4237.290, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '12131'),
(103, 'a5090a3c32e74de70576c23646419ed1', 1562779606, 500.000, 76.270, 423.730, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '12131'),
(104, 'd882d54bebebf9513dab29e4d87d9fdc', 1562779745, 0.000, 0.000, 0.000, 'waiting', '', '', '', '', '', 'moneyToFikir', ''),
(105, 'df998dba27b954751d4b7f34dff4543c', 1562795140, 20000.000, 3050.850, 16949.150, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '12131'),
(106, '1f092dc311596955ad40e110591787f7', 1562833622, 250.000, 38.140, 211.860, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Andorra', 'Ordino', 'Ordino', 'Street Address...', 'moneyToFikir', '12131'),
(107, 'db6ca6786702f3b54a97232be657031a', 1562837033, 25.000, 3.810, 21.190, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#x131;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToFikir', '11111111111'),
(108, '5c706d2507fe409c2a714e1120f54828', 1562837416, 125.000, 19.070, 105.930, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#x131;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToFikir', '11111111111'),
(109, 'd7276281d27f0246f295961e329a126e', 1562845305, 10.000, 1.530, 8.470, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#x131;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToFikir', '11111111111'),
(110, '4dbe482a315006788f09ea3e7c26a28f', 1562863418, 200.000, 30.510, 169.490, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#x131;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToFikir', '22936937304'),
(111, 'd636922aa9d5ca6b31f51171fd7c7bd2', 1562863881, 2500.000, 381.360, 2118.640, 'waiting', '8f33134eacc9067d9a710226db7b4f07', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#x131;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToFikir', '22936937304');

-- --------------------------------------------------------

--
-- Table structure for table `fik_postApproval`
--

CREATE TABLE `fik_postApproval` (
  `id` int(32) NOT NULL,
  `title` varchar(128) NOT NULL,
  `excerpt` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `goal` int(32) NOT NULL,
  `image` varchar(256) NOT NULL,
  `category` varchar(64) NOT NULL,
  `datePosted` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `aboutMe` varchar(256) NOT NULL,
  `decision` varchar(32) NOT NULL,
  `postRewardId` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_postApproval`
--

INSERT INTO `fik_postApproval` (`id`, `title`, `excerpt`, `description`, `goal`, `image`, `category`, `datePosted`, `userId`, `aboutMe`, `decision`, `postRewardId`) VALUES
(1, 'hello', 'hey', 'desc<img src=\"uploads/5f1ecd81a0dcbe73aaf24165755cs.jpg\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\">', 0, 'defaultCover.png', 'mobile', 1560948984, '1', 'asd', 'rejected', ''),
(2, 'r1', 'lknasd', 'kasnd', 0, 'defaultCover.png', 'mobile', 1560952155, '2', 'asd', 'rejected', ''),
(3, 'lkmasd', 'lkkmasdlk', 'lkasdlknasd', 0, 'defaultCover.png', 'mobile', 1560953102, '1', 'asd', 'posted', ''),
(4, 'lasndlk', 'lkasdlk', 'lknasd', 0, 'defaultCover.png', 'mobile', 1560954214, '1', 'asd', '', ''),
(5, 'testing1', 'testins desc', 'desc long<br>', 0, 'defaultCover.png', 'mobile', 1562247168, '1', 'asd', '', ''),
(6, 'lkn', 'k', 'k', 0, 'defaultCover.png', 'mobile', 1562247265, '1', 'asd', '', ''),
(7, 'lk', 'n', 'nn', 0, 'defaultCover.png', 'mobile', 1562247346, '1', 'asd', '', ''),
(8, 'knasd', 'knkn', 'k', 0, 'defaultCover.png', 'mobile', 1562247463, '1', 'asd', '', ''),
(9, 'lknasd', 'lkn', 'lkn', 0, 'defaultCover.png', 'mobile', 1562248237, '1', 'asd', '', 'daf8cc2151edebc3c0010ec3a2caadb1'),
(10, 'askdln', 'lkn', 'lkn', 0, 'defaultCover.png', 'mobile', 1562248315, '1', 'asd', 'posted', '25710280816682e442cc6f60f881bdf1'),
(11, '781', 'lkn', 'lkn', 0, 'defaultCover.png', 'mobile', 1562250553, '1', 'asd', 'posted', '96c55862d745eead782bb32469943264'),
(12, 'Deneme projesi ', 'Websitesini olu&#351;turmak icin deneme amacl&#305; yaz&#305;yorum. Bakal&#305;m admin panelde nas&#305;l gozukuyor...', '  Websitesini olu&#351;turmak icin deneme amacl&#305; yaz&#305;yorum. Bakal&#305;m admin panelde nas&#305;l gozukuyor... \r\n  Bu cocuk bi&#351;iler yapt&#305; ama netice neymi&#351; bu admin icin. Admine nas&#305;l du&#351;uyor bu mesaj merak ettim.', 20000, 'defaultCover.png', 'mobile', 1562276767, '8f33134eacc9067d9a710226db7b4f07', 'Hhhhh', '', 'e93f1934677babadfb513f001c951713'),
(13, 'Deneme proje yaz&#305;m&#305; ', 'Hepinize selam. E&#287;er bu yazd&#305;klar&#305;m&#305; okuyorsan&#305;z tamamd&#305;r. Cunku beni dedteklemeniz gerekiyo.', 'Projeyi ayr&#305;nt&#305;l&#305; tan&#305;t&#305;ma gerek yok. Cok&#351;eyi yazd&#305;k zaten.', 20000, '7FB64794-40D0-44C2-BB85-04F0FFF0E485.jpeg', 'mobile', 1562277375, '8f33134eacc9067d9a710226db7b4f07', 'Fikir Bahc&#305;van&#305; n&#305; Burak Salba&#351;&#305; ile kurmaya cal&#305;&#351;&#305;yoruz bakal&#305;m nerden nere. F&#304;K&#304;R BAHCIVANI K&#304;TLE FONLAMA PLATFORMU.', '', '5893c959704e245a5fac77e39c9c01f5'),
(14, 'lknads', 'laknsd', 'lkknasdlkn', 0, 'defaultCover.png', 'mobile', 1562320029, '1', 'asd', 'posted', ''),
(15, '637', 'asldknlkn', 'asdlkn', 0, 'defaultCover.png', 'mobile', 1562320296, '1', 'asd', 'posted', '927097f7dc35c7ce34703c9bf8b60f9b'),
(16, '3672', 'asldlkasdn', 'knadlkansd', 0, 'defaultCover.png', 'mobile', 1562325170, '1', 'asd', 'posted', '602f9931f08ef7ff8027a1b7689e6434'),
(17, '9172', 'alskdn', 'lkndsa', 0, 'defaultCover.png', 'mobile', 1562663701, '1', 'asd', 'posted', 'f8235e07620c5470aa20feefcf4f835e');

-- --------------------------------------------------------

--
-- Table structure for table `fik_postCategories`
--

CREATE TABLE `fik_postCategories` (
  `id` int(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `count` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_postCategories`
--

INSERT INTO `fik_postCategories` (`id`, `name`, `count`) VALUES
(6, 'mobile', 0),
(2, 'Healthcare', 0),
(3, 'Food', 0),
(4, 'Furniture', 0),
(5, 'Industry', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fik_postComments`
--

CREATE TABLE `fik_postComments` (
  `id` int(32) NOT NULL,
  `postId` int(32) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `datePosted` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_postComments`
--

INSERT INTO `fik_postComments` (`id`, `postId`, `userId`, `comment`, `datePosted`) VALUES
(117, 2, '1', 'Coordinating conjunctions are useful for connecting sentences, but compound sentences often are overused. While coordinating conjunctions can indicate some type of relationship between the two independent clauses in the sentence, they sometimes do not indi', 1562752027),
(118, 10, '8f33134eacc9067d9a710226db7b4f07', 'Hshkygb', 1562752080),
(119, 39, '8f33134eacc9067d9a710226db7b4f07', 'Hdjkflflfl', 1562752133),
(120, 2, '1', 'Hshsh', 1562752181),
(121, 39, '8f33134eacc9067d9a710226db7b4f07', 'Sana problem Ayfer type ', 1562752298),
(122, 39, '8f33134eacc9067d9a710226db7b4f07', 'Hdjkffk', 1562752413),
(123, 39, '8f33134eacc9067d9a710226db7b4f07', 'Nskdllfl', 1562752445),
(124, 2, '1', 'Ggfgh', 1562752512),
(125, 2, '1', 'kasd', 1562752563),
(126, 2, '1', 'asd', 1562753187),
(127, 2, '1', '21', 1562753322),
(128, 2, '1', '21', 1562753416),
(129, 17, '8f33134eacc9067d9a710226db7b4f07', 'Hghghhk', 1562753521),
(130, 19, '1', 'sn', 1562756893),
(131, 19, '1', ' ', 1562756906),
(132, 2, '', 'Ghjghhj', 1562757228),
(133, 2, '1', 'j', 1562760037),
(134, 2, '1', 'PGal', 1562760097),
(135, 2, '1', '727', 1562767826),
(136, 2, '1', 'this website is good and so is the idea!\r\n\r\ngj!\r\n', 1562836538),
(137, 11, 'f69c2fa9256abecbb22a35f0a6ce5439', 'dsadsada', 1562864936),
(138, 11, 'f69c2fa9256abecbb22a35f0a6ce5439', '\"><h1>HTMl Test Bug ', 1562864950),
(139, 11, 'f69c2fa9256abecbb22a35f0a6ce5439', 'tst', 1562864999),
(140, 11, 'f69c2fa9256abecbb22a35f0a6ce5439', 'alskdnasd', 1562865072),
(141, 11, 'f69c2fa9256abecbb22a35f0a6ce5439', 'Use htmlspecialchars and post action have sql inj bug.', 1562865120),
(142, 11, '1', '<h2>asdsad</h2>', 1562922384),
(143, 11, '1', '', 1562922470),
(144, 11, '1', 'asd', 1562922539),
(145, 11, '1', '&lt;h3&gt;asldknasd&lt;/h3&gt;\r\n', 1562922545),
(146, 11, '1', 'Ã‡Ã‡Ã‡Ã‡', 1562922566),
(147, 11, '1', '&lt;script&gt;alert(&quot;asdsad&quot;)&lt;/script&gt;', 1562922591),
(148, 11, '1', '&lt;h3&gt;asldknasd&lt;/h3&gt;Ã‡Ã‡Ã‡Ã‡\r\n&lt;script&gt;alert(&quot;it failed&quot;)&lt;/script&gt;', 1562922794);

-- --------------------------------------------------------

--
-- Table structure for table `fik_postParticipants`
--

CREATE TABLE `fik_postParticipants` (
  `id` int(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `postId` int(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_postParticipants`
--

INSERT INTO `fik_postParticipants` (`id`, `name`, `description`, `image`, `postId`) VALUES
(1, 'Ahsan', 'my name is ahsan', 'image-1635747_960_720.jpg', 2),
(2, 'Osama', 'my name is osama and i am pro', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fik_posts`
--

CREATE TABLE `fik_posts` (
  `id` int(128) NOT NULL,
  `title` varchar(128) NOT NULL,
  `excerpt` varchar(256) NOT NULL,
  `description` longtext NOT NULL,
  `goal` int(64) NOT NULL,
  `image` varchar(256) NOT NULL,
  `category` varchar(32) NOT NULL,
  `datePosted` int(128) NOT NULL,
  `userId` varchar(256) NOT NULL,
  `aboutMe` varchar(256) NOT NULL,
  `views` int(32) NOT NULL,
  `postRewardId` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_posts`
--

INSERT INTO `fik_posts` (`id`, `title`, `excerpt`, `description`, `goal`, `image`, `category`, `datePosted`, `userId`, `aboutMe`, `views`, `postRewardId`) VALUES
(1, 'help 1', 'help 1 exce', 'descripton 1 details', 10000, 'image-1635747_960_720.jpg', '', 0, '1', '', 5, ''),
(2, 'Fikir Bahcivani', 'Donate to Fikir Bahcivani', 'Donate to Fikir Bahcivani. This is a crowd funding startup....', 20000, 'icon.png', 'tect', 0, '2', '', 36, '602f9931f08ef7ff8027a1b7689e6434'),
(3, 'help me 3 please', 'descripton 3 details. thats it exceprt', 'descripton 3 details. thats it', 50000, 'image-1635747_960_720.jpg', 'tech', 0, '2', '', 4, ''),
(4, 'this is 4th title', 'descripton of 4 one bla details. thats it excerpt', 'descripton of 4 one bla details. thats it', 100000, 'image-1635747_960_720.jpg', '', 0, '3', '', 2, ''),
(5, 'this is title', 'exc', 'desc', 123, 'defaultCover.png', 'Tech', 1560427715, '1', 'about me\r\n', 0, ''),
(6, 'laksnd', 'asldkn', 'klansd', 0, 'blue.png', 'Tech', 1560431757, '1', 'about me\r\n', 3, ''),
(7, '', '', '', 0, 'blue.png', 'Tech', 1560506582, '1', 'about me\r\n', 1, ''),
(8, '', '', '', 0, 'defaultCover.png', 'Tech', 1560506626, '1', 'about me\r\n', 0, ''),
(9, 'this', 'asdasd', 'asd', 0, 'blue.png', 'Tech', 1560506690, '1', 'about me\r\n', 1, ''),
(10, 'hey', 'asd32', 'asdsad', 0, 'giphy.gif', 'Tech', 1360511595, '1', 'about me\r\n', 8, ''),
(11, 'hey', 'yo this is video', 'asd', 0, 'movie.mp4', 'Tech', 1260511860, '1', 'about me\r\n', 32, ''),
(12, 'asd', 'asd', 'asd', 0, 'wheat.jpg', 'Tech', 1560515641, '1', 'sad', 2, ''),
(13, 'aksld', 'lkasd', '<div><font size=\"1\"><img src=\"\" alt=\"\" vspace=\"\" hspace=\"\" border=\"0\"><img src=\"\" alt=\"\" vspace=\"\" hspace=\"\" border=\"0\"><br></font></div><div><font size=\"4\">asda</font></div><div><font size=\"4\"><img src=\"uploads/d51ad4cc-49126139 - Copy.jpg\" style=\"width: ', 0, 'defaultCover.png', '', 1560779168, '1', 'asd', 3, ''),
(14, 'slkand', 'asdn', '<!-- #######Â  YAY, I AM THE SOURCE EDITOR! #########--><h1 style=\"color: #5e9ca0;\">You can edit <span style=\"color: #2b2301;\">this demo</span> text!</h1><h2 style=\"color: #2e6c80;\">How to use the editor:</h2><p>Paste your documents in the visual editor on the left or your HTML code in the source editor in the right. <br>Edit any of the two areas and see the other changing in real time.&nbsp;</p><p>Click the <span style=\"background-color: #2b2301; color: #fff; display: inline-block; padding: 3px 10px; font-weight: bold; border-radius: 5px;\">Clean</span> button to clean your source code.</p><h2 style=\"color: #2e6c80;\">Some useful features:</h2><ol style=\"list-style: none; font-size: 14px; line-height: 32px; font-weight: bold;\"><li style=\"clear: both;\"><img style=\"float: left;\" src=\"https://html-online.com/img/01-interactive-connection.png\" alt=\"interactive connection\" width=\"45\"> Interactive source editor</li><li style=\"clear: both;\"><img style=\"float: left;\" src=\"https://html-online.com/img/02-html-clean.png\" alt=\"html cleaner\" width=\"45\"> HTML Cleaning</li><li style=\"clear: both;\"><img style=\"float: left;\" src=\"https://html-online.com/img/03-docs-to-html.png\" alt=\"Word to html\" width=\"45\"> Word to HTML conversion</li><li style=\"clear: both;\"><img style=\"float: left;\" src=\"https://html-online.com/img/04-replace.png\" alt=\"replace text\" width=\"45\"> Find and Replace</li><li style=\"clear: both;\"><img style=\"float: left;\" src=\"https://html-online.com/img/05-gibberish.png\" alt=\"gibberish\" width=\"45\"> Lorem-Ipsum generator</li><li style=\"clear: both;\"><img style=\"float: left;\" src=\"https://html-online.com/img/6-table-div-html.png\" alt=\"html table div\" width=\"45\"> Table to DIV conversion</li></ol><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p><h2 style=\"color: #2e6c80;\">Cleaning options:</h2><table class=\"editorDemoTable\" prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><thead><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Name of the feature</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Example</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Default</td></tr></thead><tbody><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove tag attributes</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><img style=\"margin: 1px 15px;\" src=\"images/smiley.png\" alt=\"laughing\" width=\"40\" height=\"16\"> (except <strong>img</strong>-<em>src</em> and <strong>a</strong>-<em>href</em>)</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove inline styles</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><span style=\"color: green; font-size: 13px;\">You <strong style=\"color: blue; text-decoration: underline;\">should never</strong>&nbsp;use inline styles!</span></td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><strong style=\"font-size: 17px; color: #2b2301;\">x</strong></td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove classes and IDs</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><span id=\"demoId\">Use classes to <strong class=\"demoClass\">style everything</strong>.</span></td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><strong style=\"font-size: 17px; color: #2b2301;\">x</strong></td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove all tags</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">This leaves <strong style=\"color: blue;\">only the plain</strong> <em>text</em>. <img style=\"margin: 1px;\" src=\"images/smiley.png\" alt=\"laughing\" width=\"16\" height=\"16\"></td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove successive &amp;nbsp;s</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Never use non-breaking spaces&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;to set margins.</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><strong style=\"font-size: 17px; color: #2b2301;\">x</strong></td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove empty tags</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Empty tags should go!</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove tags with one &amp;nbsp;</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">This makes&nbsp;no sense!</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><strong style=\"font-size: 17px; color: #2b2301;\">x</strong></td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove span tags</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Span tags with <span style=\"color: green; font-size: 13px;\">all styles</span></td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><strong style=\"font-size: 17px; color: #2b2301;\">x</strong></td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove images</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">I am an image: <img src=\"images/smiley.png\" alt=\"laughing\"></td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove links</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><a href=\"https://html-online.com\">This is</a> a link.</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove tables</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Takes everything out of the table.</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Replace table tags with structured divs</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">This text is inside a table.</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Remove comments</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">This is only visible in the source editor <!-- HELLO! --></td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><strong style=\"font-size: 17px; color: #2b2301;\">x</strong></td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Encode special characters</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><span style=\"color: red; font-size: 17px;\">â™¥</span> <strong style=\"font-size: 20px;\">â˜º â˜…</strong> &gt;&lt;</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\"><strong style=\"font-size: 17px; color: #2b2301;\">x</strong></td></tr><tr><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Set new lines and text indents</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">Organize the tags in a nice tree view.</td><td prevstyle=\" \" style=\"border: 1px dashed #AAAAAA;\">&nbsp;</td></tr></tbody></table><p><strong>&nbsp;</strong></p><p><strong>Save this link into your bookmarks and share it with your friends. It is all FREE! </strong><br><strong>Enjoy!</strong></p><p><strong>&nbsp;</strong></p>', 0, 'defaultCover.png', 'Tech', 1560781846, '1', 'asd', 1, ''),
(15, 'hy', 'asd', '<img src=\"uploads/blue.png\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"middle\">', 0, 'defaultCover.png', 'Tech', 1560781887, '1', 'asd', 3, ''),
(16, 'lasd', 'aslk', 'lkmlkmkasdlkasldk', 0, 'defaultCover.png', 'Tech', 1560783245, '1', 'asd', 1, ''),
(17, 'p2', 'ads', 'lkasdkasd', 1000, 'defaultCover.png', 'Tech', 1520183760, '1', 'asd', 9, ''),
(18, 'lkansd', 'lknasd', 'ams<a href=\"http://google.com\" class=\"\" classname=\"\" target=\"_blank\" name=\"\">dlma</a>sdm', 0, 'defaultCover.png', 'Tech', 1560849379, '1', 'asd', 2, ''),
(19, 'this is new project', 'onasldnlasd', '<div>hey my name is ahsan</div><div><br></div>', 100, 'cs.jpg', 'mobile', 1560860967, '1', 'asd', 4, ''),
(20, 'TITLE', 'desc', '<div>ubiibibib</div><div>hubuhbuhbuh</div><div><img src=\"uploads/c35bf069a2e899fc2246ea849a1blue.png\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\"><br></div>', 0, 'blue.png', 'mobile', 1560884280, '1', 'asd', 2, ''),
(21, 'hello', 'hey', 'desc<img src=\"uploads/5f1ecd81a0dcbe73aaf24165755cs.jpg\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\">', 0, 'defaultCover.png', 'mobile', 1560951630, '1', 'asd', 1, ''),
(22, 'hello', 'hey', 'desc<img src=\"uploads/5f1ecd81a0dcbe73aaf24165755cs.jpg\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\">', 0, 'defaultCover.png', 'mobile', 1560951790, '1', 'asd', 0, ''),
(23, 'hello', 'hey', 'desc<img src=\"uploads/5f1ecd81a0dcbe73aaf24165755cs.jpg\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\">', 0, 'defaultCover.png', 'mobile', 1560951954, '1', 'asd', 1, ''),
(24, 'hello', 'hey', 'desc<img src=\"uploads/5f1ecd81a0dcbe73aaf24165755cs.jpg\" style=\"width: 400px; height: 400px;\" alt=\"image\" vspace=\"\" hspace=\"\" border=\"\" align=\"Middle\">', 0, 'defaultCover.png', 'mobile', 1560951957, '1', 'asd', 1, ''),
(25, 'r1', 'lknasd', 'kasnd', 0, 'defaultCover.png', 'mobile', 1560952175, '1', 'asd', 0, '25710280816682e442cc6f60f881bdf1'),
(26, 'r1', 'lknasd', 'kasnd', 0, 'defaultCover.png', 'mobile', 1560952183, '1', 'asd', 0, ''),
(27, '', '', '', 0, '', '', 1560952258, '0', '', 0, ''),
(28, '', '', '', 0, '', '', 1560952259, '0', '', 0, ''),
(29, '', '', '', 0, '', '', 1560952260, '0', '', 0, ''),
(30, '', '', '', 0, '', '', 1560952260, '0', '', 0, ''),
(31, '', '', '', 0, '', '', 1560952260, '0', '', 0, ''),
(32, '', '', '', 0, '', '', 1560952261, '0', '', 1, ''),
(33, '', '', '', 0, '', '', 1560952261, '0', '', 0, ''),
(34, '', '', '', 0, '', '', 1560952261, '0', '', 0, ''),
(35, '', '', '', 0, '', '', 1560952284, '0', '', 0, ''),
(36, '', '', '', 0, '', '', 1560952286, '0', '', 0, ''),
(37, '', '', '', 0, '', '', 1560952292, '0', '', 0, ''),
(38, '', '', '', 0, '', '', 1560952350, '0', '', 1, ''),
(39, 'lkmasd', 'lkkmasdlk', 'lkasdlknasd', 0, 'defaultCover.png', 'mobile', 1560954174, '1', 'asd', 3, ''),
(40, 'askdln', 'lkn', 'lkn', 0, 'defaultCover.png', 'mobile', 1562248508, '1', 'asd', 2, '25710280816682e442cc6f60f881bdf1'),
(41, '781', 'lkn', 'lkn', 0, 'defaultCover.png', 'mobile', 1562250858, '1', 'asd', 1, '96c55862d745eead782bb32469943264'),
(42, 'lknads', 'laknsd', 'lkknasdlkn', 0, 'defaultCover.png', 'mobile', 1562320086, '1', 'asd', 1, ''),
(43, '637', 'asldknlkn', 'asdlkn', 0, 'defaultCover.png', 'mobile', 1562320305, '1', 'asd', 2, '927097f7dc35c7ce34703c9bf8b60f9b'),
(44, '3672', 'asldlkasdn', 'knadlkansd', 0, 'defaultCover.png', 'mobile', 1562325179, '1', 'asd', 2, '602f9931f08ef7ff8027a1b7689e6434'),
(45, '9172', 'alskdn', 'lkndsa', 0, 'defaultCover.png', 'mobile', 1562663757, '1', 'asd', 4, 'f8235e07620c5470aa20feefcf4f835e');

-- --------------------------------------------------------

--
-- Table structure for table `fik_rewards`
--

CREATE TABLE `fik_rewards` (
  `id` int(32) NOT NULL,
  `postRewardId` varchar(256) NOT NULL,
  `object` varchar(256) NOT NULL,
  `reward` text NOT NULL,
  `deliveryTime` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_rewards`
--

INSERT INTO `fik_rewards` (`id`, `postRewardId`, `object`, `reward`, `deliveryTime`) VALUES
(94, 'addaa0c71904d054d362f29726806f9e', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'deliveryTimelkadskl'),
(93, 'addaa0c71904d054d362f29726806f9e', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'deliveryTime'),
(92, 'cc662c8423fb7dfe2df33624caca33cc', '4ac4f4b9ebca6674dedcbbcba1952ea0', '', ''),
(91, 'cc662c8423fb7dfe2df33624caca33cc', '9892bf01b944967108a473baaac47831', '', ''),
(89, 'cc662c8423fb7dfe2df33624caca33cc', '15', 'lknlk', 'nlkn'),
(90, 'cc662c8423fb7dfe2df33624caca33cc', 'f693fd750bd7d7ebf150fa6c9118717d', '', 'deliveryTime'),
(88, 'cc662c8423fb7dfe2df33624caca33cc', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lkn'),
(87, 'cc662c8423fb7dfe2df33624caca33cc', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'qwslknasdlkn'),
(86, 'cc662c8423fb7dfe2df33624caca33cc', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'lknsadlkn'),
(85, '927097f7dc35c7ce34703c9bf8b60f9b', '4ac4f4b9ebca6674dedcbbcba1952ea0', '', 'deliveryTime'),
(84, '927097f7dc35c7ce34703c9bf8b60f9b', '9892bf01b944967108a473baaac47831', '', 'deliveryTime'),
(82, '927097f7dc35c7ce34703c9bf8b60f9b', '15', 'lkn', 'deliveryTime'),
(83, '927097f7dc35c7ce34703c9bf8b60f9b', 'f693fd750bd7d7ebf150fa6c9118717d', '', 'deliveryTime'),
(81, '927097f7dc35c7ce34703c9bf8b60f9b', '5968406e99c2d10164452ac410db67f1', 'lkn3', 'deliveryTimesa'),
(80, '2878b22a9a941293d84513a5517769b8', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lknk;asnd2', 'deliveryTime'),
(79, '2878b22a9a941293d84513a5517769b8', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lkn1', 'knasd'),
(78, '3071a0618530a738728ed5a30967b086', '4ac4f4b9ebca6674dedcbbcba1952ea0', '', ''),
(77, '3071a0618530a738728ed5a30967b086', '9892bf01b944967108a473baaac47831', '', ''),
(75, '3071a0618530a738728ed5a30967b086', '15', 'lkn', ''),
(76, '3071a0618530a738728ed5a30967b086', 'f693fd750bd7d7ebf150fa6c9118717d', '', ''),
(74, '3071a0618530a738728ed5a30967b086', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lkn'),
(73, '3071a0618530a738728ed5a30967b086', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'lkn'),
(72, '3071a0618530a738728ed5a30967b086', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lkn', 'lknadsdkln'),
(69, '5893c959704e245a5fac77e39c9c01f5', 'f693fd750bd7d7ebf150fa6c9118717d', 'Kupa bardak ve t-&#351;ort.', '05.09.2019'),
(70, '5893c959704e245a5fac77e39c9c01f5', '9892bf01b944967108a473baaac47831', 'Minyatur fikir bahc&#305;van&#305; logolu te&#351;ekkur plaketi.', '05.09.2019'),
(71, '5893c959704e245a5fac77e39c9c01f5', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'Size ozel isminiz yaz&#305;l&#305; plaket takdim edece&#287;iz.', '05.09.2019'),
(95, 'addaa0c71904d054d362f29726806f9e', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lksandads'),
(96, 'addaa0c71904d054d362f29726806f9e', '15', 'lknlk', 'deliveryTime'),
(97, 'addaa0c71904d054d362f29726806f9e', 'f693fd750bd7d7ebf150fa6c9118717d', '', 'deliveryTime'),
(98, 'addaa0c71904d054d362f29726806f9e', '9892bf01b944967108a473baaac47831', '', 'deliveryTime'),
(99, 'addaa0c71904d054d362f29726806f9e', '4ac4f4b9ebca6674dedcbbcba1952ea0', '', 'deliveryTime'),
(100, '602f9931f08ef7ff8027a1b7689e6434', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'deliveryTime'),
(101, '602f9931f08ef7ff8027a1b7689e6434', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'deliveryTimelkadskl'),
(102, '602f9931f08ef7ff8027a1b7689e6434', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lksandads'),
(103, '602f9931f08ef7ff8027a1b7689e6434', '15', 'lknlk', 'deliveryTime'),
(104, '602f9931f08ef7ff8027a1b7689e6434', 'f693fd750bd7d7ebf150fa6c9118717d', ';mads;lm', 'deliveryTime'),
(105, '602f9931f08ef7ff8027a1b7689e6434', '9892bf01b944967108a473baaac47831', 'aslkdn', 'deliveryTime'),
(106, '602f9931f08ef7ff8027a1b7689e6434', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'asd', 'deliveryTime'),
(107, '602f9931f08ef7ff8027a1b7689e6434', '18785a6e863d96882b67f51ec7f691d9', 'lknasdklnasd', 'deliveryTime'),
(108, '602f9931f08ef7ff8027a1b7689e6434', '53a90fd6bf517ec4341d25a76cd8de5f', 'lkn', 'deliveryTimelkadskl'),
(109, '602f9931f08ef7ff8027a1b7689e6434', 'f3edb77210254a26372998c3b4523327', 'lkn', 'lksandads'),
(110, 'da0d658c95b423570601d7961d76f37f', '15', 'lknlk', 'deliveryTime'),
(111, 'da0d658c95b423570601d7961d76f37f', 'f693fd750bd7d7ebf150fa6c9118717d', ';mads;lm', 'deliveryTime'),
(112, 'da0d658c95b423570601d7961d76f37f', '9892bf01b944967108a473baaac47831', 'aslkdn', 'deliveryTime'),
(113, 'da0d658c95b423570601d7961d76f37f', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'asd', 'deliveryTime'),
(114, 'da0d658c95b423570601d7961d76f37f', 'item0', 'reward 0', 'reward 0'),
(115, 'f8235e07620c5470aa20feefcf4f835e', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'deliveryTime'),
(116, 'f8235e07620c5470aa20feefcf4f835e', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'deliveryTimelkadskl'),
(117, 'f8235e07620c5470aa20feefcf4f835e', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lksandads'),
(118, 'f8235e07620c5470aa20feefcf4f835e', '15', 'lknlk', 'deliveryTime'),
(119, 'f8235e07620c5470aa20feefcf4f835e', 'f693fd750bd7d7ebf150fa6c9118717d', ';mads;lm', 'deliveryTime'),
(120, 'f8235e07620c5470aa20feefcf4f835e', '9892bf01b944967108a473baaac47831', 'aslkdn', 'deliveryTime'),
(121, 'f8235e07620c5470aa20feefcf4f835e', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'asd', 'deliveryTime'),
(122, 'f8235e07620c5470aa20feefcf4f835e', 'item0', 'reward 0', 'reward 0'),
(123, '95dc067be82a9b3beb26aa8c2657be79', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'sdvsdf', 'xcfxfg'),
(124, '95dc067be82a9b3beb26aa8c2657be79', 'b2d5e6dbc0a98d106d70dafe524fc365', 'cvncg', ''),
(125, '95dc067be82a9b3beb26aa8c2657be79', '5968406e99c2d10164452ac410db67f1', '', ''),
(126, '95dc067be82a9b3beb26aa8c2657be79', '15', 'ncvncnv ', ''),
(127, '95dc067be82a9b3beb26aa8c2657be79', 'f693fd750bd7d7ebf150fa6c9118717d', '', ''),
(128, '95dc067be82a9b3beb26aa8c2657be79', '9892bf01b944967108a473baaac47831', '', ''),
(129, '95dc067be82a9b3beb26aa8c2657be79', '4ac4f4b9ebca6674dedcbbcba1952ea0', '', ''),
(130, '95dc067be82a9b3beb26aa8c2657be79', '18785a6e863d96882b67f51ec7f691d9', '', ''),
(131, '95dc067be82a9b3beb26aa8c2657be79', '53a90fd6bf517ec4341d25a76cd8de5f', '', ''),
(132, '95dc067be82a9b3beb26aa8c2657be79', 'f3edb77210254a26372998c3b4523327', '', ''),
(133, '95dc067be82a9b3beb26aa8c2657be79', 'item0', 'zfsdf', 'dfsd'),
(134, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'sdvsdf', 'xcfxfg'),
(135, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', 'b2d5e6dbc0a98d106d70dafe524fc365', 'cvncg', ''),
(136, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', '5968406e99c2d10164452ac410db67f1', '', ''),
(137, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', '15', 'ncvncnv ', ''),
(138, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', 'f693fd750bd7d7ebf150fa6c9118717d', '', ''),
(139, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', '9892bf01b944967108a473baaac47831', '', ''),
(140, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', '4ac4f4b9ebca6674dedcbbcba1952ea0', '', ''),
(141, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', '18785a6e863d96882b67f51ec7f691d9', '', ''),
(142, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', '53a90fd6bf517ec4341d25a76cd8de5f', '', ''),
(143, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', 'f3edb77210254a26372998c3b4523327', '', ''),
(144, 'cdc6a7dedb0fbac4403d9ba11d2b1ec6', 'item0', 'zfsdf', 'dfsd'),
(145, 'c8bba5b60bd09efa5c61252e3d80dcd3', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'deliveryTime'),
(146, 'c8bba5b60bd09efa5c61252e3d80dcd3', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'deliveryTimelkadskl'),
(147, 'c8bba5b60bd09efa5c61252e3d80dcd3', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lksandads'),
(148, 'c8bba5b60bd09efa5c61252e3d80dcd3', '15', 'lknlk', 'deliveryTime'),
(149, 'c8bba5b60bd09efa5c61252e3d80dcd3', 'f693fd750bd7d7ebf150fa6c9118717d', ';mads;lm', 'deliveryTime'),
(150, 'c8bba5b60bd09efa5c61252e3d80dcd3', '9892bf01b944967108a473baaac47831', 'aslkdn', 'deliveryTime'),
(151, 'c8bba5b60bd09efa5c61252e3d80dcd3', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'asd', 'deliveryTime'),
(152, 'c8bba5b60bd09efa5c61252e3d80dcd3', '18785a6e863d96882b67f51ec7f691d9', 'reward 0', 'reward 0'),
(153, 'c8bba5b60bd09efa5c61252e3d80dcd3', '53a90fd6bf517ec4341d25a76cd8de5f', '', ''),
(154, 'c8bba5b60bd09efa5c61252e3d80dcd3', 'f3edb77210254a26372998c3b4523327', '', ''),
(155, 'c8bba5b60bd09efa5c61252e3d80dcd3', 'item0', 'reward 0', 'reward 0'),
(156, '34d55c43d10696557d89fcc913a447fc', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'deliveryTime'),
(157, '34d55c43d10696557d89fcc913a447fc', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'deliveryTimelkadskl'),
(158, '34d55c43d10696557d89fcc913a447fc', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lksandads'),
(159, '34d55c43d10696557d89fcc913a447fc', '15', 'lknlk', 'deliveryTime'),
(160, '34d55c43d10696557d89fcc913a447fc', 'f693fd750bd7d7ebf150fa6c9118717d', ';mads;lm', 'deliveryTime'),
(161, '34d55c43d10696557d89fcc913a447fc', '9892bf01b944967108a473baaac47831', 'aslkdn', 'deliveryTime'),
(162, '34d55c43d10696557d89fcc913a447fc', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'asd', 'deliveryTime'),
(163, '34d55c43d10696557d89fcc913a447fc', '18785a6e863d96882b67f51ec7f691d9', 'reward 0', 'reward 0'),
(164, '34d55c43d10696557d89fcc913a447fc', '53a90fd6bf517ec4341d25a76cd8de5f', '', ''),
(165, '34d55c43d10696557d89fcc913a447fc', 'f3edb77210254a26372998c3b4523327', '', ''),
(166, '34d55c43d10696557d89fcc913a447fc', 'item0', 'reward 0', 'reward 0'),
(167, 'cf0c9c21a50a5f1ddea8e0d3c0319335', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'deliveryTime'),
(168, 'cf0c9c21a50a5f1ddea8e0d3c0319335', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'deliveryTimelkadskl'),
(169, 'cf0c9c21a50a5f1ddea8e0d3c0319335', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lksandads'),
(170, 'cf0c9c21a50a5f1ddea8e0d3c0319335', '15', 'lknlk', 'deliveryTime'),
(171, 'cf0c9c21a50a5f1ddea8e0d3c0319335', 'f693fd750bd7d7ebf150fa6c9118717d', ';mads;lm', 'deliveryTime'),
(172, 'cf0c9c21a50a5f1ddea8e0d3c0319335', '9892bf01b944967108a473baaac47831', 'aslkdn', 'deliveryTime'),
(173, 'cf0c9c21a50a5f1ddea8e0d3c0319335', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'asd', 'deliveryTime'),
(174, 'cf0c9c21a50a5f1ddea8e0d3c0319335', '18785a6e863d96882b67f51ec7f691d9', 'reward 0', 'reward 0'),
(175, 'cf0c9c21a50a5f1ddea8e0d3c0319335', '53a90fd6bf517ec4341d25a76cd8de5f', '', ''),
(176, 'cf0c9c21a50a5f1ddea8e0d3c0319335', 'f3edb77210254a26372998c3b4523327', '', ''),
(177, 'cf0c9c21a50a5f1ddea8e0d3c0319335', 'item0', 'reward 0', 'reward 0'),
(178, '2c5a84902d52bbb53e523e6d104115b4', '6fc9c09eb90bcaf4dcd95a1a24e299a7', 'lknasdklnasd', 'deliveryTime'),
(179, '2c5a84902d52bbb53e523e6d104115b4', 'b2d5e6dbc0a98d106d70dafe524fc365', 'lkn', 'deliveryTimelkadskl'),
(180, '2c5a84902d52bbb53e523e6d104115b4', '5968406e99c2d10164452ac410db67f1', 'lkn', 'lksandads'),
(181, '2c5a84902d52bbb53e523e6d104115b4', '15', 'lknlk', 'deliveryTime'),
(182, '2c5a84902d52bbb53e523e6d104115b4', 'f693fd750bd7d7ebf150fa6c9118717d', ';mads;lm', 'deliveryTime'),
(183, '2c5a84902d52bbb53e523e6d104115b4', '9892bf01b944967108a473baaac47831', 'aslkdn', 'deliveryTime'),
(184, '2c5a84902d52bbb53e523e6d104115b4', '4ac4f4b9ebca6674dedcbbcba1952ea0', 'asd', 'deliveryTime'),
(185, '2c5a84902d52bbb53e523e6d104115b4', '18785a6e863d96882b67f51ec7f691d9', 'reward 0', 'reward 0'),
(186, '2c5a84902d52bbb53e523e6d104115b4', '53a90fd6bf517ec4341d25a76cd8de5f', '', ''),
(187, '2c5a84902d52bbb53e523e6d104115b4', 'f3edb77210254a26372998c3b4523327', '', ''),
(188, '2c5a84902d52bbb53e523e6d104115b4', 'item0', 'reward 0', 'reward 0');

-- --------------------------------------------------------

--
-- Table structure for table `fik_shopItems`
--

CREATE TABLE `fik_shopItems` (
  `id` varchar(256) NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` decimal(32,2) NOT NULL,
  `image` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `longDescription` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_shopItems`
--

INSERT INTO `fik_shopItems` (`id`, `name`, `price`, `image`, `description`, `longDescription`) VALUES
('17', 'Papatya', '1.00', 'cicek.png', 'Yaz geldi... Etraftaki papatya kokular&#305; dikkatinizi &ccedil;ekti mi? Haydi bu ho&#351; kokuyu daha da art&#305;ral&#305;m ve bah&ccedil;&#305;vana bah&ccedil;eye ekmesi i&ccedil;in papatya g&ouml;nderelim... Ku&#351;lar, kelebekler, g&ouml;ky&uuml;z&uuml; ve elbette bah&ccedil;&#305;van olduk&ccedil;a heyecanl&#305;!\r\n', 'This is very beneficial. This is very beneficial\r\nThis is very beneficialThis is very beneficialThis is very beneficialThis is very beneficialThis is very beneficialThis is very beneficialThis is very beneficial'),
('18', 'G&uuml;l', '2.50', 'gul.png', 'Aran&#305;zda bah&ccedil;ede size a&#351;kla bakan g&uuml;lleri sevmeyen var m&#305;? G&ouml;kku&#351;a&#287;&#305;n&#305;n renkleri ile mavi g&ouml;ky&uuml;z&uuml;n&uuml;n alt&#305;nda dans ediyorlar. Ama bu dans ahenginde bir ki&#351;i eksikler ve &uuml;zg&uuml;nler... Haydi g&uuml;lleri mutlu edelim ve aralar&#305;na yeni arkada&#351;lar yollayal&#305;m.', 'This Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smellThis Gul flower has a pleseant smell'),
('15', 'Fidan', '500.00', 'fidan.png', 'Bah&ccedil;&#305;van bah&ccedil;esine a&#287;a&ccedil; dikmeye karar vermi&#351;. Ama elinde &#351;u an fidan yok ve bizden destek istedi. Hayal ettikte bah&ccedil;ede a&#287;a&ccedil;larda olursa k&uuml;&ccedil;&uuml;k &ccedil;ocuklar a&#287;a&ccedil;lar&#305;n etraf&#305;nda ko&#351;u&#351;turarak, mutlu olacaklar. Bu mutlulu&#287;u onlara ya&#351;atamazsak, mutsuz olaca&#287;&#305;z. Bah&ccedil;&#305;vana s&uuml;rpriz yapmak i&ccedil;in haz&#305;r m&#305;s&#305;n&#305;z? Haydi bah&ccedil;&#305;van i&ccedil;in fidanlar&#305; toplayal&#305;m.', 'This is FidanThis is FidanThis is FidanThis is FidanThis is Fidan\r\nThis is FidanThis is FidanThis is FidanThis is FidanThis is FidanThis is FidanThis is FidanThis is FidanThis is FidanThis is FidanThis is FidanThis is Fidan'),
('16', 'Su Damlas&#305;', '0.50', 'sudamlasi.png', 'Topra&#287;&#305;m&#305;z ve tohumlar&#305;m&#305;z bulu&#351;tu&#287;una g&ouml;re geriye tek bir &#351;ey kal&#305;yor. Evet tam olarak d&uuml;&#351;&uuml;nd&uuml;&#287;&uuml;n&uuml;z gibi bir su damlas&#305;! Tohumlara ya&#351;am suyunu vererek, mutlulu&#287;u beklemeye var m&#305;s&#305;n&#305;z? Toprak sizi t&uuml;m sab&#305;rs&#305;zl&#305;&#287;&#305; ile bekliyor...\r\n', 'this is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is goodthis is good'),
('14', 'Tohum', '0.25', 'tohum.png', 'Kendi ba&#351;&#305;na ya&#351;ayan k&uuml;&ccedil;&uuml;k bir tohum, bir bah&ccedil;enin ilk mutlulu&#287;udur. Haydi tohumu yaln&#305;z b&#305;rakmayal&#305;m ve bah&ccedil;eyi daha da g&uuml;zelle&#351;tirelim.', 'this is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohumthis is tohum'),
('b2d5e6dbc0a98d106d70dafe524fc365', '&Ccedil;i&ccedil;ek Demeti', '100.00', 'demet.png', 'Biz kar&#351;&#305;y&#305;z &ccedil;i&ccedil;eklerin topraktan kopar&#305;lmas&#305;na, bah&ccedil;&#305;van ister mi hi&ccedil; emeklerinin topraktan kopar&#305;lmas&#305;n&#305;? Elbette bah&ccedil;&#305;van&#305; &uuml;zmek istemeyiz ve eminiz ki hi&ccedil;bir zamanda &uuml;zmeyece&#287;iz. Haydi &ccedil;i&ccedil;eklerle dolu olan bu demeti bah&ccedil;&#305;vana g&ouml;ndererek bah&ccedil;esine ekmesine yard&#305;mc&#305; olal&#305;m. &#304;sme ve foto&#287;rafa ald&#305;rmayal&#305;m demetteki &ccedil;i&ccedil;eklerin k&ouml;kleri hala sa&#287;lam ve toprakla kavu&#351;mak i&ccedil;in bekliyor.', 'Biz kar&#351;&#305;y&#305;z &ccedil;i&ccedil;eklerin topraktan kopar&#305;lmas&#305;na, bah&ccedil;&#305;van ister mi hi&ccedil; emeklerinin topraktan kopar&#305;lmas&#305;n&#305;? Elbette bah&ccedil;&#305;van&#305; &uuml;zmekistemeyiz ve eminiz ki hi&ccedil;bir zamanda &uuml;zmeyece&#287;iz. Haydi &ccedil;i&ccedil;eklerle dolu olan bu demeti bah&ccedil;&#305;vana g&ouml;ndererek bah&ccedil;esine ekmesine yard&#305;mc&#305;olal&#305;m. &#304;sme ve foto&#287;rafa ald&#305;rmayal&#305;m demetteki &ccedil;i&ccedil;eklerin k&ouml;kleri hala sa&#287;lam ve toprakla kavu&#351;mak i&ccedil;in bekliyor.'),
('9892bf01b944967108a473baaac47831', 'Meyve A&#287;ac&#305;', '5000.00', 'agac.png', 'B&uuml;y&uuml;k meyve a&#287;a&ccedil;lar&#305; olsa bah&ccedil;ede her &#351;ey daha da g&uuml;zel durcakm&#305;&#351; gibi duruyor. Sanki her &#351;ey tamamlanacak ve ba&#351;ar&#305; bir ad&#305;m uzakta olcakm&#305;&#351; gibi duruyor. Evet tam d&uuml;&#351;&uuml;nd&uuml;&#287;&uuml;m&uuml;z gibi! Bu g&uuml;zel ve b&uuml;y&uuml;k bah&ccedil;eye meyve a&#287;a&ccedil;lar&#305; laz&#305;m. Bah&ccedil;&#305;van bizden b&ouml;yle bir istekte bulunmad&#305; ama bizim i&#351;imiz bah&ccedil;&#305;van&#305; mutlu etmek. Eee meyve a&#287;a&ccedil;lar&#305; i&ccedil;in sab&#305;rs&#305;zl&#305;kla bekliyoruz Fikir Bah&ccedil;&#305;vanlar&#305; olarak.', 'B&uuml;y&uuml;k meyve a&#287;a&ccedil;lar&#305; olsa bah&ccedil;ede her &#351;ey daha da g&uuml;zel durcakm&#305;&#351; gibi duruyor. Sanki her &#351;ey tamamlanacak ve ba&#351;ar&#305; bir ad&#305;m uzakta olcakm&#305;&#351; gibi duruyor. Evet tam d&uuml;&#351;&uuml;nd&uuml;&#287;&uuml;m&uuml;z gibi!Bu g&uuml;zel ve b&uuml;y&uuml;k bah&ccedil;eye meyve a&#287;a&ccedil;lar&#305; laz&#305;m. Bah&ccedil;&#305;van bizden b&ouml;yle bir istekte bulunmad&#305; ama bizim i&#351;imiz bah&ccedil;&#305;van&#305; mutlu etmek. Eee meyve a&#287;a&ccedil;lar&#305; i&ccedil;in sab&#305;rs&#305;zl&#305;kla bekliyoruz FikirBah&ccedil;&#305;vanlar&#305; olarak.'),
('5968406e99c2d10164452ac410db67f1', 'Budama Makas&#305;', '250.00', 'budamamakasi.png', 'Bah&ccedil;ede g&uuml;zelli&#287;i ve esteti&#287;i bozan birka&ccedil; yabani ot &ccedil;&#305;km&#305;&#351; galiba. Bah&ccedil;&#305;van bu duruma biraz &uuml;zg&uuml;n. Eee ne yapmal&#305;y&#305;z acaba? Bah&ccedil;&#305;vana nas&#305;l\r\nyard&#305;mc&#305; olabiliriz? Aaa bulduk! Onun ihtiyac&#305; elbette bir budama makas&#305; ve ona yard&#305;mc&#305; olacak bir bah&ccedil;&#305;van arkada&#351;. Bah&ccedil;&#305;van bunu duyunca \r\n&ccedil;ok mutlu olacak.', 'BudaMamaskasiBudaMamaskasiBudaMamaskasiBudaMamaskasiBudaMamaskasiBudaMamaskasi'),
('6fc9c09eb90bcaf4dcd95a1a24e299a7', 'Yonca', '10.00', 'yonca.png', 'Yoncas&#305;n sen ye&#351;illiklerin aras&#305;nda... D&ouml;rt yaprakl&#305; olunca insanlar&#305;n umut kayna&#287;&#305; oluyorsun. T&#305;pk&#305; burdaki gibi. Bah&ccedil;&#305;vanbir umut ar&#305;yordu hafif esintide. &#350;imdi sen arkada&#351;lar&#305;n ile beraber bah&ccedil;&#305;van i&ccedil;in b&uuml;y&uuml;k bir umut kayna&#287;&#305; olucaks&#305;n. Ve ba&#351;ar&#305;y&#305; getireceksin k&#305;sa s&uuml;rede...', 'YoncaYoncaYoncaYoncaYonca'),
('883caebaa0b94407e089f4c8f0406c9f', 'Toprak ', '0.10', 'toprak.png', 'Bir toprak par&ccedil;as&#305; ile ne de&#287;i&#351;ebilir ki diye d&uuml;&#351;&uuml;n&uuml;yorsan&#305;z, b&uuml;y&uuml;k bir yan&#305;lg&#305; i&ccedil;erisindesiniz. Unutmay&#305;n ki toprak olmazsa hi&ccedil;bir tohum tek ba&#351;&#305;na bir anlam ifade etmez.', 'ToprakToprakToprakToprakToprakToprak'),
('ec617144ff2c89736719d8b636dfe78a', 'Orkide', '5.00', 'orkide.png', '&Ouml;zelsin sen kimileri i&ccedil;in... Bah&ccedil;ede var olan ayr&#305; bir g&uuml;zellik. Tabiiki de tam olarak ay&#305;rm&#305;yoruz seni di&#287;erlerinden ama sen &ouml;zelsin bir bah&ccedil;&#305;van i&ccedil;in. Kimi zaman bir mutluluk kayna&#287;&#305; kimi zaman g&ouml;zya&#351;lar&#305;n&#305;n sebebi. Nas&#305;l da s&uuml;z&uuml;l&uuml;yorsun hafif bir esintide. Nas&#305;l da bekliyorsun bah&ccedil;&#305;van&#305;n y&uuml;z&uuml;ndeki g&uuml;l&uuml;msemeyi, ama eksiksin gibi... Ama biliyoruz birazdan arkada&#351;lar&#305;n ile bulu&#351;acaks&#305;n.', 'Orkide OrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkideOrkide'),
('4ac4f4b9ebca6674dedcbbcba1952ea0', 'Bah&ccedil;&#305;van Ailesi', '10000.00', 'gelecek.png', 'Biz kocaman bir aileyiz. Her zaman bah&ccedil;&#305;van ve bah&ccedil;&#305;vanlar&#305;n yan&#305;nday&#305;z. Onlar&#305;n ba&#351;ar&#305;s&#305; elbette bizim ba&#351;ar&#305;m&#305;z. Onlar i&ccedil;in her t&uuml;rl&uuml; deste&#287;e var&#305;z. Her zaman onlar&#305;n yan&#305;nday&#305;z ve bunu bah&ccedil;&#305;vanlar &ccedil;ok iyi biliyor. Bizlerin onlar&#305;n yan&#305;nda olmam&#305;z; onlar i&ccedil;in &ccedil;ok fazla anlam ifade ediyor &ccedil;&uuml;nk&uuml; yaln&#305;z de&#287;iller ve yaln&#305;z olduklar&#305;nda ba&#351;ar&#305;l&#305; olman&#305;n zor oldu&#287;unu &ccedil;ok iyi biliyorlar. Biz \"Gelece&#287;e Dokunmak &#304;&ccedil;in El Ele\" slogan&#305; ile gelecek i&ccedil;in &ccedil;al&#305;&#351;&#305;yoruz ve &ccedil;abal&#305;yoruz. Umutluyuz ve umudumuzu hi&ccedil;bir zaman kaybetmeyece&#287;iz. ', 'Geleck is good\r\nGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is goodGeleck is good\r\nGeleck is good'),
('f693fd750bd7d7ebf150fa6c9118717d', 'El Arabas&#305;', '2500.00', 'elarabasi.png', 'Bah&ccedil;ede meyveler ve sebzelerin art&#305;k toplanma zaman&#305; geldi. Bah&ccedil;&#305;van yava&#351; yava&#351; ba&#351;lad&#305; taze ve mis kokulu meyveleri toplamaya... Aaa di&#287;er bah&ccedil;&#305;van arkada&#351;&#305; da sebzeleri topluyor. Eee bir sorumuz var bu kadar &uuml;r&uuml;n&uuml; nas&#305;l ta&#351;&#305;yacaklar? Cevab&#305; hemen bulduk de&#287;il mi? &#304;htiya&ccedil;lar&#305; olan tek &#351;ey el arabas&#305;... Bah&ccedil;&#305;vanlar sesimizi duydu ve olduk&ccedil;a mutlular.', 'Bah&ccedil;ede meyveler ve sebzelerin art&#305;k toplanma zaman&#305; geldi. Bah&ccedil;&#305;van yava&#351; yava&#351; ba&#351;lad&#305; taze ve mis kokulu meyveleri toplamaya... Aaa di&#287;er bah&ccedil;&#305;van arkada&#351;&#305; da sebzeleri topluyor. Eee bir sorumuz var bu kadar &uuml;r&uuml;n&uuml; nas&#305;l ta&#351;&#305;yacaklar? Cevab&#305; hemen bulduk de&#287;il mi? &#304;htiya&ccedil;lar&#305; olan tek &#351;ey el arabas&#305;... Bah&ccedil;&#305;vanlar sesimiziduydu ve olduk&ccedil;a mutlular.\r\n'),
('18785a6e863d96882b67f51ec7f691d9', 'Hayat Suyu Ibrigi', '25.00', 'hayatsuyuibrigi.png', 'lnasdkasndlkasnd', 'lkansdlknasd'),
('53a90fd6bf517ec4341d25a76cd8de5f', 'Yasam Saksisi', '50.00', 'yasamsaksisi.png', 'lkasndlkasdn', 'lnasdlknsad'),
('f3edb77210254a26372998c3b4523327', 'Tohum Sandigi', '1000.00', 'tohumsandigi.png', 'aksndaskldn', 'lnasdkln');

-- --------------------------------------------------------

--
-- Table structure for table `fik_users`
--

CREATE TABLE `fik_users` (
  `id` varchar(256) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `googleId` varchar(256) NOT NULL,
  `about` varchar(256) NOT NULL,
  `userImg` varchar(256) NOT NULL,
  `country` varchar(128) NOT NULL,
  `state` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `streetAddress` varchar(128) NOT NULL,
  `AgreeOption` varchar(64) NOT NULL,
  `isAnon` int(16) NOT NULL,
  `identityNumber` varchar(256) NOT NULL,
  `phoneNumber` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_users`
--

INSERT INTO `fik_users` (`id`, `name`, `email`, `password`, `googleId`, `about`, `userImg`, `country`, `state`, `city`, `streetAddress`, `AgreeOption`, `isAnon`, `identityNumber`, `phoneNumber`) VALUES
('2', 'Fikir Bahcivani', 'sa02908@st.habib.edu.pk', '9ac22a185584b84ebbee5856a5e97083', '123', 'Owner of this website', 'icon.png', '', '', '', '', '', 0, '', ''),
('1', 'Ahsan', 'admin@admin.admin', '3CCE45BF21F047A954E1861C653A14BA', '', 'software developer yes', 'Anomoz_7ec2439dd186457c36c41d1c15bfe4dbcs.jpg', 'Afghanistan', 'Badakhshan', 'Ashkasham', 'Somewhere is karachi', 'moneyToFikir', 0, '11111111111', '+923123213'),
('4', '', 'admin@admin.adminasdads', '', '', '', '', '', '', '', '', '', 0, '', ''),
('2147483647', '', 'admin@admin.adminasdadsasd', 'asd', '', '', '', '', '', '', '', '', 0, '', ''),
('8', '', 'ahsan.ehsas@anomoz.com', '123', '', '', '', '', '', '', '', '', 0, '', ''),
('f69c2fa9256abecbb22a35f0a6ce5439', 'agit', 'csd@hotmail.com.tr', 'c71361ab2d0bfb76fa8464a71ff2f4cb', '', '', 'profilePic.png', '', '', '', '', '', 0, '11111111111', ''),
('1561026009', 'User', 'admin@admin.admin098123', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('122123', 'User', 'admin@admin.admin123123213', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('12290179', 'User', 'admin@admin.admin87120391', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('1870798066', 'User', 'admin@admin.adminwkaslndasd', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('1277757236', 'User', '', 'B7D8DB9BB8D1CA4FAFD915A10B197845', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('1836143345', 'ahsan', 'admin@admin.adminmsad', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('1891966077', 'Burak Salba&amp;#351;&amp;#305;', 'buraksalbasi@outlook.com', '8F7B246ECBBF1589D3DF1B61219B6EFA', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('1116890987', 'klansd', 'laskdn@sad.ds', '437B0F029112689A88115E74012B0B91', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('1499088980', 'Ahsan', 'newaccount@anomoz.com', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('1742840482', 'Kovada hi&#231;bir', 'asd@test.com', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('58c413ef481159135b092de727cd61ae', 'ahsa ', 'oiasd@lkland.c', '23DC573AC77FCD6AC179263C631372B8', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('3d4cdd176b037b21c9e69d441318e0d7', 'asdkn', 'aslkdnl@slkadnc.casd', '3cce45bf21f047a954e1861c653a14ba', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('44164bfc47fe340a021a1898d64a0602', 'Burak Sal', 'gsli_burak_3034@hotmail.com', 'fee7e03bb7d77842221417760d35357a', '', '', 'profilePic.png', '', '', '', '', '', 0, '', ''),
('8f33134eacc9067d9a710226db7b4f07', 'S&#xDC;HEYL N&#x130;ZAMO&#x11E;LU', 'suheylnizamoglu@gmail.com', '001548c8035481e9e523c51e97ba85e5', '', 'suheylnizamoglu@gmail.com', 'Anomoz_ade6eade22a24953dfcbd3ff7d261dd782767E94-5B54-4EE5-87C0-9DAED3152D41.jpeg', 'Turkey', 'Istanbul', 'Esenler', 'Nam&#x131;k Kemal Mahallesi Mostar Caddesi No:1/9', 'moneyToFikir', 1, '22936937304', '5363651206');

-- --------------------------------------------------------

--
-- Table structure for table `fik_views`
--

CREATE TABLE `fik_views` (
  `id` int(32) NOT NULL,
  `postId` int(32) NOT NULL,
  `ip` varchar(64) NOT NULL,
  `class` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fik_views`
--

INSERT INTO `fik_views` (`id`, `postId`, `ip`, `class`) VALUES
(1, 2, '213.194.71.50', '123'),
(2, 1, '213.194.71.50', 'asd'),
(3, 2, '213.194.71.50', 'blog'),
(4, 3, '213.194.71.50', 'post'),
(5, 0, '213.194.71.50', 'post'),
(6, 9, '213.194.71.50', 'post'),
(7, 11, '213.194.71.50', 'post'),
(8, 12, '213.194.71.50', 'post'),
(9, 10, '213.194.71.50', 'post'),
(10, 3, '213.194.71.50', 'blog'),
(11, 2, '213.194.71.50', 'post'),
(12, 14, '213.194.71.50', 'post'),
(13, 15, '213.194.71.50', 'post'),
(14, 13, '213.194.71.50', 'post'),
(15, 16, '213.194.71.50', 'post'),
(16, 5, '213.194.71.50', 'blog'),
(17, 17, '213.194.71.50', 'post'),
(18, 6, '213.194.71.50', 'blog'),
(19, 1, '94.54.229.148', 'post'),
(20, 18, '213.194.71.50', 'post'),
(21, 172, '213.194.71.50', 'post'),
(22, 33, '213.194.71.50', 'blog'),
(23, 4, '213.194.71.50', 'blog'),
(24, 19, '213.194.71.50', 'post'),
(25, 2, '176.88.122.51', 'post'),
(26, 20, '176.88.122.51', 'post'),
(27, 17, '31.13.127.37', 'post'),
(28, 17, '31.13.127.18', 'post'),
(29, 17, '31.13.127.31', 'post'),
(30, 0, '184.72.100.46', 'post'),
(31, 17, '169.60.172.114', 'post'),
(32, 1, '213.194.71.50', 'blog'),
(33, 3, '169.60.49.89', 'blog'),
(34, 2, '94.54.229.148', 'post'),
(35, 1, '94.54.229.148', 'blog'),
(36, 32, '213.194.71.50', 'post'),
(37, 38, '213.194.71.50', 'post'),
(38, 2, '169.60.49.101', 'post'),
(39, 10, '213.194.71.50', 'blog'),
(40, 11, '169.60.49.101', 'post'),
(41, 15, '169.48.198.38', 'post'),
(42, 1123, '213.194.71.50', 'blog'),
(43, 2, '169.60.172.116', 'blog'),
(44, 0, '169.48.198.35', 'post'),
(45, 11, '69.171.251.11', 'post'),
(46, 11, '69.171.251.25', 'post'),
(47, 11, '69.171.251.14', 'post'),
(48, 20, '213.194.71.50', 'post'),
(49, 18, '169.60.172.116', 'post'),
(50, 19, '169.60.172.116', 'post'),
(51, 10, '169.48.198.38', 'post'),
(52, 10, '169.60.49.87', 'post'),
(53, 1, '213.194.71.50', 'post'),
(54, 13, '169.60.172.122', 'post'),
(55, 13213, '213.194.71.50', 'post'),
(56, 1, '169.60.49.87', 'post'),
(57, 6, '213.194.71.50', 'post'),
(58, 6, '54.236.1.15', 'post'),
(59, 6, '54.236.1.18', 'post'),
(60, 2, '169.48.198.35', 'post'),
(61, 11, '176.88.125.12', 'post'),
(62, 1, '176.88.125.12', 'blog'),
(63, 2, '176.88.125.12', 'post'),
(64, 2, '176.88.125.12', 'blog'),
(65, 13, '176.88.125.12', 'post'),
(66, 7, '176.88.125.12', 'post'),
(67, 4, '176.88.125.12', 'post'),
(68, 15, '176.88.125.12', 'post'),
(69, 2, '176.55.172.198', 'post'),
(70, 11, '176.55.172.198', 'post'),
(71, 12, '176.55.172.198', 'post'),
(72, 10, '176.55.172.198', 'post'),
(73, 2, '110.54.178.212', 'post'),
(74, 2, '78.180.128.49', 'post'),
(75, 1, '176.88.125.12', 'post'),
(76, 10, '176.88.125.12', 'post'),
(77, 6, '78.180.128.49', 'blog'),
(78, 17, '94.123.199.25', 'post'),
(79, 39, '213.194.71.50', 'post'),
(80, 21, '213.194.71.50', 'post'),
(81, 2, '146.255.75.221', 'post'),
(82, 883, '176.88.125.12', 'post'),
(83, 2, '5.176.107.136', 'post'),
(84, 9892, '5.176.107.136', 'post'),
(85, 3, '169.60.49.89', 'post'),
(86, 2147483647, '213.194.71.50', 'post'),
(87, 2147483647, '213.194.71.50', 'post'),
(88, 2, '176.88.120.207', 'post'),
(89, 11, '178.246.177.49', 'post'),
(90, 11, '178.246.189.83', 'post'),
(91, 40, '213.194.71.50', 'post'),
(92, 40, '169.60.49.111', 'post'),
(93, 23, '213.194.71.50', 'post'),
(94, 41, '213.194.71.50', 'post'),
(95, 42, '213.194.71.50', 'post'),
(96, 43, '213.194.71.50', 'post'),
(97, 43, '169.60.49.101', 'post'),
(98, 44, '213.194.71.50', 'post'),
(99, 2, '94.123.197.105', 'post'),
(100, 11, '94.123.197.105', 'post'),
(101, 2, '37.154.167.216', 'post'),
(102, 2, '94.123.197.169', 'post'),
(103, 1, '94.123.197.169', 'blog'),
(104, 2, '176.88.122.215', 'post'),
(105, 17, '176.88.122.215', 'post'),
(106, 4, '176.88.126.226', 'post'),
(107, 2, '176.88.126.226', 'post'),
(108, 2, '176.88.127.104', 'post'),
(109, 2, '178.246.153.162', 'post'),
(110, 2, '5.46.236.252', 'post'),
(111, 2, '199.16.157.183', 'post'),
(112, 0, '199.16.157.180', 'post'),
(113, 2, '31.13.127.1', 'post'),
(114, 2, '31.13.127.14', 'post'),
(115, 2, '5.46.241.47', 'post'),
(116, 2, '178.243.108.117', 'post'),
(117, 44, '169.48.198.34', 'post'),
(118, 39, '169.60.49.101', 'post'),
(119, 24, '213.194.71.50', 'post'),
(120, 45, '213.194.71.50', 'post'),
(121, 45, '169.60.49.111', 'post'),
(122, 2, '213.194.71.54', 'post'),
(123, 17, '213.194.71.54', 'post'),
(124, 3, '213.194.71.54', 'post'),
(125, 45, '213.194.71.54', 'post'),
(126, 11, '213.194.71.54', 'post'),
(127, 10, '213.194.71.54', 'post'),
(128, 1, '213.194.71.54', 'post'),
(129, 39, '213.194.71.54', 'post'),
(130, 19, '213.194.71.54', 'post'),
(131, 1, '213.194.71.54', 'blog'),
(132, 2, '178.240.1.108', 'post'),
(133, 2, '178.246.135.164', 'post'),
(134, 45, '176.88.123.146', 'post'),
(135, 2, '176.88.123.146', 'post'),
(136, 2, '31.223.2.231', 'post'),
(137, 19, '31.223.2.231', 'post'),
(138, 10, '31.223.2.231', 'post'),
(139, 17, '31.223.2.231', 'post'),
(140, 3, '31.223.2.231', 'post'),
(141, 11, '31.223.2.231', 'post'),
(142, 11, '94.54.229.148', 'post'),
(143, 10, '94.54.229.148', 'post'),
(144, 11, '85.104.61.188', 'post'),
(145, 2, '85.104.61.188', 'post'),
(146, 12, '213.194.71.54', 'post');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fik_blogComments`
--
ALTER TABLE `fik_blogComments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_blogs`
--
ALTER TABLE `fik_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_cart`
--
ALTER TABLE `fik_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_changePasswordRequest`
--
ALTER TABLE `fik_changePasswordRequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_contributions`
--
ALTER TABLE `fik_contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_draftBlogs`
--
ALTER TABLE `fik_draftBlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_draftProjects`
--
ALTER TABLE `fik_draftProjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_inventory`
--
ALTER TABLE `fik_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_orderItems`
--
ALTER TABLE `fik_orderItems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_orders`
--
ALTER TABLE `fik_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_postApproval`
--
ALTER TABLE `fik_postApproval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_postCategories`
--
ALTER TABLE `fik_postCategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_postComments`
--
ALTER TABLE `fik_postComments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_postParticipants`
--
ALTER TABLE `fik_postParticipants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_posts`
--
ALTER TABLE `fik_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_rewards`
--
ALTER TABLE `fik_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_shopItems`
--
ALTER TABLE `fik_shopItems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_users`
--
ALTER TABLE `fik_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fik_views`
--
ALTER TABLE `fik_views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fik_blogComments`
--
ALTER TABLE `fik_blogComments`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fik_blogs`
--
ALTER TABLE `fik_blogs`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fik_cart`
--
ALTER TABLE `fik_cart`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `fik_changePasswordRequest`
--
ALTER TABLE `fik_changePasswordRequest`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fik_contributions`
--
ALTER TABLE `fik_contributions`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT for table `fik_draftBlogs`
--
ALTER TABLE `fik_draftBlogs`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fik_draftProjects`
--
ALTER TABLE `fik_draftProjects`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fik_inventory`
--
ALTER TABLE `fik_inventory`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `fik_orderItems`
--
ALTER TABLE `fik_orderItems`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `fik_orders`
--
ALTER TABLE `fik_orders`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `fik_postApproval`
--
ALTER TABLE `fik_postApproval`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fik_postCategories`
--
ALTER TABLE `fik_postCategories`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fik_postComments`
--
ALTER TABLE `fik_postComments`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `fik_postParticipants`
--
ALTER TABLE `fik_postParticipants`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fik_posts`
--
ALTER TABLE `fik_posts`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `fik_rewards`
--
ALTER TABLE `fik_rewards`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `fik_views`
--
ALTER TABLE `fik_views`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
