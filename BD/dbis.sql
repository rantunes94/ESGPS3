-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Maio-2016 às 19:02
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  KEY `fk_consulta_analise1_idx` (`analise_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE IF NOT EXISTS `medicamento` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `dose` varchar(12) NOT NULL,
  `frequencia` varchar(20) NOT NULL,
  `m_paciente_id` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `active` bit(1) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `morada` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sns` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `dataNascimento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sns` (`sns`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `type`, `active`, `nome`, `morada`, `sns`, `dataNascimento`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adm','$2y$10$L3aDYr3xUtcpWfL8tlzBLOL/J800tesDllIiIomOxzmV9MWKdwVXO', 'A', b'1', 'Paulo Maria', 'Rua das Fontes', '111111111', '1990-02-02', NULL, NULL, NULL),
(2, 'ana','$2y$10$jK63GryszTjincRS8/vihOhGVjiimuzexSVrIwZZA2ou.fwmH6wF2', 'D', b'1', 'Rui Afonso', 'Rua de Zelmira', '222222222', '1880-02-02', NULL, NULL, NULL),
(3, 'barata','$2y$10$0GpFZXzBQTHTuNwFtlLNguBJ.8eEoJOyHvOoWqMdNevSY3BcHC1Yi', 'F', b'1', 'Maria Zeca', 'Rua das Cidades', '333333333', '2014-02-02', NULL, NULL, NULL),
(4, 'beatriz','$2y$10$q0XbgXcBXiDMCEGDuAgwH.u5MFqrFNHEE8Zn2Iti5SeCMv9G39bFC', 'R', b'1', 'Beatriz Costa', 'Avenida das Casas', '444444444', '1990-06-06', NULL, NULL, NULL),
(5, 'carla','$2y$10$ZFz.WzrLqj6JYZVDJWVEbecpkK38KE5DvZ0JoMia99pmRJvf66mjq', 'E', b'1', 'Tomás Maria', 'Rua das Flores', '555555555', '1991-02-02', NULL, NULL, NULL);

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
