<?php
header("Access-Control-Allow-Origin: *");
// Verifica se a requisição é do tipo GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    // Verifica se o arquivo clientes.json existe
    if (file_exists('clientes.json')) {
        
        // Obtém os dados do arquivo clientes.json
        $dados_json = file_get_contents('clientes.json');
        
        // Decodifica os dados JSON em um array associativo
        $clientes = json_decode($dados_json, true);
        
        // Verifica se a decodificação foi bem-sucedida
        if ($clientes !== null) {
            // Define o cabeçalho da resposta como JSON
            header('Content-Type: application/json');
            // Retorna os dados dos clientes como JSON
            echo json_encode($clientes);
        } else {
            // Se não houver dados no arquivo, retorna uma mensagem de erro
            http_response_code(404);
            echo json_encode(array("mensagem" => "Nenhum cliente cadastrado"));
        }
    } else {
        // Se o arquivo não for encontrado, retorna uma mensagem de erro
        http_response_code(404);
        echo json_encode(array("mensagem" => "Arquivo clientes.json não encontrado"));
    }
} else {
    // Se o método da requisição não for GET, retorna uma mensagem de erro
    http_response_code(405);
    echo json_encode(array("mensagem" => "Método não permitido"));
}

?>