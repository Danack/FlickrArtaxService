<?php


namespace FlickrService\Model;



class PlaceList {

    use DataMapper;

    static protected $dataMap = array(
        ['places', 'place', 'class' => 'FlickrService\Model\Place', 'multiple' => 'true'],
    );

    public $places = array();
}


