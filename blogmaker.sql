-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/07/2025 às 19:53
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blogmaker`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

/* INSERT INTO `categorias` (`id`, `nome_categoria`) VALUES
(2, 'Categoria da Gata'),
(4, 'Batom da Hellokit'),
(5, 'Sei la alguma coisa de passar na cara');
 */
-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `assunto` text NOT NULL,
  `data_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

/* INSERT INTO `posts` (`id`, `titulo`, `assunto`, `data_post`, `id_categoria`) VALUES
(18, 'Lorem Paisum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nulla voluptatem sit cumque voluptas molestias animi dolores. Explicabo sint ut blanditiis in unde aut nam molestiae, delectus perspiciatis adipisci. Corrupti.', '2025-07-15 16:58:19', 4),
(19, ' Tutorial de PHP completo', 'Segue o chamaaaaaaaa', '2025-07-15 18:05:04', 5);
 */
-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`id_categoria`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
