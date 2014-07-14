<?php


namespace FlickrGuzzle\Model;


class AccountStat {

    public $totalViews;
    public $photosViews;
    public $photostreamViews;
    public $setsViews;
    public $collectionsViews;

    use DataMapper;

    static protected $dataMap = array(
        ['totalViews', ['total', 'views']],
        ['photosViews', ['photos', 'views']],
        ['photostreamViews', ['photostream', 'views']],
        ['setsViews', ['sets', 'views']],
        ['collectionsViews', 	['collections', 'views']],
    );
}