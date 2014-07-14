<?php


namespace FlickrGuzzle\Model;



class Visibility {

    use DataMapper;

    public $isPublic;
    public $isFriend;
    public $isFamily;

    static protected $dataMap = array(
        ['isPublic',	'ispublic'],
        ['isFriend',	'isfriend'],
        ['isFamily',	'isfamily'],
    );
}