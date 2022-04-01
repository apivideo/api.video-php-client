# ApiVideo\Client\Api\VideosApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](VideosApi.md#create) | Create a video | **POST** `/videos`
[**upload()**](VideosApi.md#upload) | Upload a video | **POST** `/videos/{videoId}/source`
[**uploadWithUploadToken()**](VideosApi.md#uploadWithUploadToken) | Upload with an upload token | **POST** `/upload`
[**get()**](VideosApi.md#get) | Retrieve a video | **GET** `/videos/{videoId}`
[**update()**](VideosApi.md#update) | Update a video | **PATCH** `/videos/{videoId}`
[**delete()**](VideosApi.md#delete) | Delete a video | **DELETE** `/videos/{videoId}`
[**list()**](VideosApi.md#list) | List all videos | **GET** `/videos`
[**uploadThumbnail()**](VideosApi.md#uploadThumbnail) | Upload a thumbnail | **POST** `/videos/{videoId}/thumbnail`
[**pickThumbnail()**](VideosApi.md#pickThumbnail) | Pick a thumbnail | **PATCH** `/videos/{videoId}/thumbnail`
[**getStatus()**](VideosApi.md#getStatus) | Retrieve video status | **GET** `/videos/{videoId}/status`


## **`create()` - Create a video**



We have tutorials on:

* [Creating and uploading videos](https://api.video/blog/tutorials/video-upload-tutorial)

* [Uploading large videos](https://api.video/blog/tutorials/video-upload-tutorial-large-videos)

* [Using tags with videos](https://api.video/blog/tutorials/video-tagging-best-practices)

* [Private videos](https://api.video/blog/tutorials/tutorial-private-videos)

* [Using Dynamic Metadata](https://api.video/blog/tutorials/dynamic-metadata)



* Full list of [tutorials](https://api.video/blog/endpoints/video-create) that demonstrate this endpoint.



### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoCreationPayload` | [**\ApiVideo\Client\Model\VideoCreationPayload**](../Model/VideoCreationPayload.md)| video to create |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

// create a simple video
$video = $client->videos()->create((new \ApiVideo\Client\Model\VideoCreationPayload())->setTitle("Maths video"));

// create a video using an existing source
$existingSourceVideo = $client->videos()->create((new \ApiVideo\Client\Model\VideoCreationPayload())
    ->setTitle("Maths video")
    ->setSource("https://www.myvideo.url.com/video.mp4"));

// create a private video
$privateVideo = $client->videos()->create((new \ApiVideo\Client\Model\VideoCreationPayload())
    ->setTitle("Maths video")
    ->setPublic(false));

// create a video using all available attributes
$anotherVideo = $client->videos()->create((new \ApiVideo\Client\Model\VideoCreationPayload())
    ->setTitle("Maths video") // The title of your new video.
    ->setDescription("A video about string theory.") // A brief description of your video.
    ->setSource("https://www.myvideo.url.com/video.mp4") // If you add a video already on the web, this is where you enter the url for the video.
    ->setPublic(true) // Whether your video can be viewed by everyone, or requires authentication to see it. A setting of false will require a unique token for each view.
    ->setPanoramic(false) // Indicates if your video is a 360/immersive video.
    ->setMp4Support(true) // Enables mp4 version in addition to streamed version.
    ->setPlayerId("pl45KFKdlddgk654dspkze") // The unique identification number for your video player.
    ->setTags(array("TAG1", "TAG2")) // A list of tags you want to use to describe your video.
    ->setMetadata(array( // A list of key value pairs that you use to provide metadata for your video. These pairs can be made dynamic, allowing you to segment your audience. You can also just use the pairs as another way to tag and categorize your videos.
        new \ApiVideo\Client\Model\Metadata(['key' => 'key1', 'value' => 'key1value1']),
        new \ApiVideo\Client\Model\Metadata(['key' => 'key2', 'value' => 'key2value1']))));
```




## **`upload()` - Upload a video**



To upload a video to the videoId you created. You can only upload your video to the videoId once.



We offer 2 types of upload: 

* Regular upload 

* Progressive upload

The latter allows you to split a video source into X chunks and send those chunks independently (concurrently or sequentially). The 2 main goals for our users are to

  * allow the upload of video sources > 200 MiB (200 MiB = the max. allowed file size for regular upload)

  * allow to send a video source "progressively", i.e., before before knowing the total size of the video.

  Once all chunks have been sent, they are reaggregated to one source file. The video source is considered as "completely sent" when the "last" chunk is sent (i.e., the chunk that "completes" the upload).



### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Enter the videoId you want to use to upload your video. |
 `file` | **\SplFileObject**| The path to the video you would like to upload. The path must be local. If you want to use a video from an online source, you must use the \\\&quot;/videos\\\&quot; endpoint and add the \\\&quot;source\\\&quot; parameter when you create a new video. |
 `contentRange` | **string**| Content-Range can be used if you want to split your file. You can do this by parts, or by chunk. * If you split your file by parts (recommended option), the &#x60;Content-Range&#x60; header value must match the following pattern: &#x60;part &lt;part&gt;/&lt;total_parts&gt;&#x60;:   * &#x60;&lt;part&gt;&#x60; is a positive integer representing the part number. The first sequential part number is always 1.   * &#x60;&lt;total_parts&gt;&#x60; is a positive integer representing the total parts of the video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * If you split your file by bytes, bear in mind byte ranges are inclusive, meaning that bytes 0-5242879 represents the first 5,242,880 bytes in a file or object. Also, the Content-Range header value must match the following pattern: &#x60;bytes &lt;from_byte&gt;-&lt;to_byte&gt;/&lt;total_bytes&gt;&#x60;:   * &#x60;&lt;from_byte&gt;&#x60; is a positive integer or 0. It represents the range start (aka lower bound), i.e., the first byte of the chunk compared to the total bytes composing the full video source. The first sequential range always starts at 0.   * &#x60;&lt;to_byte&gt;&#x60; is a positive integer representing the range end (aka upper bound), i.e., the last byte of the chunk compared to the total bytes composing the full video source.   * &#x60;&lt;total_bytes&gt;&#x60; is a positive integer representing the total bytes composing the full video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * Ordering and chunk or part size   * The order in which the chunks are received on our side does not matter.      * Example: &#x60;part 3/_*&#x60; then &#x60;part 2/_*&#x60; then &#x60;part 1/3&#x60; works.   * The chunks can be sent concurrently. We have a lock mechanism to ensure they are still technically processed one by one to ensure the \&quot;completion\&quot; check behaves as expected.   * The only chunk that can be smaller than our minimum allowed chunk size (5 MiB) is the last sequential one (i.e., the last sequential range for the \&quot;byte-range\&quot; system and the last part for the \&quot;part\&quot; system.     * For instance, if your video is 10.5 MiB big, your last chunk would be 500 KiB, and that would work.      * Another example is if your video is 2 MiB big, then your first and last chunk will be 2MiB and that will work as well. | [optional]




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

// create a new video &amp; upload a video file
$myVideo = $client->videos()->create((new \ApiVideo\Client\Model\VideoCreationPayload())->setTitle('Uploaded video'));
$client->videos()->upload($myVideo->getVideoId(), new SplFileObject(__DIR__ . '/558k.mp4'));

// create a new video &amp; upload a video file using progressive upload (the file is uploaded by parts)
$myVideo2 = $client->videos()->create((new \ApiVideo\Client\Model\VideoCreationPayload())->setTitle('Uploaded video (progressive upload)'));

$progressiveSession = $client->videos()->createUploadProgressiveSession($myVideo2->getVideoId());

$progressiveSession->uploadPart(new SplFileObject(__DIR__ . '/10m.mp4.part.a'));
$progressiveSession->uploadPart(new SplFileObject(__DIR__ . '/10m.mp4.part.b'));

$progressiveSession->uploadLastPart(new SplFileObject(__DIR__ . '/10m.mp4.part.c')); 
```




## **`uploadWithUploadToken()` - Upload with an upload token**



This method allows you to send a video using an upload token. Upload tokens are especially useful when the upload is done from the client side. If you want to upload a video from your server-side application, you'd better use the [standard upload method](#upload).

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `token` | **string**| The unique identifier for the token you want to use to upload a video. |
 `file` | **\SplFileObject**| The path to the video you want to upload. |
 `contentRange` | **string**| Content-Range represents the range of bytes that will be returned as a result of the request. Byte ranges are inclusive, meaning that bytes 0-999 represents the first 1000 bytes in a file or object. | [optional]
 `videoId` | **string**| The video id returned by the first call to this endpoint in a large video upload scenario. | [optional]




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);
 
$videoId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // Unique identifier of the video you want to add a thumbnail to, where you use a section of your video as the thumbnail.

$video = $client->videos()->pickThumbnail($videoId, (new \ApiVideo\Client\Model\VideoThumbnailPickPayload())
    ->setTimecode("00:01:00.000")); // Frame in video to be used as a placeholder before the video plays. 
```




## **`get()` - Retrieve a video**



This call provides the same information provided on video creation. For private videos, it will generate a unique token url. Use this to retrieve any details you need about a video, or set up a private viewing URL.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want details about. |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

$videoId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // The unique identifier for the video you want details about.
$videoStatus = $client->videos()->get($videoId);
```




## **`update()` - Update a video**



Updates the parameters associated with your video. The video you are updating is determined by the video ID you provide. 



NOTE: If you are updating an array, you must provide the entire array as what you provide here overwrites what is in the system rather than appending to it.



### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to delete. |
 `videoUpdatePayload` | [**\ApiVideo\Client\Model\VideoUpdatePayload**](../Model/VideoUpdatePayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

$videoId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // The video ID for the video you want to update.

$client->videos()->update($videoId, (new \ApiVideo\Client\Model\VideoUpdatePayload())
    ->setPlayerId("pl4k0jvEUuaTdRAEjQ4Jfrgz") // The unique ID for the player you want to associate with your video.
    ->setTitle("The new title") // The title you want to use for your video.
    ->setDescription("A new description") // A brief description of the video.
    ->setPublic(false) // Whether the video is publicly available or not. False means it is set to private.
    ->setPanoramic(false) // Whether the video is a 360 degree or immersive video.
    ->setMp4Support(true) // Whether the player supports the mp4 format.
    ->setTags(["tag1", "tag2"]) // A list of terms or words you want to tag the video with. Make sure the list includes all the tags you want as whatever you send in this list will overwrite the existing list for the video.
    ->setMetadata(array( // A list (array) of dictionaries where each dictionary contains a key value pair that describes the video. As with tags, you must send the complete list of metadata you want as whatever you send here will overwrite the existing metadata for the video.
        new \ApiVideo\Client\Model\Metadata(["key" => "aa", 'value' => "bb"]),
        new \ApiVideo\Client\Model\Metadata(["key" => "aa2", 'value' => "bb2"])))); 
```




## **`delete()` - Delete a video**



If you do not need a video any longer, you can send a request to delete it. All you need is the videoId.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to delete. |




### Return type

void (empty response body)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

$videoId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // the id of the video to delete
$client->videos()->delete($videoId); 
```




## **`list()` - List all videos**



This method returns a list of your videos (with all their details). With no parameters added, the API returns the first page of all videos. You can filter videos using the parameters described below.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `title` | **string**| The title of a specific video you want to find. The search will match exactly to what term you provide and return any videos that contain the same term as part of their titles. | [optional]
 `tags` | [**string[]**](../Model/string.md)| A tag is a category you create and apply to videos. You can search for videos with particular tags by listing one or more here. Only videos that have all the tags you list will be returned. | [optional]
 `metadata` | [**array<string,string>**](../Model/string.md)| Videos can be tagged with metadata tags in key:value pairs. You can search for videos with specific key value pairs using this parameter. [Dynamic Metadata](https://api.video/blog/endpoints/dynamic-metadata) allows you to define a key that allows any value pair. | [optional]
 `description` | **string**| If you described a video with a term or sentence, you can add it here to return videos containing this string. | [optional]
 `liveStreamId` | **string**| If you know the ID for a live stream, you can retrieve the stream by adding the ID for it here. | [optional]
 `sortBy` | **string**| Allowed: publishedAt, title. You can search by the time videos were published at, or by title. | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. asc is ascending and sorts from A to Z. desc is descending and sorts from Z to A. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\VideosListResponse**](../Model/VideosListResponse.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';


$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

// list all videos (all pages)
$allVideos = [];
do {
    $currentPage = $client->videos()->list([]);
    $allVideos = array_merge($allVideos, $currentPage->getData());
} while($currentPage->getPagination()->getCurrentPage() < $currentPage->getPagination()->getPagesTotal());

// list videos that have all the given tags (only first results page)
$videosWithTag = $client->videos()->list(['tags' => ['TAG2','TAG1']]);

// list videos that have all the given metadata values (only first results page)
$videosWithMetadata = $client->videos()->list(['metadata' => ['key1' => 'key1value1', 'key2' => 'key2value1']]);
```




## **`uploadThumbnail()` - Upload a thumbnail**



The thumbnail is the poster that appears in the player window before video playback begins.



This endpoint allows you to upload an image for the thumbnail.



To select a still frame from the video using a time stamp, use the [dedicated method](#pickThumbnail) to pick a time in the video.



Note: There may be a short delay before the new thumbnail is delivered to our CDN.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Unique identifier of the chosen video |
 `file` | **\SplFileObject**| The image to be added as a thumbnail. The mime type should be image/jpeg, image/png or image/webp. The max allowed size is 8 MiB. |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
); 

$videoId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // Unique identifier of the chosen video
$thumbnail = new SplFileObject(__DIR__ . '/thumbnail.jpg'); // The image to be added as a thumbnail.

$client->videos()->uploadThumbnail($videoId, $thumbnail); 
```




## **`pickThumbnail()` - Pick a thumbnail**



Pick a thumbnail from the given time code. 



If you'd like to upload an image for your thumbnail, use the dedicated [method](#uploadThumbnail). 



There may be a short delay for the thumbnail to update.



### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Unique identifier of the video you want to add a thumbnail to, where you use a section of your video as the thumbnail. |
 `videoThumbnailPickPayload` | [**\ApiVideo\Client\Model\VideoThumbnailPickPayload**](../Model/VideoThumbnailPickPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);
 
$videoId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // Unique identifier of the video you want to add a thumbnail to, where you use a section of your video as the thumbnail.

$video = $client->videos()->pickThumbnail($videoId, (new \ApiVideo\Client\Model\VideoThumbnailPickPayload())
    ->setTimecode("00:01:00.000")); // Frame in video to be used as a placeholder before the video plays. 
```




## **`getStatus()` - Retrieve video status**



This method provides upload status &amp; encoding status to determine when the video is uploaded or ready to playback. Once encoding is completed, the response also lists the available stream qualities.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want the status for. |




### Return type

[**\ApiVideo\Client\Model\VideoStatus**](../Model/VideoStatus.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

$videoId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // The unique identifier for the video you want the status for.
$videoStatus = $client->videos()->getStatus($videoId);  
```



