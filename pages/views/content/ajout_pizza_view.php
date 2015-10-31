<h2>Ajouter une Pizza</h2>


<?= form_open_multipart('administration/nouvelle_pizza'); ?>
<?= form_label('Nom :', 'nom'); ?>
<?= form_input('nom', '', 'placeholder="Nom de la Pizza"'); ?>
<?= form_label('Ingrédients :', 'ingredients'); ?>
<?= form_input('ingredients', '', 'placeholder="ingredients"'); ?>
<?= form_label('Prix :', 'prix'); ?>
<?= form_input('prix', '', 'placeholder="Prix"'); ?>
<?= form_label('Image :', 'image'); ?>
<?= form_upload('image') ?>

<?= form_submit('envoyer', 'Envoyer'); ?>
<?= validation_errors('<p class="error">'); ?>
<?= form_close(); ?>