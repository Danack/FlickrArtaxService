<?php


namespace FlickrService\Model;



class CameraDetailList {

    use DataMapper;

    static protected $dataMap = array(
        ['cameraDetails', 'camera', 'class' => 'FlickrService\Model\CameraDetail', 'multiple' => TRUE ],
    );

    public $cameraDetails = array();
}