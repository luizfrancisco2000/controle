<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';

    $app->get("/Contratos/{id}", function($request,$response,$args){
        $retorno = procurar_contrato_by_id($this->db, $args["id"]);
        return $this->response->withJson($retorno);
    });

    $app->post("/Contrato", function($request,$response,$args){
        $contrato = $request->getParsedBody();
        $retorno = cadastrar_contrato($this->db,$contrato);
        return $this->reponse->withJson($retorno);
    });

    $app->get("/contrato", function($request,$response,$args){
        $retorno = procurar_todos_contratos($this->db);
        return $this->reponse->withJson($retorno);
    });

    $app->get("/contratos/{turma}", function($request,$response,$args){
        $retorno = procurar_contrato_by_turma($this->db, $args["turma"]);
        return $this->response->withJson($retorno);
    });

    $app->get("/ContratoS/{horario}", function($request,$response,$args){
        $retorno = procurar_contrato_by_turma($this->db, $args["turma"]);
        return $this->response->withJson($retorno);
    });

    $app->delete("/Contrato", function($request,$response,$args){
        $contrato = $request->getParsedBody();
        $retorno = delete_contrato($this->db, $contrato);
        return $this->response->withJson($retorno);
    });
    $app->put("/Contrato/{id}", function($request,$response,$args){
        $contrato = $request->getParsedBody();
        $retorno = alterar_contrato($this->db, $contrato,$args["id"]);
        return $this->response->withJson($retorno);
    });