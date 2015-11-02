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
                    <div class="panel panel-default">
                        <?= form_open('vente/ajout_panier'); ?> <!--//ouverture du formulaire pour le panier-->
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $p->nom_pizza; ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="thumb">
                            <!--                       <img src="http://lorempixel.com/400/200/cats/">-->
                                <?= img($p->PK_pizza.'.jpg', $p->nom_pizza); ?>
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
                        </div>
                    </div>
            <?php endforeach; ?> 
        </ul>
    </section>
    <!--    Affichage du caddie si existe-->
       <?php //var_dump($this->cart->contents()); ?>
        <?php if($caddie = $this->cart->contents()): ?>

    <aside id="caddie" class="col-xs-4">
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
        </aside>
        <?php endif; ?>
    </div> <!--fin de row-->
