<?php


namespace FlickrGuzzle\Model;



class CameraBrandList {

    use DataMapper;

    static protected $dataMap = array(
        ['cameraBrands', 'brand', 'class' => 'FlickrGuzzle\Model\CameraBrand', 'multiple' => TRUE ],
    );

    public $cameraBrands = array();
}