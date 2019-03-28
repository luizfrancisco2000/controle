<?php

function realizar_login($db,$login){
    $str = $db->prepare('SELECT * FROM usuario u where u.user=:user and u.senha=:senha');
    $str->bindParam("user", $login["user"]);
    $str->bindParam("senha", $login["senha"]);
    $str->execute();
    $usuarios=$str->fetchAll();
    if (count($usuarios) > 0) {
        return $usuarios[0];
    } else {
        return array();
    }
}

function cadastrar_usuario($db, $usuario){
    $str = $db->prepare('INSERT usuario(user,nome,senha) VALUES(:user,:nome,:senha)');
    $str->bindParam("user", $usuario["user"]);
    $str->bindParam("nome", $usuario["nome"]);
    $str->bindParam("senha", $usuario["senha"]);
    $str->execute();
    $str = $db->prepare('SELECT * FROM usuario u WHERE u.user=:user');
    $str->bindParam("user", $usuario["user"]);
    $usuarios=$str->fetchAll();
    if (count($usuarios) > 0) {
        return $usuarios[0];
    } else {
        return array();
    }
}

function procurar_todos_usuarios($db){
    $str = $db->prepare('SELECT * FROM usuario u');
    $str->execute();
    $usuarios=$str->fetchAll();
    if (count($usuarios) > 0) {
        return $usuarios;
    } else {
        return array();
    }
}

function procurar_usuario_by_id($db, $id){
    $str = $db->prepare('SELECT * FROM usuario u WHERE u.id=:id');
    $str->bindParam("id", $id);
    $str->execute();
    $usuarios=$str->fetchAll();
    if (count($usuarios) > 0) {
        return $usuarios;
    } else {
        return array();
    }
}

function alterar_usuario($db,$usuario,$id){
    $str = $db->prepare('UPDATE usuario u SET u.nome=:nome, u.user=:user, u.senha=:senha WHERE u.id=:id');
    $str->bindParam("nome", $usuario["nome"]);
    $str->bindParam("user", $usuario["user"]);
    $str->bindParam("senha", $usuario["senha"]);
    $str->bindParam("id", $id);
    $str->execute();
    $usuarios=$str->fetchAll();
    if (count($usuarios) > 0) {
        return $usuarios[0];
    } else {
        return array();
    }
}