<?php 
    if(!empty($message)){
        echo '<p>'.$message.'</p>';
    }
?>
<div class="pizzas">
   <h2>Liste des Pizzas</h2>
    
    <ul class="list-unstyled">
              <?php 
                foreach($pizzas as $p): ?> <!--Listage des pizzas-->
                
                <li>
                    <?= form_open('vente/ajout_panier'); ?> <!--//ouverture du formulaire pour le panier-->
                    <div class="nom text-center">
                        <?= $p->nom_pizza; ?>
                    </div>
                    <div class="thumb">
                       <img src="http://lorempixel.com/400/200/cats/">
                        <!--<?= img($p->PK_pizza.'.jpg', $p->nom_pizza); ?>-->
                    </div>
                    <div class="prix text-center">
                        <?= $p->prix; ?>
                    </div>
                    <div class="ingredients">
                        <?= $p->ingredients; ?>
                    </div>
                    <input type="number" value="1" name="quantite">
                    <?= form_hidden('id', $p->PK_pizza); ?>
                    <button type="submit" class="btn btn-info">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Ajouter
                    </button>
                   <!-- <?= form_submit('action', 'ajouter au caddie', 'class="btn btn-info text-center"'); ?>-->
                    <?= form_close(); ?>
                    
                </li>
                <?php endforeach; ?> 
    </ul>
</div>
<!--    Affichage du caddie si existe-->
   <?php //var_dump($this->cart->contents()); ?>
    <?php if($caddie = $this->cart->contents()): ?>
    
<div id="caddie">
    <table>
        <caption>Votre commande <?= anchor('vente/destroy', '<span class="supprime glyphicon glyphicon-trash">sup</span>'); ?></caption>

<!--                <a href="vente/supcaddie"><span class="glyphicon glyphicon-trash"></span></a></caption>-->
            <thead>
                <tr>
                    <th>Qté</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
<!--                parcours le caddie -->
            <?php foreach ($caddie as $article): ?>
                <tr>
                    <td> <?= form_open('vente/update'); ?>
                    <?= form_hidden ('rowid', $article['rowid']); ?>
                    <input type="number" name="majqty" value="<?= $article['qty']; ?>">
                    <?= form_submit('update', 'Modifier'); ?>
                    <?= form_close(); ?>
                    </td>
                    <td><?= $article['name']; ?></td>
                    <td><?= $article['subtotal'] ?></td>
                    <td><?= anchor('vente/supprimer/'.$article['rowid'], '<span class="supprime glyphicon glyphicon-remove-circle">sup</span>'); ?></td>
                </tr>
            <?php endforeach; ?>
            <tfoot>
                <tr class="total">
                    <td colspan="3">Total</td>
                    <td><?= $this->cart->total(); ?> $</td>
                </tr>
            </tfoot>
        </table>
        <?= anchor('vente/recapitulatif', 'Pronto !'); ?>
    </div>
    <?php endif; ?>    
