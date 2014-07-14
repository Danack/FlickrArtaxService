<?php


namespace FlickrGuzzle\Model;



class URL {

    use DataMapper;

    static protected $dataMap = array(
        ['type', 'type'],
        ['url', '_content'],
    );

    public $type;			//="photopage">
    public $url = NULL;	//http://www.flickr.com/photos/bees/2733/</url>
}