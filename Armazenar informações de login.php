<?php

// obtém as informações de login do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// criptografa a senha usando a função password_hash
$hashed_password = password_hash($senha, PASSWORD_DEFAULT);

// se conecta ao banco de dados
$conn = new mysqli('localhost', 'seu_usuario', 'sua_senha', 'seu_banco_de_dados');

// verifica se a conexão falhou
if ($conn->connect_error) {
    die('Erro de conexão: ' . $conn->connect_error);
}

// insere as informações de login no banco de dados
$sql = "INSERT INTO usuarios (username, password) VALUES ('$nome', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo 'Informações de login armazenadas com sucesso!';
} else {
    echo 'Erro ao armazenar informações de login: ' . $conn->error;
}

// fecha a conexão com o banco de dados
$conn->close();