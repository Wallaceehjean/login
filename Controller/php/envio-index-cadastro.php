<!DOCTYPE html>
<html lang="en">

<body>
  <script></script>
</body>
</html>
<?php
    include "conn.php";
    // Verifica se a conexão foi bem sucedida
    if (!$conn) {
    
}   
    $id_user = mysqli_insert_id($conn);
    $nome = $_POST["nome"];
    $sobrenome = $_POST["sobrenome"];
    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf']); // remove todos os caracteres que não são números
    $data_nascimento = $_POST["data_nascimento"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];  
    
    $cpf_verifica = mysqli_query($conn, "SELECT * FROM cliente WHERE cpf = '{$cpf}'") or print mysql_error();
    $sql = mysqli_query($conn, "SELECT * FROM cliente WHERE email = '{$email}'") or print mysql_error();
     #Se o retorno for maior do que zero, diz que já existe um.

     if(mysqli_num_rows($sql)>0) {
      echo json_encode(array('email' => 'Ja existe um usuario cadastrado com este email')); 
     
    }
    else if(mysqli_num_rows($cpf_verifica)> 0){
      echo json_encode(array('cpf' => 'Ja existe um usuario cadastrado com este cpf')); 
      
    }

    else {
    $conn->query ("INSERT INTO cliente (nome, sobrenome, cpf, data_nascimento, email, senha) VALUES ('$nome', '$sobrenome', '$cpf', '$data_nascimento', '$email','$senha')");
      header("Location:cadastrado.php");
  }

// Fecha a conexão com o banco de dados
mysqli_close($conn);
          


?>