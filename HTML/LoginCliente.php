<?php
    namespace BestModal\HTML;

    require_once("..\PHP\Modelo\Conexao.php");
    require_once("..\PHP\Modelo\Consultar.php");

    use BestModal\PHP\Modelo\Conexao;
    use BestModal\PHP\Modelo\Consultar;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Informe o seu CPF para fazer o Login</h1>
    <form method="POST">
        <label>CPF: </label>
        <input type="number" name="tCpf">
        <input name = "submit" value="Entrar" type="submit">


        <?php
        if(isset($_POST['submit'])){

            if($_POST['tCpf'] != ""){
                $conn = new Conexao;
                $conn->conectar();

                $inser = new Consultar;
            
                setcookie('user', $_POST['tCpf']);
                $inser->logarCliente($conn, $_POST['tCpf']);
            }else{
                return "CPF não encontrado!";
            }//fim do else
        }//fim do isset
        ?>
    </form>
    <a href="CadastrarCliente.php"><button>Cadastrar</button></a>
    
</body>
</html>