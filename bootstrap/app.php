<?php

use Dotenv\Dotenv;
session_start();
require_once __DIR__."/../vendor/autoload.php";

try {
	$dotenv=(new Dotenv(base_path()))->load();
} catch (\Dotenv\Exception\InvalidPathException $e) {
	//
}
$config_files=dirToArray(base_path("config"));

$loader=new App\Config\Loaders\ArrayLoader($config_files);

require_once base_path("bootstrap/container.php");


$route=$container->get(League\Route\RouteCollection::class);
require_once base_path("routes/web.php");
$response=$route->dispatch(
$container->get('request'),$container->get('response')
);
