<?php


namespace FlickrService\Model;



class CameraBrandList {

    use DataMapper;

    static protected $dataMap = array(
        ['cameraBrands', 'brand', 'class' => 'FlickrService\Model\CameraBrand', 'multiple' => TRUE ],
    );

    public $cameraBrands = array();
}