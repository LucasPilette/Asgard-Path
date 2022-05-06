<?php 

require_once(dirname(__FILE__).'/../models/User.php');

$login = $_GET['login'];
$user = User::getOneLogin($login);

date_default_timezone_set('Europe/Paris');
$date = new DateTime();
$schedule = $date->format('Y-m-d H:i:s');

$user->validated_at = $schedule;

$userUpdate = new User();
$userUpdate->update($user);

if(!$userUpdate->updateValidation()){
    $_SESSION['validation'] = 'Problème avec la validation de votre compte';
} else {
    $_SESSION['validation'] = 'Votre compte a bien été validé';
    header('location: /accueil');
    die;
}



