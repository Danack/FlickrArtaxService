<?php


namespace FlickrGuzzle\Model;



class Usage {

    use DataMapper;

    static protected $dataMap = array(
        ['canDownload', 'candownload'],
        ['canBlog', 'canblog'],
        ['canPrint', 'canprint'],
        ['canShare', 'canshare'],
    );

    public $canDownload;
    public $canBlog;
    public $canPrint;
    public $canShare;
}