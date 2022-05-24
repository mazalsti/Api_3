<?php
require '../config.php';
include '../route.php';

if(method() === 'post'):
    if(!empty(request())):

        $sql= $pdo->prepare("INSERT INTO dog SET nome=:nome, sexo=:sexo,idade=:idade, obs=:obs, dat_cad=NOW()");
        $sql->bindValue(':nome', request()['nome']);
        $sql->bindValue(':sexo', request()['sexo']);
        $sql->bindValue(':idade', request()['idade']);
        $sql->bindValue(':obs', request()['obs']);
        $sql->execute();

        $id = $pdo->lastInsertId();

        $array['result'] = [
            'id' => $id,
            'nome' => request()['nome'],
            'sexo' => request()['sexo'],
            'idade' =>request()['idade'],
            'obs'  => request()['obs']
        ];



    endif;
else:
    $array['error'] = "Erro nao e um GET";
endif;

require '../header.php';

