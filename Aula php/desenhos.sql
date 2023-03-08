-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2023 às 03:36
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desenhos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `desenho`
--

CREATE TABLE `desenho` (
  `idDesenho` int(20) NOT NULL,
  `nomedese` varchar(100) NOT NULL,
  `tipodese` varchar(100) NOT NULL,
  `temporadese` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `desenho`
--

INSERT INTO `desenho` (`idDesenho`, `nomedese`, `tipodese`, `temporadese`) VALUES
(1, 'lua sangrenta', 'lemo', '2'),
(2, 'hora de aventura', 'desenho', '3'),
(3, '0', '0', ''),
(4, '0', '0', '2'),
(5, '0', '0', ''),
(6, '0', '0', '2'),
(9, 'hisa', 'wd', '2'),
(10, '', '', ''),
(12, '', '', ''),
(13, '', '', ''),
(14, 'shitai tensei', 'anime', '1'),
(15, '', '', ''),
(16, '', '', ''),
(17, '', '', ''),
(18, 'kenja no mago', 'desenho', '2'),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, 'one piece', 'desenho', '2'),
(23, '', '', ''),
(24, 'one piece', 'desenho', '2'),
(25, '', '', ''),
(26, '', '', ''),
(27, '', '', ''),
(28, 'kenja no mago', 'desenho', '1'),
(29, '', '', ''),
(30, 'ferb', 'desenho', '3'),
(31, '', '', ''),
(32, 'one piece', 'desenho', '1000'),
(33, '', '', ''),
(34, 'one piece', 'desenho', '1000'),
(35, 'one piece', 'desenho', '1000'),
(36, 'one piece', 'desenho', '1000'),
(37, 'one piece', 'desenho', '1000'),
(38, '', '', ''),
(39, 'one piece', 'desenho', '2'),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, 'one piece', 'desenho', '2'),
(44, '', '', ''),
(45, 'one piece', 'desenho', '2'),
(46, 'one piece', 'desenho', '2'),
(47, '', '', ''),
(48, '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `desenho`
--
ALTER TABLE `desenho`
  ADD PRIMARY KEY (`idDesenho`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `desenho`
--
ALTER TABLE `desenho`
  MODIFY `idDesenho` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
