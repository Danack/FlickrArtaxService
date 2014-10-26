<?php


namespace FlickrService\Model;



class Institution {

    use DataMapper{
        createFromJson as createFromJsonAuto;
    }

    static protected $dataMap = array(
        ['nsid',	'nsid'],
        ['dateLaunch',	'date_launch'],
        ['name',	'name'],
        ['urls', 	['urls', 'url'], 'class' => 'FlickrService\Model\URL', 'multiple' => true],
    );

    public $nsid;
    public $dateLaunch;
    public $name;

    public $urls = array();

    static function createFromJson($data){
        $object = self::createFromJsonAuto($data);
        $object->name = $object->name['_content'];
        return $object;
    }

}
