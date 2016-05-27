-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Maio-2016 às 19:05
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `analise`
--

CREATE TABLE IF NOT EXISTS `analise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(256) DEFAULT NULL,
  `historial` varchar(256) DEFAULT NULL,
  `condicao` varchar(256) DEFAULT NULL,
  `problemas` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `analise`
--

INSERT INTO `analise` (`id`, `motivo`, `historial`, `condicao`, `problemas`) VALUES
(1, 'febre', 'febres altas', 'bom', 'febre');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int(11) NOT NULL,
  `sala` varchar(45) NOT NULL,
  `data` datetime NOT NULL,
  `sintomas` varchar(45) NOT NULL,
  `paciente_id` int(10) NOT NULL,
  `analise_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`paciente_id`),
  KEY `fk_consulta_paciente1_idx` (`paciente_id`),
  KEY `fk_consulta_analise1_idx` (`analise_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`id`, `sala`, `data`, `sintomas`, `paciente_id`, `analise_id`) VALUES
(0, '1', '2016-05-04 00:00:00', 'febre', 8, 1),
(1, '1', '2016-05-04 00:00:00', 'febre', 1, 1),
(2, '2', '2016-05-04 00:00:00', 'febre', 1, 1),
(3, '1', '2016-05-04 00:00:00', 'febre', 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE IF NOT EXISTS `exame` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `observacoes` varchar(256) NOT NULL,
  `paciente_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_exame_paciente1_idx` (`paciente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`id`, `nome`, `observacoes`, `paciente_id`) VALUES
(1, 'endoscopia', 'esta tudo ok', 1),
(2, 'exame a perna', 'perna partida', 7),
(3, 'Endoscopia', '0', 3),
(4, 'Endoscopia', '0', 3),
(5, 'Endoscopia', '0', 5),
(6, 'Endoscopia', 'ola', 5),
(16, 'Endoscopia', 'Tudo ok', 1),
(20, 'Endoscopia', 'Tudo ok', 11),
(21, 'Endoscopia', 'Tudo ok', 2),
(22, 'Endoscopia', 'Tudo ok', 2),
(23, 'Endoscopia', 'Tudo ok', 1),
(24, 'Endoscopia', 'Tudo ok', 1),
(25, 'Endoscopia', 'Tudo ok1', 5),
(26, 'Endoscopia', 'Tudo ok1', 5),
(27, 'Endoscopia', 'Tudo ok', 5),
(28, 'Endoscopia', 'Tudo ok', 5),
(29, 'Endoscopia', 'Tudo ok', 5),
(30, 'Endoscopia', 'Tudo ok', 1),
(31, 'Endoscopia', 'Tudo ok', 1),
(32, 'Endoscopia', 'Tudo ok', 5),
(33, 'Endoscopia', 'Tudo ok', 5),
(34, 'Endoscopia', 'Tudo ok', 5),
(35, 'Endoscopia', 'Tudo ok', 5),
(36, 'Endoscopia', 'Tudo ok', 5),
(37, 'TAC', 'perna partida', 1),
(38, 'Endoscopia', 'Tudo ok', 1),
(39, 'Endoscopia', 'Tudo ok', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE IF NOT EXISTS `medicamento` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `dose` varchar(12) NOT NULL,
  `frequencia` varchar(20) NOT NULL,
  `m_paciente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id`, `nome`, `dose`, `frequencia`, `m_paciente_id`) VALUES
(1, 'brufen', '1', '1 vez por dia', 2),
(2, 'ben-u-ron', '1', '1 vez a cada 8 horas', 3),
(3, 'varefine', '1', '1 por dia', 7),
(4, 'letter', '2', 'almoço e jantar', 8),
(5, 'ben-u-ron', '1/2', '8 em 8 horas', 0),
(6, 'ben-u-ron', '1/2', '8 em 8 horas', 0),
(7, 'ben-u-ron', '1/2', '8 em 8 horas', 0),
(8, 'brufen', '1', '8', 0),
(9, 'David', '1/2', '8 em 8 horas', 0),
(10, 'David', '1/2', '8 em 8 horas', 0),
(11, 'Endoscopia', '1/2', '8 em 8 horas', 0),
(12, 'Endoscopia', '1/2', '8 em 8 horas', 1),
(13, 'Endoscopia', '1/2', '8 em 8 horas', 1),
(14, 'a', '1/2', '8 em 8 horas', 1),
(15, 'ben-u-ron', '1/2', '8 em 8 horas', 4),
(16, 'Endoscopia', '1/2', '8 em 8 horas', 7),
(17, 'Endoscopia', '1/2', '8 em 8 horas', 0),
(18, 'Endoscopia', '1/2', '8 em 8 horas', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento_consulta`
--

CREATE TABLE IF NOT EXISTS `medicamento_consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `medicamento_id` int(10) NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `consulta_paciente_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_medicamento_consulta_medicamento1_idx` (`medicamento_id`),
  KEY `fk_medicamento_consulta_consulta1_idx` (`consulta_id`,`consulta_paciente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `medicamento_consulta`
--

INSERT INTO `medicamento_consulta` (`id`, `medicamento_id`, `consulta_id`, `consulta_paciente_id`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 1),
(3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nomeP` varchar(128) NOT NULL,
  `moradaP` varchar(256) NOT NULL,
  `snsP` varchar(9) NOT NULL,
  `dataNascimP` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sns` (`snsP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nomeP`, `moradaP`, `snsP`, `dataNascimP`) VALUES
(1, 'asdasd', 'Rua da Julia', '555666668', '1990-02-03'),
(2, 'asd', 'asd', '123123123', '2016-05-03'),
(3, 'qwqweqwe', 'qeqweqwe', '123123122', '2016-05-18'),
(4, 'a', 'a1', '123123111', '2016-05-03'),
(5, 'a2', 'a', '123123333', '2016-05-18'),
(6, 'a3', 'a3', '123123112', '2016-02-20'),
(7, 'a4', 'a4', '321321321', '2016-05-10'),
(8, 'a5', 'a5', '456456456', '2016-09-09'),
(9, 'a6', 'a6', '67867867', '2016-02-02'),
(10, 'a10', 'a10', '789789999', '2016-08-08'),
(11, 'a11', 'a11', '987987987', '2016-05-18'),
(13, 'sdada', 'Rua da Julia', '123124444', '1994-04-02'),
(15, 'sdada', 'Rua da Julia', '123124455', '1994-04-02'),
(18, 'sdada', 'asda', '111111111', '1998-02-02'),
(20, 'sdada', 'asda', '111111112', '1998-02-02'),
(21, 'a2', 'Rua da Julia', '222222222', '1990-02-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `morada` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sns` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `dataNascimento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sns` (`sns`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `type`, `active`, `nome`, `morada`, `sns`, `dataNascimento`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adm', '$2y$10$L3aDYr3xUtcpWfL8tlzBLOL/J800tesDllIiIomOxzmV9MWKdwVXO', 'A', '1', 'Paulo Maria', 'Rua das Fontes', '111111111', '1990-02-02', NULL, NULL, NULL),
(2, 'ana', '$2y$10$1rz8tRm4PT1vvyYAauoUj.2eCoNOUgxqOa9n2ALj1ce.sTs5HZFiS', 'M', '1', 'Rui Afonso', 'Rua de Zelmira', '222222222', '1880-02-02', NULL, NULL, NULL),
(3, 'barata', '$2y$10$HmGz/ZxRCaNijajtQKFGeOEq615o7WRGnuDvrwNp8Uh.TinwNKTdK', 'R', '1', 'Maria Zeca', 'Rua das Cidades', '333333333', '2014-02-02', NULL, NULL, NULL),
(4, 'beatriz', '$2y$10$q0XbgXcBXiDMCEGDuAgwH.u5MFqrFNHEE8Zn2Iti5SeCMv9G39bFC', 'R', '1', 'Beatriz Costa', 'Avenida das Casas', '444444444', '1990-06-06', NULL, NULL, NULL),
(5, 'carla', '$2y$10$ZFz.WzrLqj6JYZVDJWVEbecpkK38KE5DvZ0JoMia99pmRJvf66mjq', 'E', '1', 'Tomás Maria', 'Rua das Flores', '555555555', '1991-02-02', NULL, NULL, NULL),
(28, 'ritarrr', '$2y$10$QQUQDzWXallxbI/bKgoVpOuU7YFjq.wvsEVK25B2bxnhcnQIyr2lO', 'E', '1', 'RitaRRR', 'Rua Poeta', '555432111', '1994-02-22', NULL, NULL, NULL),
(29, 'Assim', '$2y$10$4eq0OPEBZN8KlIDDhcC0reGDev6oF8WWYb4fmgs4lhyD3g4gXncte', 'M', '1', 'Assim', 'rua ASSIM', '888555444', '1994-02-25', NULL, NULL, NULL),
(30, 'qwe', '$2y$10$cOJfjDfseZkz/474g635ruG/5am3MiFrN1StkwBR8ZrZtFyNcLp2O', 'E', '1', 'luis', 'das', '192568255', '1994-02-22', NULL, NULL, NULL),
(31, 'SamuelONervosinho', '$2y$10$fMRljxGH6SvSvBjwfXP6iOQkvnzpkWQoQUziV.E8Xid36fOIBtzry', 'R', '1', 'Samuel', 'Rua do Samuel', '999551115', '1994-02-22', NULL, NULL, NULL),
(33, 'David', '$2y$10$.8h2f50iV0EV.hJ8PrlxjeyVRZUp.6O1OGGzFY4Qfrltmk83teEni', 'M', '1', 'David', 'Casal Novo, Rua a do Magro, NÂº35', '999999991', '1994-01-01', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_analise1` FOREIGN KEY (`analise_id`) REFERENCES `analise` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consulta_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `exame`
--
ALTER TABLE `exame`
  ADD CONSTRAINT `fk_exame_paciente1` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `medicamento_consulta`
--
ALTER TABLE `medicamento_consulta`
  ADD CONSTRAINT `fk_medicamento_consulta_consulta1` FOREIGN KEY (`consulta_id`, `consulta_paciente_id`) REFERENCES `consulta` (`id`, `paciente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medicamento_consulta_medicamento1` FOREIGN KEY (`medicamento_id`) REFERENCES `medicamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
