
<?php 

    $aparecerLinkParaCadastro = false;
    if (isset($_POST) && !empty($_POST)) {

        $naoInseriuUsuario = empty($_POST['user']) ? true : false;
        $naoInseriuSenha = empty($_POST['senha']) ? true : false;

        if ($naoInseriuUsuario && $naoInseriuSenha) {
            $msgErro = "É necessário enviar todos os campos";

        } elseif ($naoInseriuUsuario){
            $msgErro = "É necessário você enviar o usuário";

        } elseif($naoInseriuSenha){
            $msgErro = "É necessário você enviar a senha";
            
        } else {

            $aparecerCadastrese = true;

            try {

                $conexao =  new PDO("sqlsrv:Database=dbphp7;server=localhost\SQLEXPRESS;ConnectionPooling=0","sa","root");

                $login = $_POST['user'];
                $senha = $_POST['senha'];

                // validação se usuário existe na base
                $stmt = $conexao->prepare("SELECT login FROM tb_usuarios WHERE login = :login AND senha = :senha ");
                $stmt->execute(array(':login' => $login, ':senha' => $senha));
                
                $retorno = $stmt->fetchall(PDO::FETCH_ASSOC);

                if (isset($retorno) && !empty($retorno)){

                    foreach ($retorno as $row){
                        foreach ($row as $key => $value) {
                            $nomeUsuario = $value;
                        }
                    }
                    
                }else{
                    $aparecerLinkParaCadastro = true;
                    $msgErro = "Usuário inválido. Tente novamente! ";
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

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&display=swap" rel="stylesheet">

    <title>Bem vindo</title>

</head>

<body>

    <div class="container">

        <div>            

            <p class="erroOuSucesso center">

                <?php            
                    if (isset($msgErro)){
                        echo $msgErro;
                    } else {
                        echo "Bem vindo, $nomeUsuario";
                    }
                ?>
                
            </p>

            <div class="center">
                <a href="index.php"><input type="button" class="botao botaoRoxo" value="Voltar" /></a>
            </div>

            <?php  
                if ($aparecerLinkParaCadastro) {
            ?>
                <p class="erroOuSucesso cadastreSe center"> ou <a href="cadastrar.php">cadastre-se aqui</a> </p>
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