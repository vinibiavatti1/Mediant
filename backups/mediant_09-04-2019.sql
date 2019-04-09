-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para mediant
CREATE DATABASE IF NOT EXISTS `mediant` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mediant`;

-- Copiando estrutura para tabela mediant.catalogo_construcao
CREATE TABLE IF NOT EXISTS `catalogo_construcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_era` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(1000) DEFAULT NULL,
  `preco_ouro` float(11,2) DEFAULT NULL,
  `preco_madeira` float(11,2) DEFAULT NULL,
  `preco_pedra` float(11,2) DEFAULT NULL,
  `preco_comida` float(11,2) DEFAULT NULL,
  `preco_ferro` float(11,2) DEFAULT NULL,
  `preco_peca` float(11,2) DEFAULT NULL,
  `preco_petroleo` float(11,2) DEFAULT NULL,
  `preco_oleo` float(11,2) DEFAULT NULL,
  `preco_chip` float(11,2) DEFAULT NULL,
  `taxa_preco` float(11,2) DEFAULT NULL,
  `tempo_inicial` float(11,2) DEFAULT NULL,
  `taxa_tempo` float(11,2) DEFAULT NULL,
  `recurso_inicial` float(11,2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.catalogo_construcao: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `catalogo_construcao` DISABLE KEYS */;
INSERT INTO `catalogo_construcao` (`id`, `id_era`, `nome`, `descricao`, `preco_ouro`, `preco_madeira`, `preco_pedra`, `preco_comida`, `preco_ferro`, `preco_peca`, `preco_petroleo`, `preco_oleo`, `preco_chip`, `taxa_preco`, `tempo_inicial`, `taxa_tempo`, `recurso_inicial`, `data_cadastro`, `data_alteracao`, `oculto`, `ativo`) VALUES
	(1, 1, 'Centro', 'Centro para governança e gestão de recursos, batalhas, construções, etc.', 100.00, 100.00, 100.00, 100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.00, 2.00, 2.50, 0.00, '2019-04-09 12:01:34', '2019-04-09 12:01:37', 0, 1),
	(2, 1, 'Mina de Ouro', 'Fonte de coleta de ouro', 100.00, 50.00, 50.00, 50.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.00, 1.00, 2.50, 10.00, '2019-04-09 12:01:34', '2019-04-09 12:01:37', 0, 1),
	(3, 1, 'Madeireira', 'Fonte de coleta de madeira', 50.00, 100.00, 50.00, 50.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.00, 1.00, 2.50, 10.00, '2019-04-09 12:01:34', '2019-04-09 12:01:37', 0, 1),
	(4, 1, 'Pedreira', 'Fonte de coleta de pedra', 50.00, 50.00, 100.00, 50.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.00, 1.00, 2.50, 10.00, '2019-04-09 12:01:34', '2019-04-09 12:01:37', 0, 1),
	(5, 1, 'Fazenda', 'Fonte de coleta de comida', 50.00, 50.00, 50.00, 100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2.00, 1.00, 2.50, 10.00, '2019-04-09 12:01:34', '2019-04-09 12:01:37', 0, 1);
/*!40000 ALTER TABLE `catalogo_construcao` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.cidade
CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_mundo` int(11) DEFAULT NULL,
  `id_era` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.cidade: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` (`id`, `id_usuario`, `id_mundo`, `id_era`, `nome`, `pontos`, `data_cadastro`, `data_alteracao`, `oculto`, `ativo`) VALUES
	(1, 1, 1, 1, 'Vini', 0, '2019-04-09 12:50:53', '2019-04-09 12:50:53', 0, 1);
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.construcao
CREATE TABLE IF NOT EXISTS `construcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cidade` int(11) DEFAULT NULL,
  `id_construcao` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.construcao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `construcao` DISABLE KEYS */;
INSERT INTO `construcao` (`id`, `id_cidade`, `id_construcao`, `nivel`, `data_cadastro`, `data_alteracao`, `oculto`, `ativo`) VALUES
	(1, 1, 1, 2, '2019-04-09 12:57:01', '2019-04-09 12:57:02', 0, 1);
/*!40000 ALTER TABLE `construcao` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.era
CREATE TABLE IF NOT EXISTS `era` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.era: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `era` DISABLE KEYS */;
INSERT INTO `era` (`id`, `nome`, `data_cadastro`, `data_alteracao`, `oculto`, `ativo`) VALUES
	(1, 'I', '2019-04-09 11:58:34', '2019-04-09 11:58:36', 0, 1),
	(2, 'II', '2019-04-09 11:58:44', '2019-04-09 11:58:44', 0, 1),
	(3, 'III', '2019-04-09 11:58:53', '2019-04-09 11:58:54', 0, 1),
	(4, 'IV', '2019-04-09 11:59:01', '2019-04-09 11:59:01', 0, 1),
	(5, 'V', '2019-04-09 11:59:13', '2019-04-09 11:59:13', 0, 1);
/*!40000 ALTER TABLE `era` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.mundo
CREATE TABLE IF NOT EXISTS `mundo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.mundo: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `mundo` DISABLE KEYS */;
INSERT INTO `mundo` (`id`, `nome`, `data_cadastro`, `data_alteracao`, `oculto`, `ativo`) VALUES
	(1, 'Mundo 1', '2019-04-09 12:48:43', '2019-04-09 12:48:47', 0, 1);
/*!40000 ALTER TABLE `mundo` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.template_cadastro
CREATE TABLE IF NOT EXISTS `template_cadastro` (
  `id` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.template_cadastro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `template_cadastro` DISABLE KEYS */;
/*!40000 ALTER TABLE `template_cadastro` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `premium` tinyint(4) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `token`, `premium`, `data_cadastro`, `data_alteracao`, `oculto`, `ativo`) VALUES
	(1, 'Vini', 'vinicius.biavatti@gmail.com', '6d7838e9922f655db5defdfea542c4f279aae5e1', NULL, 0, '2019-04-09 12:49:17', '2019-04-09 12:49:17', 0, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
