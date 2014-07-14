<?php


namespace FlickrGuzzle\Model;




class LicenseList {

    use DataMapper;

    static protected $dataMap = array(
        ['licenses', ['licenses', 'license'], 'class' => 'FlickrGuzzle\Model\License', 'multiple' =>  true],
    );

    public $licenses = array();
}

