<?php


namespace FlickrGuzzle\Model;



class GeoPerms {

    use DataMapper;

    static protected $dataMap = array(
        ['isPublic',	'ispublic'],
        ['isContact',	'iscontact'],
        ['isFriend',	'isfriend'],
        ['isFamily', 	'isfamily'],
    );

    public $isPublic;
    public $isContact;
    public $isFriend;
    public $isFamily;

}