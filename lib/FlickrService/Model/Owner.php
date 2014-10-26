<?php


namespace FlickrService\Model;



class Owner {


    use DataMapper;

    static protected $dataMap = array(
        ['nsID',		'nsid'],
        ['userName', 	'username'],
        ['realName', 	'realname', 'optional' => true],
        ['location',	'location', 'optional' => true],
        ['iconServer',	'iconserver'],
        ['iconFarm',	'iconfarm'],
        ['pathAlias', 	'path_alias', 'optional' => true],
    );

    public $nsID;//="12037949754@N01"
    public $userName;//="Bees"
    public $realName;//="Cal Henderson"
    public $location;//="Bedford, UK" />

    public $iconServer;
    public $iconFarm;
    public $pathAlias;
}