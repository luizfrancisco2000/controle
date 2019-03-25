<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';

    $app->get("\Aluno\{id}", function($request,$response,$args){
        $retorno = procurar_aluno_by_id($this->db, $args["id"]);
        return $this->response->withJson($retorno);
    });

    $app->post("\Aluno", function($request,$response,$args){
        $aluno = $request->getParsedBody();
        $retorno = cadastrar_aluno($this->db,$aluno);
        return $this->reponse->withJson($retorno);
    });

    $app->get("\Aluno", function($request,$response,$args){
        $retorno = procurar_todos($this->db);
        return $this->reponse->withJson($retorno);
    });

    //$app->get("\\nullo");

    $app->get("\Aluno\{nome}", function($request,$response,$args){
        $retorno = procurar_aluno_by_nome($this->db, $args["nome"]);
        return $this->response->withJson($retorno);
    });

    $app->delete("\Aluno", function($request,$response,$args){
        $aluno = $request->getParsedBody();
        $retorno = delete_aluno($this->db, $aluno);
        return $this->response->withJson($retorno);
    });
    $app->put("\Aluno\{id}", function($request,$response){
        $aluno = $request->getParsedBody();
        $retorno = alterar_aluno($this->db, $aluno);
        return $this->response->withJson($retorno);
    });
?>