<?php


namespace FlickrGuzzle\Model;



class UserBlogList {

    use DataMapper;

    static protected $dataMap = array(
        ['blogList',	'blog', 'multiple' => true, 'class' => 'FlickrGuzzle\Model\UserBlog'],
    );

    public $blogList = array();
}