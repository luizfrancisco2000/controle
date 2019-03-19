<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';

    $app->get("\Contrato\{id}", function($request,$response,$args){
        $retorno = procurar_contrato_by_id($this->db, $args["id"]);
        return $this->response->withJson($retorno);
    });

    $app->post("\Contrato", function($request,$response,$args){
        $contrato = $request->getParsedBody();
        $retorno = cadastrar_contrato($this->db,$contrato);
        return $this->reponse->withJson($retorno);
    });

    $app->get("\Contrato", function($request,$response,$args){
        $retorno = procurar_todos($this->db);
        return $this->reponse->withJson($retorno);
    });

    $app->get("\\nullo");

    $app->get("\Contrato\{nome}");

    $app->delete("\Contrato");

    $app->put("\Contrato");
?>