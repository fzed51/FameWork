<?php
$csrf = new \Core\Session\Csrf(new \Core\Session\Session());
?>

<div class="new">
    <a href="<?= Routeur::getUrl('News.index'); ?>">&Lt;</a>
    <h2><?= string2Html($new->titre); ?>
        <!-- <a class="bouton" href="<?= Routeur::getUrl('News.Update', ['id' => $new->id]); ?>">&lt;edit&gt;</a> -->
        <a class="bouton" href="<?= Routeur::getUrl('News.Update', ['id' => $new->id]); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
        <!-- <a class="bouton" href="<?= Routeur::getUrl('News.delete', ['id' => $new->id, 'csrf' => $csrf->getToken()]); ?>">&lt;supprime&gt;</a> -->
        <a class="bouton" href="<?= Routeur::getUrl('News.delete', ['id' => $new->id, 'csrf' => $csrf->getToken()]); ?>"><span class="glyphicon glyphicon-trash"></span></a>
    </h2>
    <p><?= string2Html($new->text); ?></p>
</div>