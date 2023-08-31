-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jan-2023 às 05:23
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
-- Banco de dados: `catalogo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animes`
--

CREATE TABLE `animes` (
  `idAnime` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `estudio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8u;

--
-- Extraindo dados da tabela `animes`
--

INSERT INTO `animes` (`idAnime`, `nome`, `categoria`, `estudio`) VALUES
(1, 'Digimon Adventure', 'Acao/Aventura/Comedia dramatica/Fantasia/Isekai', 'Toei Animation'),
(2, 'Naruto', 'Aventura/Comedia dramatica/Fantasia', 'Pierrot'),
(3, 'Naruto Shippuden', 'Aventura/Comedia dramatica/Fantasia', 'Pierrot'),
(4, 'Pokemon', 'Aventura/Fantasia', 'OLM, Inc/Team Ota(1997-2006)/Team Iguchi(2006-2009)/Team Kato(2010-2022)'),
(5, 'Cardcaptor Sakura', 'Magia', 'Madhouse'),
(6, 'Sailor Moon', 'Shojo', 'Junichi Sato'),
(7, 'Dragon Ball', 'Aventura/Comedia/Artes Maciais', 'Toei Animation/Bird Studio'),
(8, 'Yu-Gi-Oh', 'Aventura/Suspense/Fantasia/Ficcao Cientifica', 'Toei Animation'),
(9, 'Bleach', 'Acao/Aventura/Fantasia/Comedia Dramatica', 'Pierrot'),
(10, 'Inazuma Eleven', 'Esportes/aventura/Fantasia', 'OLM');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`idAnime`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animes`
--
ALTER TABLE `animes`
  MODIFY `idAnime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
