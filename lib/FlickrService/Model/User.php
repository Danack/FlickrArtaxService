<?php


namespace FlickrService\Model;

class User {

    use DataMapper;

    static protected $dataMap = array(
        ['nsid', 'nsid', 'optional' => TRUE],			//Returned by PhotoInfo?
        ['nsid', 'user_nsid', 'optional' => TRUE],		//returned by OauthAccessToken
        ['username', 'username'],
        ['fullname','fullname'],
    );

    public $nsid;
    public $username;
    public $fullname;
}