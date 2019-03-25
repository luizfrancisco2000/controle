<?php
function cadastrar_contrato($db, $contrato){ 
    $str = $db->prepare('INSERT contrato(termos,valor,ativo,horario,turma,sala) 
    VALUES(:termos,:valor,:ativo,:horario,:turma,:sala)');
    $str->bindParam("termos",$contrato["termos"]);
    $str->bindParam("valor",$contrato["valor"]);
    $str->bindParam("ativo",$contrato["ativo"]);
    $str->bindParam("horario",$contrato["horario"]);
    $str->bindParam("turma",$contrato["turma"]);
    $str->bindParam("sala",$contrato["sala"]);
    $str->execute();

    $str = $db->prepare('SELECT c.horario FROM contrato c WHERE a.valor=:valor');
    $str->bindParam("valor", $contrato["valor"]);
    $str->execute();
    $contratos = $str->fetchAll();
    if (count($contratos) > 0) {
        return $contratos[0];
    } else {
        return array();
    }
}
function procurar_contrato_by_id($db, $id)
{
    $str = $db->prepare('SELECT * FROM contrato c WHERE c.id=:id');
    $str->bindParam("id", $id);
    $str->execute();
    $contratos = $str->fetchAll();
    if (count($contratos) > 0) {
        return $contratos[0];
    } else {
        return array();
    }
}
function procurar_contrato_by_turma($db, $turma)
{
    $str = $db->prepare('SELECT * FROM contrato c WHERE c.turma LIKE :turma');
    $str->bindParam("turma", $turma);
    $str->execute();
    $contratos = $str->fetchAll();
    return $contratos;
}

function procurar_contrato_by_horario($db, $horario)
{
    $str = $db->prepare('SELECT * FROM contrato c WHERE c.horario LIKE :horario');
    $str->bindParam("horario", $horario);
    $str->execute();
    $contratos = $str->fetchAll();
    return $contratos;
}

function procurar_todos_contratos($db)
{
    $str = $db->prepare('SELECT * FROM contrato');
    $str->execute();
    $contratos = $str->fetchAll();
    return $contratos;
}

function delete_contrato($db, $contrato)
{
    $str = $db->prepare('UPDATE contrato c SET a.ativo=0 where c.id=:id');
    $str->bindParam("id", $contrato["id"]);
    $str->execute();

    $str = $db->prepare('SELECT a.horario FROM aluno a WHERE a.turma=:turma and a.ativo=0');
    $str->bindParam("turma", $contrato["turma"]);
    $str->execute();

    $contratos = $str->fetchAll();
    if (count($contratos) > 0) {
        return $contratos[0];
    } else {
        return array();
    }
}

function alterar_contrato($db, $contrato, $id){
    $str = $db->prepare('UPDATE contrato c SET c.termos=:termos,c.valor=:valor,c.ativo=:ativo,c.horario=:horario,c.turma=:turma,c.sala=:sala WHERE c.id=:id');
    $str->bindParam("termos",$contrato["termos"]);
    $str->bindParam("valor",$contrato["valor"]);
    $str->bindParam("ativo",$contrato["ativo"]);
    $str->bindParam("horario",$contrato["horario"]);
    $str->bindParam("turma",$contrato["turma"]);
    $str->bindParam("sala",$contrato["sala"]);
    $str->bindParam("id", $contrato["id"]);
    $str->execute();

    $str = $db->prepare('SELECT a.horario FROM aluno a WHERE a.turma=:turma and a.ativo=0');
    $str->bindParam("turma", $contrato["turma"]);
    $str->execute();

    $contratos = $str->fetchAll();
    if (count($contratos) > 0) {
        return $contratos[0];
    } else {
        return array();
    }
}