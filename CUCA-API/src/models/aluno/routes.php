<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';

    $app->get("/alunos/{id}", function($request,$response,$args){
        $retorno = procurar_aluno_by_id($this->db, $args["id"]);
        return $this->response->withJson($retorno);
    });

    $app->post("/aluno", function($request,$response,$args){
        $aluno = $request->getParsedBody();
        $retorno = cadastrar_aluno($this->db,$aluno);
        return $this->reponse->withJson($retorno);
    });

    $app->get("/aluno", function($request,$response,$args){
        $retorno = procurar_todos_alunos($this->db);
        return $this->reponse->withJson($retorno);
    });

    $app->get("/aluno/{nome}", function($request,$response,$args){
        $retorno = procurar_aluno_by_nome($this->db, $args["nome"]);
        return $this->response->withJson($retorno);
    });

    $app->delete("/aluno", function($request,$response,$args){
        $aluno = $request->getParsedBody();
        $retorno = delete_aluno($this->db, $aluno);
        return $this->response->withJson($retorno);
    });
    $app->put("/aluno", function($request,$response,$args){
        $aluno = $request->getParsedBody();
        $retorno = alterar_aluno($this->db, $aluno);
        return $this->response->withJson($retorno);
    });