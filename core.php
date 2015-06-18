<?php

define('DS', DIRECTORY_SEPARATOR);
define('WS', '/');
define('ROOT', __DIR__ . DS);
$dir = basename(ROOT);
$tabUrl = explode($dir, $_SERVER['REQUEST_URI']);
if (count($tabUrl) > 1) {
    define('WEBROOT', $tabUrl[0] . $dir . WS);
} else {
    define('WEBROOT', WS);
}

// Initialise le répertoir de travail pour
// correspondre au dossier racine du projet.
chdir(__DIR__);

require './vendor/autoload.php';
require './core/tools.php';
require './core/alias.php';

$requete = new Requete();

// Parametrage des vues
Vue::$DefautLayout = 'defaut';
Vue::$DossierLayout = __DIR__ . DS . 'app' . DS . 'page' . DS . 'layout';
Vue::$DossierModel = __DIR__ . DS . 'app' . DS . 'page';
Vue::$DossierScript = __DIR__ . DS . 'public' . DS . 'script';
Vue::$DossierStyle = __DIR__ . DS . 'public' . DS . 'style';

include_if_exist('./app/app.php');
include_if_exist('./app/route.php');

try {
    Routeur::reparti($requete->client['METHODE'], $requete->client['URI']);
    echo '<!--';
    print_r(get_loaded_extensions());
    echo '-->';
} catch (\Core\Routeur\RouteNotFoundException $e) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>Error 404 :</h1>";
    echo "<h2>{$e->getMessage()}</h2>";
    echo "<p>La ressource n'a pas été trouvée</p>";
} catch (Exception $e) {
    header("HTTP/1.0 500 Internal Server Error");
    echo "<h1>Error 500 :</h1>";
    echo "<h2>{$e->getMessage()}</h2>";
    echo "<pre>{$e->getTraceAsString()}</pre>";
}