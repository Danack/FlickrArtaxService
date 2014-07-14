<?php


namespace FlickrGuzzle\Model;



class MethodArgument {

    use DataMapper;

    static protected $dataMap = array(
        ['name', 'name'],
        ['optional', 'optional'],
    );

    public $name;
    public $optional;
}
