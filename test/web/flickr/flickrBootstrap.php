<?php

use ArtaxServiceBuilder\Service\OauthConfig;
use FlickrService\Model\OauthAccessToken;
use FlickrService\FlickrAPI\FlickrAPI;
use FlickrService\FlickrAPI\FlickrAPIException;

$autoloader = require __DIR__.'/../../../vendor/autoload.php';

$classDir = realpath(__DIR__)."/../../fixtures/";
$outputDirectory = realpath(__DIR__).'/../../../var/src';

$autoloader->add('FlickrService', [$outputDirectory]);
//$autoloader->add('AABTest', [$classDir, $outputDirectory]);
//$autoloader->add('ArtaxApiBuilder', [realpath(__DIR__)."/"]);

require "webFunctions.php";

include_once "../../../../flickrKey.php";

define('SESSION_NAME', 'flickrTest');

session_name(SESSION_NAME);
session_start();


function toCurl(Artax\Request $request) {
    $output = '';
    $output .= 'curl -X '.$request->getMethod()." \\\n";

    foreach ($request->getAllHeaders() as  $header => $values) {
        foreach ($values as $value) {
            $output .= "-H \"$header: $value\" \\\n";
        }
    }

    $body = $request->getBody();
    if (strlen($body)) {
        $output .= "-d '".addslashes($body)."' ";
    }

    $output .= $request->getUri();
    $output .= "\n";

    return $output;
}




function showFlickrStatus(OauthAccessToken $oauthAccessToken) {

    $oauthConfig = new OauthConfig(
        FLICKR_KEY,
        FLICKR_SECRET
    );

    $oauthService = new \ArtaxServiceBuilder\Service\FlickrOauth1($oauthConfig);

    $oauthService->setOauthToken($oauthAccessToken->oauthToken);
    $oauthService->setTokenSecret($oauthAccessToken->oauthTokenSecret);

    $api = new FlickrAPI(FLICKR_KEY, $oauthService);
    $command = $api->flickrTestLogin();
    $loginInfo = $command->execute();

    echo "User ID: ".$loginInfo->user."<br/>";
    echo "User name: ".$loginInfo->username."<br/>";
}


function createOauthRequest() {

    $oauthConfig = new OauthConfig(
        FLICKR_KEY,
        FLICKR_SECRET
    );

    try {
        $oauthService = new \ArtaxServiceBuilder\Service\FlickrOauth1($oauthConfig);
        $api = new FlickrAPI(FLICKR_KEY, $oauthService);
        $command = $api->GetOauthRequestToken("http://localhost:8000/flickr/return.php");

        $request = $command->createRequest();
        var_dump(toCurl($api->signRequest($request)));
        
        $oauthRequest = $command->dispatch($request);
        
        //$oauthRequest = $command->execute();

        setSessionVariable('oauthRequest', $oauthRequest);

        $flickrURL = "http://www.flickr.com/services/oauth/authorize?oauth_token=".$oauthRequest->oauthToken;
        echo sprintf("Please click <a href='%s'>here to auth</a>. ", $flickrURL);
    }
    catch(FlickrAPIException $fae) {
        echo "FlickrAPIException response body.";
        var_dump($fae->getResponse()->getBody());
    }
}

 