-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jul-2021 às 02:43
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `contatos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` text DEFAULT NULL,
  `telefone` text DEFAULT NULL,
  `endereco` text DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `telefone`, `endereco`, `email`) VALUES
(7, 'Fabricio Oliveira', '(11) 97843-3443', 'Av Paulista, 442', 'juliano@gmail.com'),
(8, 'Jeferson Pereira', '(11) 97843-3443', 'Av Paulista, 442', 'juliano@gmail.com'),
(9, 'Antonio Golçalves', '(11) 97843-3443', 'Av Paulista, 442', 'juliano@gmail.com'),
(10, 'Ronaldo José', '(11) 97843-3443', 'Av Paulista, 442', 'juliano@gmail.com'),
(11, 'Roberto de Souza', '(11) 97843-3443', 'Av Paulista, 442', 'juliano@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
