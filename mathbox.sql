-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2017 at 12:02 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mathbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `IDFONCTION` int(11) NOT NULL AUTO_INCREMENT,
  `IDUSER` int(11) NOT NULL,
  `FONCTION` text NOT NULL,
  `DATEFONCTION` datetime NOT NULL,
  PRIMARY KEY (`IDFONCTION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `ID_OPERATION` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE_OPERATION` varchar(100) NOT NULL,
  `DESCRIPTION_OPERATION` text NOT NULL,
  `DATE_CREATIONOPERATION` datetime NOT NULL,
  PRIMARY KEY (`ID_OPERATION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `resultat`
--

CREATE TABLE IF NOT EXISTS `resultat` (
  `ID_RESULTAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USER` int(11) NOT NULL,
  `ID_OPERATION` int(11) NOT NULL,
  `RESULTAT` varchar(100) NOT NULL,
  `DATE_CREATIONRESULTAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_RESULTAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `MATRICULE_USER` varchar(100) NOT NULL,
  `NOM_USER` varchar(100) NOT NULL,
  `EMAIL_USER` varchar(150) NOT NULL,
  `PASS_USER` varchar(100) NOT NULL,
  `DATE_CREATIONUSER` datetime NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `MATRICULE_USER`, `NOM_USER`, `EMAIL_USER`, `PASS_USER`, `DATE_CREATIONUSER`) VALUES
(1, 'ISTDI12E004428', 'Sanix', 'saadjio@yahoo.fr', 'cf9ee5bcb36b4936dd7064ee9b2f139e', '2017-02-11 00:59:00'),
(2, 'ISTDI13E025528', 'lolopiom', 'asas@yahoo.fr', 'fcea920f7412b5da7be0cf42b8c93759', '2017-02-11 01:02:48'),
(3, 'ISTDI12E004422', 'Sanix', 'sanix@yahoo.fr', 'cf9ee5bcb36b4936dd7064ee9b2f139e', '2017-03-08 13:41:54');
