<?php


namespace FlickrGuzzle\Model;



class MethodError {

    use DataMapper{
        createFromJson as createFromJsonAuto;
    }

    static protected $dataMap = array(
        ['code', 'code'],
        ['message', 'message'],
        ['fullText', '_content'],
    );

    public $code;
    public $message;
    public $fullText;
}


