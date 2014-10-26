<?php

namespace FlickrService\Model;



class UserList{

    use DataMapper;

    static protected $dataMap = array(
        ['users', 'contact', 'class' => 'FlickrService\Model\Owner', 'multiple' => TRUE ],
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

