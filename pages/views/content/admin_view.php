<h2>Bienvenue Chef</h2>

<div class="pizzas">
   <h2>Liste des Pizzas</h2>
    <?= anchor('administration/ajout_pizza', 'Ajouter une pizza'); ?>
    <ul class="list-unstyled">
        <?php 
        foreach($pizzas as $p): ?> <!--Listage des pizzas-->

        <li>
            <div class="nom text-center">
                <?= $p->nom_pizza; ?>
            </div>
            <div class="thumb">
<!--               <img src="http://lorempixel.com/400/200/cats/">-->
                <?= img($p->PK_pizza.'.jpg', $p->nom_pizza); ?>
            </div>
            <div class="prix text-center">
                <?= $p->prix; ?>
            </div>
            <div class="ingredients">
                <?= $p->ingredients; ?>
            </div>
            <div class="supprimer">
                <?= anchor('administration/supprimer_pizza/'.$p->PK_pizza, 'Supprimer'); ?>
                
            </div>
            <div class="modifier">
                <?= anchor('administration/modif_pizza/'.$p->PK_pizza, 'Modifier'); ?>
                
            </div>
            
            
           

        </li>
        <?php endforeach; ?> 
    </ul>
</div>