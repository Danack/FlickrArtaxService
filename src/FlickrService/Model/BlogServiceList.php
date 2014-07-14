<?php


namespace FlickrGuzzle\Model;


class BlogServiceList {

    use DataMapper;

    static protected $dataMap = array(
        ['blogServiceList',	'service', 'multiple' => true, 'class' => 'FlickrGuzzle\Model\BlogService'],
    );

    public $blogServiceList = array();
}


