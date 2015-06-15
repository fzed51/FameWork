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
Vue::$DossierLayout = __DIR__ . DS . 'page' . DS . 'layout';
Vue::$DossierModel = __DIR__ . DS . 'page';
Vue::$DossierScript = __DIR__ . DS . 'public' . DS . 'script';
Vue::$DossierStyle = __DIR__ . DS . 'public' . DS . 'style';

include_if_exist('./app/route.php');

try {
	Routeur::reparti($requete->client['METHODE'], $requete->client['URI']);
} catch (\Core\Routeur\RouteNotFoundException $e) {
	header("HTTP/1.0 404 Not Found");
} catch (Exception $e) {
	header("HTTP/1.0 500 Internal Server Error");
}