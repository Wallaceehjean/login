<?php
include"conn.php";
/*Fazer consulta dos valores */
if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email'])== 0){
        echo "Preencha o email";
    }
    elseif((strlen($_POST['senha']) == 0)){
        echo "Preeencha a senha";
    }
    /*Sistema de segurança*/
    else{
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);
        
        $query = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
        $sql_code = $conn->query($query) or die ("Falha no codigo" . $conn->error);
        
        $quantidade = $sql_code->num_rows;

        if($quantidade == 1){
            if ($result instanceof mysqli_result) {
            $usuario = $query->fetch_assoc();
            }
            elseif(isset($_SESSION)){
                session_start();
            }
            header("Location:bemvindo.html");
        }
        else{
        }

    }
}
