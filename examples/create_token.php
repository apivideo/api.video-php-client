/* Create a token for use with delegated uploads. If you don't set a ttl, by default it doesn't expire until you delete it. */

<?php
require __DIR__ .'/vendor/autoload.php';

use ApiVideo\Client\Model\TokenCreationPayload;

$apiKey = 'your API key here';
$apiVideoEndpoint = 'https://ws.api.video';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new ApiVideo\Client\Client(
    $apiVideoEndpoint,
    $apiKey,
    $httpClient
);

$payload = (new TokenCreationPayload())->setTtl(100);

$response = $client->uploadTokens()->createToken($payload);
echo($response);
