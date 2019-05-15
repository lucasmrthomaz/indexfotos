-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Maio-2019 às 22:44
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usereventos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `asides`
--

CREATE TABLE `asides` (
  `id` int(11) NOT NULL,
  `aside_direita` text NOT NULL,
  `aside_esquerda` text NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `asides`
--

INSERT INTO `asides` (`id`, `aside_direita`, `aside_esquerda`, `data_hora`) VALUES
(1, 'aside.png', 'esquerda.png', '2019-02-05 20:21:16'),
(2, 'esquerda.png', 'aside.png', '2019-02-05 20:23:03'),
(3, 'aside.png', 'esquerda.png', '2019-02-05 20:24:33'),
(4, 'esquerda.png', 'direita.png', '2019-02-05 21:07:45'),
(5, 'aside.png', 'aside.png', '2019-02-05 21:20:40'),
(6, 'direita.png', 'esquerda.png', '2019-02-06 14:05:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aside_dos_eventos`
--

CREATE TABLE `aside_dos_eventos` (
  `id` int(11) NOT NULL,
  `aside_direita` text NOT NULL,
  `aside_esqueda` text NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aside_dos_eventos`
--

INSERT INTO `aside_dos_eventos` (`id`, `aside_direita`, `aside_esqueda`, `datahora`) VALUES
(1, 'direita.png', 'esquerda.png', '2019-02-05 20:33:22'),
(2, 'esquerda.png', '', '2019-02-05 21:07:45'),
(3, 'direita.png', 'esquerda.png', '2019-02-05 21:19:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto`
--

CREATE TABLE `boleto` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `evento` varchar(50) NOT NULL,
  `data_evento` varchar(50) NOT NULL,
  `local_evento` varchar(50) NOT NULL,
  `Cidade_bairro` varchar(50) DEFAULT NULL,
  `tipo_de_ingresso` varchar(50) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `Valor_da_ Taxa` decimal(10,2) NOT NULL,
  `codigo_do_ingresso` varchar(50) DEFAULT NULL,
  `orientacoes_do_evento` varchar(100) DEFAULT NULL,
  `protocolo` varchar(100) NOT NULL,
  `patrocinio` varchar(50) DEFAULT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_do_evento` int(11) NOT NULL,
  `boleto` varchar(100) NOT NULL,
  `valor_boleto` decimal(10,2) NOT NULL,
  `valor_taxa` decimal(10,2) NOT NULL,
  `data_pagamento` varchar(100) NOT NULL,
  `data_gerado` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_cliente`
--

CREATE TABLE `cad_cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` text NOT NULL,
  `rg` text,
  `confirma_email` varchar(50) DEFAULT NULL,
  `cep` text,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fisico` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_cliente`
--

INSERT INTO `cad_cliente` (`id`, `nome`, `sobrenome`, `rg`, `confirma_email`, `cep`, `email`, `senha`, `cpf`, `data_hora`, `fisico`) VALUES
(2, 'Allan', 'Jeferson', '123654789', 'allanjeferson@hotmail.com', '22785-160', 'allan@hotmail.com', '123456', '00593653076', '2019-02-06 18:17:39', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_evento`
--

CREATE TABLE `cad_evento` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `nome_do_evento` varchar(100) NOT NULL,
  `foto_banner` text NOT NULL,
  `foto_aside_direita` text,
  `foto_aside_esquerda` text,
  `data_do_evento_inicio_dia` varchar(2) NOT NULL,
  `data_do_evento_inicio_mes` varchar(2) NOT NULL,
  `data_do_evento_inicio_ano` varchar(4) NOT NULL,
  `data_do_evento _termino_dia` varchar(2) NOT NULL,
  `data_do_evento _termino_mes` varchar(2) NOT NULL,
  `data_do_evento _termino_ano` varchar(4) NOT NULL,
  `hora_de_inicio` text NOT NULL,
  `hora_de_fim` text NOT NULL,
  `categoria_do_evento` text NOT NULL,
  `local_do_evento` text NOT NULL,
  `bairro_cidade_do_evento` text NOT NULL,
  `cadeirante` text NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descricao` text,
  `cnpj` text,
  `produtor` text,
  `responsavel` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_evento`
--

INSERT INTO `cad_evento` (`id`, `id_cliente`, `email_cliente`, `nome_do_evento`, `foto_banner`, `foto_aside_direita`, `foto_aside_esquerda`, `data_do_evento_inicio_dia`, `data_do_evento_inicio_mes`, `data_do_evento_inicio_ano`, `data_do_evento _termino_dia`, `data_do_evento _termino_mes`, `data_do_evento _termino_ano`, `hora_de_inicio`, `hora_de_fim`, `categoria_do_evento`, `local_do_evento`, `bairro_cidade_do_evento`, `cadeirante`, `data_hora`, `descricao`, `cnpj`, `produtor`, `responsavel`) VALUES
(14, NULL, NULL, 'O Rei Entre NÃ³s ', 'RobertoCarlos.jpg', 'aside.png', 'aside.png', '1', '2', '2019', '1', '2', '2019', '12:00', '18:00', 'Shows', 'HSBC Arena', 'Barra da Tijuca Rio de Janeiro', 'block', '2019-02-05 19:30:07', 'show para crianÃ§as', '123', '21321', '321321'),
(15, NULL, NULL, 'Roberto carlos ', 'imagem1.jpg', 'aside.png', 'aside.png', '1', '1', '1', '1', '1', '1', '01', '01', '01', '01', '01', 'block', '2019-02-05 19:41:21', '01', '01', '01', '01'),
(16, NULL, NULL, 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', '00887b80.jpg', NULL, NULL, '1', '2', '1', '1', '1', '1', '01', '01', '01', '01', '01', 'block', '2019-02-06 14:04:08', '01', '01', '01', '01'),
(17, NULL, NULL, 'show do Allan ZÃ£o', 'Koala.jpg', NULL, NULL, '1', '2', '2020', '5', '3', '2020', '18:00', '22:00', 'Comedia', 'Minha casa', 'vargem grande', 'block', '2019-02-12 01:22:27', 'Piadas', '123654789', 'Allan Jeferson', 'Roseni');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_juridica`
--

CREATE TABLE `cad_juridica` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `data_nascomento` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `confirma_email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `repetir_senha` varchar(50) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `agencia` varchar(20) NOT NULL,
  `conta_corrente` varchar(20) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `juridico` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_juridica`
--

INSERT INTO `cad_juridica` (`id`, `razao_social`, `cnpj`, `nome`, `sobrenome`, `data_nascomento`, `sexo`, `cpf`, `rg`, `email`, `confirma_email`, `senha`, `repetir_senha`, `banco`, `agencia`, `conta_corrente`, `data_hora`, `juridico`) VALUES
(1, 'Allan Eventos', '12324654654', 'Allan', 'Jeferson', '24/12/1980', 'Masculino', '1345545454', '321321321', 'Allan@hot.com', 'Allan@hot.com', '123456', '123456', 'bradesco', '132132', '321321321321', '2019-02-08 15:48:51', ''),
(2, 'sgas', 'fgasfd', 'gadfg', 'dfgdf', 'gadfg', 'dfgdfgdf', 'gfda', 'gdfg', 'dfgdfgdf', 'dfagd', 'fagdfagdf', 'gdfgdg', 'dfgdf', 'dfgdf', 'gdfagdf', '2019-02-08 16:31:44', ''),
(3, 'Allan Eventos ', '123465cnpj', 'Allan', 'Jeferson', '24/12/1980', 'Masculino', '123465cpf', '3241654rg', 'allan@hot.com', 'allan@hot.com', '123', '123', 'bradesco', '1234agencia', '3214 conta', '2019-02-08 16:40:00', ''),
(4, 'rose festival', 'rose12321', 'ROSE', 'MARTINS', '20091975', 'FEMININO', '321321', '32', 'ROSE@HOT.COM', '32', '123', '21', '321', '32', '1321', '2019-02-08 17:11:09', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `evento` varchar(50) NOT NULL,
  `data_evento` varchar(50) NOT NULL,
  `local_evento` varchar(50) NOT NULL,
  `Cidade_bairro` varchar(50) DEFAULT NULL,
  `tipo_de_ingresso` varchar(50) NOT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `Valor_da_Taxa` decimal(10,2) NOT NULL,
  `codigo_do_ingresso` varchar(50) DEFAULT NULL,
  `orientacoes_do_evento` varchar(100) DEFAULT NULL,
  `protocolo` varchar(100) NOT NULL,
  `patrocinio` varchar(50) DEFAULT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_do_evento` int(11) NOT NULL,
  `boleto` varchar(100) NOT NULL,
  `valor_boleto` decimal(10,2) NOT NULL,
  `valor_taxa` decimal(10,2) NOT NULL,
  `data_pagamento` varchar(100) NOT NULL,
  `data_gerado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `nome`, `cpf`, `email`, `evento`, `data_evento`, `local_evento`, `Cidade_bairro`, `tipo_de_ingresso`, `valor`, `Valor_da_Taxa`, `codigo_do_ingresso`, `orientacoes_do_evento`, `protocolo`, `patrocinio`, `datahora`, `id_do_evento`, `boleto`, `valor_boleto`, `valor_taxa`, `data_pagamento`, `data_gerado`) VALUES
(247, 'Allan', '00593653076				', 'allan@hotmail.com				', 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', '1/2/1', '01', '01', 'Pista', '10.00', '2.00', '1-16-2-2019-02-11 11:58:13-2', NULL, '1-16-2019-02-11 11:58:13-2-2', '01-2019-02-06 12:04:08', '2019-02-15 16:52:10', 16, '', '0.00', '0.00', '', '2019-02-15 16:52:10'),
(261, 'Allan', '00593653076				', 'allan@hotmail.com				', 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', '1/2/1', '01', '01', 'Pista', '10.00', '2.00', '1-16-2-2019-02-11 11:58:13-2', NULL, '1-16-2019-02-11 11:58:13-2-2', '01-2019-02-06 12:04:08', '2019-02-15 17:54:38', 16, '', '0.00', '0.00', '', '2019-02-15 17:54:38'),
(262, 'Allan', '00593653076				', 'allan@hotmail.com				', 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', '1/2/1', '01', '01', 'Pista', '10.00', '2.00', '1-16-2-2019-02-11 11:58:13-2', NULL, '1-16-2019-02-11 11:58:13-2-2', '01-2019-02-06 12:04:08', '2019-02-15 17:54:39', 16, '', '0.00', '0.00', '', '2019-02-15 17:54:39'),
(263, 'Allan', '00593653076				', 'allan@hotmail.com				', 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', '1/2/1', '01', '01', 'Pista', '10.00', '2.00', '1-16-2-2019-02-11 11:58:13-2', NULL, '1-16-2019-02-11 11:58:13-2-2', '01-2019-02-06 12:04:08', '2019-02-15 17:54:40', 16, '', '0.00', '0.00', '', '2019-02-15 17:54:40'),
(264, 'Allan', '00593653076				', 'allan@hotmail.com				', 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', '1/2/1', '01', '01', 'Pista', '10.00', '2.00', '1-16-2-2019-02-11 11:58:13-2', NULL, '1-16-2019-02-11 11:58:13-2-2', '01-2019-02-06 12:04:08', '2019-02-15 17:54:41', 16, '', '0.00', '0.00', '', '2019-02-15 17:54:41'),
(265, 'Allan', '00593653076				', 'allan@hotmail.com				', 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', '1/2/1', '01', '01', 'Pista', '10.00', '2.00', '1-16-2-2019-02-11 11:58:13-2', NULL, '', NULL, '2019-02-27 21:32:20', 0, '', '0.00', '0.00', '', '2019-02-27 21:32:20'),
(230, 'FLAVIO ', '1234567891011			', 'FLAVIO@hotmail.com				', 'Roberto carlos ', '1/1/1', '01', '01', 'mesa', '25.00', '0.00', '5-15-2-2019-02-11 12:06:15-2', NULL, '5-15-2019-02-11 12:06:15-2-2', '01-2019-02-05 17:41:21', '2019-02-13 17:18:20', 15, '', '0.00', '0.00', '', '2019-02-14 12:48:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `nome_do_evento` varchar(50) NOT NULL,
  `tipo_de_ingresso` varchar(50) NOT NULL,
  `valor_ingresso` decimal(10,2) NOT NULL,
  `valor_taxa` decimal(10,2) NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_limite_de_venda` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `id_evento`, `nome_do_evento`, `tipo_de_ingresso`, `valor_ingresso`, `valor_taxa`, `data_hora`, `data_limite_de_venda`) VALUES
(1, 16, 'EmoÃ§Ãµes com o Rei Roberto Carlos  ', 'Pista', '10.00', '2.00', '2019-02-11 13:58:13', '24/10/2019'),
(2, 15, 'Roberto carlos ', 'meia', '5.00', '2.00', '2019-02-11 14:04:03', '24/10/2019'),
(3, 15, 'Roberto carlos ', 'inteira', '10.00', '2.00', '2019-02-11 14:04:43', '24/10/2019'),
(4, 15, 'Roberto carlos ', 'pista', '25.00', '2.00', '2019-02-11 14:05:57', '25/10/2019'),
(5, 15, 'Roberto carlos ', 'mesa', '25.00', '2.00', '2019-02-11 14:06:15', '26/10/2019'),
(6, 14, 'O Rei Entre NÃ³s ', 'inteira', '50.00', '2.00', '2019-02-11 21:24:42', '25/04/2019'),
(7, 17, 'show do Allan ZÃ£o', 'pista', '150.00', '2.00', '2019-02-12 01:23:22', '30/12/2019'),
(8, 17, 'show do Allan ZÃ£o', 'meia entrada ', '5.00', '2.00', '2019-02-27 21:28:18', NULL),
(9, 17, 'show do Allan ZÃ£o', 'inteira', '10.00', '2.00', '2019-02-27 21:28:39', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `testedrop`
--

CREATE TABLE `testedrop` (
  `id` int(11) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `data_hora` varchar(100) DEFAULT NULL,
  `id_quem_add` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `testedrop`
--

INSERT INTO `testedrop` (`id`, `categoria`, `data_hora`, `id_quem_add`) VALUES
(1, '56465465', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_de_ingresso`
--

CREATE TABLE `tipos_de_ingresso` (
  `id` int(11) NOT NULL,
  `id_mais_nome_do_evento` varchar(150) CHARACTER SET latin1 NOT NULL,
  `data_do_evento` varchar(20) CHARACTER SET latin1 NOT NULL,
  `hora_do_evento` varchar(20) CHARACTER SET latin1 NOT NULL,
  `local_do_evento` varchar(20) CHARACTER SET latin1 NOT NULL,
  `modalidade` text CHARACTER SET latin1 NOT NULL,
  `valor` double(10,2) NOT NULL,
  `cnpj_cpf` varchar(20) CHARACTER SET latin1 NOT NULL,
  `responsavel` text CHARACTER SET latin1 NOT NULL,
  `produto` varchar(100) CHARACTER SET latin1 NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asides`
--
ALTER TABLE `asides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aside_dos_eventos`
--
ALTER TABLE `aside_dos_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cad_cliente`
--
ALTER TABLE `cad_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cad_evento`
--
ALTER TABLE `cad_evento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cad_juridica`
--
ALTER TABLE `cad_juridica`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testedrop`
--
ALTER TABLE `testedrop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipos_de_ingresso`
--
ALTER TABLE `tipos_de_ingresso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asides`
--
ALTER TABLE `asides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `aside_dos_eventos`
--
ALTER TABLE `aside_dos_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `boleto`
--
ALTER TABLE `boleto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `cad_cliente`
--
ALTER TABLE `cad_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cad_evento`
--
ALTER TABLE `cad_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cad_juridica`
--
ALTER TABLE `cad_juridica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `testedrop`
--
ALTER TABLE `testedrop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tipos_de_ingresso`
--
ALTER TABLE `tipos_de_ingresso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
