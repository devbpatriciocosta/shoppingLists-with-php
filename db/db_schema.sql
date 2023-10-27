SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

DROP TABLE IF EXISTS `list`;
DROP TABLE IF EXISTS `items`;
DROP TABLE IF EXISTS `lists`;
DROP TABLE IF EXISTS `accounts`;

-- Database name: shopping-list-php
-- Table structure for table `items`
--
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID do item que pode aparecer na lista',
  `name` varchar(191) COLLATE utf8mb4_bin NOT NULL COMMENT 'Nome do item'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='Um amostra dos itens que podem ser adicionados na lista.';

--
-- Dumping data for table `items`
--
INSERT INTO `items` (`id`, `name`) VALUES
(4, 'cerveja'),
(1, 'pao'),
(2, 'manteiga'),
(5, 'chocolate'),
(9, 'macarrao instantaneo'),
(3, 'leite'),
(6, 'costela de porco'),
(8, 'batata'),
(7, 'tomate');

--
-- Table structure for table `list`
--
CREATE TABLE IF NOT EXISTS `list` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID do item listado.',
  `list_id` int(10) unsigned NOT NULL COMMENT 'Chave Estrangeira para a tabela de listas',
  `item_id` int(10) unsigned NOT NULL COMMENT 'Chave Estrangeira para a tabela de itens.',
  `amount` int(11) NOT NULL COMMENT 'Quanto você precisa desse item',
  `position` int(11) NOT NULL COMMENT 'Ordem dos produtos na lista.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Table structure for table `lists`
--
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID da lista.',
  `account_id` int(10) unsigned NOT NULL COMMENT 'Chave estrangeira pra o ID das contas.',
  `created` DATETIME NOT NULL DEFAULT NOW() COMMENT 'Timestamp para quando a lista for criada.',
  `name` varchar(191) COLLATE utf8mb4_bin NOT NULL COMMENT 'Nome da lista.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Table structure for table `accounts`
--
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL COMMENT 'ID da conta.',
  `name` varchar(191) COLLATE utf8mb4_bin NOT NULL COMMENT 'Nome completo.',
  `login` varchar(191) COLLATE utf8mb4_bin NOT NULL COMMENT 'Login.',
  `pw` varchar(191) COLLATE utf8mb4_bin NOT NULL COMMENT 'Hashed Password.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID do item que pode aparecer na lista.', AUTO_INCREMENT=10;
  
--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID da lista de itens.';
  
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID do item.';
  
--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID da conta.';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `items_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `list_fk` FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`);

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `account_fk` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);