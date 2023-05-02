<?php

// obtém as informações de login do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// se conecta ao banco de dados
$conn = new mysqli('127.0.0.1', '', '123456', 'base_tcc.sql');

// verifica se a conexão falhou
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

// busca o usuário no banco de dados
$sql = "SELECT * FROM usuarios WHERE username = '$nome'";
$result = $conn->query($sql);

// verifica se o usuário foi encontrado
if ($result->num_rows > 0) {
    // usuário encontrado, verifica a senha
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // senha correta, inicia a sessão
        session_start();
        $_SESSION['username'] = $username;
        echo 'Login bem sucedido!';
    } else {
        // senha incorreta
        echo 'Senha incorreta!';
    }
} else {
    // usuário não encontrado
    echo 'Usuário não encontrado!';
}

// fecha a conexão com o banco de dados
$conn->close();