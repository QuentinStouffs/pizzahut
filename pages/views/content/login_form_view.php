<div id="login_form">
    <h1>Login</h1>
    <?= form_open('login/validation');?>
    <?= form_input('pseudo', 'Pseudo'); ?>
    <?= form_password('password', 'Password'); ?>
    <?= form_submit('submit', 'Login'); ?>
    <?= anchor('login/inscription', 'Inscription'); ?>  <!--Anchor permet de creer un bouton -->
    <?= form_close(); ?>

</div>