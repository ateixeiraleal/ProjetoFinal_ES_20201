-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Ago-2020 às 11:40
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
-- Estrutura da tabela `adocao`
--

CREATE TABLE `adocao` (
  `id` int(4) NOT NULL,
  `data` date NOT NULL,
  `pet` int(4) NOT NULL,
  `doador` int(4) NOT NULL,
  `adotante` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `adocao`
--

INSERT INTO `adocao` (`id`, `data`, `pet`, `doador`, `adotante`) VALUES
(2, '2020-08-29', 3, 3, 7),
(4, '2020-08-29', 9, 2, 1),
(8, '2020-08-29', 11, 2, 4);

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
  `doador` int(4) NOT NULL,
  `situacao` varchar(12) NOT NULL,
  `adotante` int(4) DEFAULT NULL,
  `padrinho` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`codigoPet`, `imagem`, `nome`, `tipo`, `sexo`, `doador`, `situacao`, `adotante`, `padrinho`) VALUES
(1, '0e84fe9e8829b19f5021c7a24e2bde2c.jpeg', 'Latifa Risca Faca', 'gato', 'F', 3, 'Disponível', 0, 0),
(2, '71184f97c36dced5ae85256da4662c2f.jpg', 'Felícia Idosa', 'gato', 'F', 2, 'Disponível', 0, 0),
(3, '550c20f4f8311c08f4a6c11371c3cac9.jpg', 'Drauzio', 'gato', 'M', 8, 'Indisponível', 7, 0),
(4, '861dfde0adb90315e357b917e8ab1f6f.jpg', 'Pluto Labrador', 'cachorro', 'M', 2, 'Disponível', 0, 0),
(5, '8fd395f4b55b5625490315b09cd8d075.jpeg', 'Felisbino Rolador', 'gato', 'M', 6, 'Disponível', 0, 0),
(6, '8fe58a284ffd6798432ac51d21381ec2.jpg', 'Amora Faria', 'cachorro', 'F', 3, 'Disponível', 0, 0),
(7, 'b2fdd78711a5ec2602b601cdbd8b8977.jpeg', 'Frajola Soneca', 'gato', 'M', 2, 'Disponível', 0, 0),
(8, 'beccdfa0633eaf85acfb710b23d80121.jpeg', 'Catarina Silva', 'cachorro', 'F', 6, 'Disponível', 0, 0),
(9, '9122f957802e02363b0be7a6249cabc4.jpg', 'Tristeza do Jeca', 'cachorro', 'M', 2, 'Indisponível', 1, 0),
(10, '59fdc772658198b19de77f1426129975.jpg', 'Floco de Neve', 'gato', 'M', 6, 'Disponível', 0, 0),
(11, '6f21df7988ab713bb2987d43adbf2601.jpeg', 'Mimi Fofuxa', 'gato', 'F', 2, 'Indisponível', 4, 0),
(12, '65d08e693135b883a81f377a70864564.jpeg', 'Belinha Melindrosa', 'cachorro', 'F', 3, 'Disponível', 0, 0),
(13, 'c4dc72b5c5543334877735a42ced9586.jpg', 'Baronesa Rockfeler', 'cachorro', 'F', 8, 'Disponível', 0, 0),
(26, '2a19dedf673926436f99f7b55a2bf712.jpg', 'Beto Roda Dura', 'cachorro', 'M', 8, 'Disponível', 0, 0),
(27, '06304314f0bec3e1b3284e935f7f05ab.jpg', 'Sabrina', 'cachorro', 'F', 3, 'Disponível', 0, 0),
(28, 'e9912229b162b6444d7f41e1466bcc31.jpg', 'Jack Estripador On', 'cachorro', 'M', 2, 'Disponível', 0, 0);

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
(5),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariopf`
--

CREATE TABLE `usuariopf` (
  `cpf` char(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(16) NOT NULL,
  `idUsuario` int(4) NOT NULL,
  `adocao` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuariopf`
--

INSERT INTO `usuariopf` (`cpf`, `nome`, `email`, `senha`, `idUsuario`, `adocao`) VALUES
('69852423659', 'Maria Vai Com as Outras', 'maria.vaivai@yahoo.com.br', 'fifi15@19', 1, 9),
('32580153682', 'José das Couves', 'jose.couves@hotmail.com', 'legumesaboros15', 4, 11),
('95732105693', 'Barrigudinha Celeida Faminta', 'faminta.fc@hotmail.com', 'dindinha85', 5, 0),
('03265478532', 'Juvenal Costa e Silva', 'j.costa@bol.com', '365214ci', 7, 3);

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
('15876455022165', 'Ong Lar Doce Lar', 'lar.felicidade@gmail.com', 'bisca0215@#', 3),
('02154785632145', 'Abrigo São Lázaro', 's.lazaro@gmail.com', '123456#blu', 6),
('36521488563248', 'Canil Comunitário : Prefeitura Municipal', 'prefeitura.lavras@gov.com', 'gestao@renovada', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adocao`
--
ALTER TABLE `adocao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doador` (`doador`),
  ADD KEY `adotante` (`adotante`),
  ADD KEY `pet` (`pet`);

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`codigoPet`),
  ADD KEY `doador` (`doador`);

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
  ADD KEY `idUsuario_fk` (`idUsuario`) USING BTREE,
  ADD KEY `adocao_fk` (`adocao`) USING BTREE;

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
-- AUTO_INCREMENT de tabela `adocao`
--
ALTER TABLE `adocao`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `codigoPet` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigoUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `doador_Fk` FOREIGN KEY (`doador`) REFERENCES `usuario` (`codigoUsuario`);

--
-- Limitadores para a tabela `usuariopf`
--
ALTER TABLE `usuariopf`
  ADD CONSTRAINT `idUsuario_fk` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`codigoUsuario`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuariopj`
--
ALTER TABLE `usuariopj`
  ADD CONSTRAINT `usuariopj_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`codigoUsuario`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
