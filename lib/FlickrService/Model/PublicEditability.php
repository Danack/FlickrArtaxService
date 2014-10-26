<?php


namespace FlickrService\Model;



class PublicEditability {


    use DataMapper;

    static protected $dataMap = array(
        ['canComment','cancomment'],// => int 1
        ['canAddMeta','canaddmeta'],// => int 0
    );

    public $canComment;
    public $canAddMeta;

}