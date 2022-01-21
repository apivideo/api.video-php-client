/* Examples of list a video. */

<?php
require __DIR__ .'/vendor/autoload.php';

$apiKey = 'your API key here';
$apiVideoEndpoint = 'https://ws.api.video';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new ApiVideo\Client\Client(
    $apiVideoEndpoint,
    $apiKey,
    $httpClient
);

/* list all videos */
$response = $client->videos()->list();
echo($response);

/* sort video list */
$queryParams = array('sortOrder'=>'asc', 'pageSize'=>3);
$response2 = $client->videos()->list($queryParams);
echo($response2);

/* retrieve from video list */
foreach($response2->getData() as $video) {
    echo($video->getTitle() . PHP_EOL);

}
