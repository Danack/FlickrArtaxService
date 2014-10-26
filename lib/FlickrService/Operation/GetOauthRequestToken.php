<?php

//Auto-generated by ArtaxServiceBuilder - https://github.com/Danack/ArtaxServiceBuilder
//
//Do not be surprised when any changes to this file are over-written.
//
namespace FlickrService\Operation;

class GetOauthRequestToken implements \ArtaxServiceBuilder\Operation {

    /**
     * @var $api \FlickrService\FlickrAPI\FlickrAPI
     */
    public $api = null;

    /**
     * @var $api array
     */
    public $parameters = null;

    /**
     * @var $api \Amp\Artax\Response
     */
    public $response = null;

    /**
     * Get the last response.
     *
     * @return \Amp\Artax\Response
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Set the last response. This should only be used by the API class when the
     * operation has been dispatched. Storing the response is required as some APIs
     * store out-of-bound information in the headers e.g. rate-limit info, pagination
     * that is not really part of the operation.
     */
    public function setResponse(\Amp\Artax\Response $response) {
        $this->response = $response;
    }

    public function __construct(\FlickrService\FlickrAPI\FlickrAPI $api, $oauth_callback) {
        $this->api = $api;
        $this->parameters['oauth_callback'] = $oauth_callback;
    }

    public function setAPI(\FlickrService\FlickrAPI\FlickrAPI $api) {
        $this->api = $api;
    }

    public function setParams(array $params) {
        if (array_key_exists('oauth_callback', $params)) {
            $this->parameters['oauth_callback'] = $params['oauth_callback'];
        }
    }

    /**
     * Set oauth_callback
     *
     * The URL that an authorisation request should return the user to.
     *
     * @return $this
     */
    public function setOauth_callback($oauth_callback) {
        $this->parameters['oauth_callback'] = $oauth_callback;

        return $this;
    }

    public function getParameters() {
        return $this->parameters;
    }

    /**
     * Apply any filters necessary to the parameter
     *
     * @return \FlickrService\Model\OauthRequestToken
     * @param string $name The name of the parameter to get.
     */
    public function getFilteredParameter($name) {
        if (array_key_exists($name, $this->parameters) == false) {
            throw new \Exception('Parameter '.$name.' does not exist.');
        }

        $value = $this->parameters[$name];


        return $value;
    }

    /**
     * Create an Amp\Artax\Request object from the operation.
     *
     * @return \Amp\Artax\Request
     */
    public function createRequest() {
        $request = new \Amp\Artax\Request();
        $url = null;
        $request->setMethod('GET');

        $queryParameters = [];

        $value = $this->getFilteredParameter('oauth_callback');
        $queryParameters['oauth_callback'] = $value;

        //Parameters are parsed and set, lets prepare the request
        if ($url == null) {
            $url = "http://www.flickr.com/services/oauth/request_token";
        }
        if (count($queryParameters)) {
            $url = $url.'?'.http_build_query($queryParameters, '', '&', PHP_QUERY_RFC3986);
        }
        $request->setUri($url);

        return $request;
    }

    /**
     * Create and execute the operation, returning the raw response from the server.
     *
     * @return \Amp\Artax\Response
     */
    public function createAndExecute() {
        $request = $this->createRequest();
        $request = $this->api->signRequest($request);
        $response = $this->api->execute($request, $this);
        $this->response = $response;

        return $response;
    }

    /**
     * Create and execute the operation, then return the processed  response.
     *
     * @return mixed|\FlickrService\Model\OauthRequestToken
     */
    public function call() {
        $request = $this->createRequest();
        $request = $this->api->signRequest($request);
        $response = $this->api->execute($request, $this);
        $this->response = $response;

        if ($this->shouldResponseBeProcessed($response)) {
            $instance = \FlickrService\Model\OauthRequestToken::createFromResponse($response, $this);

            return $instance;
        }
        return $response;
    }

    /**
     * Execute the operation, returning the parsed response
     *
     * @return \FlickrService\Model\OauthRequestToken
     */
    public function execute() {
        $request = $this->createRequest();
        return $this->dispatch($request);
    }

    /**
     * Execute the operation asynchronously, passing the parsed response to the
     * callback
     *
     * @return \FlickrService\Model\OauthRequestToken
     */
    public function executeAsync(callable $callable) {
        $request = $this->createRequest();
        return $this->dispatchAsync($request, $callable);
    }

    /**
     * Dispatch the request for this operation and process the response. Allows you to
     * modify the request before it is sent.
     *
     * @return \FlickrService\Model\OauthRequestToken
     * @param \Amp\Artax\Request $request The request to be processed
     */
    public function dispatch(\Amp\Artax\Request $request) {
        $request = $this->api->signRequest($request);
        $response = $this->api->execute($request, $this);
        $this->response = $response;
        $instance = \FlickrService\Model\OauthRequestToken::createFromResponse($response, $this);

        return $instance;
    }

    /**
     * Dispatch the request for this operation and process the response asynchronously.
     * Allows you to modify the request before it is sent.
     *
     * @return \FlickrService\Model\OauthRequestToken
     * @param \Amp\Artax\Request $request The request to be processed
     * @param callable $callable The callable that processes the response
     */
    public function dispatchAsync(\Amp\Artax\Request $request, callable $callable) {
        return $this->api->executeAsync($request, $this, $callable);
    }

    /**
     * Dispatch the request for this operation and process the response. Allows you to
     * modify the request before it is sent.
     *
     * @return \FlickrService\Model\OauthRequestToken
     * @param \Amp\Artax\Response $response The HTTP response.
     */
    public function processResponse(\Amp\Artax\Response $response) {
        $instance = \FlickrService\Model\OauthRequestToken::createFromResponse($response, $this);

        return $instance;
    }

    /**
     * Determine whether the response should be processed. Override this method to have
     * a per-operation decision, otherwise the function is the API class will be used.
     *
     * @return \FlickrService\Model\OauthRequestToken
     */
    public function shouldResponseBeProcessed(\Amp\Artax\Response $response) {
        return $this->api->shouldResponseBeProcessed($response);
    }

    /**
     * Determine whether the response is an error. Override this method to have a
     * per-operation decision, otherwise the function from the API class will be used.
     *
     * @return null|\ArtaxServiceBuilder\BadResponseException
     */
    public function translateResponseToException(\Amp\Artax\Response $response) {
        return $this->api->translateResponseToException($response);
    }

    /**
     * Determine whether the response indicates that we should use a cached response.
     * Override this method to have a per-operation decision, otherwise the
     * functionfrom the API class will be used.
     *
     * @return \FlickrService\Model\OauthRequestToken
     */
    public function shouldUseCachedResponse(\Amp\Artax\Response $response) {
        return $this->api->shouldUseCachedResponse($response);
    }

    /**
     * Determine whether the response should be cached. Override this method to have a
     * per-operation decision, otherwise the function from the API class will be used.
     *
     * @return \FlickrService\Model\OauthRequestToken
     */
    public function shouldResponseBeCached(\Amp\Artax\Response $response) {
        return $this->api->shouldResponseBeCached($response);
    }


}
