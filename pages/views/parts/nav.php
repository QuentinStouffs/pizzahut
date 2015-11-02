<nav class="navbar navbar-inverse">
   <a class="navbar-brand" href="<?= site_url(); ?>">Pizza Hut</a>
   <div class="container">
    <ul class="nav navbar-nav">
        <?php if($this->session->userdata('is_logged_in')):?>
            <li><?= anchor('/login/deconnexion', 'Se déconnecter'); ?></li>
        <?php else: ?>
            <li><?= anchor('/login/', 'Se connecter'); ?></li>
        <?php endif; ?>
           <li><?= anchor('/vente', 'Les Pizzas'); ?></li>
        </ul>
    </div>
</nav>
<div class="container">