<?php
    namespace BestModal\PHP\Modelo;

    class Conexao{
        public function conectar(){

            try{
                $conn = mysqli_connect('localhost', 'root', '', 'BestModal');
                if($conn){
                   return $conn;
                    
                }//fim do if
                echo "Não Conectado!";
            }//fim do try
            catch(Exception $erro){
                echo $erro;

            }//fim do catch

        }//fim do function

    }//fim da class


?>