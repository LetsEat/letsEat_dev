<?php

$app = new \Silex\Application();
$app['debug'] = true;

$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'\..\public\w3-html',
));


$app->get('/pratik', function(){return 'hello world1!!';});
$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('hello.twig', array(
        'name' => $name,
    ));
});