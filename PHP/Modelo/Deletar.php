<?php
    namespace BestModal\PHP\Modelo;

    require_once("Conexao.php");

    use BestModal\PHP\Modelo\Conexao;

    class DeletarCliente{
        public function(Conexao $conexao, int $cpf){
            try{
                $conn = $conexao->conectar();
                $sql  = "delete from cliente where cpf = '$cpf'";
                $resultado = mysqli_query($conn, $sql);

                if($resultado){
                   echo "Conta Exluida com sucesso!";
                   return; 
                }else{
                    return "Ops... Deu erro, por favor tente novamente";

                }//fim do else
            }//fim do try
            catch(Exception $erro){
                return $erro;
            }//fim do catch

        }//fim da função

        
    }//fim da class
?>