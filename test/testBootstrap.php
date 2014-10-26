<?php

error_reporting(E_ALL);

$autoloader = require __DIR__.'/../vendor/autoload.php';
$classDir = realpath(__DIR__)."/fixtures/";
$outputDirectory = realpath(__DIR__).'/../var/src';

$autoloader->add('ArtaxServiceBuilder', [realpath(__DIR__)."/"]);
$autoloader->add('ArtaxServiceBuilder', [realpath(__DIR__)."/../vendor/danack/artaxservicebuilder/test"]);

$included = include_once __DIR__."/../../flickrKey.php";


if (defined('FLICKR_KEY') == false) {
    echo "To run the Flickr tests you must define a Flickr API key to use.";
    define('FLICKR_KEY', 12345);
}

if (defined('FLICKR_SECRET') == false) {
    echo "To run the Flickr oauth tests you must define a Flickr API key to use.";
    define('FLICKR_SECRET', 54321);
}

