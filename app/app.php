<?php

use Core\App;
use Core\Config;
use Core\Session\Session;
use Core\Session\Csrf;
use Core\Session\Flash;

App::set('config', function() {
    return new Config('./app/config.ini');
});

App::set('session', function() {
    return new Session();
});

App::set('csrf', function() {
    return new Csrf(App::get('session'));
});

App::set('flash', function() {
    return new Flash(App::get('session'));
});
