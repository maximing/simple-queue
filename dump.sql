-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 167, 2015 at 22:42 PM
-- Server version: 5.5.38
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `queue`
--
CREATE DATABASE IF NOT EXISTS `queue` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `queue`;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
CREATE TABLE `Messages` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) DEFAULT '',
  `text` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10011 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10011;