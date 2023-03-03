<?php
    namespace BestModal\HTML;

    require_once('../PHP/Modelo/Conexao.php');
    require_once('../PHP/Modelo/InserirCliente.php');

    use BestModal\PHP\Modelo\Conexao;
    use BestModal\PHP\Modelo\Cliente;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <form method="POST">
    <label>CPF: </label>
        <input type="number" name="tCpf" placeholder="Informe seu CPF"><br>

        <label>Nome: </label>
        <input type="text" name="tNome" placeholder="Informe seu nome"><br>

        <label>Rua: </label>
        <input type="text" name="tRua" placeholder="Informe sua rua"><br>

        <label>Bairro: </label>
        <input type="text" name="tBairro" placeholder="Informe seu Bairro"><br>

        <label>Número da residência: </label>
        <input type="number" name="tNumero" placeholder="Informe o número"><br>

        <label>CEP: </label>
        <input type="number" name="tCep" placeholder="Informe o CEP da rua"><br>

        <label>Telefone: </label>
        <input type="number" name="tTelefone" placeholder="Informe seu telefone"><br>

        <input type="submit" value="Cadastrar" name="submit">

        <?php
            if(isset($_POST['submit'])){

                $conec = new Conexao();
                $conec->conectar();

                $cad  = new Cliente();
                $cad->cadastrarCliente($conec,
                $_POST['tCpf'], 
                $_POST['tNome'], 
                $_POST['tRua'], 
                $_POST['tBairro'], 
                $_POST['tNumero'], 
                $_POST['tCep'], 
                $_POST['tTelefone']);
                return;
            }//fim do isset
        ?>
        
    </form>
</body>
</html>