<?php
    function cadastrar_mensalidade($db, $id){
        $str = $db->prepare('SELECT YEAR(c.dataAssinatura), MONTH(c.dataAssinatura), c.diaPagamento FROM Contratante c WHERE c.id=:id');
        $str->bindParam("id",$id);
        $str->execute();
        $datas=$str->fetchAll();
        if (count($datas) > 0) {
            $data = new DateTime($datas["YEAR"].'-'.$datas["MONTH"].'-'.$datas["diaPagamento"]);
            $data->format('d/M/Y');
            $diaAtual = DAY('d/m/Y');
            $mesesRestantes;
        } else {
            return array();
        }
    }
    function procurar_mensalidade_by_cliente($db, $id){
        $db->prepare('SELECT * FROM mensalidade a WHERE a.id=id');
        
    }

    function procurar_todos_mensalidade($db){
        
    }

    function pagar_mensalidade($db, $mensalidade){


    }

    function alterar_mensalidade($db, $mensalidade, $id){


    }


?>