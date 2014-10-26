<?php


namespace FlickrService\Model;



class Tag {

    use DataMapper;

    static protected $dataMap = array(
        ['tagID', 		'id', 'optional' => true],
        ['authorID',	'author', 'optional' => true],

        ['raw',		'raw', 'optional' => true],
        ['raw',		['raw', '_content'], 'optional' => true], //returned by getUserRawTags

        ['text',	'_content', 'optional' => true],
        ['text',	'clean', 'optional' => true], //returned by getUserRawTags

        ['machineTag',	'machine_tag', 'optional' => true],

        ['count', 'count', 'optional' => true],
    );

    public $tagID;
    public $authorID;
    public $raw;
    public $text;
    public $machineTag;

    public $count = null;
}