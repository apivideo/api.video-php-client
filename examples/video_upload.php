<?php
require __DIR__ .'/vendor/autoload.php';

use Symfony\Component\HttpClient\Psr18Client;
use ApiVideo\Client\Client;
use ApiVideo\Client\Model\VideoCreationPayload;

$apiKey = 'yourAPIkey';
$apiVideoEndpoint = 'https://ws.api.video';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new ApiVideo\Client\Client(
    $apiVideoEndpoint,
    $apiKey,
    $httpClient
);

$payload = (new VideoCreationPayload())
    ->setTitle('My cool video');

$video = $client->videos()->create($payload);
echo($payload);

$response = $client->videos()->upload(
    $video->getVideoId(),
    new SplFileObject(__DIR__.'/VIDEO_TO_UPLOAD.mp4')
);
echo($response);
