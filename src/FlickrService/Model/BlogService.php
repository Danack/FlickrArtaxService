<?php


namespace FlickrGuzzle\Model;


class BlogService {

    use DataMapper;

    static protected $dataMap = array(
        ['id', 'id'],
        ['name', '_content'],
    );

    public $id;
    public $name;
}