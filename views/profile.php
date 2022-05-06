<div class="container">
<?php if(!empty($_SESSION['user_id'])){
    echo('Bonjour '.$user->firstname.' ');
    echo($user->lastname);
}
?>
</div>

