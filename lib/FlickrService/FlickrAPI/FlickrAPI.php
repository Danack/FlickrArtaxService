<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace FlickrService\FlickrAPI;

use Amp\Artax\Request;
use Amp\Artax\Response;
use Amp\Reactor;
use FlickrService\Operation\GetOauthRequestToken;
use ArtaxServiceBuilder\BadResponseException;
use ArtaxServiceBuilder\ProcessResponseException;
use FlickrService\Operation\GetOauthAccessToken;
use FlickrService\Operation\UploadPhoto;
use FlickrService\Operation\flickrPeopleGetPhotos;
use FlickrService\Operation\flickrPeopleGetPhotosOf;
use FlickrService\Operation\flickrPeopleGetPublicPhotos;
use FlickrService\Operation\flickrTestLogin;
use ArtaxServiceBuilder\ResponseCache;

class FlickrAPI implements \FlickrService\FlickrAPI {

    /**
     * @var string $api_key
     */
    public $api_key = null;

    /**
     * @var \ArtaxServiceBuilder\Service\Oauth1 $oauthService
     */
    public $oauthService = null;

    /**
     * @var \ArtaxServiceBuilder\ResponseCache $responseCache
     */
    public $responseCache = null;

    /**
     * @var \Amp\Reactor $reactor
     */
    public $reactor = null;

    public function __construct(\Amp\Artax\Client $client, \Amp\Reactor $reactor, \ArtaxServiceBuilder\ResponseCache $responseCache, $api_key, \ArtaxServiceBuilder\Service\Oauth1 $oauthService = null) {
        $this->client = $client;
        $this->reactor = $reactor;
        $this->responseCache = $responseCache;
        $this->api_key = $api_key;
        $this->oauthService = $oauthService;
    }

    public function signRequest(\Amp\Artax\Request $request) {
        if ($this->oauthService == null) {
            throw new \ArtaxServiceBuilder\ArtaxServiceException("oauthService is null, so cannot call request that requires oauth.");
        }
        return $this->oauthService->signRequest($request);
    }

    /**
     * GetOauthRequestToken
     *
     * Starts the Oauth process.
     *
     * @param mixed $oauth_callback The URL that an authorisation request should return
     * the user to.
     * @return \FlickrService\Operation\GetOauthRequestToken The new operation
     */
    public function GetOauthRequestToken($oauth_callback) {
        $instance = new GetOauthRequestToken($this, $oauth_callback);
        return $instance;
    }

    /**
     * GetOauthAccessToken
     *
     * Exchanges Oauth request token for access token.
     *
     * @param mixed $oauth_verifier The oauth_verifier that shows that the user was
     * redirected back to your site.
     * @return \FlickrService\Operation\GetOauthAccessToken The new operation
     */
    public function GetOauthAccessToken($oauth_verifier) {
        $instance = new GetOauthAccessToken($this, $oauth_verifier);
        return $instance;
    }

    /**
     * UploadPhoto
     *
     * Uploads a photo.
     *
     * @param mixed $photo The file to upload
     * @param mixed $title The title of the photo.
     * @param mixed $description The description of the photo
     * @param mixed $tags A space-separated list of tags to apply to the photo.
     * @param mixed $async Whether to process the file asynchronously.
     * @return \FlickrService\Operation\UploadPhoto The new operation
     */
    public function UploadPhoto($photo, $title, $description, $tags, $async) {
        $instance = new UploadPhoto($this, $photo, $title, $description, $tags, $async);
        return $instance;
    }

    /**
     * flickr.people.getPhotos
     *
     * Return photos from the given user's photostream. Only photos visible to the
     * calling user will be returned. This method must be authenticated; to return
     * public photos for a user, use <a
     * href="/services/api/flickr.people.getPublicPhotos.html">flickr.people.getPublicPhotos</a>.
     *
     * @param mixed $user_id Which user to get the photos of
     * @return \FlickrService\Operation\flickrPeopleGetPhotos The new operation
     */
    public function flickrPeopleGetPhotos($user_id) {
        $instance = new flickrPeopleGetPhotos($this, $this->getApiKey(), $user_id);
        return $instance;
    }

    /**
     * flickr.people.getPhotosOf
     *
     * Returns a list of photos containing a particular Flickr member.
     *
     * @param mixed $user_id todo - describe variable
     * @return \FlickrService\Operation\flickrPeopleGetPhotosOf The new operation
     */
    public function flickrPeopleGetPhotosOf($user_id) {
        $instance = new flickrPeopleGetPhotosOf($this, $this->getApiKey(), $user_id);
        return $instance;
    }

    /**
     * flickr.people.getPublicPhotos
     *
     * Get a list of public photos for the given user.
     *
     * @param mixed $user_id Which user to get the photos of
     * @return \FlickrService\Operation\flickrPeopleGetPublicPhotos The new operation
     */
    public function flickrPeopleGetPublicPhotos($user_id) {
        $instance = new flickrPeopleGetPublicPhotos($this, $this->getApiKey(), $user_id);
        return $instance;
    }

    /**
     * flickr.test.login
     *
     * A testing method which checks if the caller is logged in then returns their
     * username.
     *
     * @return \FlickrService\Operation\flickrTestLogin The new operation
     */
    public function flickrTestLogin() {
        $instance = new flickrTestLogin($this, $this->getApiKey());
        return $instance;
    }

    /**
     * @return string
     */
    public function getApiKey() {
        return $this->api_key;
    }

    public function setApiKey($value) {
        $this->api_key = $value;
    }

    /**
     * execute
     *
     * Sends a request to the API synchronously
     *
     * @param $request \Amp\Artax\Request The request to send.
     * @param $operation \ArtaxServiceBuilder\Operation The response that is called the
     * execute.
     * @return \Amp\Artax\Response The response from Artax
     */
    public function execute(\Amp\Artax\Request $request, \ArtaxServiceBuilder\Operation $operation) {
        $originalRequest = clone $request;
        $cachingHeaders = $this->responseCache->getCachingHeaders($request);
        $request->setAllHeaders($cachingHeaders);
        $promise = $this->client->request($request);
        $response = \Amp\wait($promise, $this->reactor);

        if ($response) {
            $operation->setResponse($response);
            $operation->setOriginalResponse($response);
        }

        if ($operation->shouldResponseBeCached($response)) {
            $this->responseCache->storeResponse($originalRequest, $response);
        }

        if ($operation->shouldUseCachedResponse($response)) {
            $cachedResponse = $this->responseCache->getResponse($originalRequest);
            if ($cachedResponse) {
                $response = $cachedResponse;
                $operation->setResponse($response);
            }
            //@TODO This code should only be reached if the cache entry was deleted
            //so throw an exception? Or just leave the 304 to error?
        }

        $exception = $operation->translateResponseToException($response);

        if ($exception) {
            throw $exception;
        }

        return $response;
    }

    /**
     * executeAsync
     *
     * Execute an operation asynchronously.
     *
     * @param \ArtaxServiceBuilder\Operation $operation The operation to perform
     * @param callable $callback The callback to call on completion/response. The
     * signature of the method should be:
     * function(
     *     \Exception $error = null, // null if no error 
     *     $parsedData = null, //The parsed operation data i.e. same type as
     * responseClass of the operation.
     *     \Amp\Artax\Response $response = null //The response received or null if the
     * request completely failed.
     * )
     * @return \Amp\Promise A promise to resolve the call at some time.
     */
    public function executeAsync(\Amp\Artax\Request $request, \ArtaxServiceBuilder\Operation $operation, callable $callback) {
        $originalRequest = clone $request;
        $cachingHeaders = $this->responseCache->getCachingHeaders($request);
        $request->setAllHeaders($cachingHeaders);
        $promise = $this->client->request($request);
        $promise->when(function(\Exception $error = null, Response $response = null) use ($originalRequest, $callback, $operation) {

            if ($response) {
                $operation->setResponse($response);
                $operation->setOriginalResponse($response);
            }

            if($error) {
                $callback($error, null, null);
                return;
            }

            if ($operation->shouldResponseBeCached($response)) {
                $this->responseCache->storeResponse($originalRequest, $response);
            }

            if ($operation->shouldUseCachedResponse($response)) {
                $cachedResponse = $this->responseCache->getResponse($originalRequest);
                if ($cachedResponse) {
                    $response = $cachedResponse;
                    $operation->setResponse($response);
                }
            }

            $responseException = $operation->translateResponseToException($response);
            if ($responseException) {
                $callback($responseException, null, $response);
                return;
            }

            if ($operation->shouldResponseBeProcessed($response)) {
                try {
                    $parsedResponse = $operation->processResponse($response);
                    $callback(null, $parsedResponse, $response);
                }
                catch(\Exception $e) {
                    $exception = new ProcessResponseException("Exception parsing response: ".$e->getMessage(), 0, $e);
                    $callback($exception, null, $response);
                }
            }
            else {
                $callback(null, null, $response);
            }
        });

        return $promise;
    }

    /**
     * Determine whether the response should be processed.
     *
     * @return boolean
     */
    public function shouldResponseBeProcessed(\Amp\Artax\Response $response) {
        return true;
    }

    /**
     * Determine whether the response should be cached.
     *
     * @return boolean
     */
    public function shouldResponseBeCached(\Amp\Artax\Response $response) {
        $status = $response->getStatus();
        if ($status == 200) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the cached response should be used.
     *
     * @return boolean
     */
    public function shouldUseCachedResponse(\Amp\Artax\Response $response) {
        $status = $response->getStatus();
        if ($status == 304) {
            return true;
        }

        return false;
    }

    /**
     * Inspect the response and return an exception if it is an error response.
     *      * Exceptions should extend \ArtaxServiceBuilder\BadResponseException
     *
     * @return BadResponseException
     */
    public function translateResponseToException(\Amp\Artax\Response $response) {
        $status = $response->getStatus();
        if ($status < 200 || $status >= 300) {
            return new BadResponseException(
                "Status $status is not treated as OK.",
                $response
            );
        }

        return null;
    }


}
