<?php

$app = new \Silex\Application();
$app['debug'] = true;

$app->register(new \Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'\..\public\w3-html',
));

$dbParameters = parse_ini_file(__DIR__ . "/../application.ini", 'development');

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => $dbParameters["development"]["db.driver"],
        'dbname' => $dbParameters["development"]["db.name"],
        'host' => $dbParameters["development"]["db.host"],
        'user' => $dbParameters["development"]["db.username"],
        'password' => $dbParameters["development"]["db.password"],
    ),
));

$app->get('/pratik', function(){return 'hello world1!!';});

$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('hello.twig', array(
        'name' => $name,
    ));
});

$app->get('/db', function () use ($app) {
    $sql = "SELECT Name FROM dummytbl ";
    $post = $app['db']->fetchAssoc($sql);
    return $post['Name'];
});