<h2>Modifier une Pizza</h2>

<?= form_open_multipart('administration/maj_pizza/'.$pizza->PK_pizza); ?>
<?= form_label('Nom :', 'nom'); ?>
<?= form_input('nom', set_value('nom', $pizza->nom_pizza)); ?>
<?= form_label('Ingrédients :', 'ingredients'); ?>
<?= form_input('ingredients', set_value('ingredients', $pizza->ingredients), 'placeholder="ingredients"'); ?>
<?= form_label('Prix :', 'prix'); ?>
<?= form_input('prix', set_value('prix', $pizza->prix), 'placeholder="Prix"'); ?>
<?= form_label('Image :', 'image'); ?>
<?= img($pizza->PK_pizza.'.jpg', $pizza->nom_pizza); ?>
<?= form_upload('image') ?>

<?= form_submit('envoyer', 'Envoyer'); ?>
<?= validation_errors('<p class="error">'); ?>
<?= form_close(); ?>