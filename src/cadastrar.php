<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!-- Fonte: -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title>Cadastrar</title>

</head>

<body>
    
    <header>
        <div class="center">
            <h1>Se cadastre em nosso site</h1>
            <img src="../imagens/user.png">
        </div>
    </header>

    <div class="container">

        <div>

            <form action="welcomeCadastro.php" method="post" class="center"> 

                <input class="acessar center block" type="text" name="user" placeholder="seu login">
                <input class="acessar center block" type="password" name="senha" >

                <div>
                    <button type="submit" class="botaoRoxo">Cadastrar</button>
                </div>
                
            </form>


            <div class="box-dev">
                <p class="dev center">Desenvolvedora: Alexandra Coelho Peres</p>
            </div>

        </div>

    </div>

</body>

</html>