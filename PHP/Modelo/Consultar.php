<?php

    namespace BestModal\PHP\Modelo;

    require_once("Conexao.php");

    use BestModal\PHP\Modelo\Conexao;

    class Consultar{
        public function logarCliente(Conexao $conexao, int $cpf){
            try{
                $conn = $conexao->conectar();
                $sql  = "select * from cliente where cpf = '$cpf'";
                $result = mysqli_query($conn, $sql);
                $verefic = mysqli_num_rows($result);

                if($verefic == 0){
                    echo "Ops... CPF não encontrado!";
                    return;
                }else{
                    header("location: CadastrarCliente.php");
                    exit();

                }//fim do else

            }//fim do try
            catch(Excepetion $erro){
                return $erro;
            }//fim do catch
        }//fim da função

    }//fim da class


?>