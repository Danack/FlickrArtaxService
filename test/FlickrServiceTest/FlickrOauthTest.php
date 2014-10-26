<?php

//use ArtaxApiBuilder\Service\OauthConfig;

use ArtaxServiceBuilder\Service\OauthConfig;
use ArtaxServiceBuilder\Service\FlickrOauth1;
use FlickrService\FlickrAPI\FlickrAPI;

use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use FlickrService\FlickrAPI\FlickrAPIException;

/**
 * @group service
 */

class FlickrOauthTest extends \PHPUnit_Framework_TestCase { 
  //  extends \ArtaxApiBuilder\TestBase {

//    /**
//     * @var \Auryn\Provider
//     */
//    private $provider;

//    function setup() {
//        //$this->provider = createTestProvider();
//        //parent::setup();
//    }


    function testFlickOauthRequest() {

        $oauthConfig = new OauthConfig(
            FLICKR_KEY,
            FLICKR_SECRET
        );

        try {
            $oauthService = new FlickrOauth1($oauthConfig);

            $client = new \Amp\Artax\Client();
            $responseCache = new NullResponseCache();
            $api = new FlickrAPI($client, $responseCache, FLICKR_KEY, $oauthService);
            
            //$api = new \AABTest\FlickrAPI\FlickrAPI(FLICKR_KEY, $oauthService);    
            $command = $api->GetOauthRequestToken("http://imagick.test/");
            $response = $command->execute();
            //var_dump($response);
            
            $flickrURL = "http://www.flickr.com/services/oauth/authorize?oauth_token=".$response->oauthToken;
            echo "Please go to ".$flickrURL;

            //?oauth_token=72157645206112769-a4ca4cd8b679ba79&oauth_verifier=d20cc2d13e6131cd
        }
        catch(FlickrAPIException $fae) {
            echo "FlickrAPIException response body.";
            var_dump($fae->getResponse()->getBody());
        }
    }
    
    
    
    
    /**
     *
     */
    function tstFlickrPeopleGetPublicPhotos() {

        $oauthConfig = new OauthConfig(
            FLICKR_KEY,
            FLICKR_SECRET
        );

        $oauthService = new FlickrOauth1($oauthConfig);

        $client = new \Amp\Artax\Client();
        $responseCache = new NullResponseCache();
        $api = new FlickrAPI($client, $responseCache, FLICKR_KEY, $oauthService);
        $user_id = "46085186@N02";
        $per_page = 5;
        $page = 1;


        $command = $api->flickrPeopleGetPublicPhotos($user_id);
        $command->setPage($page);
        $command->setPerPage($per_page);

        $request = $command->createRequest();

        $signedRequest = $oauthService->signRequest($request);

//        echo "unsigned";
//        $request->debug();
//
//        echo "signed";
//        $signedRequest->debug();
        
        //exit(0);
        
        //$response = $api->callAPI($signedRequest);
        $response = $api->execute($signedRequest, $command);
        
        
        var_dump($response->getBody());

//        $result = $command->execute();
//        $command->dispatch($request);

        /*
        
            $this->assertInstanceOf(
                'AABTest\PhotoList',
                $result,
                'flickr_people_getPublicPhotos did not return an instance of Intahwebz\FlickrGuzzle\DTO\PhotoList'
            );

            $this->assertCount(
                $per_page,
                $result->photos
            );

        */
    }

}

 