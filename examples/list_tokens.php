/* List all tokens you created that have not expired or been deleted. */

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

/* list all */
$response = $client->uploadTokens()->list();
echo($response);

/* sort and organize list options */
$queryParams = array('sortOrder'=>'asc', 'pageSize'=>3);
$response = $client->uploadTokens()->list($queryParams);
echo($response);
