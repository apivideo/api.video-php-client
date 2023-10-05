# ApiVideo\Client\Api\VideosApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](VideosApi.md#create) | Create a video object | **POST** `/videos`
[**upload()**](VideosApi.md#upload) | Upload a video | **POST** `/videos/{videoId}/source`
[**uploadWithUploadToken()**](VideosApi.md#uploadWithUploadToken) | Upload with an delegated upload token | **POST** `/upload`
[**get()**](VideosApi.md#get) | Retrieve a video object | **GET** `/videos/{videoId}`
[**update()**](VideosApi.md#update) | Update a video object | **PATCH** `/videos/{videoId}`
[**delete()**](VideosApi.md#delete) | Delete a video object | **DELETE** `/videos/{videoId}`
[**list()**](VideosApi.md#list) | List all video objects | **GET** `/videos`
[**uploadThumbnail()**](VideosApi.md#uploadThumbnail) | Upload a thumbnail | **POST** `/videos/{videoId}/thumbnail`
[**pickThumbnail()**](VideosApi.md#pickThumbnail) | Set a thumbnail | **PATCH** `/videos/{videoId}/thumbnail`
[**getStatus()**](VideosApi.md#getStatus) | Retrieve video status and details | **GET** `/videos/{videoId}/status`


## **`create()` - Create a video object**



Creates a video object. More information on video objects can be found [here](https://docs.api.video/reference/api/Videos).



### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoCreationPayload` | [**\ApiVideo\Client\Model\VideoCreationPayload**](../Model/VideoCreationPayload.md)| video to create |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)





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
 `contentRange` | **string**| &#x60;part &lt;part&gt;/&lt;total_parts&gt;&#x60; ; &#x60;bytes &lt;from_byte&gt;-&lt;to_byte&gt;/&lt;total_bytes&gt;&#x60; | [optional]




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)





## **`uploadWithUploadToken()` - Upload with an delegated upload token**



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





## **`get()` - Retrieve a video object**



This call provides the same information provided on video creation. For private videos, it will generate a unique token url. Use this to retrieve any details you need about a video, or set up a private viewing URL.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want details about. |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)





## **`update()` - Update a video object**



Updates the parameters associated with a video ID. The video object you are updating is determined by the video ID you provide. 



NOTE: If you are updating an array, you must provide the entire array as what you provide here overwrites what is in the system rather than appending to it.



### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to update. |
 `videoUpdatePayload` | [**\ApiVideo\Client\Model\VideoUpdatePayload**](../Model/VideoUpdatePayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Video**](../Model/Video.md)





## **`delete()` - Delete a video object**



If you do not need a video any longer, you can send a request to delete it. All you need is the videoId.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The video ID for the video you want to delete. |




### Return type

void (empty response body)





## **`list()` - List all video objects**



This method returns a list of your videos (with all their details). With no parameters added, the API returns the first page of all videos. You can filter videos using the parameters described below.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `title` | **string**| The title of a specific video you want to find. The search will match exactly to what term you provide and return any videos that contain the same term as part of their titles. | [optional]
 `tags` | [**string[]**](../Model/string.md)| A tag is a category you create and apply to videos. You can search for videos with particular tags by listing one or more here. Only videos that have all the tags you list will be returned. | [optional]
 `metadata` | [**array<string,string>**](../Model/string.md)| Videos can be tagged with metadata tags in key:value pairs. You can search for videos with specific key value pairs using this parameter. [Dynamic Metadata](https://api.video/blog/endpoints/dynamic-metadata/) allows you to define a key that allows any value pair. | [optional]
 `description` | **string**| Retrieve video objects by &#x60;description&#x60;. | [optional]
 `liveStreamId` | **string**| Retrieve video objects that were recorded from a live stream by &#x60;liveStreamId&#x60;. | [optional]
 `sortBy` | **string**| Use this parameter to sort videos by the their created time, published time, updated time, or by title. | [optional]
 `sortOrder` | **string**| Use this parameter to sort results. &#x60;asc&#x60; is ascending and sorts from A to Z. &#x60;desc&#x60; is descending and sorts from Z to A. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\VideosListResponse**](../Model/VideosListResponse.md)





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





## **`pickThumbnail()` - Set a thumbnail**



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





## **`getStatus()` - Retrieve video status and details**



This method provides upload status &amp; encoding status to determine when the video is uploaded or ready to playback. Once encoding is completed, the response also lists the available stream qualities.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want the status for. |




### Return type

[**\ApiVideo\Client\Model\VideoStatus**](../Model/VideoStatus.md)




