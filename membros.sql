-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12-Mar-2021 às 08:41
-- Versão do servidor: 8.0.23-0ubuntu0.20.04.1
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `membros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE `bairros` (
  `id` int NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `setor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `bairro`, `setor`) VALUES
(1, 'Centro', 1),
(2, 'Cidade Nova', 1),
(3, 'Ponta Negra', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `sigla`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amazonas', 'AM'),
(4, 'AmapÃ¡', 'AP'),
(5, 'Bahia', 'BA'),
(6, 'CearÃ¡', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'EspÃ­rito Santo', 'ES'),
(9, 'GoiÃ¡s', 'GO'),
(10, 'MaranhÃ£o', 'MA'),
(11, 'Minas Gerais', 'MG'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Mato Grosso', 'MT'),
(14, 'ParÃ¡', 'PA'),
(15, 'ParaÃ­ba', 'PB'),
(16, 'Pernambuco', 'PE'),
(17, 'PiauÃ­', 'PI'),
(18, 'ParanÃ¡', 'PR'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'RondÃ´nia', 'RO'),
(22, 'Roraima', 'RR'),
(23, 'Rio Grande do Sul', 'RS'),
(24, 'Santa Catarina', 'SC'),
(25, 'Sergipe', 'SE'),
(26, 'SÃ£o Paulo', 'SP'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logins`
--

CREATE TABLE `logins` (
  `id` int NOT NULL,
  `idmembro` int NOT NULL,
  `data` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `sistema` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `logins`
--

INSERT INTO `logins` (`id`, `idmembro`, `data`, `hora`, `sistema`, `ip`) VALUES
(1, 1, '11/10/2019', '08:24:39', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '::1'),
(2, 1, '25/02/2021', '13:28:41', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(3, 1, '25/02/2021', '13:31:05', 'U0lTVEVNQSBIRUxQIERFU0s=', '127.0.0.1'),
(4, 1, '25/02/2021', '13:39:29', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(5, 1, '11/03/2021', '10:45:13', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(6, 1, '11/03/2021', '10:48:16', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(7, 1, '11/03/2021', '11:19:24', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(8, 1, '11/03/2021', '11:33:48', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(9, 1, '11/03/2021', '11:36:10', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(10, 1, '11/03/2021', '11:38:09', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(11, 1, '11/03/2021', '11:43:22', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(12, 1, '11/03/2021', '11:43:49', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(13, 1, '11/03/2021', '11:46:24', 'U0lTVEVNQSBIRUxQIERFU0s=', '127.0.0.1'),
(14, 1, '11/03/2021', '11:47:26', 'U0lTVEVNQSBIRUxQIERFU0s=', '127.0.0.1'),
(15, 1, '11/03/2021', '11:48:06', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(16, 1, '11/03/2021', '11:57:33', '', '127.0.0.1'),
(17, 1, '11/03/2021', '12:07:10', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(18, 1, '11/03/2021', '12:08:47', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(19, 1, '11/03/2021', '12:39:25', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(20, 1, '11/03/2021', '12:51:39', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(21, 1, '11/03/2021', '12:53:13', '', '127.0.0.1'),
(22, 1, '11/03/2021', '16:03:11', '', '10.78.33.10'),
(23, 1, '11/03/2021', '16:06:34', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(24, 1, '11/03/2021', '16:07:58', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(25, 1, '11/03/2021', '16:08:34', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(26, 1, '11/03/2021', '16:08:44', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', '127.0.0.1'),
(27, 1, '11/03/2021', '16:09:05', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1'),
(28, 1, '11/03/2021', '16:09:36', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', '127.0.0.1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postograd`
--

CREATE TABLE `postograd` (
  `id` int NOT NULL,
  `postograd` varchar(20) NOT NULL,
  `pgradsimples` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `postograd`
--

INSERT INTO `postograd` (`id`, `postograd`, `pgradsimples`) VALUES
(1, 'General', 'GEN'),
(2, 'Coronel', 'CEL'),
(3, 'Tenente Coronel', 'TC'),
(4, 'Major', 'MAJ'),
(5, 'Capitão', 'CAP'),
(6, '1º Tenente', '1º TEN'),
(7, '2º Tenente', '2º TEN'),
(8, 'Aspirante a Oficial', 'ASP OF'),
(9, 'Subtenente', 'ST'),
(10, '1º Sargento', '1º SGT'),
(11, '2º Sargento', '2º SGT'),
(12, '3º Sargento', '3º SGT'),
(13, 'Cabo NB', 'CB NB'),
(14, 'Cabo EV', 'CB EV'),
(15, 'Soldado NB', 'SD NB'),
(16, 'Soldado EV', 'SD EV');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id` int NOT NULL,
  `data` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `hora` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsavel` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sistema` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `obs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Extraindo dados da tabela `relatorios`
--

INSERT INTO `relatorios` (`id`, `data`, `hora`, `ip`, `responsavel`, `sistema`, `obs`) VALUES
(1, '11/03/2021', '10:46:18', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Área de informações foi acessada'),
(2, '11/03/2021', '10:47:36', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Área de informações foi acessada'),
(3, '11/03/2021', '10:47:45', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Área de informações foi acessada'),
(4, '11/03/2021', '11:13:03', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Área de informações foi acessada'),
(5, '11/03/2021', '11:16:02', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'RELAÇÃO DE ARRANCHAMENTO PARA O DIA 15/03/2021 (SEGUNDA-FEIRA)'),
(6, '11/03/2021', '11:18:33', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'RELAÇÃO DE ARRANCHAMENTO PARA O DIA 15/03/2021 (SEGUNDA-FEIRA)'),
(7, '11/03/2021', '11:26:04', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Área de informações foi acessada'),
(8, '11/03/2021', '11:34:06', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Área de informações foi acessada'),
(9, '11/03/2021', '11:36:00', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Dados atualizados referente ao usuário ID'),
(10, '11/03/2021', '11:40:27', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'RELAÇÃO DE ARRANCHAMENTO PARA O DIA 15/03/2021 (SEGUNDA-FEIRA)'),
(11, '11/03/2021', '11:41:52', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Área de informações foi acessada'),
(12, '11/03/2021', '11:42:47', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBERSBBUlJBTkNIQU1FTlRP', 'Dados atualizados referente ao usuário ID'),
(13, '11/03/2021', '11:51:43', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', 'RELATÓRIO COMPLETO - CCAP'),
(14, '11/03/2021', '11:53:27', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', 'RELATÓRIO COMPLETO - CCAP'),
(15, '11/03/2021', '11:53:36', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', 'RELATÓRIO COMPLETO'),
(16, '11/03/2021', '12:00:13', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', 'RELATÓRIO COMPLETO'),
(17, '11/03/2021', '12:00:15', '127.0.0.1', '3º SGT Adm', 'U0lTVEVNQSBQTEFOTyBERSBDSEFNQURBUw==', 'RELATÓRIO COMPLETO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `id` int NOT NULL,
  `setor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `setor`) VALUES
(1, 'Alfa'),
(2, 'Bravo'),
(3, 'Charlie'),
(4, 'Delta'),
(5, 'Echo'),
(6, 'Foxtrot'),
(7, 'Golf'),
(8, 'Hotel'),
(9, 'India'),
(10, 'Juliet'),
(11, 'Kilo'),
(12, 'Lima');

-- --------------------------------------------------------

--
-- Estrutura da tabela `subunidade`
--

CREATE TABLE `subunidade` (
  `id` int NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `subunidade`
--

INSERT INTO `subunidade` (`id`, `descricao`) VALUES
(1, 'CCAP'),
(2, '1ª Cia Fuz'),
(3, '2ª Cia Fuz'),
(4, '3ª Cia Fuz'),
(5, 'BASE'),
(6, 'CED'),
(7, 'Banda de Música'),
(8, 'ccap'),
(9, 'CCAP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `identidade` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `idsubunidade` int NOT NULL,
  `idpgrad` int NOT NULL,
  `nomeguerra` varchar(50) NOT NULL,
  `acessorancho` varchar(1) NOT NULL,
  `contarancho` varchar(1) NOT NULL,
  `acessocaveira` varchar(1) NOT NULL,
  `contacaveira` varchar(1) NOT NULL,
  `acessoservico` varchar(1) NOT NULL,
  `contaservico` varchar(1) NOT NULL,
  `acessopchamada` varchar(1) NOT NULL,
  `contapchamada` varchar(1) NOT NULL,
  `userativo` varchar(1) NOT NULL,
  `nomecompleto` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `bairro` int NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `fixo` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `datanascimento` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `acessohd` varchar(1) NOT NULL,
  `contahd` varchar(1) NOT NULL,
  `datanascimento2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `identidade`, `senha`, `idsubunidade`, `idpgrad`, `nomeguerra`, `acessorancho`, `contarancho`, `acessocaveira`, `contacaveira`, `acessoservico`, `contaservico`, `acessopchamada`, `contapchamada`, `userativo`, `nomecompleto`, `endereco`, `bairro`, `cidade`, `estado`, `celular`, `fixo`, `email`, `datanascimento`, `foto`, `acessohd`, `contahd`, `datanascimento2`) VALUES
(1, 'MTIz', 'MTIz', 1, 12, 'Adm', 'S', '4', ' ', ' ', '', '', 'S', '3', 'S', 'Adm', 'Rua Sumarí', 1, 'Manaus', 'Amazonas', '(92) 99176-9215', '(92) 99176-9215', 'kevin.stone.silva@gmail.com', '', '', 'S', '3', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bairros`
--
ALTER TABLE `bairros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `postograd`
--
ALTER TABLE `postograd`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `subunidade`
--
ALTER TABLE `subunidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bairros`
--
ALTER TABLE `bairros`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `postograd`
--
ALTER TABLE `postograd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `setores`
--
ALTER TABLE `setores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `subunidade`
--
ALTER TABLE `subunidade`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
