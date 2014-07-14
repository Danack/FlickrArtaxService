<?php


namespace FlickrGuzzle\Model;



class LookupGroup {

    use DataMapper;

    static protected $dataMap = array(
        ['groupID', 'id'],
        ['groupName', ['groupname', '_content']],
    );

    public $groupID; //shurely NSID?
    public $groupName;
}

