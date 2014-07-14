<?php


namespace FlickrGuzzle\Model;

use ArtaxServiceBuilder\Operation;
use Artax\Response;

//
//class KeyValueResponseObjectFactory extends AbstractResponseObjectFactory {
//
//    /**
//     * Creates domain objects from the response.
//     *
//     * @param $className
//     * @param OperationCommand $command
//     */
//    public static function fromCommand(OperationCommand $command){
//        $className = $command->getOperation()->getResponseClass();
//        $data = $command->getRequest()->getResponse()->getBody(TRUE);
//        $params = splitParameters($data);
//        return $className::createFromJson($params);
//    }
//}

if (function_exists('splitParameters') == false) {
    function splitParameters($string) {
        //Taken from
        //https://github.com/dopiaza/DPZFlickr/blob/master/README.md
        //This function is MIT licensed
        $parameters = array();
        $keyValuePairs = explode('&', $string);
        foreach ($keyValuePairs as $kvp) {
            $pieces = explode('=', $kvp);
            if (count($pieces) == 2) {
                $parameters[rawurldecode($pieces[0])] = rawurldecode($pieces[1]);
            }
        }
        return $parameters;
    }
}


class OauthRequestToken {

    use DataMapper;

    public static $dataMap = array(
        ['oauthCallbackConfirmed', 'oauth_callback_confirmed'],
        ['oauthToken', 'oauth_token'],
        ['oauthTokenSecret', 'oauth_token_secret'],
    );

    public $oauthCallbackConfirmed;
    public $oauthToken;
    public $oauthTokenSecret;

    static function createFromResponse(Response $response, Operation $operation) {
        $data = $response->getBody();
        $params = splitParameters($data);

        return self::createFromJson($params);
    }
}