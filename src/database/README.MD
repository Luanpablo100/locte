Para o banco de dados do sistema, foram desenvolvidas as seguintes conceitos:

## Entidades/Tabelas
-   Cliente
-   Veículo
-   Reserva
-   Locação
-   Funcionário
-   Conta

### Cliente:
-   ID (identificador)
-   Nome
-   Endereço
-   Telefone
-   E-mail

### Veículo:
-   ID (identificador)
-   Marca
-   Modelo
-   Tipo
-   Placa
-   Cor
-   Ano
-   Quilometragem

### Reserva:
-   ID (identificador)
-   Data e hora de início
-   Data e hora de término
-   ID do cliente que fez a reserva
-   ID do veículo reservado

### Locação:

-   ID (identificador)
-   Data e hora de início
-   Data e hora de término
-   ID do cliente que alugou o veículo
-   ID do veículo alugado
-   Quilometragem inicial
-   Quilometragem final
-   Valor total

### Funcionário:

-   ID (identificador)
-   Nome
-   Cargo
-   Telefone
-   E-mail

### Conta:

-   ID (identificador)
-   Nome de usuário
-   Senha
-   Perfil

## Relacionamentos
Possuindo os relacionamentos baseados nos seguintes conceitos:
-   Cliente faz Reserva
-   Veículo tem Reserva
-   Cliente faz Locação
-   Veículo tem Locação 
-   Funcionário faz Locação
-   Conta pertence a um Cliente
-   Conta pertence a um Funcionário

## SGBD
Para a modelo físico, foi encolhido o banco de dados MySQL devido a familiaridade com o SGBD.
