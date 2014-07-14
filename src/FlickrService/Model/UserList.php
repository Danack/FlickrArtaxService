<?php

namespace FlickrGuzzle\Model;



class UserList{

    use DataMapper;

    static protected $dataMap = array(
        ['users', 'contact', 'class' => 'FlickrGuzzle\Model\Owner', 'multiple' => TRUE ],
        ['page', 'page'],
        ['pages', 'pages'],
        ['perPage', 'perpage'],
        ['total', 'total'],
    );

    public $users;
    public $total;
    public $pages;
    public $perPage;
    public $page;
}

