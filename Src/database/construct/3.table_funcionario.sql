CREATE TABLE IF NOT EXISTS `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;