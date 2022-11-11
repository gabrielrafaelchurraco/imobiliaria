-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2022 às 18:19
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
-- Banco de dados: `gestao_imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `telefone` int(11) NOT NULL,
  `endereco` varchar(25) NOT NULL,
  `numero` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cep` int(15) NOT NULL,
  `valor` int(20) NOT NULL,
  `area` varchar(30) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `num_quartos` varchar(30) NOT NULL,
  `num_wc` varchar(30) NOT NULL,
  `num_suites` varchar(30) NOT NULL,
  `proprietario` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dt_anuncio` int(11) DEFAULT NULL,
  `vagas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `titulo`, `descricao`, `telefone`, `endereco`, `numero`, `estado`, `cidade`, `bairro`, `cep`, `valor`, `area`, `tipo`, `num_quartos`, `num_wc`, `num_suites`, `proprietario`, `email`, `dt_anuncio`, `vagas`) VALUES
(6, '4499479478', 'rggamer1000@gmail.com', 2147483647, 'Casa', 162, 'SP', 'São Manoel Do Paraná', 'Centro praça', 87215, 1, '35M', 'Apartamento', '123', '54', '56', 'Bi Utilidades', 'rggamer1000@gmail.com', 2022, '3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
