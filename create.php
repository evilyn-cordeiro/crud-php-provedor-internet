<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // valida se há dados
    if (
        isset($_POST['nome']) &&
        isset($_POST['cpf']) &&
        isset($_POST['celular']) &&
        isset($_POST['municipio']) &&
        isset($_POST['email'])
    ) {
        // caso tenha, atribui a cada variável.
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $celular = $_POST['celular'];
        $municipio = $_POST['municipio'];
        $email = $_POST['email'];
        
        // Criar um ID único para o cliente
        $id = uniqid();
        
        // cria uma nova e única variável que comporte todos os dados cadastrados
        $cliente = array(
            'id' => $id,
            'nome' => $nome,
            'cpf' => $cpf,
            'celular' => $celular,
            'municipio' => $municipio,
            'email' => $email
        );
        
        // cria um novo arquivo JSON.
        $dados_json = file_get_contents('clientes.json');
        $dados_array = json_decode($dados_json, true);
        
        // atribui ao arquivo json os dados dos clientes em um formato compatível
        $dados_array[] = $cliente;
        
        // apresenta todos os dados no arquivo.
        $dados_json = json_encode($dados_array, JSON_PRETTY_PRINT);
        
        file_put_contents('clientes.json', $dados_json);
        
        // retorno
        echo "Cliente cadastrado com sucesso!";
    } else {
        // retorno erro
        http_response_code(400);
        echo json_encode(array("mensagem" => "Todos os campos são obrigatórios"));
    }
} else {
    // retorno erro de método(para o front, caso mande com método errado.)
    http_response_code(405);
    echo json_encode(array("mensagem" => "Método não permitido"));
}
?>
