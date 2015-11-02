
<div id="crmnav">
    <ul>
    
    <?php if($this->session->userdata('is_logged_in')):?>
        <li><?= anchor('/login/deconnexion', 'Se déconnecter'); ?></li>
    <?php else: ?>
        <li><?= anchor('/login/', 'Se connecter'); ?></li>
    <?php endif; ?>
       <li><?= anchor('/vente', 'Les Pizzas'); ?></li>
        <!--<li><a href="login" title="Login">Login</a></li>
        <li><a href="taches" title="Testion des gaches">Taches</a></li>-->
    </ul>
</div>