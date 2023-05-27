CREATE TABLE IF NOT EXISTS `veiculo` (
  `id` int(11) NOT NULL,
  `tipo` enum('Carro','Moto','Onibus','Caminhao') NOT NULL,
  `placa` varchar(7) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(29) NOT NULL,
  `ano` year(4) NOT NULL,
  `cor` varchar(15) NOT NULL,
  `quilometragem` int(11) NOT NULL DEFAULT 0,
  `codigo_imagem` longblob NOT NULL,
  `valor` float NOT NULL,
  `disponivel` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;