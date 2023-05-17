# Locte
Um sistema para gerenciamento de veículos

## Funcionalidades
O Locte permite que um locador de veículos disponibilize aos seus clientes e funcionários um sistema integrado de reserva e locação.
Seu intuito é fornecer uma interface simples para o pequeno empresário.

## Como usar
Caso você utilize algum web server que seja compatível com PHP, como Apache ou XAMPP, copie a raiz deste projeto para seu ambiente.
Ex:
Clonar o repositório na pasta `htdocs` do XAMPP.
Clonar o repositório na pasta /var/www/html/ do Apache (deve estar configurado para utilizar PHP).

Faça a importação do banco de dados.
O Locte usa Mysql, e um arquivo dump do SQL pode ser encontrado neste repositório em: Src/database

O arquivo `locte_db.sql` possui a estrutura do sistema vazia, portanto você pode precisar criar algumas coisas manualmente, como usuários de primeiro acesso.
O arquivo `locte_db_dev.sql` possui a estrutura do sistema, e alguns dados pré criados, como veículos, usuários, e reservas, para que você possua utilizá-lo melhor, por isso **recomendamos que importe esse arquivo**. A credencial de administrador para este caso é 'admin' e a senha 'admin'.

Aproveite o sistema!

## Declarações adicionais

Destaco que o Locte ainda está em fase desenvolvimento, praticamente um beta, e por isso pode conter alguns erros!
Ele é um projeto acadêmico, mas você pode sugerir melhorias através de Pull Requests à vontade.