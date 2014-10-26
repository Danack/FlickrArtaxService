<?php


namespace FlickrService\Model;



class UserBlog {

    use DataMapper;

    static protected $dataMap = array(
        ['id', 'id'],
        ['name', 'name'],
        ['needsPassword', 'needspassword'],
        ['url',	'url'],
    );

    public $id;
    public $name;
    public $needsPassword;
    public $url;
}