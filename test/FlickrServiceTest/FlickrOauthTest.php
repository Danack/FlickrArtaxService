<?php

//use ArtaxApiBuilder\Service\OauthConfig;

use ArtaxServiceBuilder\Service\OauthConfig;
use ArtaxServiceBuilder\Service\FlickrOauth1;
use FlickrService\FlickrAPI\FlickrAPI;

use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use FlickrService\FlickrAPI\FlickrAPIException;

use Amp\NativeReactor;
use Amp\Artax\Client as ArtaxClient;


/**
 * @group service
 */

class FlickrOauthTest extends \PHPUnit_Framework_TestCase { 
  //  extends \ArtaxApiBuilder\TestBase {

    /**
     * @return array
     */
    private function  getReactorAndAPI() {

        $reactor = \Amp\getReactor();

        $oauthConfig = new OauthConfig(
            FLICKR_KEY,
            FLICKR_SECRET
        );

        $oauthService = new FlickrOauth1($oauthConfig);

        $client = new \Amp\Artax\Client();
        $client->setOption(ArtaxClient::OP_MS_CONNECT_TIMEOUT, 5000);
        $client->setOption(ArtaxClient::OP_MS_KEEP_ALIVE_TIMEOUT, 1000);

        $responseCache = new NullResponseCache();
        $api = new FlickrAPI($client, $reactor, $responseCache, FLICKR_KEY, $oauthService);

        return [$reactor, $api, $oauthService];
    }



    function testFlickOauthRequest() {

        $oauthConfig = new OauthConfig(
            FLICKR_KEY,
            FLICKR_SECRET
        );

        try {
            list($reactor, $api) = $this->getReactorAndAPI();
            /** @var $api \FlickrService\FlickrAPI\FlickrAPI $command  */
            
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

        list($reactor, $api, $oauthService) = $this->getReactorAndAPI();
        /** @var $api \FlickrService\FlickrAPI\FlickrAPI $command  */
        /** @var $oauthService \ArtaxServiceBuilder\Service\FlickrOauth1 */

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

 