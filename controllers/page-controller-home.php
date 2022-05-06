<?php 

session_start();
require_once(dirname(__FILE__).'/../models/User.php');


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajax'])){
    $login = trim(filter_input(INPUT_POST,'login', FILTER_SANITIZE_SPECIAL_CHARS));
    $userCheck =  User::isExist($login);
    if(is_object($userCheck)){
        echo json_encode($userCheck->login);
    } else {
        echo 'false';
    }
    exit;
};




if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = trim(filter_input(INPUT_POST,'login', FILTER_SANITIZE_SPECIAL_CHARS));

    if(!User::isExist($login)){
        $errors['login'] = 'Veuillez saisir un identifiant valide.';
    } else {
        $password = $_POST['password']; 
        $userPass = new User();
        $user = User::getOneLogin($login);
        if(!password_verify($password,$user->password)){
            $errors['password'] = 'Le mot de passe saisi est incorrect.';
        }
    }
    if(empty($errors)){
        $_SESSION['user_id'] = $user->ID;
        header('location: /profile?id='.$user->ID);
    }
}

include(dirname(__FILE__) .'/../views/templates/header.php');
include(dirname(__FILE__) .'/../views/home.php');
include(dirname(__FILE__) .'/../views/templates/footer.php');