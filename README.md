# Locte
Um sistema para gerenciamento de veículos

## Funcionalidades
O Locte permite que um locador de veículos disponibilize aos seus clientes e funcionários um sistema integrado de reserva e locação.
Seu intuito é fornecer uma interface simples para o pequeno empresário.

## Como usar

### Requisitos
- Servidor web compatível com PHP (Apache, Nginx, XAMPP) devidamente configurado.
- SGBD SQL. Preferencialmente MySQL.
- Composer (https://getcomposer.org/download/)


### Procedimentos
Ex:
Clonar o repositório na pasta `htdocs` do XAMPP.
Clonar o repositório na pasta /var/www/html/ do Apache (deve estar configurado para utilizar PHP).

! Os arquivos *** devem estar na raiz do diretório ***, e não em uma pasta filha, com o nome de locte, por exemplo.

Execute: `composer install`

Execute o composer

#### Banco de dados
Crie um arquivo `.env` na raiz do projeto, e informe de acordo com a hospedagem do seu banco de dados, as seguintes chaves e valores:

DB_HOST=<host do banco de dados>
DB_USER=<usuário do banco de dados>
DB_PSW=<senha do usuário>
DB_NAME=<nome do banco de dados>

Ex.:
DB_HOST="localhost"
DB_USER="root"
DB_PSW="passwd"
DB_NAME="locte_db"

Para o campo de "DB_NAME" é necessário informar mesmo que um banco de dados não tenha sido criado ou preparado para a aplicação. O usuário informado deve ter permissões para criar bancos de dados caso não exista um banco pré criado.

`http://<seu_endereço>/create_db_page.php`
Por ex:
`http://localhost/create_db_page.php`

Aguarde a criação do banco de dados.

#### Utilizando o sistema
A partir da página de login: `http://<seu_ip>/login.php`, você pode utilizar a credencial de admin padrão "admin" e "admin"para a senha. Você será redicionado para a página administrativa.

É possível criar usuário a partir da página de login, mas eles por padrão terão o perfil de "Usuário", enquanto usuários criados a partir da página administrativa serão do tipo "Admin".

A partir da página de admin, você pode:
Listar, editar e excluir:
- Reservas
- Locações
- Veículos
- Usuários
- Clientes

A partir da página de usuário, você pode apenas fazer a reserva de um veículo ou alterar sua senha.

Aproveite o sistema!

## Declarações adicionais

O locte pode ser testado a partir da web em: http://locte.herokuapp.com/

Destaco que o Locte ainda está em fase desenvolvimento, praticamente um beta, e por isso pode conter alguns erros!
Ele é um projeto acadêmico, mas você pode sugerir melhorias através de Pull Requests à vontade.