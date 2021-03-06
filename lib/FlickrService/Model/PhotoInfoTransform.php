<?php


namespace FlickrService\Model;




/**
 * Class PhotoInfoTransform Only used to store the result of the transform function. No actual useful information in it.
 * @package FlickrService\Model
 */

class PhotoInfoTransform {

    use DataMapper;

    static protected $dataMap = array(
        ['photoID', '_content'],
        ['secret', 'secret'],
        ['originalSecret', 'originalsecret'],
    );

    public $photoID;
    public $secret;
    public $originalSecret;
}

