<?php 

    if (isset($_POST) && !empty($_POST)) {

        $naoInseriuUsuario = empty($_POST['user']) ? true : false;
        $naoInseriuSenha = empty($_POST['senha']) ? true : false;

        if ($naoInseriuUsuario && $naoInseriuSenha) {
            $msgErro = "É necessário enviar todos os campos para se cadastrar";

        } elseif ($naoInseriuUsuario){
            $msgErro = "É necessário você você cadastrar seu usuário";

        } elseif($naoInseriuSenha){
            $msgErro = "É necessário você cadastrar uma senha";
            
        } else {

            try {

                $conexao =  new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

                $login = $_POST['user'];
                $senha = $_POST['senha'];

                // validação se usuário existe na base
                $stmt = $conexao->prepare("SELECT login FROM tb_usuarios WHERE login = :login");
                $stmt->execute(array(':login' => $login));

                $retorno = $stmt->fetchall(PDO::FETCH_ASSOC);

                if (isset($retorno) && !empty($retorno)){

                    $msgErro = "Você já esta cadastrado (a). Acesse o sistema na tela de login! ";

                } else {

                    $query = $conexao->prepare("INSERT INTO tb_usuarios (login,senha) VALUES (:login,:senha)");
                    
                    $query->bindParam(":login",$login);
                    $query->bindParam(":senha",$senha);
                    
                    $result = $query->execute();
                    
                    $nomeUsuario = $login;

                    if(!$result){

                        $erro = $query->errorInfo()[1];
                        $msgErro = "Erro no banco: $erro";
                        
                    }

                }

            } catch ( PDOException $e ) {
                $msgErro = "Erro em conexão com banco: ".$e->getMessage();
            }
            

        }


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <!-- Fonte: -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Novo cadastro</title>

</head>

<body>

    <div class="container">

        <div>

            <p class="erroOuSucesso center"><?php echo isset($msgErro) ? "$msgErro" : "Cadastro feito com Sucesso. Bem vindo, $nomeUsuario." ?></p>

            <div class="center">
                <a href="../index.php"><input type="button" class="botao botaoRoxo" value="Logar" /></a>
            </div>

            
            
            <?php if (isset($msgErro)) { ?>
                
                <div class="center">
                    <a href="cadastrar.php"><input type="button" class="botao botaoRoxo" value="Voltar" /></a>
                </div>
                
            <?php
            }
            ?>

            <div class="box-dev">
                <p class="dev center">Desenvolvedora: Alexandra Coelho Peres</p>
            </div>

        </div>

    </div>

</body>

</html>