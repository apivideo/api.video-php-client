<?php
require_once '../vendor/autoload.php';

use Symfony\Component\HttpClient\Psr18Client;
use ApiVideo\Client\Client;
use ApiVideo\Client\Model\VideoCreationPayload;

// Environment choice
echo "WARNING !  APPLYING THIS SCRIPT WILL DELETE PERMANENTLY ALL YOUR VIDEOS"."\n";
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

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new ApiVideo\Client\Client(
    $apiVideoEndpoint,
    $lineApiVideoKey,
    $httpClient
);

$videos = $client->videos()->list();

foreach($videos->getData() as $video) {
    echo 'deleting '.$video->getTitle().' - '.$video->getVideoId()."\n";
    $client->videos()->delete($video->getVideoId());
}
echo "all videos are now deleted"."\n";
