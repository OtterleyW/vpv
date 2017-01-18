-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16.10.2016 klo 19:29
-- Palvelimen versio: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pikseli`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `vpv_arvonimet`
--

CREATE TABLE IF NOT EXISTS `vpv_arvonimet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arvonimi` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `lyhenne` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `kategoria` enum('NK','VPL') COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Rakenne taululle `vpv_arvonimet_hevoset`
--

CREATE TABLE IF NOT EXISTS `vpv_arvonimet_hevoset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hevonen_id` int(11) NOT NULL,
  `arvonimi_id` int(11) NOT NULL,
  `myonnetty_aika` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `onko_voimassa` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Rakenne taululle `vpv_hevoset`
--

CREATE TABLE IF NOT EXISTS `vpv_hevoset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_nimi` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `rotu_id` int(11) NOT NULL,
  `sukupuoli` enum('ori','tamma','ruuna') COLLATE utf8_swedish_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_swedish_ci NOT NULL,
  `omistaja_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Rakenne taululle `vpv_nk_anomukset`
--

CREATE TABLE IF NOT EXISTS `vpv_nk_anomukset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anottu_aika` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `arvonimi_id` int(11) NOT NULL,
  `sisalto` text COLLATE utf8_swedish_ci NOT NULL,
  `tila` enum('hyvaksytty','hylatty','kasittelematta') COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Rakenne taululle `vpv_omistajat`
--

CREATE TABLE IF NOT EXISTS `vpv_omistajat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `o_nimi` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Rakenne taululle `vpv_rodut`
--

CREATE TABLE IF NOT EXISTS `vpv_rodut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_nimi` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `r_lyhenne` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
