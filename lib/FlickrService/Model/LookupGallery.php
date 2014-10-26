<?php


namespace FlickrService\Model;



class LookupGallery {

    use DataMapper;

    static protected $dataMap = array(
        ['galleryID',	'id'],
        ['url',		'url'],
        ['owner',	'owner'],
        ['primaryPhotoID',	'primary_photo_id'],
        ['dateCreate',	'date_create'],
        ['dateUpdate',	'date_update'],
        ['countPhotos',	'count_photos'],
        ['countVideos',	'count_videos'],
        ['countViews',	'count_views'],
        ['countComments',	'count_comments'],
        ['server', 'server', 'optional' => true],
        ['farm', 'farm', 'optional' => true],
        ['secret', 'secret', 'optional' => true ],
        ['title', ['title', '_content']],
        ['description', ['description', '_content' ]],

        ['primaryPhotoServer', 'primary_photo_server'],
        ['primaryPhotoFarm', 'primary_photo_farm'],
        ['primaryPhotoSecret', 'primary_photo_secret'],
    );

    public $galleryID;
    public $url;
    public $owner;
    public $primaryPhotoID;
    public $dateCreate;
    public $dateUpdate;

    public $countPhotos;
    public $countVideos;
    public $countViews;
    public $countComments;

    public $primaryPhotoServer;
    public $primaryPhotoFarm;
    public $primaryPhotoSecret;

    public $server;
    public $farm;
    public $secret;
    public $title;
    public $description;
}
