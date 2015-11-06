<?php 
    if(!empty($message)){
        echo '<p>'.$message.'</p>';
    }
?>
<div class="row">
    <section class="col-xs-8">
        <h2>Liste des Pizzas</h2>      
            <?php 
                foreach($pizzas as $p): ?> <!--Listage des pizzas-->
                    <div class="col-xs-4">
                       <div class="thumbnail">
                         <!--//ouverture du formulaire pour le panier-->
                        
                            <h3 class="caption"><?= $p->nom_pizza; ?></h3>
                        
                    
                            <!--                       <img src="http://lorempixel.com/400/200/cats/">-->
                                <?= img($p->PK_pizza.'.jpg', $p->nom_pizza); ?>
                            
                            <div class="prix text-center">
                                <span><?= $p->prix; ?><i class="glyphicon glyphicon-euro"></i></span>
                            </div>
                            <div class="ingredients">
                                <?= $p->ingredients; ?>
                            </div>
                            
                            <?= form_open('vente/ajout_panier', array('class' => 'form-inline')); ?>
                               <div class="form-group">
                                   <label class="sr-only" for="quantite">quantite</label>
                                    <input type="number" class="form-control" style="width: 6rem;" value="1" name="quantite">
                                    <?= form_hidden('id', $p->PK_pizza); ?>
                               </div>
                                <button type="submit" class="btn btn-info">
                                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Ajouter
                                </button>
                               
                            <?= form_close(); ?>
                        </div>
                    </div>
                    
            <?php endforeach; ?> 
    </section>
    <!--    Affichage du caddie si existe-->
       <?php //var_dump($this->cart->contents()); ?>
        <?php if($caddie = $this->cart->contents()): ?>

    <aside id="caddie" class="col-xs-4">
        <table class="table table-striped">
            <caption>Votre commande <?= anchor('vente/destroy', '<span class="glyphicon glyphicon-trash red"></span>'); ?></caption>

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
                        <td> <?= form_open('vente/update', array('class' => 'form-inline')); ?>
                        <?= form_hidden ('rowid', $article['rowid']); ?>
                        <label for="majqty" class="sr-only">Quantité</label>
                        <input type="number" class="form-control" style="width: 5rem" name="majqty" value="<?= $article['qty']; ?>">
                        <?= form_submit('update', 'Modifier'); ?>
                        <?= form_close(); ?>
                        </td>
                        <td><?= $article['name']; ?></td>
                        <td><?= $article['subtotal'] ?></td>
                        <td><?= anchor('vente/supprimer/'.$article['rowid'], '<span class="glyphicon glyphicon-remove-circle red"></span>'); ?></td>
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
        </aside>
        <?php endif; ?>
    </div> <!--fin de row-->
