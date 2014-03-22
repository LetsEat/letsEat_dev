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

$app->get('/', function(){return 'Welcome to lets eat !!!';});

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

$app->get('/mobile/{id}', function($id) use ($app){
    $sql = "SELECT * FROM subMenu where mainMenuId = ?";
    $post = $app['db']->fetchAll($sql, array($id));
    //print_r($post);die;
    return $app['twig']->render('menu.twig', array('items' => $post));
});

$app->get('/main', function() use ($app){
    $sql = "SELECT * FROM mainMenu";
    $post = $app['db']->fetchAll($sql);
    return $app['twig']->render('mainMenu.twig', array('items' => $post));
});
