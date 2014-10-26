<?php


namespace FlickrService\Model;



class InstitutionList {

    use DataMapper;

    static protected $dataMap = array(
        ['institutions', 'institution', 'class' => 'FlickrService\Model\Institution', 'multiple' => 'true'],
    );

    public $institutions = array();
}

