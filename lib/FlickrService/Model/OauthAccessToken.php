<?php



namespace FlickrService\Model;

use ArtaxServiceBuilder\Operation;
use Amp\Artax\Response;


//if (function_exists('splitParameters') == false) {
//
//    function splitParameters($string) {
//        //Taken from
//        //https://github.com/dopiaza/DPZFlickr/blob/master/README.md
//        //This function is MIT licensed
//        $parameters = array();
//        $keyValuePairs = explode('&', $string);
//        foreach ($keyValuePairs as $kvp) {
//            $pieces = explode('=', $kvp);
//            if (count($pieces) == 2) {
//                $parameters[rawurldecode($pieces[0])] = rawurldecode($pieces[1]);
//            }
//        }
//        return $parameters;
//    }
//
//}


class OauthAccessToken {

    use DataMapper;

    public static $dataMap = array(
        ['oauthToken', 'oauth_token'],
        ['oauthTokenSecret', 'oauth_token_secret'],
        ['user', NULL, 'class' => 'FlickrService\Model\User' ]
    );

    //These are the access tokens
    public $oauthToken;
    public $oauthTokenSecret;

    /** @public User */
    public $user;

//    static function createFromResponse(Response $response, Operation $operation) {
//        $data = $response->getBody();
//        $jsonData = json_decode($data, true);
//
//        return self::createFromJson($jsonData['photos']);
//    }

    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $params = splitParameters($data);

        return self::createFromJson($params);
    }
    
}