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
-- Database: `indexfotos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `slaid_1`
--

CREATE TABLE `slaid_1` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1,
  `linha_1` text CHARACTER SET latin1,
  `linha_2` text CHARACTER SET latin1,
  `linha_3` text CHARACTER SET latin1,
  `linha_4` text CHARACTER SET latin1,
  `linha_5` text CHARACTER SET latin1,
  `linha_6` text CHARACTER SET latin1,
  `linha_7` text CHARACTER SET latin1,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `slaid_1`
--

INSERT INTO `slaid_1` (`id`, `img`, `titulo`, `linha_1`, `linha_2`, `linha_3`, `linha_4`, `linha_5`, `linha_6`, `linha_7`, `data_hora`) VALUES
(1, '04.jpg', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS  ', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA ', 'ORGANIZADORES DE EVENTOS ', '  Â  Â ', 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-30 15:44:28'),
(2, 'Penguins.jpg', 'teste slide 1', 'teste slide 1', 'teste slide 1', 'teste slide 1', 'teste slide 1', 'teste slide 1', 'teste slide 1', NULL, '2019-01-31 19:21:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slaid_2`
--

CREATE TABLE `slaid_2` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1,
  `linha_1` text CHARACTER SET latin1,
  `linha_2` text CHARACTER SET latin1,
  `linha_3` text CHARACTER SET latin1,
  `linha_4` text CHARACTER SET latin1,
  `linha_5` text CHARACTER SET latin1,
  `linha_6` text CHARACTER SET latin1,
  `linha_7` text CHARACTER SET latin1,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `slaid_2`
--

INSERT INTO `slaid_2` (`id`, `img`, `titulo`, `linha_1`, `linha_2`, `linha_3`, `linha_4`, `linha_5`, `linha_6`, `linha_7`, `data_hora`) VALUES
(2, '04.jpg', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS  ', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA ', 'ORGANIZADORES DE EVENTOS ', NULL, 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-31 12:05:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slaid_3`
--

CREATE TABLE `slaid_3` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1,
  `linha_1` text CHARACTER SET latin1,
  `linha_2` text CHARACTER SET latin1,
  `linha_3` text CHARACTER SET latin1,
  `linha_4` text CHARACTER SET latin1,
  `linha_5` text CHARACTER SET latin1,
  `linha_6` text CHARACTER SET latin1,
  `linha_7` text CHARACTER SET latin1,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `slaid_3`
--

INSERT INTO `slaid_3` (`id`, `img`, `titulo`, `linha_1`, `linha_2`, `linha_3`, `linha_4`, `linha_5`, `linha_6`, `linha_7`, `data_hora`) VALUES
(2, '04.jpg', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA', 'ORGANIZADORES DE EVENTOS', NULL, 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-31 14:51:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slaid_4`
--

CREATE TABLE `slaid_4` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1,
  `linha_1` text CHARACTER SET latin1,
  `linha_2` text CHARACTER SET latin1,
  `linha_3` text CHARACTER SET latin1,
  `linha_4` text CHARACTER SET latin1,
  `linha_5` text CHARACTER SET latin1,
  `linha_6` text CHARACTER SET latin1,
  `linha_7` text CHARACTER SET latin1,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `slaid_4`
--

INSERT INTO `slaid_4` (`id`, `img`, `titulo`, `linha_1`, `linha_2`, `linha_3`, `linha_4`, `linha_5`, `linha_6`, `linha_7`, `data_hora`) VALUES
(1, '3.jpg', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS  ', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA ', 'ORGANIZADORES DE EVENTOS ', NULL, 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-31 14:54:17'),
(2, '2.jpg', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS  ', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA ', 'ORGANIZADORES DE EVENTOS ', NULL, 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-31 14:55:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slaid_5`
--

CREATE TABLE `slaid_5` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1,
  `linha_1` text CHARACTER SET latin1,
  `linha_2` text CHARACTER SET latin1,
  `linha_3` text CHARACTER SET latin1,
  `linha_4` text CHARACTER SET latin1,
  `linha_5` text CHARACTER SET latin1,
  `linha_6` text CHARACTER SET latin1,
  `linha_7` text CHARACTER SET latin1,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `slaid_5`
--

INSERT INTO `slaid_5` (`id`, `img`, `titulo`, `linha_1`, `linha_2`, `linha_3`, `linha_4`, `linha_5`, `linha_6`, `linha_7`, `data_hora`) VALUES
(1, '2.jpg', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS  ', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA ', 'ORGANIZADORES DE EVENTOS ', '&nbsp;', 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-31 14:56:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slaid_6`
--

CREATE TABLE `slaid_6` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1,
  `linha_1` text CHARACTER SET latin1,
  `linha_2` text CHARACTER SET latin1,
  `linha_3` text CHARACTER SET latin1,
  `linha_4` text CHARACTER SET latin1,
  `linha_5` text CHARACTER SET latin1,
  `linha_6` text CHARACTER SET latin1,
  `linha_7` text CHARACTER SET latin1,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Extraindo dados da tabela `slaid_6`
--

INSERT INTO `slaid_6` (`id`, `img`, `titulo`, `linha_1`, `linha_2`, `linha_3`, `linha_4`, `linha_5`, `linha_6`, `linha_7`, `data_hora`) VALUES
(1, 'tales.png', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA', 'ORGANIZADORES DE EVENTOS', NULL, 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-31 14:57:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slaid_7`
--

CREATE TABLE `slaid_7` (
  `id` int(11) NOT NULL,
  `img` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1,
  `linha_1` text CHARACTER SET latin1,
  `linha_2` text CHARACTER SET latin1,
  `linha_3` text CHARACTER SET latin1,
  `linha_4` text CHARACTER SET latin1,
  `linha_5` text CHARACTER SET latin1,
  `linha_6` text CHARACTER SET latin1,
  `linha_7` text CHARACTER SET latin1,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=ucs2 COLLATE=ucs2_general_mysql500_ci;

--
-- Extraindo dados da tabela `slaid_7`
--

INSERT INTO `slaid_7` (`id`, `img`, `titulo`, `linha_1`, `linha_2`, `linha_3`, `linha_4`, `linha_5`, `linha_6`, `linha_7`, `data_hora`) VALUES
(1, 'show.jpg', '1Âº SITE GOSPEL DE:', 'DIVULGAÃ‡ÃƒO DE EVENTOS  ', 'VENDAS DE INGRESSOS ONLINE', 'GESTÃƒO E ADMINISTRAÃ‡ÃƒO PARA ', 'ORGANIZADORES DE EVENTOS ', NULL, 'A DEUS TODA HONRA E GLORIA', NULL, '2019-01-31 14:57:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slaid_1`
--
ALTER TABLE `slaid_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slaid_2`
--
ALTER TABLE `slaid_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slaid_3`
--
ALTER TABLE `slaid_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slaid_4`
--
ALTER TABLE `slaid_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slaid_5`
--
ALTER TABLE `slaid_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slaid_6`
--
ALTER TABLE `slaid_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slaid_7`
--
ALTER TABLE `slaid_7`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slaid_1`
--
ALTER TABLE `slaid_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slaid_2`
--
ALTER TABLE `slaid_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slaid_3`
--
ALTER TABLE `slaid_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slaid_4`
--
ALTER TABLE `slaid_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slaid_5`
--
ALTER TABLE `slaid_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slaid_6`
--
ALTER TABLE `slaid_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slaid_7`
--
ALTER TABLE `slaid_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
