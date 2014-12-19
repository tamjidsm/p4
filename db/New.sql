-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2014 at 06:11 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_catelog`
--

CREATE TABLE IF NOT EXISTS `blog_catelog` (
  `blog_id` int(10) unsigned NOT NULL,
  `catelog_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE IF NOT EXISTS `bloggers` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=115 ;

--
-- Dumping data for table `bloggers`
--

INSERT INTO `bloggers` (`id`, `created_at`, `updated_at`, `name`, `age`, `gender`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Tamjid', 30, 0),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Adam', 50, 0),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Erick', 40, 1),
(4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Sam', 28, 0),
(7, '2014-12-18 18:25:42', '2014-12-18 18:25:42', 'Mary Thomas', 47, 1),
(11, '2014-12-18 18:29:51', '2014-12-18 18:29:51', 'Andrew Sollovan', 35, 0),
(12, '2014-12-18 18:29:26', '2014-12-18 18:29:26', 'Sm Tamjid', 35, 10);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `blogger_id` int(10) unsigned NOT NULL,
  `text` longtext COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `created_at`, `updated_at`, `title`, `blogger_id`, `text`, `category`, `published`) VALUES
(40, '2014-12-18 11:32:43', '2014-12-18 11:32:43', 'simple header', 4, 'This is interesting content to follow!', '', 2002),
(49, '2014-12-19 08:47:59', '2014-12-19 08:47:59', 'there is something about this', 3, 'you shared your experience on a particular event/situation or whether have you looked for similar things? >>Ans: Being a technology blogger, he has posted many blogs particular to programing experience.  >1b) FUQ: Well, are you familiar with reviewing website on a service or product ', '', 2002);

-- --------------------------------------------------------

--
-- Table structure for table `catelogs`
--

CREATE TABLE IF NOT EXISTS `catelogs` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_14_215844_create_bloggers_table', 1),
('2014_12_14_215855_create_blogs_table', 1),
('2014_12_14_220909_create_catelogs_table', 1),
('2014_12_14_221239_create_blog_catelog_table', 1),
('2014_12_14_221316_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `remember_token`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'tamjidsm@yahoo.com', 'gDb9OvOdAc48gTzLZZBgPfeq1JiuiEnygppETLuoESwXAaehCz1KUP8gt9eX', '$2y$10$l3B6XjyLWDWKHU64L8r.YeyNKyIdnIHKkJMwQx9Ftx2qOH1aNzQaa', '', '', '2014-12-15 04:22:05', '2014-12-15 10:21:42'),
(3, 'tamjidsm@gmail.com', 'YrHgG1k32e6gW9a9cDYOxEShOJYWFKXeTcpoATK0m8MRnNxyGzGJ8wL6PFmn', '$2y$10$yV9CnYYSSpxwRnjMnfNunOB0s9qhcwLlKqC7YPXlImNG7ZvUm4tO.', '', '', '2014-12-15 10:22:47', '2014-12-15 10:23:41'),
(4, 'sim@sim.com', 'VNRYWh2v3c53Tfo1bUG3rVQUW6v5izMN4YbZ6zRhuVGM1hPjrvzzFKdwt9S3', '$2y$10$pYF/X.0LGnj83sz7osX3pOegX8kzUduCFY054b0zhfDPv.38n1Ky.', '', '', '2014-12-15 10:24:57', '2014-12-19 08:47:36'),
(5, 'khan@khan.com', '', '$2y$10$dmVpivEshOfbicPsg5D2pOZbKPECkBlDRv/IGFL26zqB3j53EjeDO', '', '', '2014-12-15 10:28:00', '2014-12-15 10:28:00'),
(6, 'khan@khana.com', '', '$2y$10$xoabaf.61QRMEMjF6rSQ4.lA/bh6UMSk5FBHwFISxSGsujfJw4TMq', '', '', '2014-12-17 05:42:08', '2014-12-17 05:42:08'),
(11, 'DNR@dnr.com', 'hdDWoIfHvrycpvWrQAQN523GiM3dscRhRoxn7LhOri8Ljsp1rhWiYx2bMZuR', '$2y$10$L9KDlhnOQW0BXINZ6638fu2UhRPfs1qZSpyWjJNvc6Wf5BukfROjG', '', '', '2014-12-18 10:55:15', '2014-12-18 10:56:05'),
(12, 'khan@khan11.com', 'ktZL5A8GC7AifHZHKNeMlnGKBAx4EhAjiBLjpAKTzj6aXdur3FU2vtZf8ySb', '$2y$10$r3pX4V9fTevgX1v/3r0sz.HVdp0plFjMCqtj8cGObPN9VbP04CWHC', '', '', '2014-12-18 10:56:17', '2014-12-18 11:15:04'),
(13, 'dr@dr.com', 'tIns4LbMPH1MtiGybSEfPvR7inWdiq4PtG7aI7xUUmSw1YppIp7yfNraxitd', '$2y$10$e9vNE4H/ComZ3VT3Z/ZUs.Cu1eO3gOIyPs3CXMMCgr0vb7h6zQ4pO', '', '', '2014-12-18 11:30:31', '2014-12-18 11:59:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_catelog`
--
ALTER TABLE `blog_catelog`
 ADD KEY `blog_catelog_blog_id_foreign` (`blog_id`), ADD KEY `blog_catelog_catelog_id_foreign` (`catelog_id`);

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
 ADD PRIMARY KEY (`id`), ADD KEY `blogs_blogger_id_foreign` (`blogger_id`);

--
-- Indexes for table `catelogs`
--
ALTER TABLE `catelogs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `catelogs`
--
ALTER TABLE `catelogs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_catelog`
--
ALTER TABLE `blog_catelog`
ADD CONSTRAINT `blog_catelog_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`),
ADD CONSTRAINT `blog_catelog_catelog_id_foreign` FOREIGN KEY (`catelog_id`) REFERENCES `catelogs` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
ADD CONSTRAINT `blogs_blogger_id_foreign` FOREIGN KEY (`blogger_id`) REFERENCES `bloggers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
