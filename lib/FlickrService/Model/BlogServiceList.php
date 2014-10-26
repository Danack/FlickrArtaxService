<?php


namespace FlickrService\Model;


class BlogServiceList {

    use DataMapper;

    static protected $dataMap = array(
        ['blogServiceList',	'service', 'multiple' => true, 'class' => 'FlickrService\Model\BlogService'],
    );

    public $blogServiceList = array();
}


