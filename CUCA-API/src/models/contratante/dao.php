<?php
    function cadastrar_contratante($db, $contratante){


    }
    function procurar_contratante_by_id($db, $id){
        $db->prepare('SELECT * FROM contratante a WHERE a.id=id');
        
    }
    function procurar_contratante_by_nome($db, $nome){

        
    }

    function procurar_todos($db){
        
    }

    function delete_contratante($db, $contratante){


    }

    function alterar_contratante($db, $contratante, $id){


    }


?>