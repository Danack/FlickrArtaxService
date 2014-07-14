<?php


namespace FlickrGuzzle\Model;



class ActivityEvent {

    use DataMapper;

    static protected $dataMap = array(
        ['type', 'type'],
        ['user', 'user'],
        ['username', 'username'],

        ['iconServer','iconserver'],
        ['iconFarm', 'iconfarm'],
        ['commentID', 'commentid', 'optional' => true],//Only there for type comment presumably
        ['noteID', 'noteid', 'optional' => true],//Only there for type note presumably.
        ['dateAdded', 'dateadded'],
        ['text', '_content'],
    );

    public $type;
    public $user; //Shurely NSID?
    public $username;

    public $dateAdded;
    public $text;

    public $iconServer;
    public $iconFarm;

    //Only one of these two will be set (presumably?)
    public $commentID;
    public $noteID;
}

