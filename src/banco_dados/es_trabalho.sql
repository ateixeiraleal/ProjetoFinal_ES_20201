-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Ago-2020 às 01:22
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `es_trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `codigoPet` int(4) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(8) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`codigoPet`, `nome`, `tipo`, `sexo`, `idUsuario`) VALUES
(1, 'Catarina', 'cachorro', 'F', 1),
(2, 'Pluto', 'cachorro', 'M', 1),
(3, 'Lilica', 'cachorro', 'F', 1),
(4, 'Shakira', 'gato', 'F', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `codigoUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`codigoUsuario`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariopf`
--

CREATE TABLE `usuariopf` (
  `cpf` char(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `idUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariopf`
--

INSERT INTO `usuariopf` (`cpf`, `nome`, `email`, `senha`, `idUsuario`) VALUES
('05872654893', 'Farofina da Feijoada Mineira', 'f.mineira@yahoo.com.br', 'tsatsa123', 1),
('32580153682', 'José das Couves', 'jose.couves@hotmail.com', 'legumesaboros15', 4),
('95732105693', 'Barrigudinha Celeida Faminta', 'faminta.fc@hotmail.com', 'dindinha85', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariopj`
--

CREATE TABLE `usuariopj` (
  `cnpj` char(14) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `idUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariopj`
--

INSERT INTO `usuariopj` (`cnpj`, `nome`, `email`, `senha`, `idUsuario`) VALUES
('20876447000136', 'Ong Amigo não tem PREÇO', 'amigocao@gmail.com', '12345', 2),
('15876455022165', 'Ong Lar Doce Lar', 'lar.felicidade@gmail.com', 'bisca0215@#', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`codigoPet`),
  ADD KEY `idUsuario_fk` (`idUsuario`) USING BTREE;

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigoUsuario`);

--
-- Índices para tabela `usuariopf`
--
ALTER TABLE `usuariopf`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cpf_uk` (`cpf`),
  ADD KEY `idUsuario_fk` (`idUsuario`) USING BTREE;

--
-- Índices para tabela `usuariopj`
--
ALTER TABLE `usuariopj`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cnpj_uk` (`cnpj`),
  ADD KEY `idUsuario_fk` (`idUsuario`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `codigoPet` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigoUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `doador` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`codigoUsuario`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuariopf`
--
ALTER TABLE `usuariopf`
  ADD CONSTRAINT `usuariopj_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`codigoUsuario`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuariopj`
--
ALTER TABLE `usuariopj`
  ADD CONSTRAINT `usuariopj_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`codigoUsuario`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
