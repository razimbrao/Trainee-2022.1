-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jun-2022 às 15:08
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
(3, 'Equipamento', 'Equipamentos para auxílio no treino.');

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
(1, 'camisetaMS.jpg', 1),
(2, 'coqueteleiraMS.jpg', 2),
(3, 'creatinaMS.jpg', 3),
(4, 'multivitMS.jpg', 4),
(5, 'paradinhasMS.jpg', 5),
(9, 'moletomMS.jpg', 8),
(10, 'luvaMS.jpg', 9),
(11, 'pasta-de-amendoim.png', 10),
(15, 'wheyMS.jpg', 6),
(16, 'Whey-Copo.jpg', 6),
(17, 'Whey-dose.jpg', 6);

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
(2, 'Coqueteleira Monstershop', 'Coqueleteira de plástico MonsterShop.\r\n600ml.', '89.69', 1),
(3, 'Creatina MonsterShop', 'Creatina monohidratada para auxiliar no ganho de massa e hipertrofia muscular.', '149.90', 1),
(4, 'Multivitamínico MonsterShop', 'Composto de vitaminas esseciais para sua imunidade.\r\nContém 80 cápsulas.', '39.90', 1),
(5, 'Paradinhas MonsterShop', 'Confia.\r\n300ml.', '499.90', 1),
(6, 'Whey Protein MonsterShop', 'Suplemento protéico para auxilio na perda de peso, ganho de massa e hipertrofia muscular.\r\nContém: 24g de proteína por dose.\r\nDose: 30g.\r\nConteúdo da embalagem: 1kg ', '89.90', 1),
(8, 'Moletom MonsterShop', 'Moletom 100% Algodão', '129.90', 1),
(9, 'Luva MonsterShop', 'Luva resistente para treino', '39.90', 3),
(10, 'Pasta de Amendoim Growth', 'Pasta de Amendoim Integral.', '19.90', 1);

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
(1, 'Admin', 'adm.monstershop@gmail.com', 'Z3VzdGF2aXJ1cw==', 'gustavirus.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
