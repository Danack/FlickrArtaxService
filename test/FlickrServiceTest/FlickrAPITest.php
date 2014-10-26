<?php

/**
 * @group internet
 */

use FlickrService\FlickrAPI\FlickrAPIException;
use FlickrService\FlickrAPI\FlickrAPI;
use ArtaxServiceBuilder\ResponseCache\NullResponseCache;
use ArtaxServiceBuilder\Service\OauthConfig;
use ArtaxServiceBuilder\Service\FlickrOauth1;

class FlickrAPITest extends \ArtaxServiceBuilder\TestBase {

    /**
     * @var \Auryn\Provider
     */
    private $provider;

    function setup() {

        
        
        parent::setup();
    }

    /**
     *
     */
    function testFlickrPeopleGetPublicPhotos() {

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

        try {
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

        $client = new \Amp\Artax\Client();
        $responseCache = new NullResponseCache();
        $api = new FlickrAPI($client, $responseCache, FLICKR_KEY);

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

 