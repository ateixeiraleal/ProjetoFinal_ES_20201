-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Ago-2020 às 23:13
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
  `imagem` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo` varchar(8) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`codigoPet`, `imagem`, `nome`, `tipo`, `sexo`, `idUsuario`) VALUES
(1, 'b2fdd78711a5ec2602b601cdbd8b8977.jpeg', 'Cremoso', 'gato', 'M', 4),
(2, 'beccdfa0633eaf85acfb710b23d80121.jpeg', 'Amora', 'cachorro', 'F', 1),
(3, '861dfde0adb90315e357b917e8ab1f6f.jpg', 'Pluto', 'cachorro', 'M', 3),
(4, '74595ea78d844f428aac43f909dfe005.jpg', 'Frajola', 'gato', 'M', 2),
(5, '8fd395f4b55b5625490315b09cd8d075.jpeg', 'Strogonoff', 'gato', 'M', 5),
(6, 'c9d60054385c7c863c4db90b9cf38540.jpg', 'Tristeza do Zeco', 'cachorro', 'M', 4),
(7, '71184f97c36dced5ae85256da4662c2f.jpg', 'Felícia', 'gato', 'F', 1),
(8, '8fe58a284ffd6798432ac51d21381ec2.jpg', 'Amora', 'cachorro', 'F', 3),
(9, 'f19db309711df8fb0c5e6a3f434bc8f3.jpg', 'Nevasca', 'gato', 'F', 2);

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
('05780105693', 'Anderson Teixeira Leal', 'andersonpains@yahoo.com.br', 'macaquinho1984', 1),
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
  MODIFY `codigoPet` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
