<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="src/style.css">

    <!-- Fonte: -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Logar</title>

</head>

<body>
    
    <header>
        <div class="center">
            <h1>Acesse sua conta</h1>
            <img src="imagens/name.png">
        </div>
    </header>

    <div class="container">

        <div>

            <form action="src/welcomeLogin.php" method="post" class="center">

                <input class="acessar center block" type="text" name="user">
                <input class="acessar center block" type="password" name="senha">

                <div>
                    <button type="submit" class="botaoRoxo">Entrar</button>
                </div>

                <div class="block box-opcoes">
                    <input class="inlineBlock botaoRoxo limpar" type="reset" value="Limpar">
                    <a href="src/cadastrar.php" class="inlineBlock botaoRoxo"><p>Cadastrar</p></a>
                </div>
                
            </form>


            <div class="box-dev">
                <p class="dev center">Desenvolvedora: Alexandra Coelho Peres</p>
            </div>


        </div>

    </div>

</body>

</html>