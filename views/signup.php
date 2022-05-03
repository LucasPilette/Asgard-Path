<div class="container">
    <form action="" method="post" novalidate>
        <div class="formDiv">
            <label for="lastname"> Nom</label>
        <input type="text"id="lastname" name="lastname" required value="<?= $lastname ?? '' ?>">
        <div class="error"><?= $errors['lastname'] ?? '' ?></div>
        <label for="firstname"> Prénom</label>
        <input type="text"id="firstname" name="firstname" required value="<?= $firstname ?? '' ?>">
        <div class="error"><?= $errors['firstname'] ?? '' ?></div>
        <label for="email"> E-mail</label>
        <input type="email"id="email" name="email" required value="<?= $email ?? '' ?>">
        <div class="error"><?= $errors['email'] ?? '' ?></div>
        <label for="login"> Pseudo</label>
        <input type="text"id="login" name="login" required value="<?= $login ?? '' ?>">
        <div class="error"><?= $errors['login'] ?? '' ?></div>
        <label for="password"> Mot de passe</label>
        <input type="password"id="password" name="password" required value="<?= $password ?? '' ?>">
        <div class="error"><?= $errors['password'] ?? '' ?></div>
        <label for="confirmedPassword"> Confirmez votre de passe</label>
        <input type="password"id="confirmedPassword" name="confirmedPassword" required value="<?= $confirmedPassword ?? '' ?>">
        <div class="error"><?= $errors['confirmedPassword'] ?? '' ?></div>
        <div class="submitDiv">
        <input type="submit" value="S'inscrire">
        </div>
        </div>
    </form>
</div>
<div id="modal" class="modal">
        <form class="modal-content animate" action="" method="post">
            <div class="headContainer">
                <span id="close" class="close" title="Close Modal">&times;</span>
                <h1>Asgard <span class="green">Path</span></h1>
            </div>

            <div class="modalContainer">
                <label for="uname"><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Nom d'utilisateur" required>

                <label for="psw"><b>Mot de passe</b></label>
                <input type="password" placeholder="Mot de passe" required>

                <button type="submit" id="connect">Se connecter</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Se rappeler de moi
                </label>
            </div>
        </form>
    </div>