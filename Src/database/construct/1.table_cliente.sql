CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `telefone` bigint(14) NOT NULL,
  `tipo_documento` enum('CNH','CPF','RG') NOT NULL,
  `nmr_documento` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idReserva` int(11) DEFAULT NULL,
  `idLocacao` int(11) DEFAULT NULL,
  `IdConta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;