<?php


namespace FlickrGuzzle\Model;



class PlaceList {

    use DataMapper;

    static protected $dataMap = array(
        ['places', 'place', 'class' => 'FlickrGuzzle\Model\Place', 'multiple' => 'true'],
    );

    public $places = array();
}


