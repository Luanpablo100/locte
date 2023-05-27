CREATE TABLE IF NOT EXISTS `conta` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `perfil` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `conta` (`id`, `usuario`, `senha`, `perfil`) VALUES
(3, 'admin', 'admin', 'Admin');