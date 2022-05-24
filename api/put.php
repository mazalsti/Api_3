<?php
require '../config.php';
include '../route.php';

if(method() === 'put'):
    if(!empty(request())):

        $sql= $pdo->prepare("SELECT * FROM dog WHERE id=:id");
        $sql->bindValue(':id', request()['id']);
        $sql->execute();

        if($sql->rowCount() > 0):
            $sql= $pdo->prepare("UPDATE dog SET nome=:nome, sexo=:sexo,idade=:idade, obs=:obs WHERE id=:id");
            $sql->bindValue(':id', request()['id']);
            $sql->bindValue(':nome', request()['nome']);
            $sql->bindValue(':sexo', request()['sexo']);
            $sql->bindValue(':idade', request()['idade']);
            $sql->bindValue(':obs', request()['obs']);
            $sql->execute();
        
            $array['result'] = [
                'id' => request()['id'],
                'nome' => request()['nome'],
                'sexo' => request()['sexo'],
                'idade' =>request()['idade'],
                'obs'  => request()['obs']
            ];

        endif;
    endif;
else:
    $array['error'] = "Erro nao e um PUT";
endif;

require '../header.php';

