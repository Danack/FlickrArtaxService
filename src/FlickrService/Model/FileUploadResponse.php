<?php


namespace FlickrGuzzle\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;

class FileUploadResponse {

    use DataMapper;

    static protected $dataMap = array(
        ['photoID', ['photoid', '_content']],
    );

    public $photoID;



    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData['photos']);
    }
    
}
