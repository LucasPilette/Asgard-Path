<?php 

session_start();
require_once(dirname(__FILE__).'/../models/User.php');


if($_SESSION['user_id'] == $_GET['id']){
    $user = User::getOne($_SESSION['user_id']);
}


include(dirname(__FILE__) .'/../views/templates/headerInscription.php');
include(dirname(__FILE__) .'/../views/profile.php');
include(dirname(__FILE__) .'/../views/templates/footer.php');


