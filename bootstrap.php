<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, null, null, false);

// database configuration parameters
$connection = array(
    'dbname' => 'resymbio',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

$entityManager = EntityManager::create($connection, $config);

$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader);