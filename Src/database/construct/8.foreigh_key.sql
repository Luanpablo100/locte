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