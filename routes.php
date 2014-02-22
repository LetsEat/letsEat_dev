<?php

$app = new \Silex\Application();
$app['debug'] = true;

$app->get('/pratik', function(){return 'hello world1!!';});