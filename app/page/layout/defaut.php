<!DOCTYPE html>
<html lang="fr">
    <?php
    $this->addFileStyle('app', true);
    $this->addFileStyle('bootstrap', true);
    $this->addFileScript('jquery-1.11.3');
    $this->addFileScript('bootstrap');
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="icon" href="../../favicon.ico"> -->
        <?= $this->meta; ?>
        <title><?= $this->titre; ?></title>
        <?= $this->style; ?>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <?= $this->widget('nav'); ?>
        </nav>

        <div class="container">
            <?= $this->content; ?>
            <?php if (Core\App::get('config')->isModeDebug): ?>
                <pre>
                    <?= var_dump(Core\App::$factories) ?>
                </pre>
            <?php endif; ?>
        </div>
        <?= $this->script; ?>
    </body>
</html>
