<?php


namespace FlickrGuzzle\Model;



class License {

    use DataMapper;

    static protected $dataMap = array(
        ['id', 'id'],
        ['name', 'name'],
        ['url', 'url'],
    );

    public $id;
    public $name;
    public $url;
}
