<?php

function signup($data){
    $errors = array();
    $valid = '/^[a-zA-Z ]+$/';

    echo '<pre>';
    print_r($data);
    // validate information
    if(!preg_match($valid, $data['full-name'])){
        $errors[] = 'Please enter your full name';
    }

   return $errors;
}