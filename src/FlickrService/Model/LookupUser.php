<?php


namespace FlickrGuzzle\Model;



class LookupUser {

    use DataMapper;

    static protected $dataMap = array(
        ['userID', 'id'],
        ['username', ['username', '_content']],
    );

    public $userID; //shurely NSID?
    public $username;
}

