# # LiveStream

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**liveStreamId** | **string** | The unique identifier for the live stream. Live stream IDs begin with \&quot;li.\&quot; |
**name** | **string** | The name of your live stream. | [optional]
**streamKey** | **string** | The unique, private stream key that you use to begin streaming. | [optional]
**record** | **bool** | Whether you are recording or not. | [optional]
**public** | **bool** | BETA FEATURE Please limit all public &#x3D; false (\&quot;private\&quot;) livestreams to 3,000 users. Whether your video can be viewed by everyone, or requires authentication to see it. A setting of false will require a unique token for each view. | [optional]
**assets** | [**\ApiVideo\Client\Model\LiveStreamAssets**](LiveStreamAssets.md) |  | [optional]
**playerId** | **string** | The unique identifier for the player. | [optional]
**broadcasting** | **bool** | Whether or not you are broadcasting the live video you recorded for others to see. True means you are broadcasting to viewers, false means you are not. | [optional]
**createdAt** | [**\DateTime**](\DateTime.md) | When the player was created, presented in ISO-8601 format. | [optional]
**updatedAt** | [**\DateTime**](\DateTime.md) | When the player was last updated, presented in ISO-8601 format. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
