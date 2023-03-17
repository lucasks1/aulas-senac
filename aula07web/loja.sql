-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Mar-2023 às 15:34
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aparelho`
--

CREATE TABLE `aparelho` (
  `codAparelho` int(11) NOT NULL,
  `nomeAparelho` varchar(100) NOT NULL,
  `marcaAparelho` varchar(100) NOT NULL,
  `valorConserto` double DEFAULT NULL,
  `descricaoDefeito` varchar(120) NOT NULL,
  `codCliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codCliente` int(11) NOT NULL,
  `nomeCliente` varchar(100) NOT NULL,
  `cpfCliente` varchar(15) NOT NULL,
  `emailCliente` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codCliente`, `nomeCliente`, `cpfCliente`, `emailCliente`) VALUES
(1, 'finn', '54576823143', 'finn@gmail.com'),
(2, 'lucas', '74747347946', 'luke@gmail.com'),
(3, 'luz', '54642242387', 'noceda@gmail.com'),
(4, 'Amity', '07967564571', 'cat@gmail.com'),
(5, 'zoro', '00573541452', 'santuryu@gmail.com'),
(28, '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aparelho`
--
ALTER TABLE `aparelho`
  ADD PRIMARY KEY (`codAparelho`),
  ADD KEY `aparelho_ibfk_1` (`codCliente`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codCliente`),
  ADD UNIQUE KEY `cpfCliente` (`cpfCliente`),
  ADD UNIQUE KEY `emailCliente` (`emailCliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aparelho`
--
ALTER TABLE `aparelho`
  MODIFY `codAparelho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aparelho`
--
ALTER TABLE `aparelho`
  ADD CONSTRAINT `aparelho_ibfk_1` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
