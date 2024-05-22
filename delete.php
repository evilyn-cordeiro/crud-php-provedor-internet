<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
        $dados_json = file_get_contents('clientes.json');
        $dados_array = json_decode($dados_json, true);
        
        foreach ($dados_array as $indice => $cliente) {
            if ($cliente['id'] === $id) {
                unset($dados_array[$indice]);
                break;
            }
        }
        
        $dados_json = json_encode(array_values($dados_array), JSON_PRETTY_PRINT);
        
        file_put_contents('clientes.json', $dados_json);
        
        echo "Cliente excluído com sucesso!";
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "ID do cliente é obrigatório"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("mensagem" => "Método não permitido"));
}
?>
