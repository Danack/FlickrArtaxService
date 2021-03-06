<?php

use ArtaxServiceBuilder\Service\OauthConfig;


class FlickrResponseTest extends \PHPUnit_Framework_TestCase { 

    //TODO Add checks on the data.
    public function additionProvider() {
        return array(
//            ['getSingleCommit.txt', 'GithubService\Model\Commit'],
//            ['getSingleUser.txt', 'GithubService\Model\User'],
//            ['listCommitsOnARepository.txt', 'GithubService\Model\Commits'],
//            ['listCommits.txt', 'GithubService\Model\Commits'],
//            ['listEmailAddressesForUser.txt', 'GithubService\Model\Emails'],
//            ['addEmailAddresses.txt', 'GithubService\Model\Emails'],
//            ['listRepoTags.txt', 'GithubService\Model\RepoTags'],
//            ['listAuthorizations.txt', 'GithubService\Model\Authorizations']
        );
    }

    /**
     * @dataProvider additionProvider
     */
    function testDataParsing($dataFile, $expectedClassname) {
        $jsonData = file_get_contents(__DIR__.'/../fixtures/data/flickr/'.$dataFile);
        $data = json_decode($jsonData, true);
        $instance = $expectedClassname::createFromJson($data);
        
        $this->assertInstanceOf(
            $expectedClassname,
            $instance
        );
    }
}

 