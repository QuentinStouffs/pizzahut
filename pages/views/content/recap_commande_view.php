<?php
    if(!empty($commande)): ?>
       
       <div id="caddie">
       <?php var_dump($this->session->userdata('is_logged_in')); ?>
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
            <?php foreach ($commande as $article): ?>
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
        <?= anchor('vente/commander', 'Pronto commande !'); ?>
    </div>
    
    <?php else: ?>
    <div id="caddievide">
        
        <h3>Que puis-je vous servir?</h3>
        <?= anchor('vente', 'Voir la carte'); ?>
        
    </div>
   
<?php endif; ?>
    
    
    
    