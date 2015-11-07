<div id="login_form">
    <h1>Login</h1>
    <?= form_open('login/validation');?>
    <div class="form-group">
        <?= form_label('pseudo', 'Pseudo'); ?>
        <?= form_input('pseudo', 'Pseudo', 'class="form-control"'); ?>
    </div>
    <div class="form-group">
        <?= form_label('password'); ?>
        <?= form_password('password', 'Password', 'class="form-control"'); ?>
    </div>
    <?= form_submit('submit', 'Login', 'class="btn btn-info"'); ?>
    <?= anchor('login/inscription', 'Inscription', 'class="btn btn-info"'); ?>  <!--Anchor permet de creer un bouton -->
    <?= form_close(); ?>

</div>