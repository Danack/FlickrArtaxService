<?php


namespace FlickrService\Model;

use ArtaxServiceBuilder\Operation;
use Amp\Artax\Response;


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