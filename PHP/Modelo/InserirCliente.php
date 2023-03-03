<?php
    namespace BestModal\PHP\Modelo;

    require_once("Conexao.php");
    use  BestModal\PHP\Modelo\conexao;

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
                $sql  = "insert into cliente (cpf, nome, rua, bairro, numero, cep, telefone) values('$cpf', '$nome', '$rua', '$bairro', '$numero', '$cep', '$telefone')";
                $resultado = mysqli_query($conn, $sql);

                if($resultado){
                    echo "<br>Cadastrado com Sucesso!";
                    return;
                }else{
                    return "Ops, algo deu errado! Por favor tente novamente!";
                }//fim do else
            }//fim do try
                
                catch(Exception $erro){
                    return $erro;
                }//fim do catch

                if($cpf == true){
                    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
                    // Verifica se foi informado todos os digitos corretamente
                    if (strlen($cpf) != 11) {
                        return false;
                    }//fim do if
            
                    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
                    if (preg_match('/(\d)\1{10}/', $cpf)) {
                        return false;
                    }//fim do if
            
                    // Faz o calculo para validar o CPF
                    for ($t = 9; $t < 11; $t++) {
                        for ($d = 0, $c = 0; $c < $t; $c++) {
                            $d += $cpf[$c] * (($t + 1) - $c);
                        }//fim do for
            
                        $d = ((10 * $d) % 11) % 10;
                        if ($cpf[$c] != $d) {
                            return false;
                        }//fim do if
            
                    }//fim do for
                    return true;
                }//fim do if CPF
    
                
    
        }//fim da função
    
    }//fim da class

?>