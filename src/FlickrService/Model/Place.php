<?php

namespace FlickrGuzzle\Model;



class Place {

    public $placeID;
    public $woeID;
    public $latitude;
    public $longitude;
    public $placeURL;
    public $placeType;
    public $name;

    use DataMapper;

    static protected $dataMap = array(
        ['placeID', 'place_id'],
        ['woeID', 'woeid'],
        ['latitude', 'latitude'],
        ['longitude', 'longitude'],
        ['placeURL', 'place_url'],
        ['placeType', 'place_type'],
        ['name', '_content'],
    );
}