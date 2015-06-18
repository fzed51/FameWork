<div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= Routeur::getUrl('home'); ?>">Project name</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="<?= Routeur::getUrl('home'); ?>">Home</a><!--class="active"--></li>
            <li><a href="<?= Routeur::getUrl('News.index'); ?>">les news</a></li>
            <li><a href="<?= Routeur::getUrl('contact'); ?>">Contact</a></li>
        </ul>
    </div><!--/.nav-collapse -->
</div>