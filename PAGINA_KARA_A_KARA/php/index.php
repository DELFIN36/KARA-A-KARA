<?php

include_once 'user_session.php';
include_once 'user.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    echo "Hay sesion";
}else if(isset($_POST['username']) && isset($_POST['password'])){
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user -> UserExists($userForm, $passForm)){
        echo "usuario validado";
    }else{
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once ''
    }
}else{
    echo "Login";
}

?>