<?php


namespace FlickrService\Model;



class Note {

    use DataMapper;

    static protected $dataMap = array(
        ['noteID', 'id'],
        ['authorID', 'author'],
        ['authorName', 'authorname'],
        ['x', 'x'],
        ['y', 'y'],
        ['w', 'w'],
        ['h', 'h'],
        ['text', '_content'],
    );

    public $noteID;
    public $authorID;
    public $authorName;
    public $x;
    public $y;
    public $w;
    public $h;

    public $text;
}