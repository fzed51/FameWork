<?php
use Core;
	
App::set('config', function(){
	return new Config('./app/config.ini');
});

App::set('session', function(){
	return new Session\Session();
});

App::set('csrf', function(){
	return new Session\Csrf(App::get('session'));
});

App::set('flash', function(){
	return new Session\Flash(App::get('session'));
});