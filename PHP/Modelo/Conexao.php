<?php
    namespace BestModal\PHP\Modelo;

    class Conexao{
        public function conectar(){

            try{
                $conn = mysqli_connect('localhost', 'root', '', 'BestModal');
                if($conn){
                    return "Conectado com sucesso!";
                    
                }
            }
            catch(Exception $erro){
                echo $erro;

            }//fim do catch

        }//fim do function

    }//fim da class


?>