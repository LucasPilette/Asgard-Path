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