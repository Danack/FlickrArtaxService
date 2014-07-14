<?php


namespace FlickrGuzzle\Model;



class CameraDetailList {

    use DataMapper;

    static protected $dataMap = array(
        ['cameraDetails', 'camera', 'class' => 'FlickrGuzzle\Model\CameraDetail', 'multiple' => TRUE ],
    );

    public $cameraDetails = array();
}