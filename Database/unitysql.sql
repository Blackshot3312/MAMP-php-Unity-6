-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09-Nov-2024 às 00:39
-- Versão do servidor: 5.7.24
-- versão do PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `unitysql`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `players`
--

CREATE TABLE `players` (
  `id` int(10) NOT NULL,
  `username` varchar(16) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `score` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `players`
--

INSERT INTO `players` (`id`, `username`, `hash`, `salt`, `score`) VALUES
(1, 'Blackshot31', '$5$rounds=5000$stemedhamsBlacks$zdZuariMsyEFzUrC0uW6/t6HKM2ANIfuw3qRTxON9p2', '$5$rounds=5000$stemedhamsBlackshot31$', 39),
(2, '[GM]Blackshot', '$5$rounds=5000$stemedhams[GM]Bl$HEt50CyCeJlPvYv.eMWmITGneQ/UhalLRsLEJWWRvh3', '$5$rounds=5000$stemedhams[GM]Blackshot$', 0),
(4, 'Blackshot32', '$5$rounds=5000$stemedhamsBlacks$UY4AaK2fKN4Scp0CSGS4TVBXKc7irCdHI5caLkR3PX.', '$5$rounds=5000$stemedhamsBlackshot32$', 0),
(5, 'Blackshot30', '$5$rounds=5000$stemedhamsBlacks$zdZuariMsyEFzUrC0uW6/t6HKM2ANIfuw3qRTxON9p2', '$5$rounds=5000$stemedhamsBlackshot30$', 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
