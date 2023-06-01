<?php
    // Abrir a conexão
    require_once('../db/connection.inc.php');
    require_once('compra.dao.php');

    // Instanciar o DAO
    $compraDAO = new CompraDAO($pdo);

    // Receber os dados do cliente
    $id = $_REQUEST['id'];
    
    // Conteúdo de resposta para o cliente
    $responseBody = "";

    if(!$id) {
        http_response_code(400);
        $responseBody = '{ "message": "ID não informado"}';
    } else {

        $qtd = $compraDAO->delete($id);
        if($qtd == 0) {
            http_response_code(404);
            $responseBody = '{ "message": "ID não existe"}';
        }
    }
    // Gerar a resposta para o cliente
    header("Content-type: application/json");
    print_r($responseBody);

?>