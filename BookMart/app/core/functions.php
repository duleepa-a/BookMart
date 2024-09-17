<?php

function show($stuff){
    
    echo "<pre>";
    print_r($stuff);
    echo"</pre>";
}

function esc($str){
    return htmlspecialchars(($str));
}

function redirect($path){
    header("Location: ". ROOT."/".$path);
    die;
}

function checkUserRole($requiredRole) {
    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === $requiredRole) {
        return true;
    } else {
        redirect('unauthorized'); 
        exit;
    }
}

function checkMultipleRoles($allowedRoles) {
    if (isset($_SESSION['user_role']) && in_array($_SESSION['user_role'], $allowedRoles)) {
        return true;
    } else {
        redirect('unauthorized'); 
        exit;
    }
}