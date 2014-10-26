<?php


namespace FlickrService\Model;



class MethodInfo {

    use DataMapper;
//	{
//		createFromJson as createFromJsonAuto;
//	}

    static protected $dataMap = array(
        ['name', ['method', 'name']],
        ['needsLogin', ['method', 'needslogin']],

        ['needsSigning', ['method', 'needssigning']],
        ['requiredPerms', ['method', 'requiredperms']],

        ['description', ['method', 'description', '_content']],

        ['response', ['method', 'response', '_content'], 'optional' => TRUE],

        ['arguments', ['arguments', 'argument'], 'class' => 'FlickrService\Model\MethodArgument', 'multiple' => TRUE ],
        ['errors', ['errors', 'error'], 'class' => 'FlickrService\Model\MethodError', 'multiple' => TRUE ],
    );

    public	$name;
    public $needsLogin;
    public $needsSigning;
    public $requiredPerms;

    public $description;
    public $response = NULL;

    /** @public MethodArgument[] */
    public $arguments = array();
    public $errors = array();


//	static function createFromJson($data){
//		$object = self::createFromJsonAuto($data);
//
//		$remap = array(
//			'description',
//			'response',
//		);
//
//		$object->remap($remap, '_content');
//
//		return $object;
//	}
}

