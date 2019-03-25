<?php
function cadastrar_aluno($db, $aluno)
{
    $str = $db->prepare('INSERT aluno(nome, codigoAluno, cpf, rg, dataNascimento, dataCadastrado, wpp, fone, FkidResponsavel, ativo) 
        VALUES(:nome, :codigoAluno, :cpf, :rg, :dataNascimento, :dataCadastrado, :wpp, :fone, :FkidResponsavel, 1) ');
    $str->bindParam("nome", $aluno["nome"]);
    $str->bindParam("codigoAluno", $aluno["codigoAluno"]);
    $str->bindParam("cpf", $aluno["cpf"]);
    $str->bindParam("rg", $aluno["rg"]);
    $str->bindParam("dataNascimento", $aluno["dataNascimento"]);
    $data = Date('d/m/Y');
    $str->bindParam("dataCadastrado", $data);
    $str->bindParam("wpp", $aluno["wpp"]);
    $str->bindParam("fone", $aluno["fone"]);
    $str->bindParam("FkidResponsavel", $aluno["FkidResponsavel"]);
    $str->execute();

    $str = $db->prepare('SELECT a.nome FROM aluno a WHERE a.cpf=:cpf');
    $str->bindParam("cpf", $aluno["cpf"]);
    $str->execute();
    $alunos = $str->fetchAll();
    if (count($alunos) > 0) {
        return $alunos[0];
    } else {
        return array();
    }
}
function procurar_aluno_by_id($db, $id)
{
    $str = $db->prepare('SELECT * FROM aluno a WHERE a.id=:id');
    $str->bindParam("id",$id);
    $str->execute();
    $alunos = $str->fetchAll();
    if (count($alunos) > 0) {
        return $alunos[0];
    } else {
        return array();
    }
}
function procurar_aluno_by_nome($db, $nome){ 
    $str = $db->prepare('SELECT * FROM aluno a WHERE a.nome LIKE :nome');
    $str->bindParam("nome",$nome);
    $str->execute();
    $alunos = $str->fetchAll();
    return $alunos;
}

function procurar_todos_alunos($db){
    $str = $db->prepare('SELECT * FROM aluno');
    $str->execute();
    $alunos = $str->fetchAll();
    if (count($alunos) > 0) {
        return $alunos;
    } else {
        return array();
    }
 }

function delete_aluno($db, $aluno){
    $str = $db->prepare('UPDATE aluno a SET a.ativo=0 where a.id=:id');
    $str->bindParam("id", $aluno["id"]);
    $str->execute();

    $str = $db->prepare('SELECT a.nome FROM aluno a WHERE a.cpf=:cpf and a.ativo=0');
    $str->bindParam("cpf", $aluno["cpf"]);
    $str->execute();

    $alunos = $str->fetchAll();
    if (count($alunos) > 0) {
        return $alunos[0];
    } else {
        return array();
    }

}

function alterar_aluno($db, $aluno){    
    $str = $db->prepare('UPDATE aluno a 
    SET a.nome=:nome, a.codigoAluno=:codigoAluno, a.cpf=:cpf, a.rg=:rg, a.dataNascimento=:dataNascimento, a.wpp=:wpp, a.fone=:fone, a.ativo=:ativo
     where a.id=:id');
        $str->bindParam("nome", $aluno["nome"]);
        $str->bindParam("codigoAluno", $aluno["codigoAluno"]);
        $str->bindParam("cpf", $aluno["cpf"]);
        $str->bindParam("rg", $aluno["rg"]);
        $str->bindParam("dataNascimento", $aluno["dataNascimento"]);
        $str->bindParam("wpp", $aluno["wpp"]);
        $str->bindParam("fone", $aluno["fone"]);
        $str->bindParam("ativo", $aluno["ativo"]);
        $str->bindParam("id", $aluno["id"]);
        $str->execute();

    $str = $db->prepare('SELECT a.nome FROM aluno a WHERE a.cpf=:cpf and a.id=id');
    $str->bindParam("cpf", $aluno["cpf"]);
    $str->bindParam("id", $aluno["id"]);
    $str->execute();

    $alunos = $str->fetchAll();
    if (count($alunos) > 0) {
        return $alunos[0];
    } else {
        return array();
    }
 }
 