<?php

include_once ('library/Framework/silex/vendor/autoload.php');

include_once ('library/routes.php');



$GLOBALS['source'] =$_SERVER['DOCUMENT_ROOT']. "/" . "letsEat_dev";

$app->run();