# # VideoCreationPayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**title** | **string** | The title of your new video. |
**description** | **string** | A brief description of your video. | [optional]
**source** | **string** | You can either add a video already on the web, by entering the URL of the video, or you can also enter the &#x60;videoId&#x60; of one of the videos you already have on your api.video acccount, and this will generate a copy of your video. Creating a copy of a video can be especially useful if you want to keep your original video and trim or apply a watermark onto the copy you would create. | [optional]
**public** | **bool** | Whether your video can be viewed by everyone, or requires authentication to see it. A setting of false will require a unique token for each view. Default is true. Tutorials on [private videos](https://api.video/blog/endpoints/private-videos). | [optional] [default to true]
**panoramic** | **bool** | Indicates if your video is a 360/immersive video. | [optional] [default to false]
**mp4Support** | **bool** | Enables mp4 version in addition to streamed version. | [optional] [default to true]
**playerId** | **string** | The unique identification number for your video player. | [optional]
**tags** | **string[]** | A list of tags you want to use to describe your video. | [optional]
**metadata** | [**\ApiVideo\Client\Model\Metadata[]**](Metadata.md) | A list of key value pairs that you use to provide metadata for your video. These pairs can be made dynamic, allowing you to segment your audience. Read more on [dynamic metadata](https://api.video/blog/endpoints/dynamic-metadata). | [optional]
**clip** | [**\ApiVideo\Client\Model\VideoClip**](VideoClip.md) |  | [optional]
**watermark** | [**\ApiVideo\Client\Model\VideoWatermark**](VideoWatermark.md) |  | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
