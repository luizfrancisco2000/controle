<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';

    $app->get("/Contratantes/{id}", function($request,$response,$args){
        $retorno = procurar_contratante_by_id($this->db, $args["id"]);
        return $this->response->withJson($retorno);
    });

    $app->post("/Contratante", function($request,$response,$args){
        $contratante = $request->getParsedBody();
        $retorno = cadastrar_contratante($this->db,$contratante);
        return $this->reponse->withJson($retorno);
    });

    $app->get("/Contratante", function($request,$response,$args){
        $retorno = procurar_todos_contratantes($this->db);
        return $this->reponse->withJson($retorno);
    });
    
    $app->get("/Contratante/{nome}", function($request,$response,$args){
        $retorno = procurar_contratante_by_nome($this->db, $args["nome"]);
        return $this->response->withJson($retorno);
    });

    $app->delete("/Contratante", function($request,$response,$args){
        $contratante = $request->getParsedBody();
        $retorno = delete_contratante($this->db, $contratante);
        return $this->response->withJson($retorno);
    });
    $app->put("/Contratante/{id}", function($request,$response,$args){
        $contratante = $request->getParsedBody();
        $retorno = alterar_contratante($this->db, $contratante,$args["id"]);
        return $this->response->withJson($retorno);
    });
