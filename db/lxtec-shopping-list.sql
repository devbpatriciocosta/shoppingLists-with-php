-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Out-2023 às 03:05
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lxtec-shopping-list`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID da conta.',
  `name` varchar(191) NOT NULL COMMENT 'Nome completo.',
  `login` varchar(191) NOT NULL COMMENT 'Login.',
  `pw` varchar(191) NOT NULL COMMENT 'Hashed Password.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `login`, `pw`) VALUES
(1, 'Murilo', 'Murilo', '$2y$10$NZcwiSseZ10qJoDDw0WO7egQQ89xoqNmhiSFY1uPUQfAh/L1av69i');

-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID do item que pode aparecer na lista.',
  `name` varchar(191) NOT NULL COMMENT 'Nome do item'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='Um amostra dos itens que podem ser adicionados na lista.';

--
-- Extraindo dados da tabela `items`
--

INSERT INTO `items` (`id`, `name`) VALUES
(15, 'Alho'),
(22, 'Areia de Gato'),
(19, 'Arroz'),
(8, 'Batata'),
(29, 'Broca 8mm'),
(14, 'Cebola'),
(16, 'Cenoura'),
(4, 'Cerveja'),
(5, 'Chocolate'),
(35, 'Chopp'),
(6, 'Costela de porco'),
(12, 'Coxinha'),
(11, 'Dipirona'),
(17, 'Feijão'),
(10, 'Fraldas - Pampers'),
(37, 'Item teste'),
(3, 'Leite'),
(31, 'Lenço umedecido - Aloe Vera'),
(34, 'Lombo suíno com bacon'),
(18, 'Macarrão'),
(2, 'Manteiga'),
(28, 'Martelo'),
(9, 'Miojo'),
(27, 'Pregos'),
(1, 'Pão'),
(36, 'Pão de Alho'),
(23, 'Ração Super Premium'),
(32, 'Sabonete'),
(30, 'Shampoo'),
(20, 'Sorvete de Flocos'),
(24, 'Sorvete de Frutas Vermelhas'),
(13, 'Suco de laranja'),
(38, 'Teste Item 2'),
(7, 'Tomate'),
(33, 'Vazio'),
(26, 'asasa'),
(25, 'asdasda'),
(21, 'hdfgdfgd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `list`
--

CREATE TABLE `list` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID da lista de itens.',
  `list_id` int(10) UNSIGNED NOT NULL COMMENT 'Chave Estrangeira para a tabela de listas',
  `item_id` int(10) UNSIGNED NOT NULL COMMENT 'Chave Estrangeira para a tabela de itens.',
  `amount` int(11) NOT NULL COMMENT 'Quanto você precisa desse item',
  `position` int(11) NOT NULL COMMENT 'Ordem dos produtos na lista.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `list`
--

INSERT INTO `list` (`id`, `list_id`, `item_id`, `amount`, `position`) VALUES
(3, 2, 1, 6, 1),
(4, 2, 12, 2, 2),
(5, 2, 13, 2, 3),
(6, 3, 14, 5, 1),
(7, 3, 15, 1, 2),
(8, 3, 16, 3, 3),
(9, 3, 8, 6, 4),
(10, 3, 17, 1, 5),
(11, 3, 18, 1, 6),
(12, 3, 19, 2, 7),
(13, 4, 20, 1, 1),
(15, 5, 22, 1, 1),
(17, 3, 1, 1, 8),
(18, 5, 23, 1, 2),
(19, 4, 24, 2, 2),
(25, 29, 27, 36, 1),
(26, 29, 28, 1, 2),
(27, 29, 29, 1, 3),
(32, 28, 33, 1, 1),
(33, 28, 34, 2, 2),
(34, 28, 35, 1, 3),
(35, 28, 36, 10, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lists`
--

CREATE TABLE `lists` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID do item.',
  `account_id` int(10) UNSIGNED NOT NULL COMMENT 'Chave estrangeira pra o ID das contas.',
  `created` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Timestamp para quando a lista for criada.',
  `name` varchar(191) NOT NULL COMMENT 'Nome da lista.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `lists`
--

INSERT INTO `lists` (`id`, `account_id`, `created`, `name`) VALUES
(2, 1, '2023-10-27 23:28:59', 'Padaria'),
(3, 1, '2023-10-27 23:29:04', 'Mercado'),
(4, 1, '2023-10-27 23:29:14', 'Sorveteria'),
(5, 1, '2023-10-28 00:36:22', 'PetShop'),
(28, 1, '2023-10-29 11:32:29', 'Churrascaria'),
(29, 1, '2023-10-29 11:57:21', 'Lojão do Construtor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices para tabela `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Índices para tabela `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_fk` (`item_id`),
  ADD KEY `list_fk` (`list_id`);

--
-- Índices para tabela `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_fk` (`account_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID da conta.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID do item que pode aparecer na lista.', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `list`
--
ALTER TABLE `list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID da lista de itens.', AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID do item.', AUTO_INCREMENT=40;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `items_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `list_fk` FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`);

--
-- Limitadores para a tabela `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `account_fk` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
