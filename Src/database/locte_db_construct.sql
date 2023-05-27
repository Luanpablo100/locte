SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `locte_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `locte_db`;

CREATE TABLE `cliente` (
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

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `perfil` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `conta` (`id`, `usuario`, `senha`, `perfil`) VALUES
(3, 'admin', 'admin', 'Admin');

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `locacao` (
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

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `data_inicio` date NOT NULL DEFAULT current_timestamp(),
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL DEFAULT current_timestamp(),
  `data_termino` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `veiculo` (
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

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nmr_documento` (`nmr_documento`),
  ADD KEY `fk_cliente_reserva` (`idReserva`),
  ADD KEY `fk_cliente_locacao` (`idLocacao`),
  ADD KEY `fk_cliente_conta` (`IdConta`);

ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_locacao_cliente` (`idCliente`),
  ADD KEY `fk_locacao_veiculo` (`idVeiculo`);

ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_cliente` (`idCliente`),
  ADD KEY `fk_reserva_veiculo` (`idVeiculo`);

ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `placa` (`placa`);

ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `locacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_conta` FOREIGN KEY (`IdConta`) REFERENCES `conta` (`id`),
  ADD CONSTRAINT `fk_cliente_locacao` FOREIGN KEY (`idLocacao`) REFERENCES `locacao` (`id`),
  ADD CONSTRAINT `fk_cliente_reserva` FOREIGN KEY (`idReserva`) REFERENCES `reserva` (`id`);

ALTER TABLE `locacao`
  ADD CONSTRAINT `fk_locacao_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_locacao_veiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `veiculo` (`id`);

ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_reserva_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_reserva_veiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `veiculo` (`id`);
COMMIT;
