<?php


namespace FlickrService\Model;



class UserBlogList {

    use DataMapper;

    static protected $dataMap = array(
        ['blogList',	'blog', 'multiple' => true, 'class' => 'FlickrService\Model\UserBlog'],
    );

    public $blogList = array();
}