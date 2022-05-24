<?php
require '../config.php';
include '../route.php';

if(method() === 'get'):
    // if(request()):

        $sql= $pdo->prepare("SELECT * FROM dog");
        $sql->execute();

        if($sql->rowCount() > 0):
            $data = $sql->fetchAll();
            // print_r($data);
            foreach($data as $itens):
                $array['result'][] = [
                    'id' => $itens['id'],
                    'nome' => $itens['nome'],
                    'sexo' => $itens['sexo'],
                    'idade' => $itens['idade'],
                    'obs' => $itens['obs']
                ];

            endforeach;

        endif;
        echo "deu certo";
    // endif;
else:
    $array['error'] = "Erro nao e um GET";
endif;

require '../header.php';

