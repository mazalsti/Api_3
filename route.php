<?php

function method(){
    return strtolower($_SERVER['REQUEST_METHOD']);
}


function request(){
    switch (method()) {
        case 'post':
            $input = json_decode(file_get_contents('php://input')) ?? $_POST;
            return (array)$input;
            break;
        case 'get':
            return $_GET;
        break;
        case 'put':
            parse_str(file_get_contents('php://input'), $input);
            return (array)$input;
        break;
        case 'delete':
            parse_str(file_get_contents('php://input'), $input);
            return (array)$input;
        break;
        default:
            return false;
    }
}