<?php


namespace FlickrService\Model;




class LicenseList {

    use DataMapper;

    static protected $dataMap = array(
        ['licenses', ['licenses', 'license'], 'class' => 'FlickrService\Model\License', 'multiple' =>  true],
    );

    public $licenses = array();
}

