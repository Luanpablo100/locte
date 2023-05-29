<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Locte</title>
    <!-- <link rel="stylesheet" href="../Style/normalize.css"> -->
    <link rel="stylesheet" href="./public/style/login.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-image">	
                <h2 class="card-heading">
                    Locte
                    <!-- <small>Seu sistema de locação de veículos</small> -->
                </h2>
            </div>
            <form class="card-form" action="./Src/create_account.php" method="POST">
                <div class="input">
                    <input type="text" class="input-field" required id="user_register" name="user_register"/>
                    <label class="input-label">Usuário</label>
                </div>
                            <div class="input">
                    <input type="password" class="input-field" required id="passwd_register" name="passwd_register"/>
                    <label class="input-label">Senha</label>
                </div>
                <div class="action">
                    <button class="register-action-button">Cadastrar</button>
                </div>
                <div>
                    <a href="/login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>