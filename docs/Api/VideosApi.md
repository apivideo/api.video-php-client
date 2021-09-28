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


If you do not need a video any longer, you can send a request to delete it. All you need is the videoId. Tutorials using [video deletion](https://api.video/blog/endpoints/video-delete).

```php
delete(string $videoId): void
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to delete. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |




### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## get()


This call provides the same JSON information provided on video creation. For private videos, it will generate a unique token url. Use this to retrieve any details you need about a video, or set up a private viewing URL. Tutorials using [video GET](https://api.video/blog/endpoints/video-get).

```php
get(string $videoId): \ApiVideo\Client\Model\Video
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want details about. | `'videoId_example'` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## getStatus()


This API provides upload status & encoding status to determine when the video is uploaded or ready to playback.  Once encoding is completed, the response also lists the available stream qualities. Tutorials using [video status](https://api.video/blog/endpoints/video-status).

```php
getStatus(string $videoId): \ApiVideo\Client\Model\VideoStatus
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want the status for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |




### Return type

[**\ApiVideo\Client\Model\VideoStatus**](../Model/VideoStatus.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## list()


Requests to this endpoint return a list of your videos (with all their details). With no parameters added to this query, the API returns all videos. You can filter what videos the API returns using the parameters described below. We have [several tutorials](https://api.video/blog/endpoints/video-list) that demonstrate this endpoint..

```php
list(array $queryParams = []): \ApiVideo\Client\Model\VideosListResponse
```

### Arguments





Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `title` | **string**| The title of a specific video you want to find. The search will match exactly to what term you provide and return any videos that contain the same term as part of their titles. | `My Video.mp4` | [optional]
 `tags` | [**string[]**](../Model/string.md)| A tag is a category you create and apply to videos. You can search for videos with particular tags by listing one or more here. Only videos that have all the tags you list will be returned. | `["captions", "dialogue"]` | [optional]
 `metadata` | [**map[string,string]**](../Model/string.md)| Videos can be tagged with metadata tags in key:value pairs. You can search for videos with specific key value pairs using this parameter. | `metadata[Author]=John Doe&metadata[Format]=Tutorial` | [optional]
 `description` | **string**| If you described a video with a term or sentence, you can add it here to return videos containing this string. | `New Zealand` | [optional]
 `liveStreamId` | **string**| If you know the ID for a live stream, you can retrieve the stream by adding the ID for it here. | `li400mYKSgQ6xs7taUeSaEKr` | [optional]
 `sortBy` | **string**| Allowed: publishedAt, title. You can search by the time videos were published at, or by title. | `publishedAt` | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. asc is ascending and sorts from A to Z. desc is descending and sorts from Z to A. | `asc` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\VideosListResponse**](../Model/VideosListResponse.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## update()


Use this endpoint to update the parameters associated with your video. The video you are updating is determined by the video ID you provide in the path. For each parameter you want to update, include the update in the request body. NOTE: If you are updating an array, you must provide the entire array as what you provide here overwrites what is in the system rather than appending to it. Tutorials using [video update](https://api.video/blog/endpoints/video-update).

```php
update(string $videoId, \ApiVideo\Client\Model\VideoUpdatePayload $videoUpdatePayload): \ApiVideo\Client\Model\Video
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to delete. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `videoUpdatePayload` | [**\ApiVideo\Client\Model\VideoUpdatePayload**](../Model/VideoUpdatePayload.md)|  | `new \ApiVideo\Client\Model\VideoUpdatePayload()` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## pickThumbnail()


Pick a thumbnail from the given time code. If you'd like to upload an image for your thumbnail, use the [Upload a Thumbnail](https://docs.api.video/reference#post_videos-videoid-thumbnail) endpoint. There may be a short delay for the thumbnail to update. Tutorials using [Thumbnail picking](https://api.video/blog/endpoints/video-pick-a-thumbnail).

```php
pickThumbnail(string $videoId, \ApiVideo\Client\Model\VideoThumbnailPickPayload $videoThumbnailPickPayload): \ApiVideo\Client\Model\Video
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Unique identifier of the video you want to add a thumbnail to, where you use a section of your video as the thumbnail. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `videoThumbnailPickPayload` | [**\ApiVideo\Client\Model\VideoThumbnailPickPayload**](../Model/VideoThumbnailPickPayload.md)|  | `new \ApiVideo\Client\Model\VideoThumbnailPickPayload()` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## uploadWithUploadToken()


When given a token, anyone can upload a file to the URI `https://ws.api.video/upload?token=<tokenId>`.  Example with cURL:  ```curl $ curl  --request POST --url 'https://ws.api.video/upload?token=toXXX'  --header 'content-type: multipart/form-data'  -F file=@video.mp4 ```  Or in an HTML form, with a little JavaScript to convert the form into JSON: ```html <!--form for user interaction--> <form name=\"videoUploadForm\" >   <label for=video>Video:</label>   <input type=file name=source/><br/>   <input value=\"Submit\" type=\"submit\"> </form> <div></div> <!--JS takes the form data      uses FormData to turn the response into JSON.     then uses POST to upload the video file.     Update the token parameter in the url to your upload token.     --> <script>    var form = document.forms.namedItem(\"videoUploadForm\");     form.addEventListener('submit', function(ev) {   ev.preventDefault();      var oOutput = document.querySelector(\"div\"),          oData = new FormData(form);      var oReq = new XMLHttpRequest();         oReq.open(\"POST\", \"https://ws.api.video/upload?token=toXXX\", true);      oReq.send(oData);   oReq.onload = function(oEvent) {        if (oReq.status ==201) {          oOutput.innerHTML = \"Your video is uploaded!<br/>\"  + oReq.response;        } else {          oOutput.innerHTML = \"Error \" + oReq.status + \" occurred when trying to upload your file.<br />\";        }      };    }, false);  </script> ```   ### Dealing with large files  We have created a <a href='https://api.video/blog/tutorials/uploading-large-files-with-javascript'>tutorial</a> to walk through the steps required.

```php
uploadWithUploadToken(string $token, \SplFileObject $file, string $contentRange = null, string $videoId = null): \ApiVideo\Client\Model\Video
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `token` | **string**| The unique identifier for the token you want to use to upload a video. | `to1tcmSFHeYY5KzyhOqVKMKb` |
 `file` | **\SplFileObject**| The path to the video you want to upload. | `new \SplFileObject('path')` |
 `contentRange` | **string**| Content-Range represents the range of bytes that will be returned as a result of the request. Byte ranges are inclusive, meaning that bytes 0-999 represents the first 1000 bytes in a file or object. | `Content-Range: bytes 200-100/5000` | [optional]
 `videoId` | **string**| The video id returned by the first call to this endpoint in a large video upload scenario. | `'videoId_example'` | [optional]




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Authorization

No authorization required.

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## create()


To create a video, you create its metadata first, before adding the video file (exception - when using an existing HTTP source). * Videos are public by default. [Learn about Private videos](https://api.video/blog/tutorials/tutorial-private-videos) * Up to 6 responsive video streams will be created (from 240p to 4k) * Mp4 encoded versions are created at the highest quality (max 1080p) by default. * Panoramic videos are for videos recorded in 360 degrees.  You can toggle this after your 360 video upload. * Searchable parameters: title, description, tags and metadata   ```shell $ curl https://ws.api.video/videos \\ -H 'Authorization: Bearer {access_token} \\ -d '{\"title\":\"My video\",      \"description\":\"so many details\",      \"mp4Support\":true }' ``` ### add an URL to upload on creation You can also create a video directly from a video hosted on a third-party server by giving its URI in `source` parameter: ```shell $ curl https://ws.api.video/videos \\ -H 'Authorization: Bearer {access_token} \\ -d '{\"source\":\"http://uri/to/video.mp4\", \"title\":\"My video\"}' ``` In this case, the service will respond `202 Accepted` and download the video asynchronously. ### Track users with Dynamic Metadata Metadata values can be a key:value where the values are predefined, but Dynamic metadata allows you to enter *any* value for a defined key.  To defined a dynamic metadata pair use: ``` \"metadata\":[{\"dynamicKey\": \"__dynamicKey__\"}] ``` The double underscore on both sides of the value allows any variable to be added for a given video session. Added the the url you might have: ``` <iframe type=\"text/html\" src=\"https://embed.api.video/vod/vi6QvU9dhYCzW3BpPvPsZUa8?metadata[classUserName]=Doug\" width=\"960\" height=\"320\" frameborder=\"0\" scrollling=\"no\"></iframe> ``` This video session will be tagged as watched by Doug - allowing for in-depth analysis on how each viewer interacts with the videos.   We have tutorials on: * [Creating and uploading videos](https://api.video/blog/tutorials/video-upload-tutorial) * [Uploading large videos](https://api.video/blog/tutorials/video-upload-tutorial-large-videos) * [Using tags with videos](https://api.video/blog/tutorials/video-tagging-best-practices) * [Private videos](https://api.video/blog/tutorials/tutorial-private-videos) * [Using Dynamic Metadata](https://api.video/blog/tutorials/dynamic-metadata) * Full list of [tutorials](https://api.video/blog/endpoints/video-create) that demonstrate this endpoint.

```php
create(\ApiVideo\Client\Model\VideoCreationPayload $videoCreationPayload): \ApiVideo\Client\Model\Video
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoCreationPayload` | [**\ApiVideo\Client\Model\VideoCreationPayload**](../Model/VideoCreationPayload.md)| video to create | `new \ApiVideo\Client\Model\VideoCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## upload()


To upload a video to the videoId you created. Replace {videoId} with the id you'd like to use, {access_token} with your token, and /path/to/video.mp4 with the path to the video you'd like to upload. You can only upload your video to the videoId once. ```bash curl https://ws.api.video/videos/{videoId}/source \\   -H 'Authorization: Bearer {access_token}' \\   -F file=@/path/to/video.mp4   ``` Tutorials using [video upload](https://api.video/blog/endpoints/video-upload)

```php
upload(string $videoId, \SplFileObject $file, string $contentRange = null): \ApiVideo\Client\Model\Video
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Enter the videoId you want to use to upload your video. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `file` | **\SplFileObject**| The path to the video you would like to upload. The path must be local. If you want to use a video from an online source, you must use the \\\&quot;/videos\\\&quot; endpoint and add the \\\&quot;source\\\&quot; parameter when you create a new video. | `new \SplFileObject('path')` |
 `contentRange` | **string**| Content-Range represents the range of bytes that will be returned as a result of the request. Byte ranges are inclusive, meaning that bytes 0-999 represents the first 1000 bytes in a file or object. | `Content-Range: bytes 200-100/5000` | [optional]




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## uploadThumbnail()


The thumbnail is the poster that appears in the player window before video playback begins. This endpoint allows you to upload an image for the thumbnail. To select a still frame from the video using a time stamp, use [Pick a Thumbnail](https://docs.api.video/reference#patch_videos-videoid-thumbnail) to pick a time in the video. Note: There may be a short delay before the new thumbnail is delivered to our CDN. Tutorials using [Thumbnail upload](https://api.video/blog/endpoints/videos-upload-a-thumbnail).

```php
uploadThumbnail(string $videoId, \SplFileObject $file): \ApiVideo\Client\Model\Video
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| Unique identifier of the chosen video | `'videoId_example'` |
 `file` | **\SplFileObject**| The image to be added as a thumbnail. | `new \SplFileObject('path')` |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
