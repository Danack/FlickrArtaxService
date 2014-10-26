<?php


namespace FlickrService\Model;



class PhotoInfo {

    use DataMapper;

    static protected $dataMap = array(
        ['views', 'views'],
        ['media', 'media'],
        ['isFavorite', 'isfavorite'],
        ['license', 'license'],
        ['rotation', 'rotation'],

        ['visibility', 'visibility', 'class' => 'FlickrService\Model\Visibility' ],
        ['photo', null, 'class' => 'FlickrService\Model\Photo' ],
        ['dates', 'dates', 'class' => 'FlickrService\Model\Dates', ],//  ],
        ['urls', ['urls', 'url'], 'class' => 'FlickrService\Model\URL', 'multiple' => TRUE ],
        ['tags', ['tags', 'tag'], 'class' => 'FlickrService\Model\Tag', 'multiple' => TRUE ],
        ['usage', 'usage', 'class' => 'FlickrService\Model\Usage' ],
        //['geoPerms', 'geoperms', 'class' => 'FlickrService\Model\GeoPerms' ],
        ['editability', 'editability', 'class' => 'FlickrService\Model\Editability' ],

        ['publicEditability', 'publiceditability', 'class' => 'FlickrService\Model\PublicEditability' ],
        ['notes', ['notes', 'note'], 'class' => 'FlickrService\Model\Note', 'multiple' => true ]
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