-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 11:37 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descrption` text DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `currentdate` varchar(255) DEFAULT NULL,
  `view` varchar(255) DEFAULT NULL,
  `feature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `descrption`, `img`, `currentdate`, `view`, `feature`) VALUES
(130, 'Workers install a giant traditional fanous lantern, a symbol of Ramadan festivities that dates back more than 800 years, in Gaza City on 12 April', 'Workers install a giant traditional fanous lantern, a symbol of Ramadan festivities that dates back more than 800 years, in Gaza City on 12 April', 'ÙØ§Ù†ÙˆØ³.jpg', 'April 13, 2021, 10:17 pm', 'view', 'feature'),
(131, 'A worker sprays disinfectant to sanitise a mosque to help stop the spread of coronavirus on the first day of Ramadan in Peshawar, Pakistan', 'In the UK, the iftar meal to break the fast at sunset is usually shared with family and friends, but because of the lockdown, such meetings will be restricted.\r\n\r\nHowever, while mixing between households was banned during Ramadan in 2020, this year the festival coincides with the easing of some lockdown rules in England.\r\n\r\nUp to six people or two households can now gather outdoors and restaurants will be able to serve meals outdoors.\r\n\r\nElsewhere around the world, similar lockdown restrictions and rules are in place, such as wearing face masks whilst worshipping.', 'ØªØ¹Ù‚ÙŠÙ…jpg.jpg', 'April 13, 2021, 10:19 pm', 'view', 'feature'),
(132, 'A worshipper performs the first Tarawih prayer of Ramadan at the Diyanet Center of America in Washington, US (above and below)', 'In a tweet, the United Arab Emirates (UAE) authorities asked people to &quot;avoid evening gatherings during Ramadan, limit family visits, and avoid distributing and exchanging meals between homes and families&quot;.', 'ØµÙ„Ø§Ø© .jpg', 'April 13, 2021, 10:21 pm', 'view', 'feature'),
(136, 'Hansi Flick: The Bayern Munich boss who could walk away', 'It was arguably the most intense one-on-one in German football in recent weeks. It took place not on any pitch but behind closed doors at Bayern Munich.', 'Ø±ÙŠØ§Ø¶Ø©.jpg', 'April 13, 2021, 11:41 pm', 'view', 'nofeature'),
(138, 'Tottenham 1-3 Man Utd: Is it time for Harry Kane to leave Spurs?', 'It should be stressed 27-year-old Kane has made no noises to suggest he is seeking the exit, but common sense dictates a second season playing outside the Champions League is hardly likely to hold huge appeal to this world-class striker in his peak years, especially as someone who has yet to win any silverware.', '_1sdsd.jpg', 'April 14, 2021, 12:24 am', 'view', 'feature'),
(140, 'Notifications, Live Guide, MySport and social media with BBC Sport', 'Notifications, Live Guide, MySport and social media with BBC Sport', 'Ø³ÙŠØ³ÙŠÙŠØ³.png', 'April 14, 2021, 12:19 am', 'view', 'nofeature');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(12, 'Ahmed Salha', 'ahmedsalha130@gmail.com', 'Sport', 'Hello Mr Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `img`) VALUES
(20, 'ahmed', 'ahmedsalha130@gmail.com', 'ahmedsalha130@gmail.com', '123', 'photo_Ù¢Ù Ù¢Ù¡-Ù Ù¤-Ù Ù£_Ù¢Ù -Ù¤Ù¡-Ù¡Ù¤.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
