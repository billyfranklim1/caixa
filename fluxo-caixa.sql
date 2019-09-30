-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Set-2019 às 11:16
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fluxo-caixa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_pagar`
--

CREATE TABLE `contas_pagar` (
  `id_contas_pagar` int(11) NOT NULL,
  `valor_contas_pagar` varchar(255) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT 0,
  `descricao` varchar(500) NOT NULL,
  `vencimento` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas_pagar`
--

INSERT INTO `contas_pagar` (`id_contas_pagar`, `valor_contas_pagar`, `situacao`, `descricao`, `vencimento`) VALUES
(4, '10000.00', 0, 'Descrição', '2000-01-01 02:00:00'),
(5, '100.90', 0, 'NoteBook', '2000-01-01 02:00:00'),
(6, '10.00', 0, 'cadeira', '2000-01-01 02:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas_receber`
--

CREATE TABLE `contas_receber` (
  `id_contas_receber` int(11) NOT NULL,
  `valor_contas_receber` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `situacao` int(11) NOT NULL DEFAULT 0,
  `prazo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas_receber`
--

INSERT INTO `contas_receber` (`id_contas_receber`, `valor_contas_receber`, `descricao`, `situacao`, `prazo`) VALUES
(4, '122.22', 'Divida', 0, '2000-01-01 02:00:00'),
(5, '1200.00', 'serviço', 0, '2000-01-01 02:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fluxo_caixa`
--

CREATE TABLE `fluxo_caixa` (
  `id_fluxo_caixa` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `tipo` int(1) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fluxo_caixa`
--

INSERT INTO `fluxo_caixa` (`id_fluxo_caixa`, `valor`, `tipo`, `descricao`, `registro`) VALUES
(1, 'çkjbçkj', 1, 'kjbçkjb', '2019-09-30 07:20:30'),
(2, 'çkjbçkj', 1, 'kjbçkjb', '2019-09-30 07:24:06'),
(3, 'asdas', 1, 'kjbçkjb', '2019-09-30 07:24:32'),
(4, '1.000,00', 1, 'Descrição', '2019-09-30 09:02:31');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  ADD PRIMARY KEY (`id_contas_pagar`);

--
-- Índices para tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  ADD PRIMARY KEY (`id_contas_receber`);

--
-- Índices para tabela `fluxo_caixa`
--
ALTER TABLE `fluxo_caixa`
  ADD PRIMARY KEY (`id_fluxo_caixa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas_pagar`
--
ALTER TABLE `contas_pagar`
  MODIFY `id_contas_pagar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `contas_receber`
--
ALTER TABLE `contas_receber`
  MODIFY `id_contas_receber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `fluxo_caixa`
--
ALTER TABLE `fluxo_caixa`
  MODIFY `id_fluxo_caixa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
