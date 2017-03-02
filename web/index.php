<?php

// web/index.php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/', function () use ($app) {
    return $app['twig']->render('search.twig', array());
});

$app->post('/respuesta', function (Request $request) use ($app) {
	$pais = $request->get('pais');
    return $app['twig']->render('respuesta.twig', array('pais' => $pais,'API' => 'AIzaSyBEYqcWqugu6LnrtQWGDOGB8kmNfxcQupw'));
});

$app->run(); 

?>