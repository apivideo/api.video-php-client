# # VideoUpdatePayload

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**playerId** | **string** | The unique ID for the player you want to associate with your video. | [optional]
**title** | **string** | The title you want to use for your video. | [optional]
**description** | **string** | A brief description of the video. | [optional]
**public** | **bool** | Whether the video is publicly available or not. False means it is set to private. Default is true. Tutorials on [private videos](https://api.video/blog/endpoints/private-videos/). | [optional]
**panoramic** | **bool** | Whether the video is a 360 degree or immersive video. | [optional]
**mp4Support** | **bool** | Whether the player supports the mp4 format. | [optional]
**tags** | **string[]** | A list of terms or words you want to tag the video with. Make sure the list includes all the tags you want as whatever you send in this list will overwrite the existing list for the video. | [optional]
**metadata** | [**\ApiVideo\Client\Model\Metadata[]**](Metadata.md) | A list (array) of dictionaries where each dictionary contains a key value pair that describes the video. As with tags, you must send the complete list of metadata you want as whatever you send here will overwrite the existing metadata for the video. | [optional]
**language** | **string** | Use this parameter to set the language of the video. When this parameter is set, the API creates a transcript of the video using the language you specify. You must use the [IETF language tag](https://en.wikipedia.org/wiki/IETF_language_tag) format.  &#x60;language&#x60; is a permanent attribute of the video. You can update it to another language using the [&#x60;PATCH /videos/{videoId}&#x60;](https://docs.api.video/reference/api/Videos#update-a-video-object) operation. This triggers the API to generate a new transcript using a different language. | [optional]
**transcript** | **bool** | Use this parameter to enable transcription.   - When &#x60;true&#x60;, the API generates a transcript for the video. - The default value is &#x60;false&#x60;. - If you define a video language using the &#x60;language&#x60; parameter, the API uses that language to transcribe the video. If you do not define a language, the API detects it based on the video.  - When the API generates a transcript, it will be available as a caption for the video. | [optional]
**transcriptSummary** | **bool** | Use this parameter to enable summarization.   - When &#x60;true&#x60;, the API generates a summary for the video, based on the transcription. - The default value is &#x60;false&#x60;. - If you define a video language using the &#x60;language&#x60; parameter, the API uses that language to summarize the video. If you do not define a language, the API detects it based on the video. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
