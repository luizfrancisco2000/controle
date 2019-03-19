<?php
    function cadastrar_contrato($db, $contrato){


    }
    function procurar_contrato_by_id($db, $id){
        $db->prepare('SELECT * FROM contrato a WHERE a.id=id');
        
    }
    function procurar_contrato_by_nome($db, $nome){

        
    }

    function procurar_todos($db){
        
    }

    function delete_contrato($db, $contrato){


    }

    function alterar_contrato($db, $contrato, $id){


    }


?>