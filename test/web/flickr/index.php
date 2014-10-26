<?php

require "flickrBootstrap.php";



$action = getVariable('action');

if ($action === 'delete') {
    unsetSessionVariable('oauthAccessToken');
    unsetSessionVariable('oauthRequest');
}

echo <<< END

<html>
<body>
<h3><a href='/'>Oauth test home</a> </h3>
END;


/** @var \FlickrService\Model\OauthAccessToken $oauthAccessToken */
$oauthAccessToken = getSessionVariable('oauthAccessToken');

if ($oauthAccessToken == null) {
    echo "<p>You are not flickr authorised.</p>";
    createOauthRequest();
}
else {
    echo "<p>You are flickr authorised.</p>";
    showFlickrStatus($oauthAccessToken);
    
    echo "<p><a href='/flickr/index.php?action=delete'>Delete authority</a></p>";
}

echo <<< END

</body>
</html>

END;

