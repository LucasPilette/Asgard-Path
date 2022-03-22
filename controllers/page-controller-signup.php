<?php 


// Appel des constantes et initialisation du tableau d'erreurs

require_once(dirname(__FILE__) . '/../config/constForm.php');

$errors = [];

//Définition des erreurs

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // EMAIL
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $errors['email'] = 'Veuillez saisir votre email';
    } else {
        $checkedEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$checkedEmail) {
            $errors['email'] = 'Veuillez saisir un email valide';
        }
    }

    // NOM
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($lastname)) {
        $errors['lastname'] = 'Veuillez saisir votre nom';
    } else {
        $checkedLastname = filter_var(
            $lastname,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_NAME . '/'))
        );
        if (!$checkedLastname) {
            $errors['lastname'] = 'Veuillez saisir un nom valide';
        }
    }
    // PRENOM
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($firstname)) {
        $errors['firstname'] = 'Veuillez saisir votre prénom';
    } else {
        $checkedFirstname = filter_var(
            $firstname,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_NAME . '/'))
        );
        if (!$checkedFirstname) {
            $errors['firstname'] = 'Veuillez saisir un prénom valide';
        }
    }

    // Identifiant

    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($login)) {
        $errors['login'] = 'Veuillez saisir votre identifiant';
    } else {
        $checkedLogin = filter_var(
            $login,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_LOGIN . '/'))
        );
        if (!$checkedLogin) {
            $errors['login'] = 'Veuillez saisir un identifiant valide';
        }
    }

    //MOT DE PASSE

    $password = $_POST['password'];
    $confirmedPassword = $_POST['confirmedPassword'];

    if(empty($password)){
        $errors['password'] = 'Veuillez saisir votre mot de passe';
    } else {
        if(empty($confirmedPassword)){
            $errors['confirmedPassword'] = 'Veuillez confirmer votre mot de passe';
        } else {
            if($password != $confirmedPassword){
                $errors['password'] = 'Veuillez saisir deux fois le même mot de passe';
            } else {
                $checkedPassword = filter_var(
                    $password,
                    FILTER_VALIDATE_REGEXP,
                    array("options" => array("regexp" => '/' . REG_EXP_PASSWORD . '/'))
                );
                if(!$checkedPassword){
                    $errors['password'] = 'Veuillez saisir un mot de passe d\'au moins 8 caractères, comprenant au minimum un chiffre';
                } else {
                    $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                }
            }
        }
    }

}






// Header

include(dirname(__FILE__) .'/../views/templates/headerInscription.php');


// Affichage du profil si le formulaire est bien rempli

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errors)) {
    include(dirname(__FILE__) . '/../views/profile.php');
} else {
    include(dirname(__FILE__) . '/../views/signup.php');
};


//Footer

include(dirname(__FILE__) .'/../views/templates/footer.php');
