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

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new ApiVideo\Client\Client(
    $apiVideoEndpoint,
    $lineApiVideoKey,
    $httpClient
);

$currentPage = 1;
// params that can be added for the list method
$searchArray['pageSize'] = 100;
$searchArray['sortBy'] = 'publishedAt';
$searchArray['sortOrder'] = 'desc';
$searchArray['currentPage'] = $currentPage;

if (isset($searchArray)) $videos = $client->videos()->list($searchArray);
else $videos = $client->videos()->list();

$pages = $videos->getPagination()->getPagesTotal();


echo "PlayerId : ";
$handlePlayerId = fopen ("php://stdin","r");
$linePlayerId = fgets($handlePlayerId);
if(trim($linePlayerId != '')) $playerId = trim($linePlayerId);

$i=1;
while ($i <= $pages) {
    echo 'Page : '.$i."\n";
    $currentPage = $i;
    $videos = $client->videos()->list($searchArray);
    foreach($videos->getData() as $video) {
        $client->videos()->update(
            $video->getVideoId(),
            (new \ApiVideo\Client\Model\VideoUpdatePayload())
               ->setPlayerId((string) $playerId)
        );
        echo $video->getVideoId().' - playerId: '. $video->getPlayerId()."\n";
    }
    unset($searchArray['currentPage']);
    $i++;
    $searchArray['currentPage'] = $i;
    echo "\n";
}
echo 'Done';
