<?php


namespace FlickrGuzzle\Model;




class MethodList {

    use DataMapper{
        createFromJson as createFromJsonAuto;
    }

    static protected $dataMap = array(
        ['methods', 'method', 'multiple' => TRUE ],
    );

    public $methods = array();


    static function createFromJson($data){
        $object = self::createFromJsonAuto($data);

        foreach ($object->methods as &$method) {
            $method = $method['_content'];	//zomg
        }

        return $object;
    }
}

//<methods>
//		  <method>flickr.blogs.getList</method>
//		  <method>flickr.blogs.postPhoto</method>
//		  <method>flickr.contacts.getList</method>
//		  <method>flickr.contacts.getPublicList</method>
//		</methods>


