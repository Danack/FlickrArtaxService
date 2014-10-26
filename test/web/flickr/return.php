<?php

require "flickrBootstrap.php";


use ArtaxServiceBuilder\Service\OauthConfig;
use FlickrService\Model\OauthAccessToken;
use FlickrService\FlickrAPI\FlickrAPI;
use FlickrService\FlickrAPI\FlickrAPIException;




echo <<< END

<html>

<body>

<h3><a href='/'>Oauth test home</a> </h3>

<p>Checking oauth result</p>

<p>
END;

$currentOauthRequest = getSessionVariable('oauthRequest');

checkAuthResult();

echo <<< END

    </p>

    <p>
        Back to <a href='/flickr/index.php'>home page</a>.
    </p>

</body>
</html>

END;





function checkAuthResult() {
    $oauthToken = getVariable('oauth_token', FALSE);
    $oauthVerifier = getVariable('oauth_verifier', FALSE);

    /** @var \FlickrService\Model\OauthRequestToken $oauthRequest */
    $oauthRequest = getSessionVariable('oauthRequest', null);

    if (!$oauthToken ||
        !$oauthVerifier ||
        !$oauthRequest) {
        return;
    }

    if ($oauthToken != $oauthRequest->oauthToken) {
        //Miss-match on what we're tring to validated.
        return;
    }

    try {
        $oauthConfig = new OauthConfig(
            FLICKR_KEY,
            FLICKR_SECRET
        );

        $oauthService = new \ArtaxServiceBuilder\Service\FlickrOauth1($oauthConfig);
        $oauthService->setOauthToken($oauthRequest->oauthToken);
        $oauthService->setTokenSecret($oauthRequest->oauthTokenSecret);
        
        $api = new FlickrAPI(FLICKR_KEY, $oauthService);
        $command = $api->GetOauthAccessToken($oauthVerifier);
        $oauthAccessToken = $command->execute();
        setSessionVariable('oauthAccessToken', $oauthAccessToken);
        echo "Oauth is confirmed - username is:".$oauthAccessToken->user->username;
    }
    catch(FlickrAPIException $fae) {
        echo "Exception processing response: ".$fae->getResponse()->getBody();
    }
}


 



 




 