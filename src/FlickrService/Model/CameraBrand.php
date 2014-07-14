<?php


namespace FlickrGuzzle\Model;


class CameraBrand {

    use DataMapper;

    public $cameraBrandID;
    public	$name;

    static protected $dataMap = array(
        ['cameraBrandID', 'id'],
        ['name', 'name'],
    );
}