<?php


namespace FlickrGuzzle\Model;



class InstitutionList {

    use DataMapper;

    static protected $dataMap = array(
        ['institutions', 'institution', 'class' => 'FlickrGuzzle\Model\Institution', 'multiple' => 'true'],
    );

    public $institutions = array();
}

