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