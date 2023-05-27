CREATE TABLE IF NOT EXISTS `reserva` (
  `id` int(11) NOT NULL,
  `data_inicio` date NOT NULL DEFAULT current_timestamp(),
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL DEFAULT current_timestamp(),
  `data_termino` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;