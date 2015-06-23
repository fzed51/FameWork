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
                <hr>
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                        if (isset($_SESSION)) {
                            var_dump($_SESSION);
                        }
                        ?>
                    </div>
                    <div class="col-lg-4">
                        <?php
                        var_dump(get_defined_vars());
                        $constante = get_defined_constants(true);
                        var_dump($constante['user']);
                        ?>
                    </div>
                    <div class="col-lg-4">
                        <?= var_dump($_SERVER); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?= $this->script; ?>
    </body>
</html>
