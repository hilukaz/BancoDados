<?php

//timezone

date_default_timezone_set('America/Sao_Paulo');

// conexão com o banco de dados

define('BD_SERVIDOR','localhost');//dominio
define('BD_USUARIO','root');//admin
define('BD_SENHA','');//senha
define('BD_BANCO','cadastro');//nome do banco
    
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);//pega as variáveis definidas e atribui ao mysqli
        //new mysqli(localhost , root , , cadastro)
    }

    public function setAgendamentos($nome,$telefone,$origem,$data_contato,$observacao){
        $stmt = $this->mysqli->prepare("INSERT INTO tabela (`nome`, `tel`, `origem`, `data_contato`, `obs`) VALUES ('$nome','$telefone','$origem','$data_contato','$observacao')");
        //insert nome da tabela(os atributos) values(nome da variável no código)
        
        if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }
}    
?>
