<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';

    $app->get("\Contratante\{id}", function($request,$response,$args){
        $retorno = procurar_contratante_by_id($this->db, $args["id"]);
        return $this->response->withJson($retorno);
    });

    $app->post("\Contratante", function($request,$response,$args){
        $contratante = $request->getParsedBody();
        $retorno = cadastrar_contratante($this->db,$contratante);
        return $this->reponse->withJson($retorno);
    });

    $app->get("\Contratante", function($request,$response,$args){
        $retorno = procurar_todos($this->db);
        return $this->reponse->withJson($retorno);
    });

    $app->get("\\nullo");

    $app->get("\Contratante\{nome}");

    $app->delete("\Contratante");

    $app->put("\Contratante");
?>