<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (
        isset($_POST['nome']) &&
        isset($_POST['cpf']) &&
        isset($_POST['celular']) &&
        isset($_POST['municipio']) &&
        isset($_POST['email'])
    ) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $celular = $_POST['celular'];
        $municipio = $_POST['municipio'];
        $email = $_POST['email'];
        
        // Criar um ID único para o cliente
        $id = uniqid();
        
        $cliente = array(
            'id' => $id,
            'nome' => $nome,
            'cpf' => $cpf,
            'celular' => $celular,
            'municipio' => $municipio,
            'email' => $email
        );
        
        $dados_json = file_get_contents('clientes.json');
        $dados_array = json_decode($dados_json, true);
        
        $dados_array[] = $cliente;
        
        $dados_json = json_encode($dados_array, JSON_PRETTY_PRINT);
        
        file_put_contents('clientes.json', $dados_json);
        
        echo "Cliente cadastrado com sucesso!";
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Todos os campos são obrigatórios"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("mensagem" => "Método não permitido"));
}
?>
