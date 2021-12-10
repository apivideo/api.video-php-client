![](https://github.com/apivideo/API_OAS_file/blob/master/apivideo_banner.png)

# Upload a video with Laravel 8

api.video is an API that encodes on the go to facilitate immediate playback, enhancing viewer streaming experiences across multiple devices and platforms. You can stream live or on-demand online videos within minutes.

--------------------
This is a simple, infinite scrolling wall of videos. A complete walkthrough of how this code is put together is available in the api.video blog. You can red it here: [Create an infinite scrolling wall of holiday videos with Laravel 8](https://api.video/blog/tutorials/create-an-infinite-scrolling-wall-of-holiday-videos-with-laravel-8)

You will need an api.video account for this project, you can sign up here: [https://dashboard.api.video/register](https://dashboard.api.video/register)

To retrieve video information from api.video for your database, you need to make a .csv file. Here is a code sample to help you: 

``` <?php
require __DIR__ .'/vendor/autoload.php';

use Symfony\Component\HttpClient\Psr18Client;
use ApiVideo\Client\Client;
use ApiVideo\Client\Model\VideoCreationPayload;

$apiKey = 'your API key here';
$apiVideoEndpoint = 'https://ws.api.video';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new ApiVideo\Client\Client(
    $apiVideoEndpoint,
    $apiKey,
    $httpClient
);

$response = $client->videos()->list(['tags' => ['holiday']]);

$file = fopen('test.csv', 'w');
fputcsv($file, array('Title', 'Video ID', 'MP4 Link'));
foreach($response->getData() as $video) {
    $myVid[0]=$video->getTitle().' , '.$video->getVideoId().' , '.$video->getAssets()->getMp4();
    fwrite($file, $myVid[0]."\n");

}
fclose($file); ```
