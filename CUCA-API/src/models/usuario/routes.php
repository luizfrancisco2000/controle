<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';
    $app->post('/login', function($request, $response, $args){
        $login = $request->getParsedBody();
        $retorno = realizar_login($this->db,$login);
        return $this->response->withJson($retorno);
    });

    $app->post('/usuario', function($request, $response, $args){
        $usuario = $request->getParsedBody();
        $retorno = cadastrar_usuario($this->db,$usuario);
        return $this->response->withJson($retorno);
    });

    $app->put('/usuario/{id}', function($request, $response, $args){
        $usuario = $request->getParsedBody();
        $id = $args['id'];
        $retorno = alterar_usuario($this->db,$usuario,$id);
        return $this->response->withJson($retorno);
    });
    $app->get('/iniciar', function($request, $response, $args){
        $retorno = procurar_todos_usuarios($this->db);
        return $this->response->withJson($retorno);
    });

    $app->get('/usuario/{id}', function($request, $response, $args){
        $id = $args['id'];
        $retorno = procurar_usuario_by_id($this->db, $id);
        return $this->response->withJson($retorno);
    });