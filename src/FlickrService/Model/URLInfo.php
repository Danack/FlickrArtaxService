<?php


namespace FlickrGuzzle\Model;



class URLInfo {

    use DataMapper;

    static protected $dataMap = array(
        ['nsid', ['group', 'nsid'], 'optional' => 'true'],
        ['url', ['group','url'], 'optional' => 'true'],
        ['nsid', ['user', 'nsid'], 'optional' => 'true'],
        ['url', ['user','url'], 'optional' => 'true'],
    );

    public $nsid;
    public $url;

}

