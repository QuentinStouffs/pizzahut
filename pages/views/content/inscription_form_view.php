<div id="inscription">
    <h1>Création d'un compte</h1>
    <fieldset>
      <legend> Informations personnelles</legend>
       
        <?= form_open('login/nouveau_mangeur');?>
        <?= form_input('nom', set_value('nom'), 'placeholder="Nom"') ?>
               
        
    </fieldset>
    <fieldset>
        <legend>Informations de connexion</legend>
        <?= form_input('pseudo', set_value('pseudo'), 'placeholder="Pseudo"'); ?>
        <?= form_password('password', set_value('password', 'Mot de Passe')); ?> 
                        <!--//set_value récupère la valeur envoyée et la réécrit si erreur.  
                Parameters:	
                $field (string) – Field name
                $default (string) – Default value-->
        <label for="confirm">Confirmez le password : </label>
        <?= form_password('confirm', set_value('confirm', 'Confirmez le mot de Passe')); ?>
        <?= form_submit('submit', 'Créer le compte'); ?>
        <?= validation_errors('<p class="error">'); ?>
        <?= form_close(); ?>
        
    </fieldset>
    
</div>