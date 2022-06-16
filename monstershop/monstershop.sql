-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2022 às 22:10
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
-- Banco de dados: `monstershop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(11) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `descricao`) VALUES
(1, 'Roupas', 'Camisas, blusas e acessórios.'),
(2, 'Suplementos', 'Suplementos para melhoria de sua performance.'),
(3, 'Equipamento', 'Equipamentos para auxílio no treino.'),
(4, 'Acessórios', 'Acessórios de academia.'),
(5, 'Venenos', 'Bomba');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE `imagens` (
  `id` int(255) NOT NULL,
  `nome_imagem` varchar(255) NOT NULL,
  `id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens`
--

INSERT INTO `imagens` (`id`, `nome_imagem`, `id_produto`) VALUES
(15, 'wheyMS.jpg', 6),
(16, 'Whey-Copo.jpg', 6),
(17, 'Whey-dose.jpg', 6),
(19, 'camisetaMS.jpg', 1),
(20, 'camiseta-preta-generica1.jpg', 1),
(21, 'camiseta-treinando-para-ganhar-do-goku.jpg', 1),
(22, 'caqueteleira2.jpg', 2),
(23, 'coqueteleira2.jpg', 2),
(24, 'coqueteleiraMS.jpg', 2),
(25, 'creatina3.jpg', 3),
(26, 'creatina2.jpg', 3),
(27, 'creatinaMS.jpg', 3),
(28, 'multi2.jpg', 4),
(29, 'multi-vitaminico.png', 4),
(30, 'multivitMS.jpg', 4),
(35, 'moletom2.jpg', 8),
(36, 'moletom3.jpg', 8),
(37, 'moletomMS.jpg', 8),
(38, 'luva2.jpg', 9),
(39, 'luva3.jpg', 9),
(40, 'luvaMS.jpg', 9),
(41, 'pasta-de-amendoim.jpg', 10),
(42, 'pasta-de-amendoim.png', 10),
(43, 'pastadeamendoim3.jpg', 10),
(44, 'bermuda2.jpg', 11),
(45, 'bermuda3.jpg', 11),
(46, 'bermuda-crossfit-preta1.jpg', 11),
(47, 'camisa1.jpg', 12),
(48, 'camisa2.jpg', 12),
(49, 'camisa3.jpg', 12),
(50, 'bomba2.jpg', 13),
(51, 'creatinaCavalo.jpg', 13),
(52, 'vacina1.jpg', 13),
(53, 'pretreino1.jpg', 14),
(54, 'pretreino2.jpg', 14),
(55, 'sangue-do-soldado-russo.jpg', 14),
(56, 'peso1.jpg', 15),
(57, 'peso2.jpg', 15),
(58, 'peso3.jpg', 15),
(63, 'paradinhasMS.jpg', 5),
(64, 'durateston.jpg', 5),
(65, 'marcaoveneno.jpg', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `preco` text NOT NULL,
  `categoriaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `categoriaID`) VALUES
(1, 'Camiseta MonsterShop', 'Camiseta para treino confortável com tecido resistente a suor.\r\nAlgodão.', '59.90', 1),
(2, 'Coqueteleira Monstershop', 'Coqueleteira de plástico MonsterShop.\r\n600ml.', '89.69', 4),
(3, 'Creatina MonsterShop', 'Creatina monohidratada para auxiliar no ganho de massa e hipertrofia muscular.', '149.90', 2),
(4, 'Multivitamínico MonsterShop', 'Composto de vitaminas esseciais para sua imunidade.\r\nContém 80 cápsulas.', '39.90', 2),
(5, 'Paradinhas MonsterShop', 'Confia.\r\n300ml.', '499.90', 1),
(6, 'Whey Protein MonsterShop', 'Suplemento protéico para auxilio na perda de peso, ganho de massa e hipertrofia muscular.\r\nContém: 24g de proteína por dose.\r\nDose: 30g.\r\nConteúdo da embalagem: 1kg ', '89.90', 2),
(8, 'Moletom MonsterShop', 'Moletom 100% Algodão', '129.90', 1),
(9, 'Luva MonsterShop', 'Luva resistente para treino', '39.90', 4),
(10, 'Pasta de Amendoim Growth', 'Pasta de Amendoim Integral.', '19.90', 2),
(11, 'Bermuda', 'Bermuda musculação preta', '80', 1),
(12, 'Camisa', 'Camisa preta', '40', 1),
(13, 'Bomba', 'Bombinhas leve', '700', 5),
(14, 'Pré-treino', 'Estimulante para treino', '70', 2),
(15, 'Dumbbell', 'Pesos', '650', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'Admin', 'adm.monstershop@gmail.com', 'Z3VzdGF2aXJ1cw==', 'gustavirus.png'),
(2, 'ze', 'ze@gmail.com', 'emU=', 'GIF - Breach.gif');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaID` (`categoriaID`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `id_produto_FK` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoriaID`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
