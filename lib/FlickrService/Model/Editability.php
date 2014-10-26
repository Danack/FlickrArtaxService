<?php


namespace FlickrService\Model;



class Editability {

    use DataMapper;

    static protected $dataMap = array(
        ['canComment', 'cancomment'],
        ['canAddMeta', 'canaddmeta'],
    );

    public $canComment;
    public $canAddMeta;

}