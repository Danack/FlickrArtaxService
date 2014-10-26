<?php


namespace FlickrService\Model;


class ActivityItem {

    use DataMapper;

    static protected $dataMap = array(
        ['type', 'type'],
        ['id', 'id'],
        ['owner', 'owner'],
        ['ownerName', 'ownername'],
        ['iconServer', 'iconserver'],
        ['iconFarm', 'iconfarm'],
        ['primary', 'primary', 'optional' => true],
        ['secret', 'secret'],
        ['server', 'server'],
        ['commentsOld', 'commentsold', 'optional' => true],
        ['commentsNew', 'commentsnew', 'optional' => true],
        ['views', 'views'],
        ['photos', 'photos', 'optional' => true],
        ['more', 'more', 'optional' => true],
        ['activityEventList',
            ['activity', 'event'],
            'class' => 'FlickrService\Model\ActivityEvent',
            'multiple' => true
        ],
        ['title', 'title'],
        ['media', 'media'],
        ['notes', 'notes'],
        ['faves', 'faves'],
    );

    public $type;
    public $id;
    public $owner;
    public $ownerName;
    public $iconServer;
    public $iconFarm;
    public $primary;
    public $secret;
    public $server;
    public $commentsOld;
    public $commentsNew;
    public $views;
    public $photos;
    public $more;

    public $title; //=> '_content';
    public $media;
    public $notes;	//These are going to be note objects
    public $faves;

    public $activityEventList = array();
}

