<?php


namespace FlickrService\Model;


class ActivityInfo {

    use DataMapper;

    static protected $dataMap = array(
        ['page', 'page'],
        ['pages', 'pages'],
        ['perPage', 'perpage'],
        ['total', 'total'],
        ['activityItemList', 'item', 'class' => 'FlickrService\Model\ActivityItem', 'multiple' => true],
    );

    public $activityItemList = array();

    public $page;
    public $pages;
    public $perPage;
    public $total;
}
