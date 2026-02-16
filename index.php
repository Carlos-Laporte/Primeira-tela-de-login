
<?php
    require_once 'usuarios.php';
    $u = new Usuarios;
?>

<html lang="pt-br"> 
    <head>
        <meta charset="utf-8"/>
        <title>Projeto Login</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div id="corpo-form">
            <h1>Entrar</h1>
            <form method="POST">
                <input type="email" placeholder="Usuário" name="email">
                <input type="password" placeholder="Senha" name="senha">
                <input type="submit" value="ACESSAR">
                <a href="cadastrar.php">Ainda não é inscrito?<strong>Cadastre-se!</strong></a>
            </form>
        </div>
        <?php 
            if(isset($_POST['nome'])){
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
                //verificar se esta preenchido
                if(!empty($email) && !empty($senha)){
                    $u->conectar("projeto_login", "localhost", "root", "");
                    if($u->msgErro == ""){
                        if($u->logar($email, $senha)){
                            header("AreaPrivada.php");
                        }else{
                            echo "Email e/ou senha estão incorretos!";
                        }
                    }else{
                        echo "Erro: ".$u->msgErro;
                    }
                }else{
                    echo "Preencha todos os campos!";
                }
            }
        ?>
    </body>

</html>