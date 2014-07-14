<?php


namespace FlickrGuzzle\Model;



class PhotoInfo {

    use DataMapper;

    static protected $dataMap = array(
        ['views', 'views'],
        ['media', 'media'],
        ['isFavorite', 'isfavorite'],
        ['license', 'license'],
        ['rotation', 'rotation'],

        ['visibility', 'visibility', 'class' => 'FlickrGuzzle\Model\Visibility' ],
        ['photo', null, 'class' => 'FlickrGuzzle\Model\Photo' ],
        ['dates', 'dates', 'class' => 'FlickrGuzzle\Model\Dates', ],//  ],
        ['urls', ['urls', 'url'], 'class' => 'FlickrGuzzle\Model\URL', 'multiple' => TRUE ],
        ['tags', ['tags', 'tag'], 'class' => 'FlickrGuzzle\Model\Tag', 'multiple' => TRUE ],
        ['usage', 'usage', 'class' => 'FlickrGuzzle\Model\Usage' ],
        //['geoPerms', 'geoperms', 'class' => 'FlickrGuzzle\Model\GeoPerms' ],
        ['editability', 'editability', 'class' => 'FlickrGuzzle\Model\Editability' ],

        ['publicEditability', 'publiceditability', 'class' => 'FlickrGuzzle\Model\PublicEditability' ],
        ['notes', ['notes', 'note'], 'class' => 'FlickrGuzzle\Model\Note', 'multiple' => true ]
    );

    public $views;
    public $media;
    public $isFavorite;
    public $license;
    public $rotation;

    /**
     * @public Photo
     */
    public $photo;

    /**
     * @public Owner
     */
    public $owner;


    /**
     * @public Visibility
     */
    public $visibility;

    /**
     * @public Dates
     */
    public $dates;


    /**
     * @public GeoPerms
     */
    //public $geoPerms;

    /**
     * @public Permissions
     */
    public $permissions;

    /**
     * @public Editability
     */
    public $editability;

    /**
     * @public Integer
     */
    public $comments;

    /**
     * @public Note[]
     */
    public $notes = array();

    /**
     * @public Tag[]
     */
    public $tags = array();

    /**
     * @public URL[]
     */
    public $urls = array();

}