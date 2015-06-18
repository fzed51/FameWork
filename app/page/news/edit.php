<?php

use Core\Routeur\Routeur;
use Core\Session\Csrf;
use Core\Session\Session;

if (isset($new)) {
    $action = Routeur::getUrl('News.Update', ['id' => $new->id]);
    $new_titre = $new->titre;
    $new_text = $new->text;
    $lib_btn = 'Modifier';
} else {
    $action = Routeur::getUrl('News.Create');
    $new_titre = '';
    $new_text = '';
    $lib_btn = 'Ajouter';
}
?>
<h1>Nouvelle news?</h1>
<a href="<?= Routeur::getUrl('News.index') ?>">&Lt;</a><br>
<form action="<?= $action ?>" method="POST">
    <?php
    $csrf = new Csrf(new Session());
    echo $csrf->getInput();
    ?>

    <input type="hidden" name="_METHODE" value="POST" />
    <div class="form-group">
        <label for="data_titre_" class="form-control">Titre</label>
        <input type="text" name="data[titre]" id="data_titre_" class="form-control" value="<?= $new_titre; ?>"/>
    </div>
    <div class="form-group">
        <label> Commentaire </label>
        <textarea name="data[text]" id="data_text_" class="form-control"><?= $new_text; ?></textarea>

    </div>
    <div>
        <button type="submit" class="btn btn-default"><?= $lib_btn; ?></button>
    </div>
</form>