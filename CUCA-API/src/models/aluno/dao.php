<?php
    function cadastrar_aluno($db, $aluno){


    }
    function procurar_aluno_by_id($db, $id){
        $db->prepare('SELECT * FROM aluno a WHERE a.id=id');
        
    }
    function procurar_aluno_by_nome($db, $nome){

        
    }

    function procurar_todos($db){
        
    }

    function delete_aluno($db, $aluno){


    }

    function alterar_aluno($db, $aluno, $id){


    }


?>