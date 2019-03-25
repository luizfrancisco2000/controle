<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';
    $app->get('/usuario/{login}/{senha}', function($request, $response, $args){
        $retorno = realizar_login($this->db,$login,$senha);
        return $this->response->withJson($retorno);
    });

    $app->get('/Usuarios', function($request, $response, $args){
        $retorno = procurar_todos_usuarios($this->db);
        return $this->response->withJson($retorno);
    });

    //$app->put('\usuario', function($request, $response, $args){});