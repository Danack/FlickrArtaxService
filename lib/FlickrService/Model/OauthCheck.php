<?php


namespace FlickrService\Model;




/**
 * Class OauthCheck
 *
 * This should only be used as the result of an call to check that an OauthAccessToken is valid. It should not be written to.
 *
 * @package FlickrService\Model
 */
class OauthCheck {

    use DataMapper;

    public static $dataMap = array(
        //TODO - Shouldn't this be multiple e.g. read + write? or does flickr just return one
        //permission that implies others e.g. write => read + write
        ['permissions', ['perms', '_content']],
        ['user', 'user', 'class' => 'FlickrService\Model\User' ]
    );

    public $permissions;
    public $user;
}
