# ApiVideo\Client\Api\VideosApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](VideosApi.md#delete) | **DELETE** `/videos/{videoId}` | Delete a video
[**get()**](VideosApi.md#get) | **GET** `/videos/{videoId}` | Show a video
[**getStatus()**](VideosApi.md#getStatus) | **GET** `/videos/{videoId}/status` | Show video status
[**list()**](VideosApi.md#list) | **GET** `/videos` | List all videos
[**update()**](VideosApi.md#update) | **PATCH** `/videos/{videoId}` | Update a video
[**pickThumbnail()**](VideosApi.md#pickThumbnail) | **PATCH** `/videos/{videoId}/thumbnail` | Pick a thumbnail
[**uploadWithUploadToken()**](VideosApi.md#uploadWithUploadToken) | **POST** `/upload` | Upload with an upload token
[**create()**](VideosApi.md#create) | **POST** `/videos` | Create a video
[**upload()**](VideosApi.md#upload) | **POST** `/videos/{videoId}/source` | Upload a video
[**uploadThumbnail()**](VideosApi.md#uploadThumbnail) | **POST** `/videos/{videoId}/thumbnail` | Upload a thumbnail


## delete()


If you do not need a video any longer, you can send a request to delete it. All you need is the videoId.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to delete. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |




### Return type

void (empty response body)




## get()


This call provides the same information provided on video creation. For private videos, it will generate a unique token url. Use this to retrieve any details you need about a video, or set up a private viewing URL.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want details about. | `'videoId_example'` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)




## getStatus()


This method provides upload status & encoding status to determine when the video is uploaded or ready to playback. Once encoding is completed, the response also lists the available stream qualities.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want the status for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |




### Return type

[**\ApiVideo\Client\Model\VideoStatus**](../Model/VideoStatus.md)




## list()


This method returns a list of your videos (with all their details). With no parameters added, the API returns the first page of all videos. You can filter videos using the parameters described below.

### Example

```php
<?php
require __DIR__ . '/vendor/autoload.php';

// instantiate the client
$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new \ApiVideo\Client(
                    'https://sandbox.api.video',
                    'YOUR_API_TOKEN',
                    $httpClient
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

### Arguments





Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `title` | **string**| The title of a specific video you want to find. The search will match exactly to what term you provide and return any videos that contain the same term as part of their titles. | `My Video.mp4` | [optional]
 `tags` | [**string[]**](../Model/string.md)| A tag is a category you create and apply to videos. You can search for videos with particular tags by listing one or more here. Only videos that have all the tags you list will be returned. | `["captions", "dialogue"]` | [optional]
 `metadata` | [**array<string,string>**](../Model/string.md)| Videos can be tagged with metadata tags in key:value pairs. You can search for videos with specific key value pairs using this parameter. [Dynamic Metadata](https://api.video/blog/endpoints/dynamic-metadata) allows you to define a key that allows any value pair. | `metadata[Author]=John Doe&metadata[Format]=Tutorial` | [optional]
 `description` | **string**| If you described a video with a term or sentence, you can add it here to return videos containing this string. | `New Zealand` | [optional]
 `liveStreamId` | **string**| If you know the ID for a live stream, you can retrieve the stream by adding the ID for it here. | `li400mYKSgQ6xs7taUeSaEKr` | [optional]
 `sortBy` | **string**| Allowed: publishedAt, title. You can search by the time videos were published at, or by title. | `publishedAt` | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. asc is ascending and sorts from A to Z. desc is descending and sorts from Z to A. | `asc` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\VideosListResponse**](../Model/VideosListResponse.md)




## update()


Updates the parameters associated with your video. The video you are updating is determined by the video ID you provide. 

NOTE: If you are updating an array, you must provide the entire array as what you provide here overwrites what is in the system rather than appending to it.


### Example

```php
<?php

use ApiVideo\Client\Model\Metadata;
use ApiVideo\Client\Model\VideoUpdatePayload;

require __DIR__ . '/../../../vendor/autoload.php';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new \ApiVideo\Client(
                    'https://sandbox.api.video',
                    'YOUR_API_TOKEN',
                    $httpClient
                );

$client->videos()->update("vi6DEWhlgoHU3Ig5tgPlYkBc", (new VideoUpdatePayload())
    ->setTitle("The new title")
    ->setPublic(false)
    ->setDescription("A new description")
    ->setTags(["tag1", "tag2"])
    ->setMetadata(array(
        new Metadata(["key" => "aa", 'value' => "bb"]),
        new Metadata(["key" => "aa2", 'value' => "bb2"]))));

```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to delete. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `videoUpdatePayload` | [**\ApiVideo\Client\Model\VideoUpdatePayload**](../Model/VideoUpdatePayload.md)|  | `new \ApiVideo\Client\Model\VideoUpdatePayload()` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)




## pickThumbnail()


Pick a thumbnail from the given time code. 

If you'd like to upload an image for your thumbnail, use the dedicated [method](#uploadThumbnail). 

There may be a short delay for the thumbnail to update.



### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Unique identifier of the video you want to add a thumbnail to, where you use a section of your video as the thumbnail. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `videoThumbnailPickPayload` | [**\ApiVideo\Client\Model\VideoThumbnailPickPayload**](../Model/VideoThumbnailPickPayload.md)|  | `new \ApiVideo\Client\Model\VideoThumbnailPickPayload()` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)




## uploadWithUploadToken()


This method allows you to send a video using an upload token. Upload tokens are especially useful when the upload is done from the client side. If you want to upload a video from your server-side application, you'd better use the [standard upload method](#upload).


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `token` | **string**| The unique identifier for the token you want to use to upload a video. | `to1tcmSFHeYY5KzyhOqVKMKb` |
 `file` | **\SplFileObject**| The path to the video you want to upload. | `new \SplFileObject('path')` |
 `contentRange` | **string**| Content-Range represents the range of bytes that will be returned as a result of the request. Byte ranges are inclusive, meaning that bytes 0-999 represents the first 1000 bytes in a file or object. | `Content-Range: bytes 200-100/5000` | [optional]
 `videoId` | **string**| The video id returned by the first call to this endpoint in a large video upload scenario. | `'videoId_example'` | [optional]




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)




## create()


We have tutorials on: * [Creating and uploading videos](https://api.video/blog/tutorials/video-upload-tutorial) * [Uploading large videos](https://api.video/blog/tutorials/video-upload-tutorial-large-videos) * [Using tags with videos](https://api.video/blog/tutorials/video-tagging-best-practices) * [Private videos](https://api.video/blog/tutorials/tutorial-private-videos) * [Using Dynamic Metadata](https://api.video/blog/tutorials/dynamic-metadata)  * Full list of [tutorials](https://api.video/blog/endpoints/video-create) that demonstrate this endpoint.

### Example

```php
<?php

use ApiVideo\Client\Model\Metadata;
use ApiVideo\Client\Model\VideoCreationPayload;

require __DIR__ . '/vendor/autoload.php';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new \ApiVideo\Client(
                    'https://sandbox.api.video',
                    'YOUR_API_TOKEN',
                    $httpClient
                );

$myVideo = $client->videos()->create((new VideoCreationPayload())
    ->setTitle('Video B')
    ->setTags(array("TAG1", "TAG2"))
    ->setMetadata(array(
        new Metadata(['key' => 'key1', 'value' => 'key1value1']),
        new Metadata(['key' => 'key2', 'value' => 'key2value1']))));

```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoCreationPayload` | [**\ApiVideo\Client\Model\VideoCreationPayload**](../Model/VideoCreationPayload.md)| video to create | `new \ApiVideo\Client\Model\VideoCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)




## upload()


To upload a video to the videoId you created. You can only upload your video to the videoId once.

We offer 2 types of upload: 
* Regular upload 
* Progressive upload
The latter allows you to split a video source into X chunks and send those chunks independently (concurrently or sequentially). The 2 main goals for our users are to
  * allow the upload of video sources > 200 MiB (200 MiB = the max. allowed file size for regular upload)
  * allow to send a video source "progressively", i.e., before before knowing the total size of the video.
  Once all chunks have been sent, they are reaggregated to one source file. The video source is considered as "completely sent" when the "last" chunk is sent (i.e., the chunk that "completes" the upload).


### Example

```php
<?php

use ApiVideo\Client\Model\VideoCreationPayload;

require __DIR__ . '/vendor/autoload.php';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new \ApiVideo\Client(
                    'https://sandbox.api.video',
                    'YOUR_API_TOKEN',
                    $httpClient
                );

// create a new video &amp; upload a video file
$myVideo = $client->videos()->create((new VideoCreationPayload())->setTitle('Uploaded video'));
$client->videos()->upload($myVideo->getVideoId(), new SplFileObject(__DIR__ . '/../../../tests/resources/558k.mp4'));

// create a new video &amp; upload a video file using progressive upload (the file is uploaded by parts)
$myVideo2 = $client->videos()->create((new VideoCreationPayload())->setTitle('Uploaded video (progressive upload)'));

$progressiveSession = $client->videos()->createUploadProgressiveSession($myVideo2->getVideoId());

$progressiveSession->uploadPart(new SplFileObject(__DIR__ . '/../../../tests/resources/10m.mp4.part.a'));
$progressiveSession->uploadPart(new SplFileObject(__DIR__ . '/../../../tests/resources/10m.mp4.part.b'));

$progressiveSession->uploadLastPart(new SplFileObject(__DIR__ . '/../../../tests/resources/10m.mp4.part.c'));

```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Enter the videoId you want to use to upload your video. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `file` | **\SplFileObject**| The path to the video you would like to upload. The path must be local. If you want to use a video from an online source, you must use the \\\&quot;/videos\\\&quot; endpoint and add the \\\&quot;source\\\&quot; parameter when you create a new video. | `new \SplFileObject('path')` |
 `contentRange` | **string**| Content-Range can be used if you want to split your file. You can do this by parts, or by chunk. * If you split your file by parts (recommended option), the &#x60;Content-Range&#x60; header value must match the following pattern: &#x60;part &lt;part&gt;/&lt;total_parts&gt;&#x60;:   * &#x60;&lt;part&gt;&#x60; is a positive integer representing the part number. The first sequential part number is always 1.   * &#x60;&lt;total_parts&gt;&#x60; is a positive integer representing the total parts of the video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * If you split your file by bytes, bear in mind byte ranges are inclusive, meaning that bytes 0-5242879 represents the first 5,242,880 bytes in a file or object. Also, the Content-Range header value must match the following pattern: &#x60;bytes &lt;from_byte&gt;-&lt;to_byte&gt;/&lt;total_bytes&gt;&#x60;:   * &#x60;&lt;from_byte&gt;&#x60; is a positive integer or 0. It represents the range start (aka lower bound), i.e., the first byte of the chunk compared to the total bytes composing the full video source. The first sequential range always starts at 0.   * &#x60;&lt;to_byte&gt;&#x60; is a positive integer representing the range end (aka upper bound), i.e., the last byte of the chunk compared to the total bytes composing the full video source.   * &#x60;&lt;total_bytes&gt;&#x60; is a positive integer representing the total bytes composing the full video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * Ordering and chunk or part size   * The order in which the chunks are received on our side does not matter.      * Example: &#x60;part 3/_*&#x60; then &#x60;part 2/_*&#x60; then &#x60;part 1/3&#x60; works.   * The chunks can be sent concurrently. We have a lock mechanism to ensure they are still technically processed one by one to ensure the \&quot;completion\&quot; check behaves as expected.   * The only chunk that can be smaller than our minimum allowed chunk size (5 MiB) is the last sequential one (i.e., the last sequential range for the \&quot;byte-range\&quot; system and the last part for the \&quot;part\&quot; system.     * For instance, if your video is 10.5 MiB big, your last chunk would be 500 KiB, and that would work.      * Another example is if your video is 2 MiB big, then your first and last chunk will be 2MiB and that will work as well. | `bytes 209715200-419430399/524288000 OR part 2/3` | [optional]




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)




## uploadThumbnail()


The thumbnail is the poster that appears in the player window before video playback begins.

This endpoint allows you to upload an image for the thumbnail.

To select a still frame from the video using a time stamp, use the [dedicated method](#pickThumbnail) to pick a time in the video.

Note: There may be a short delay before the new thumbnail is delivered to our CDN.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Unique identifier of the chosen video | `'videoId_example'` |
 `file` | **\SplFileObject**| The image to be added as a thumbnail. The mime type should be image/jpeg, image/png or image/webp. The max allowed size is 8 MiB. | `new \SplFileObject('path')` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)



