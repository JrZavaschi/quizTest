-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Ago-2018 às 05:59
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiztest`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ms_login`
--

CREATE TABLE `ms_login` (
  `HANDLE` int(10) NOT NULL,
  `NAME` varchar(99) DEFAULT NULL,
  `LOGIN` varchar(99) DEFAULT NULL,
  `PASSWORD` varchar(99) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ms_login`
--

INSERT INTO `ms_login` (`HANDLE`, `NAME`, `LOGIN`, `PASSWORD`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'Administrator', 'trezo', 'e8d95a51f3af4a3b134bf6bb680a213a', '2018-08-19 00:48:23', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `qz_answer`
--

CREATE TABLE `qz_answer` (
  `HANDLE` int(10) NOT NULL,
  `QUESTION` int(10) DEFAULT NULL,
  `IS_CORRECT` varchar(1) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `NAME` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `qz_executed`
--

CREATE TABLE `qz_executed` (
  `HANDLE` int(10) NOT NULL,
  `QUIZ` int(10) DEFAULT NULL,
  `NAME` varchar(99) DEFAULT NULL,
  `EMAIL` varchar(99) DEFAULT NULL,
  `INITIALIZED_AT` datetime DEFAULT NULL,
  `COMPLETED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `qz_executed_question`
--

CREATE TABLE `qz_executed_question` (
  `HANDLE` int(10) NOT NULL,
  `EXECUTED` int(10) DEFAULT NULL,
  `QUESTION` int(10) DEFAULT NULL,
  `IS_CORRECT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `qz_question`
--

CREATE TABLE `qz_question` (
  `HANDLE` int(10) NOT NULL,
  `QUIZ` int(10) DEFAULT NULL,
  `TYPE` varchar(99) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  `NAME` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `qz_quiz`
--

CREATE TABLE `qz_quiz` (
  `HANDLE` int(10) NOT NULL,
  `NAME` varchar(99) DEFAULT NULL,
  `DESCRIPTION` varchar(99) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_login`
--
ALTER TABLE `ms_login`
  ADD PRIMARY KEY (`HANDLE`);

--
-- Indexes for table `qz_answer`
--
ALTER TABLE `qz_answer`
  ADD PRIMARY KEY (`HANDLE`);

--
-- Indexes for table `qz_executed`
--
ALTER TABLE `qz_executed`
  ADD PRIMARY KEY (`HANDLE`);

--
-- Indexes for table `qz_executed_question`
--
ALTER TABLE `qz_executed_question`
  ADD PRIMARY KEY (`HANDLE`);

--
-- Indexes for table `qz_question`
--
ALTER TABLE `qz_question`
  ADD PRIMARY KEY (`HANDLE`);

--
-- Indexes for table `qz_quiz`
--
ALTER TABLE `qz_quiz`
  ADD PRIMARY KEY (`HANDLE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_login`
--
ALTER TABLE `ms_login`
  MODIFY `HANDLE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qz_answer`
--
ALTER TABLE `qz_answer`
  MODIFY `HANDLE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `qz_executed`
--
ALTER TABLE `qz_executed`
  MODIFY `HANDLE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `qz_executed_question`
--
ALTER TABLE `qz_executed_question`
  MODIFY `HANDLE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `qz_question`
--
ALTER TABLE `qz_question`
  MODIFY `HANDLE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `qz_quiz`
--
ALTER TABLE `qz_quiz`
  MODIFY `HANDLE` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
