<?php


namespace FlickrGuzzle\Model;



class TagList {

    use DataMapper;

    static protected $dataMap = array(
        [	'tags',
            ['tags', 'tag'],
            'class' => 'FlickrGuzzle\Model\Tag',
            'multiple' => true,
            'optional' => true
        ],
        //tags.getHotList doesn't contain the array in a 'tags' element
        [	'tags',
            'tag',
            'class' => 'FlickrGuzzle\Model\Tag',
            'multiple' => true,
            'optional' => true
        ],
    );

    public $tags = array();
}