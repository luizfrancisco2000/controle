<?php
    use Slim\Http\Request;
    use Slim\Http\Response;

    require 'dao.php';

    $app->get("\Pagamento\{id}", function($request,$response,$args){
        $retorno = procurar_pagamento_by_id($this->db, $args["id"]);
        return $this->response->withJson($retorno);
    });

    $app->post("\Pagamento", function($request,$response,$args){
        $pagamento = $request->getParsedBody();
        $retorno = cadastrar_pagamento($this->db,$pagamento);
        return $this->reponse->withJson($retorno);
    });

    $app->get("\Pagamento", function($request,$response,$args){
        $retorno = procurar_todos($this->db);
        return $this->reponse->withJson($retorno);
    });

    //$app->get("\\nullo");

    $app->get("\Pagamento\{nome}", function($request,$response,$args){
        $retorno = procurar_pagamento_by_nome($this->db, $args["nome"]);
        return $this->response->withJson($retorno);
    });

    $app->delete("\Pagamento", function($request,$response,$args){
        $pagamento = $request->getParsedBody();
        $retorno = delete_pagamento($this->db, $pagamento);
        return $this->response->withJson($retorno);
    });
    $app->put("\Pagamento\{id}", function($request,$response,$args){
        $pagamento = $request->getParsedBody();
        $retorno = alterar_pagamento($this->db, $pagamento,$args["id"]);
        return $this->response->withJson($retorno);
    });
?>