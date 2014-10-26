<?php


namespace FlickrService\Model;


use ArtaxServiceBuilder\Operation;
use Amp\Artax\Response;


class LoginInfo {

    use DataMapper;

    static protected $dataMap = array(
        ['user', ['user', 'id']],
        ['username', ['user', 'username', '_content']],
    );

    public $user; //shurely NSID?
    public $username;
    
    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $jsonData = json_decode($data, true);

        return self::createFromJson($jsonData);
    }
}

