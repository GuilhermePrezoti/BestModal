<?php
    namespace BestModal\PHP\Modelo;

    require_once("Conexao.php");
    use  BestModal\PHP\Modelo\Conexao;

    class Cliente{

        public function cadastrarCliente(
        Conexao $conexao,
        int $cpf,
        string $nome,
        string $rua,
        string $bairro,
        int $numero,
        int $cep,
        int $telefone){
            
            try{
                $conn = $conexao->conectar();
                $sql  = "insert into cliente (cpf, nome, rua, bairro, numero, cep, telefone) values('$cpf','$nome','$rua','$bairro','$numero','$cep','$telefone')";
                $result = mysqli_query($conn, $sql);

                if($result){
                    echo "<br>Cadastrado com Sucesso!";
                    return;
                }else{
                    return "Ops, algo deu errado! Por favor tente novamente!";
                }//fim do else
            }//fim do try
                
                catch(Exception $erro){
                    return $erro;
                }//fim do catch

        }//fim da função

        function validaCPF($cpf) {
 
            // Extrai somente os números
            $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
             
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                return false;
            }
        
            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return false;
            }
        
            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }
            return true;
        
        }
    
    }//fim da class

?>