<?php

use Core\Routeur\Routeur;
use Core\Session\Csrf;
use Core\Session\Session;
use Core\Helper\FormBootstrap;

if (isset($new)) {
    $action = Routeur::getUrl('News.Update', ['id' => $new->id]);
    $form = new FormBootstrap('data', $new);
    $lib_btn = 'Modifier';
} else {
    $action = Routeur::getUrl('News.Create');
    $form = new FormBootstrap('data');
    $lib_btn = 'Ajouter';
}
?>
<h1>Nouvelle news?</h1>
<a href="<?= Routeur::getUrl('News.index') ?>">&Lt;</a><br>
<?php
echo $form->start($action, ['method' => 'POST']);
$csrf = new Csrf(new Session());
echo $csrf->getInput();
?>

<input type="hidden" name="_METHODE" value="POST" />
<?= $form->input('titre', 'Titre'); ?>
<?= $form->textarea('text', 'Commentaire', 8); ?>
<div>
    <button type="submit" class="btn btn-default"><?= $lib_btn; ?></button>
</div>
<?= $form->end(); ?>