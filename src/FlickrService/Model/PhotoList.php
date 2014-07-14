<?php


namespace FlickrGuzzle\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;

class PhotoList {

    use DataMapper;

    static protected $dataMap = array(
        ['page', 'page'],
        ['pages', 'pages'],
        ['perPage', 'perpage'],
        ['total', 'total'],
        ['photos', 'photo', 'class' => 'FlickrGuzzle\Model\Photo', 'multiple' => TRUE ],
    );

    public $page;
    public $pages;
    public $perPage;
    public $total;

    public $photos = array();

    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        
        return self::createFromJson($jsonData['photos']);
    }
    
//    static function createFromResponse() {
//        $jsonData = json_decode($data, true);
//        return self::createFromJson($jsonData['photos']);
//    }
}
