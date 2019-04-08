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
  `id` int(11) DEFAULT NULL,
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
  `tempo_inicial` int(11) DEFAULT NULL,
  `taxa_tempo` int(11) DEFAULT NULL,
  `recurso_inicial` float(11,2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.catalogo_construcao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `catalogo_construcao` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_construcao` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.cidade
CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_mundo` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `pontos` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.cidade: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;

-- Copiando estrutura para tabela mediant.mundo
CREATE TABLE IF NOT EXISTS `mundo` (
  `id` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.mundo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mundo` DISABLE KEYS */;
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
  `id` int(11) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `token` varchar(300) DEFAULT NULL,
  `premium` tinyint(4) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `oculto` tinyint(4) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela mediant.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
