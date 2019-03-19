<?php

use OpenBoleto\Banco\Bradesco;
use OpenBoleto\Agente;


//Preciso do seu Nome ou Nome Empresarial, CPF ou CNPJ, Endereço Comercial, CEP, Cidade e Estado

function gera_boleto($contratante)
{
    foreach ($contratante as $aux) {
        $sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
        $cedente = new Agente($aux["contratante.nome"],$aux["contratante.cpf"],$aux["contratante.logradouro"],$aux["contratante.cep"],$aux["contratante.cidade"],$aux["contratante.estado"]);

        $boleto = new Bradesco(array(
            // Parâmetros obrigatórios
            'dataVencimento' => new DateTime($aux["aux.dataVencimento"]),
            'valor' => $aux["mensalidade.valor"],
            'sequencial' => 1234567, // Para gerar o nosso número
            'sacado' => $sacado,
            'cedente' => $cedente,
            'agencia' => 1724, // Até 4 dígitos
            'carteira' => 18,
            'conta' => 10403005, // Até 8 dígitos
            'convenio' => 1234, // 4, 6 ou 7 dígitos
        ));

        echo $boleto->getOutput();
    }
}
