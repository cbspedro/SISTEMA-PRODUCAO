-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2022 at 02:31 PM
-- Server version: 5.6.51-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Company`
--

-- --------------------------------------------------------

--
-- Table structure for table `chamados`
--

CREATE TABLE `chamados` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `cliente` int(11) NOT NULL,
  `serv` text COLLATE utf8_unicode_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `equip` int(11) NOT NULL,
  `obs` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `id` int(11) NOT NULL,
  `ns` text COLLATE utf8_unicode_ci NOT NULL,
  `final` int(11) NOT NULL,
  `ocp` int(6) UNSIGNED ZEROFILL NOT NULL,
  `recebido` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `cliente` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `problema` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `obs` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ent` mediumtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checklist2`
--

CREATE TABLE `checklist2` (
  `id` int(11) NOT NULL,
  `tec` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `serv` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `obs` text COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `hrs` time NOT NULL,
  `os` int(11) NOT NULL,
  `clienid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `endereco` text NOT NULL,
  `cep` text NOT NULL,
  `cidade` text NOT NULL,
  `estado` text NOT NULL,
  `contato` text NOT NULL,
  `fone` text NOT NULL,
  `contato2` text NOT NULL,
  `fone2` text NOT NULL,
  `visita` tinyint(1) NOT NULL,
  `email` text NOT NULL,
  `maq` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `maquinas`
--

CREATE TABLE `maquinas` (
  `id` int(11) NOT NULL,
  `ns` int(4) UNSIGNED ZEROFILL NOT NULL,
  `clienid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obs`
--

CREATE TABLE `obs` (
  `id` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `tec` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `obs` text NOT NULL,
  `ativa` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ocp`
--

CREATE TABLE `ocp` (
  `ocp` int(6) UNSIGNED ZEROFILL NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tec` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oss`
--

CREATE TABLE `oss` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `cliente` text NOT NULL,
  `natureza` text NOT NULL,
  `equipamento` text NOT NULL,
  `modelo` text NOT NULL,
  `ns` text NOT NULL,
  `hrsdeuso` text NOT NULL,
  `manutencao` text NOT NULL,
  `lacrado` text NOT NULL,
  `problema` text NOT NULL,
  `causa` text NOT NULL,
  `avaltec` text NOT NULL,
  `momento` text NOT NULL,
  `servexec` text NOT NULL,
  `hrsini` text NOT NULL,
  `hrster` text NOT NULL,
  `desinf` text NOT NULL,
  `obs` text NOT NULL,
  `materiais1` text NOT NULL,
  `qtd1` int(11) NOT NULL,
  `materiais2` text NOT NULL,
  `qtd2` int(11) NOT NULL,
  `materiais3` text NOT NULL,
  `qtd3` int(11) NOT NULL,
  `materiais4` text NOT NULL,
  `qtd4` int(11) NOT NULL,
  `conforme` text NOT NULL,
  `tec` text NOT NULL,
  `recebemos` text NOT NULL,
  `recebedor` text NOT NULL,
  `recebedorcpf` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ck` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `ns` int(4) UNSIGNED ZEROFILL NOT NULL,
  `ocp` int(6) UNSIGNED ZEROFILL NOT NULL,
  `clienid` int(11) NOT NULL,
  `1` text COLLATE utf8_unicode_ci NOT NULL,
  `2` text COLLATE utf8_unicode_ci NOT NULL,
  `3` text COLLATE utf8_unicode_ci NOT NULL,
  `4` text COLLATE utf8_unicode_ci NOT NULL,
  `5` text COLLATE utf8_unicode_ci NOT NULL,
  `6` text COLLATE utf8_unicode_ci NOT NULL,
  `7` text COLLATE utf8_unicode_ci NOT NULL,
  `8` text COLLATE utf8_unicode_ci NOT NULL,
  `9` text COLLATE utf8_unicode_ci NOT NULL,
  `embalada` int(11) NOT NULL DEFAULT '0',
  `prio` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `obs` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servs`
--

CREATE TABLE `servs` (
  `id` int(11) NOT NULL,
  `servs` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `type` text COLLATE utf8_unicode_ci NOT NULL,
  `adm` int(11) NOT NULL DEFAULT '0',
  `beta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `tec` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist2`
--
ALTER TABLE `checklist2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obs`
--
ALTER TABLE `obs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocp`
--
ALTER TABLE `ocp`
  ADD PRIMARY KEY (`ocp`);

--
-- Indexes for table `oss`
--
ALTER TABLE `oss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`ns`);

--
-- Indexes for table `servs`
--
ALTER TABLE `servs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklist2`
--
ALTER TABLE `checklist2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obs`
--
ALTER TABLE `obs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ocp`
--
ALTER TABLE `ocp`
  MODIFY `ocp` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oss`
--
ALTER TABLE `oss`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `ns` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servs`
--
ALTER TABLE `servs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
