<?php


namespace FlickrService\Model;



class NoteID {

    use DataMapper;

    static protected $dataMap = array(
        ['noteID', 'id'],
    );

    public $noteID;
}