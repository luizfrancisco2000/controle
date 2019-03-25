<?php

function realizar_login($db,$user,$senha){
    $str = $db->prepare('SELECT * FROM usuario u where u.user=:user and u.senha=:senha');
    $str->bindParam("user", $user);
    $str->bindParam("senha", $senha);
    $str->execute();
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



function alterar_usuario($db,$usuario){
    $str = $db->prepare('UPDATE usuario SET u.nome=:nome, u.user=:user, u.senha=:senha WHERE u.id=:id');
    $str->bindParam("nome", $usuario["nome"]);
    $str->bindParam("user", $usuario["user"]);
    $str->bindParam("senha", $usuario["senha"]);
    $str->bindParam("id", $usuario["id"]);
    $str->execute();
    $usuarios=$str->fetchAll();
    if (count($usuarios) > 0) {
        return $usuarios[0];
    } else {
        return array();
    }
}