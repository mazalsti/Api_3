<?php
require '../config.php';
include '../route.php';

if(method() === 'delete'):
    echo "deu certo";
    if(!empty(request())):

        $sql= $pdo->prepare("DELETE FROM dog WHERE id=:id");
        $sql->bindValue(':id', request()['id']);
        $sql->execute();

        $array['result'] = [
            'id' => request()['id'],
            'msn' => "Deletado com sucesso!"
        ];

    endif;
else:
    $array['error'] = "Erro nao e um DELETE";
endif;

require '../header.php';

