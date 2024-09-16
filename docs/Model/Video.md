# # Video

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**videoId** | **string** | The unique identifier of the video object. |
**createdAt** | [**\DateTime**](\DateTime.md) | When a video was created, presented in ATOM UTC format. | [optional]
**title** | **string** | The title of the video content. | [optional]
**description** | **string** | A description for the video content. | [optional]
**publishedAt** | [**\DateTime**](\DateTime.md) | The date and time the API created the video. Date and time are provided using ATOM UTC format. | [optional]
**updatedAt** | [**\DateTime**](\DateTime.md) | The date and time the video was updated. Date and time are provided using ATOM UTC format. | [optional]
**discardedAt** | [**\DateTime**](\DateTime.md) | The date and time the video was discarded. The API populates this field only if you have the Video Restore feature enabled and discard a video. Date and time are provided using ATOM UTC format. | [optional]
**deletesAt** | [**\DateTime**](\DateTime.md) | The date and time the video will be permanently deleted. The API populates this field only if you have the Video Restore feature enabled and discard a video. Discarded videos are pemanently deleted after 90 days. Date and time are provided using ATOM UTC format. | [optional]
**discarded** | **bool** | Returns &#x60;true&#x60; for videos you discarded when you have the Video Restore feature enabled. Returns &#x60;false&#x60; for every other video. | [optional]
**tags** | **string[]** | One array of tags (each tag is a string) in order to categorize a video. Tags may include spaces. | [optional]
**metadata** | [**\ApiVideo\Client\Model\Metadata[]**](Metadata.md) | Metadata you can use to categorise and filter videos. Metadata is a list of dictionaries, where each dictionary represents a key value pair for categorising a video. | [optional]
**source** | [**\ApiVideo\Client\Model\VideoSource**](VideoSource.md) |  | [optional]
**assets** | [**\ApiVideo\Client\Model\VideoAssets**](VideoAssets.md) |  | [optional]
**playerId** | **string** | The id of the player that will be applied on the video. | [optional]
**public** | **bool** | Defines if the content is publicly reachable or if a unique token is needed for each play session. Default is true. Tutorials on [private videos](https://api.video/blog/endpoints/private-videos/). | [optional]
**panoramic** | **bool** | Defines if video is panoramic. | [optional]
**mp4Support** | **bool** | This lets you know whether mp4 is supported. If enabled, an mp4 URL will be provided in the response for the video. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
