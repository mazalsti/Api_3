<?php
require '../config.php';
include '../route.php';

if(method() === 'get'):
    if(!empty(request())):

        $sql= $pdo->prepare("SELECT * FROM dog WHERE id=:id");
        $sql->bindValue(':id', request()['id']);
        $sql->execute();

        if($sql->rowCount() > 0):
            $data = $sql->fetch();
            $array['result'][] = [
                'id' => $data['id'],
                'nome' => $data['nome']
            ];

        endif;

    endif;
else:
    $array['error'] = "Erro nao e um GET";
endif;

require '../header.php';

