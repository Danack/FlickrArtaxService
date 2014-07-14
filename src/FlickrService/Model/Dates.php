<?php


namespace FlickrGuzzle\Model;



class Dates {

    public $posted;//="1100897479"
    public $taken;//="2004-11-19 12:51:19"
    public $takenGranularity;//="0"
    public $lastUpdate;//="1093022469" />

    use DataMapper;

    static protected $dataMap = array(
        ['posted', 'posted'],
        ['taken', 'taken'],
        ['takenGranularity', 'takengranularity'],
        ['lastUpdate', 'lastupdate']
    );
}