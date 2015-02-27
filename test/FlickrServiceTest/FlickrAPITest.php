<?php

/**
 * @group internet
 */

use FlickrService\FlickrAPI\FlickrAPIException;
use FlickrService\FlickrAPI\FlickrAPI;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use ArtaxServiceBuilder\Service\OauthConfig;
use ArtaxServiceBuilder\Service\FlickrOauth1;
use Amp\NativeReactor;
use Amp\Artax\Client as ArtaxClient;

class FlickrAPITest extends \ArtaxServiceBuilder\TestBase {

    /**
     * @var \Auryn\Provider
     */
    private $provider;

    function setup() {
        parent::setup();
    }

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

        return [$reactor, $api];
    }
    
    
    /**
     *
     */
    function testFlickrPeopleGetPublicPhotos() {

   

        $user_id = "46085186@N02";
        $per_page = 5;
        $page = 1;

        try {
            list($reactor, $api) = $this->getReactorAndAPI();
            /** @var $api \FlickrService\FlickrAPI\FlickrAPI $command  */
            $command = $api->flickrPeopleGetPublicPhotos($user_id);
            $command->setPage($page);
            $command->setPerPage($per_page);
            $result = $command->execute();

            $this->assertInstanceOf(
                'FlickrService\Model\PhotoList',
                $result,
                'flickr_people_getPublicPhotos did not return an instance of Intahwebz\FlickrGuzzle\DTO\PhotoList'
            );

            $this->assertCount(
                $per_page,
                $result->photos
            );
        }
        catch (FlickrAPIException $fae) {
            $this->fail("Test failed due to FlickrAPIException: "."Response body: ".$fae->getResponse()->getBody());
        }
    }


    /**
     * Test that requires oauth signing.
     */
    function testFlickrPeopleGetPhotos() {

        list($reactor, $api) = $this->getReactorAndAPI();
        /** @var $api \FlickrService\FlickrAPI\FlickrAPI $command  */

        $user_id = "46085186@N02";
        $per_page = 5;
        $page = 1;

        try {
            $command = $api->flickrPeopleGetPhotos($user_id);
            $command->setPage($page);
            $command->setPerPage($per_page);
            $result = $command->execute();

            $this->assertInstanceOf(
                'FlickrService\Model\PhotoList',
                $result,
                'flickr_people_getPublicPhotos did not return an instance of Intahwebz\FlickrGuzzle\DTO\PhotoList'
            );

            $this->assertCount(
                $per_page,
                $result->photos
            );
        }
        catch (FlickrAPIException $fae) {
            $this->fail("Test failed due to FlickrAPIException: "."Response body: ".$fae->getResponse()->getBody());
        }
    }


    /**
     * 
     */
    function testUpload() {

        $this->markTestSkipped("Form body in Artax is borken.");
        return;

        list($reactor, $api) = $this->getReactorAndAPI();
        /** @var $api \FlickrService\FlickrAPI\FlickrAPI $command  */

        $user_id = "46085186@N02";

        $command = $api->UploadPhoto(
            __DIR__."/../fixtures/TestImage.jpg",
            "Test image",
            "Test description",
            '',//['testing'],
            true
        );

        $command->setIs_public(false);
        $fileUploadResponse = $command->execute();
    }
    
}

 