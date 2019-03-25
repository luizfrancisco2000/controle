<?php
    function cadastrar_contratante($db, $contratante){
        $str = $db->prepare('INSERT contratante(diaPagamento, nome, numeroRG, emissor,
        dataNascimento, cpf, email, logradouro, cep, numero, bairro, cidade, 
        estado, dataAssinatura, FkidContrato, grauParentescoAluno, fone, wpp)
        VALUES(:diaPagamento, :nome, :numeroRG, :emissor,
        :dataNascimento, :cpf, :email, :logradouro, :cep, :numero, :bairro, :cidade, 
        :estado, :dataAssinatura, :FkidContrato, :grauParentescoAluno, :fone, :wpp)');
        $str->bindParam("diaPagamento",$contratante["diaPagamento"]);
        $str->bindParam("nome",$contratante["nome"]);
        $str->bindParam("numeroRG",$contratante["numeroRG"]);
        $str->bindParam("dataNascimento",$contratante["dataNascimento"]);
        $str->bindParam("cpf",$contratante["cpf"]);
        $str->bindParam("email",$contratante["email"]);
        $str->bindParam("logradouro",$contratante["logradouro"]);
        $str->bindParam("cep",$contratante["cep"]);
        $str->bindParam("numero",$contratante["numero"]);
        $str->bindParam("bairro",$contratante["bairro"]);
        $str->bindParam("cidade",$contratante["cidade"]);
        $str->bindParam("estado",$contratante["estado"]);
        $str->bindParam("dataAssinatura",$contratante["dataAssinatura"]);
        $str->bindParam("FkidContrato",$contratante["FkidContrato"]);
        $str->bindParam("grauParentescoAluno",$contratante["grauParentescoAluno"]);
        $str->bindParam("fone",$contratante["fone"]);
        $str->bindParam("wpp",$contratante["wpp"]);
        $str->execute();

        $str = $db->prepare('SELECT c.nome FROM contratante c WHERE c.cpf=cpf');
        $str->bindParam("cpf", $contratante["cpf"]);
        $str->execute();
        $contratantes = $str->fetchAll();
        if (count($contratantes) > 0) {
            return $contratantes[0];
        } else {
            return array();
        }

    }
    function procurar_contratante_by_id($db, $id){
        $db->prepare('SELECT * FROM contratante a WHERE a.id=id');
        $str->bindParam("id",$id);
        $str->execute();
        $contratantes = $str->fetchAll();
        if (count($contratantes) > 0) {
            return $contratantes[0];
        } else {
            return array();
        }
        
    }
    function procurar_contratante_by_nome($db, $nome){
        $db->prepare('SELECT * FROM contratante a WHERE a.id=id');
        $str->bindParam("id",$id);
        $str->execute();
        $contratantes = $str->fetchAll();
        if (count($contratantes) > 0) {
            return $contratantes[0];
        } else {
            return array();
        }
        
    }

    function procurar_todos_contratantes($db){
        $str = $db->prepare('SELECT * FROM contratante');
        $str->execute();
        $contratantes = $str->fetchAll();
        if (count($contratantes) > 0) {
            return $contratantes;
        } else {
            return array();
        }
    }

    function delete_contratante($db, $contratante){
        $str = $db->prepare('UPDATE contratante c SET c.ativo=0 where c.id=:id');
        $str->bindParam("id", $contratante["id"]);
        $str->execute();
        $str = $db->prepare('SELECT c.nome FROM contratante c WHERE c.cpf=:cpf and c.ativo=0');
        $str->bindParam("cpf", $contratante["cpf"]);
        $str->execute();
    
        $contratantes = $str->fetchAll();
        if (count($contratantes) > 0) {
            return $contratantes[0];
        } else {
            return array();
        }
    }

    function alterar_contratante($db, $contratante){
        $str = $db->prepare('UPDATE contrantante c 
    SET c.diaPagamento=:diaPagamento, c.nome=:nome, c.numeroRG=:numeroRG, c.emissor=:emissor,
    c.dataNascimento=:dataNascimento, c.cpf=:cpf, c.email=:email, c.logradouro=:logradouro, c.cep=:cep, c.numero=:numero, c.bairro=:bairro, c.cidade=:cidade, 
    c.estado=:estado, c.dataAssinatura=:dataAssinatura, c.FkidContrato=:FkidContrato, c.grauParentescoAluno=:grauParentescoAluno, c.fone=:fone, c.wpp=:wpp');
        $str->bindParam("diaPagamento",$contratante["diaPagamento"]);
        $str->bindParam("nome",$contratante["nome"]);
        $str->bindParam("numeroRG",$contratante["numeroRG"]);
        $str->bindParam("dataNascimento",$contratante["dataNascimento"]);
        $str->bindParam("cpf",$contratante["cpf"]);
        $str->bindParam("email",$contratante["email"]);
        $str->bindParam("logradouro",$contratante["logradouro"]);
        $str->bindParam("cep",$contratante["cep"]);
        $str->bindParam("numero",$contratante["numero"]);
        $str->bindParam("bairro",$contratante["bairro"]);
        $str->bindParam("cidade",$contratante["cidade"]);
        $str->bindParam("estado",$contratante["estado"]);
        $str->bindParam("dataAssinatura",$contratante["dataAssinatura"]);
        $str->bindParam("FkidContrato",$contratante["FkidContrato"]);
        $str->bindParam("grauParentescoAluno",$contratante["grauParentescoAluno"]);
        $str->bindParam("fone",$contratante["fone"]);
        $str->bindParam("wpp",$contratante["wpp"]);
        $str->execute();

        $str = $db->prepare('SELECT c.nome FROM contratante c WHERE c.cpf=:cpf and c.id=:id');
        $str->bindParam("cpf", $contratante["cpf"]);
        $str->bindParam("id", $contratante["id"]);
        $str->execute();
    
        $contratantes = $str->fetchAll();
        if (count($contratantes) > 0) {
            return $contratantes[0];
        } else {
            return array();
        }
    }


?>