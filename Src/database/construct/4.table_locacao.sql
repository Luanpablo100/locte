CREATE TABLE IF NOT EXISTS `locacao` (
  `id` int(11) NOT NULL,
  `km_inicial` int(11) NOT NULL,
  `km_final` int(11) DEFAULT NULL,
  `valor` float NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `data_inicio` date NOT NULL DEFAULT current_timestamp(),
  `data_termino` date DEFAULT NULL,
  `hora_inicio` time NOT NULL DEFAULT current_timestamp(),
  `hora_termino` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

