<?php
    namespace BestModal\PHP\Modelo;

    require_once("Conexao.php");

    use BestModal\PHP\Modelo\Conexao;

    class Empresa{
        public function cadastrarEmpresa(
            Conexao $conexao,
            int $cnpj,
            string $rua,
            string $bairro,
            int $numero,
            int $cep,
            int $telefone){
                try{
                    $conn = $conexao->conectar();
                    $sql  = "insert into empresa(cnpj, rua, bairro, numero, cep, telefone) values('$cnpj', '$rua', '$bairro', '$numero', '$cep', '$telefone')";
                    $resultado = mysqli_query($conn, $sql);
        
                    if($resultado){
                        echo "Inserido com Sucesso!";
                        return;   
                    }else{
                        return "Ops, algo deu errado por favor tente novamente!";
                    }//fim do else
                }//fim do try
        
                catch(Exception $erro){
                    return $erro;
                }//fim do catch
    
            }//fim da função

    }//fim da class

?>