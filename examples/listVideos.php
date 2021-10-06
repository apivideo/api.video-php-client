<?php
require_once '../vendor/autoload.php';

use Symfony\Component\HttpClient\Psr18Client;
use ApiVideo\Client\Client;
use ApiVideo\Client\Model\VideoCreationPayload;

// Environment choice
echo "Choose now your environment ('p' for prod or 's' for sandbox) :".".\n";
$handleEnv = fopen ("php://stdin","r");
$lineEnv = trim(fgets($handleEnv));
if($lineEnv == 'p'){
    echo "Prod chosen\n";
    $apiVideoEndpoint = 'https://ws.api.video';
}
elseif($lineEnv == 's'){
    echo "Sandbox chosen\n";
    $apiVideoEndpoint = 'https://sandbox.api.video';
}
else{
    echo "Choice not recognized : ABORTING!\n";
    exit;
}
fclose($handleEnv);
echo "\n";

// Ask for api.video credentials
echo "Please provide your api.video key :"."\n";
$handleApiKey = fopen ("php://stdin","r");
$lineApiVideoKey = trim(fgets($handleApiKey));
if($lineApiVideoKey == ''){
    echo "ABORTING!\n";
    exit;
}
fclose($handleApiKey);
echo "\n";

// search by title
echo "search for a title ?"."\n";
$handleTitle = fopen ("php://stdin","r");
$lineTitle = trim(fgets($handleTitle));
fclose($handleTitle);

// search by tag
echo "search for a tag (separate value with comma) ?"."\n";
$handleTag = fopen ("php://stdin","r");
$lineTag = trim(fgets($handleTag));
fclose($handleTag);


// search for a meta type string
echo "search for type string metadata ? y/n"."\n";
$handleMetaChoice = fopen ("php://stdin","r");
$lineMetaChoice = trim(fgets($handleMetaChoice));
if($lineMetaChoice == 'y'){
    echo "Choose the metadata key you're looking for\n";
    $handleMetaKey = fopen ("php://stdin","r");
    $lineMetaKey = trim(fgets($handleMetaKey));
    if($lineMetaKey == ''){
        echo "Cannot be empty ABORTING!\n";
        exit;
    }
    fclose($handleMetaKey);
    echo "Choose the metadata key you're looking for\n";
    $handleMetaValue = fopen ("php://stdin","r");
    $lineMetaValue = trim(fgets($handleMetaValue));
    if($lineMetaValue == ''){
        echo "Cannot be empty ABORTING!\n";
        exit;
    }
    fclose($handleMetaValue);
}
else fclose($handleMetaChoice);

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new ApiVideo\Client\Client(
    $apiVideoEndpoint,
    $lineApiVideoKey,
    $httpClient
);

// params that can be added for the list method
$searchArray['currentPage'] = 1;
$searchArray['pageSize'] = 25;
$searchArray['sortBy'] = 'publishedAt';
$searchArray['sortOrder'] = 'desc';

if(isset($lineTitle) && $lineTitle !='') $searchArray['title'] = $lineTitle;
if(isset($lineTag) && $lineTag !='') $searchArray['tags'] = $lineTag;
if(isset($lineMetaChoice) && $lineMetaChoice =='y' && $lineMetaKey !='' && $lineMetaValue !='') $searchArray['metadata'] = array($lineMetaKey => $lineMetaValue);

if (isset($searchArray)) $videos = $client->videos()->list($searchArray);
else $videos = $client->videos()->list();


foreach($videos->getData() as $video) {
    echo $video->getTitle().' - '.$video->getVideoId()."\n";

    echo echo 'Publication date :'.$video->getPublishedAt()."\n";
    if($video->getDescription()) echo 'Description :'.$video->getDescription()."\n";
    if($video->getAssets()) {
        echo "Assets:\n";
        echo "Iframe: ".$video->getAssets()->getIframe()."\n";
        echo "Hls: ".$video->getAssets()->getHls()."\n";
        echo "Thumbnail: ".$video->getAssets()->getThumbnail()."\n";
        echo "Player: ".$video->getAssets()->getPlayer()."\n";
        if($video->getMp4Support()){
            echo "Mp4 available: ".$video->getAssets()->getMp4()."\n";
        }
    }

    if($video->getTags()){
        echo 'Tags->'."\n";
        echo implode(PHP_EOL, $video->getTags());
        echo "\n";
    }

    if($video->getMetadata()){
        foreach ($video->getMetadata() as $metadatum)
            echo 'Metadata-> '.$metadatum->getKey().':  '.$metadatum->getValue()."\n";
    }
    echo "\n";

}
