-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Maio-2023 às 20:33
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apiario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `DESC_ADMIN` varchar(30) NOT NULL,
  `SENHA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apiario`
--

CREATE TABLE `apiario` (
  `COD_APIARIO` int(11) NOT NULL,
  `DESCRICAO` varchar(30) NOT NULL,
  `RESPONSAVEL` varchar(30) NOT NULL,
  `SITUACAO` tinyint(1) NOT NULL,
  `DATA_ATIVO` date NOT NULL,
  `DATA_INATIVO` date NOT NULL,
  `IMAGEM` varchar(220) DEFAULT NULL,
  `CIDADE` varchar(30) DEFAULT NULL,
  `RUA` varchar(30) DEFAULT NULL,
  `BAIRRO` varchar(30) DEFAULT NULL,
  `NUMERO` int(11) DEFAULT NULL,
  `LATITUDE` varchar(10) DEFAULT NULL,
  `LONGITUDE` varchar(10) DEFAULT NULL,
  `CAMINHO` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `apiario`
--

INSERT INTO `apiario` (`COD_APIARIO`, `DESCRICAO`, `RESPONSAVEL`, `SITUACAO`, `DATA_ATIVO`, `DATA_INATIVO`, `IMAGEM`, `CIDADE`, `RUA`, `BAIRRO`, `NUMERO`, `LATITUDE`, `LONGITUDE`, `CAMINHO`) VALUES
(9, 'AP1 - Zona Norte', 'Fernando', 1, '2023-05-07', '0000-00-00', '64570c6851ebd', 'Panambi', 'Palmeira', 'Zona Norte', 546, '89809809', '98989', '../upload64570c6851ebd.png'),
(10, 'AP2 - Centro', 'Pedro', 1, '2023-05-07', '0000-00-00', '64570f268a7c2', 'Condor', 'DR Bozano', 'Centro', 336, '868767', '89989', '../upload64570f268a7c2.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colmeia`
--

CREATE TABLE `colmeia` (
  `DESC_COLMEIA` varchar(50) NOT NULL,
  `DATA_INSTALACAO` date NOT NULL,
  `COD_COLMEIA` int(11) NOT NULL,
  `CAIXA` varchar(30) NOT NULL,
  `ESPECIE` varchar(30) NOT NULL,
  `ORIGEM` varchar(30) NOT NULL,
  `COD_RAINHA` int(11) DEFAULT NULL,
  `COD_APIARIO` int(11) NOT NULL,
  `DATA_INATIVACAO` date DEFAULT NULL,
  `STATUS` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `colmeia`
--

INSERT INTO `colmeia` (`DESC_COLMEIA`, `DATA_INSTALACAO`, `COD_COLMEIA`, `CAIXA`, `ESPECIE`, `ORIGEM`, `COD_RAINHA`, `COD_APIARIO`, `DATA_INATIVACAO`, `STATUS`) VALUES
('COL1', '2023-05-07', 13, ' Caixa Langstroth', 'Abelha-Africana', ' Comprada', 8, 9, '0000-00-00', 1),
('colmeia3', '2023-05-07', 14, 'Caíxa Lusitana', 'Abelha-Africana', ' Comprada', 9, 10, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `lista_colmeia7`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `lista_colmeia7` (
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `lista_colmeia8`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `lista_colmeia8` (
`CAIXA` varchar(30)
,`APIARIO` varchar(30)
,`COD_APIARIO` int(11)
,`COD_COLMEIA` int(11)
,`DESC_RAINHA` varchar(30)
,`DATA_INATIVACAO` date
,`DATA_INSTALACAO` date
,`DESC_COLMEIA` varchar(50)
,`ESPECIE` varchar(30)
,`ORIGEM` varchar(30)
,`STATUS` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `lista_rainha6`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `lista_rainha6` (
`CAIXA` varchar(30)
,`COD_COLMEIA` int(11)
,`DESC_COLMEIA` varchar(50)
,`COD_RAINHA` int(11)
,`ORIG_RAINHA` varchar(30)
,`EST_RAINHA` varchar(30)
,`ANO_NASC` char(4)
,`DESC_RAINHA` varchar(30)
,`DESCRICAO` varchar(30)
,`OBSERVACOES` varchar(50)
,`STATUS` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `lista_tarefa7`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `lista_tarefa7` (
`CATEGORIA` varchar(30)
,`DESCRICAO` varchar(30)
,`COD_TAREFA` int(11)
,`DATA_TAREFA` date
,`DESC_TAREFA` varchar(30)
,`OBSERVACOES` varchar(500)
,`PRIORIDADE` varchar(15)
,`TAR_STATUS` tinyint(1)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao`
--

CREATE TABLE `producao` (
  `DESCRICAO` varchar(30) NOT NULL,
  `DATA_COLETA` date NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `COD_PRODUCAO` int(11) NOT NULL,
  `CATEGORIA` varchar(30) NOT NULL,
  `COD_COLMEIA` int(11) NOT NULL,
  `COD_APIARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `producao`
--

INSERT INTO `producao` (`DESCRICAO`, `DATA_COLETA`, `QUANTIDADE`, `COD_PRODUCAO`, `CATEGORIA`, `COD_COLMEIA`, `COD_APIARIO`) VALUES
('Prod1', '2023-05-07', 23, 2, 'Cera', 13, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rainha`
--

CREATE TABLE `rainha` (
  `ANO_NASC` char(4) NOT NULL,
  `DESC_RAINHA` varchar(30) NOT NULL,
  `OBSERVACOES` varchar(50) DEFAULT NULL,
  `COD_RAINHA` int(11) NOT NULL,
  `EST_RAINHA` varchar(30) NOT NULL,
  `ORIG_RAINHA` varchar(30) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `rainha`
--

INSERT INTO `rainha` (`ANO_NASC`, `DESC_RAINHA`, `OBSERVACOES`, `COD_RAINHA`, `EST_RAINHA`, `ORIG_RAINHA`, `STATUS`) VALUES
('2023', 'Raínha1', '                 Observações pertinentes para ao a', 7, ' Virgem', ' Realeira', 1),
('2023', 'Rainha01', '                Descrição pertinente ao apicultor ', 8, ' Virgem', 'Comprada', 1),
('2023', 'rainha03', '                        ', 9, 'Fecundada', ' Realeira', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `DESC_TAREFA` varchar(30) NOT NULL,
  `DATA_TAREFA` date NOT NULL,
  `OBSERVACOES` varchar(500) NOT NULL,
  `COD_TAREFA` int(11) NOT NULL,
  `CATEGORIA` varchar(30) NOT NULL,
  `PRIORIDADE` varchar(15) NOT NULL,
  `COD_APIARIO` int(11) NOT NULL,
  `TAR_STATUS` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`DESC_TAREFA`, `DATA_TAREFA`, `OBSERVACOES`, `COD_TAREFA`, `CATEGORIA`, `PRIORIDADE`, `COD_APIARIO`, `TAR_STATUS`) VALUES
('Tar115139', '2023-05-05', '                            ', 4, ' Alimentação', 'Média', 9, 0),
('Tar122113', '2023-05-25', '                        Retirar parte do enxame da', 5, 'Divisão de Colméia', ' Baixa', 9, 0),
('Tar133426', '2023-05-10', '                    Aqui uma descrição das observações que o apicultor achar pertinente, que vá de alguma forma auxiliar no seu trabalho.        ', 6, 'Transferência de raínha', ' Baixa', 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `USUARIO` varchar(30) NOT NULL,
  `SENHA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `USUARIO`, `SENHA`) VALUES
(1, 'fernando', 'igv0124'),
(2, 'fernando', 'igv0124');

-- --------------------------------------------------------

--
-- Estrutura para vista `lista_colmeia7`
--
DROP TABLE IF EXISTS `lista_colmeia7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_colmeia7`  AS SELECT `colmeia`.`CAIXA` AS `CAIXA`, `DESCRICAO` AS `APIARIO`, `COD_APIARIO` AS `COD_APIARIO`, `colmeia`.`COD_COLMEIA` AS `COD_COLMEIA`, `rainha`.`DESC_RAINHA` AS `DESC_RAINHA`, `colmeia`.`DATA_INATIVACAO` AS `DATA_INATIVACAO`, `colmeia`.`DATA_INSTALACAO` AS `DATA_INSTALACAO`, `colmeia`.`DESC_COLMEIA` AS `DESC_COLMEIA`, `colmeia`.`ESPECIE` AS `ESPECIE`, `colmeia`.`ORIGEM` AS `ORIGEM`, `colmeia`.`SITUACAO` AS `SITUACAO` FROM ((`colmeia` join `apiario` on(`COD_APIARIO` = `colmeia`.`COD_APIARIO`)) join `rainha` on(`rainha`.`COD_RAINHA` = `colmeia`.`COD_RAINHA`)) WHERE 'SITUACAO' = 11  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `lista_colmeia8`
--
DROP TABLE IF EXISTS `lista_colmeia8`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_colmeia8`  AS SELECT `colmeia`.`CAIXA` AS `CAIXA`, `DESCRICAO` AS `APIARIO`, `COD_APIARIO` AS `COD_APIARIO`, `colmeia`.`COD_COLMEIA` AS `COD_COLMEIA`, `rainha`.`DESC_RAINHA` AS `DESC_RAINHA`, `colmeia`.`DATA_INATIVACAO` AS `DATA_INATIVACAO`, `colmeia`.`DATA_INSTALACAO` AS `DATA_INSTALACAO`, `colmeia`.`DESC_COLMEIA` AS `DESC_COLMEIA`, `colmeia`.`ESPECIE` AS `ESPECIE`, `colmeia`.`ORIGEM` AS `ORIGEM`, `colmeia`.`STATUS` AS `STATUS` FROM ((`colmeia` join `apiario` on(`COD_APIARIO` = `colmeia`.`COD_APIARIO`)) join `rainha` on(`rainha`.`COD_RAINHA` = `colmeia`.`COD_RAINHA`))  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `lista_rainha6`
--
DROP TABLE IF EXISTS `lista_rainha6`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_rainha6`  AS SELECT `colmeia`.`CAIXA` AS `CAIXA`, `colmeia`.`COD_COLMEIA` AS `COD_COLMEIA`, `colmeia`.`DESC_COLMEIA` AS `DESC_COLMEIA`, `rainha`.`COD_RAINHA` AS `COD_RAINHA`, `rainha`.`ORIG_RAINHA` AS `ORIG_RAINHA`, `rainha`.`EST_RAINHA` AS `EST_RAINHA`, `rainha`.`ANO_NASC` AS `ANO_NASC`, `rainha`.`DESC_RAINHA` AS `DESC_RAINHA`, `DESCRICAO` AS `DESCRICAO`, `rainha`.`OBSERVACOES` AS `OBSERVACOES`, `rainha`.`STATUS` AS `STATUS` FROM ((`rainha` join `colmeia` on(`colmeia`.`COD_RAINHA` = `rainha`.`COD_RAINHA`)) join `apiario` on(`colmeia`.`COD_APIARIO` = `COD_APIARIO`))  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `lista_tarefa7`
--
DROP TABLE IF EXISTS `lista_tarefa7`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_tarefa7`  AS SELECT `tarefa`.`CATEGORIA` AS `CATEGORIA`, `DESCRICAO` AS `DESCRICAO`, `tarefa`.`COD_TAREFA` AS `COD_TAREFA`, `tarefa`.`DATA_TAREFA` AS `DATA_TAREFA`, `tarefa`.`DESC_TAREFA` AS `DESC_TAREFA`, `tarefa`.`OBSERVACOES` AS `OBSERVACOES`, `tarefa`.`PRIORIDADE` AS `PRIORIDADE`, `tarefa`.`TAR_STATUS` AS `TAR_STATUS` FROM (`tarefa` join `apiario` on(`COD_APIARIO` = `tarefa`.`COD_APIARIO`)) WHERE `tarefa`.`TAR_STATUS` = 'pendente''pendente'  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Índices para tabela `apiario`
--
ALTER TABLE `apiario`
  ADD PRIMARY KEY (`COD_APIARIO`);

--
-- Índices para tabela `colmeia`
--
ALTER TABLE `colmeia`
  ADD PRIMARY KEY (`COD_COLMEIA`),
  ADD KEY `COD_RAINHA` (`COD_RAINHA`),
  ADD KEY `COD_APIARIO` (`COD_APIARIO`);

--
-- Índices para tabela `producao`
--
ALTER TABLE `producao`
  ADD PRIMARY KEY (`COD_PRODUCAO`),
  ADD KEY `COD_COLMEIA` (`COD_COLMEIA`),
  ADD KEY `COD_APIARIO` (`COD_APIARIO`);

--
-- Índices para tabela `rainha`
--
ALTER TABLE `rainha`
  ADD PRIMARY KEY (`COD_RAINHA`);

--
-- Índices para tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`COD_TAREFA`),
  ADD KEY `COD_APIARIO` (`COD_APIARIO`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `apiario`
--
ALTER TABLE `apiario`
  MODIFY `COD_APIARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `colmeia`
--
ALTER TABLE `colmeia`
  MODIFY `COD_COLMEIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `producao`
--
ALTER TABLE `producao`
  MODIFY `COD_PRODUCAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `rainha`
--
ALTER TABLE `rainha`
  MODIFY `COD_RAINHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `COD_TAREFA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `colmeia`
--
ALTER TABLE `colmeia`
  ADD CONSTRAINT `colmeia_ibfk_1` FOREIGN KEY (`COD_RAINHA`) REFERENCES `rainha` (`COD_RAINHA`),
  ADD CONSTRAINT `colmeia_ibfk_2` FOREIGN KEY (`COD_APIARIO`) REFERENCES `apiario` (`COD_APIARIO`);

--
-- Limitadores para a tabela `producao`
--
ALTER TABLE `producao`
  ADD CONSTRAINT `producao_ibfk_1` FOREIGN KEY (`COD_COLMEIA`) REFERENCES `colmeia` (`COD_COLMEIA`),
  ADD CONSTRAINT `producao_ibfk_2` FOREIGN KEY (`COD_APIARIO`) REFERENCES `apiario` (`COD_APIARIO`);

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `tarefa_ibfk_1` FOREIGN KEY (`COD_APIARIO`) REFERENCES `apiario` (`COD_APIARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
