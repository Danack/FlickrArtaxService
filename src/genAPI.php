<?php


use ArtaxServiceBuilder\OperationDefinition;
use ArtaxServiceBuilder\APIGenerator;

$autoloader = require_once(__DIR__ . '/../vendor/autoload.php');

$outputDirectory = realpath(__DIR__).'/../var/src';
$autoloader->add('AABTest', [$outputDirectory]);


define('FLICKR_KEY', 12345);


//TODO - is there an actual difference between constructor params
//and api params
$constructorParms = ['api_key'];

$apiGenerator = new \ArtaxServiceBuilder\APIGenerator(
    $outputDirectory,
    $constructorParms
);

$apiGenerator->addAPIParameter(
    'api_key', 'string'
);



$apiGenerator->addParameterTranslation([
    'api_key' => 'apiKey',
    'per_page' => 'perPage',
    'content_type' => 'contentType',
    'max_taken_date' => 'maxTakenDate',
    'min_taken_date' => 'minTakenDate',
    'user_id' => 'userID',
    'safe_search' => 'safeSearch',
    'Is_public' => 'isPublic'
]);

if (true) {
    $apiGenerator->includeMethods([
        'GetOauthAccessToken',
        'GetOauthRequestToken',
        "flickr.people.getPublicPhotos",
        "flickr.people.getPhotos",
        "flickr.test.login"
    ]);
    
    //$apiGenerator->includePattern('flickr\.people\.get.*');
}

$apiGenerator->excludeMethods(['defaultGetOperation']);
$apiGenerator->parseAndAddServiceFromFile(__DIR__.'/fixtures/flickrService.php');
$apiGenerator->addInterface('AABTest\FlickrAPI');
$apiGenerator->setFQCN('AABTest\FlickrAPI\FlickrAPI');
$apiGenerator->generate();
$apiGenerator->generateInterface('AABTest\FlickrAPI');


