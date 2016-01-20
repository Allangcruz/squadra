-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 20/01/2016 às 20:42
-- Versão do servidor: 5.5.46-0ubuntu0.14.04.2
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `squadra`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(50) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '0' COMMENT 'Status:\n0 - Ativo\n1 - Cancelado\n',
  `justificativa` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Fazendo dump de dados para tabela `sistema`
--

INSERT INTO `sistema` (`id`, `descricao`, `sigla`, `email`, `url`, `status`, `justificativa`, `updated_at`) VALUES
(93, 'teste', 'Cillum dol', 'zydaqidy@yahoo.com', 'Aut nobis proident veritatis eiusmod eligendi dol', '0', '', '2016-01-20 22:38:49'),
(94, 'Et praesentium consequatur repudiandae atque', 'Eum exerci', 'xopaj@gmail.com', 'Aliquid quae error qui rerum dolor asperiores veli', '0', '', '2016-01-20 22:40:35'),
(95, 'Cupiditate provident tenetur et exercitation dolor vero in sit optio', 'Omnis sed', 'pulyf@hotmail.com', 'Nihil maxime et ut optio et omnis at sint qui po', '0', '', '2016-01-20 22:40:40'),
(96, 'Quia voluptate consequatur sed dignissimos', 'Amet sit', 'pyge@gmail.com', 'Ab quo neque ab ipsum tempora quo laudantium', '0', '', '2016-01-20 22:40:46'),
(97, 'Aliqua Ipsum laborum mollit qui maxime cumque eveniet aut dolores', 'Consequatu', 'dosu@hotmail.com', 'Et excepturi laboriosam aliquid laboris est eos', '0', '', '2016-01-20 22:40:51'),
(98, 'Voluptatibus dolores et et iusto ut et saepe', 'Mollit err', 'fidigedu@hotmail.com', 'Porro facilis voluptatum ex velit enim blanditiis ', '0', '', '2016-01-20 22:40:56'),
(99, 'Exercitation accusamus tenetur nemo nemo', 'Nostrum eo', 'hepaviqefe@hotmail.com', 'Voluptatem Laborum Voluptas id aspernatur nemo e', '0', '', '2016-01-20 22:41:01'),
(100, 'Accusantium minim dolor perspiciatis voluptate nesciunt autem cumque officiis quis nulla ad laboru', 'Et in sed', 'gemolizuwe@yahoo.com', 'Sunt enim et molestias architecto saepe lorem cup', '0', '', '2016-01-20 22:41:06'),
(101, 'Molestiae fugit veritatis sed accusantium ut ipsam in et quidem praesentium pariatur Qui repellend', 'Asperiores', 'nubim@yahoo.com', 'Voluptas dolore aliquid mollit aut vitae enim reru', '0', '', '2016-01-20 22:41:12'),
(102, 'Quidem sit voluptatum tempora qui', 'Omnis poss', 'ryginejyl@yahoo.com', 'Qui quia aute irure similique quis dolore dignissi', '0', '', '2016-01-20 22:41:17'),
(103, 'Ipsum pariatur Anim a nobis cupiditate dolor minima sint ex reiciendis consectetur saepe eius ad', 'Nulla moll', 'lakypaw@gmail.com', 'Laboriosam voluptatibus illo et sunt voluptate es', '0', '', '2016-01-20 22:41:26'),
(104, 'Esse consectetur cum nobis ut nobis voluptates quis dignissimos incidunt consectetur et', 'Velit null', 'tuhicapabe@yahoo.com', 'A corrupti officia magna ut inventore et molestia', '0', '', '2016-01-20 22:41:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
