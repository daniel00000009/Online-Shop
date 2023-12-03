<?php

declare(strict_types= 1);

function is_input_empty(string $username, string $pwd, string $phone){
    if(empty($username) || empty($pwd) || empty($phone)){
        return true;
    }
    else{
        return false;
    }
}
function is_username_invalid(string $username){
    if(!filter_var($username, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function is_username_taken(object $pdo, string $username){
    if(get_username($pdo, $username)){
        return true;
    }
    else{
        return false;
    }
}

function is_phone_registered(object $pdo, string $phone){
    if(get_phone($pdo, $phone)){
        return true;
    }
    else{
        return false;
    }
}

function create_user(object $pdo, string $username, string $pwd, string $phone, string $userType){
    
    set_user($pdo, $username, $pwd, $phone, $userType);

}

function create_product(object $pdo, string $name, string $pret){
    
    set_product($pdo, $name, $pret);

}
