# # Summary

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**summaryId** | **string** | The unique identifier of the summary object. | [optional]
**createdAt** | [**\DateTime**](\DateTime.md) | Returns the date and time when the summary was created in ATOM date-time format. | [optional]
**updatedAt** | [**\DateTime**](\DateTime.md) | Returns the date and time when the summary was last updated in ATOM date-time format. | [optional]
**videoId** | **string** | The unique identifier of the video object. | [optional]
**origin** | **string** | Returns the origin of how the summary was created.  - &#x60;api&#x60; means that no summary was generated automatically. You can add summary manually using the &#x60;PATCH /summaries/{summaryId}/source&#x60; endpoint operation. Until this happens, &#x60;sourceStatus&#x60; returns &#x60;missing&#x60;. - &#x60;auto&#x60; means that the API generated the summary automatically. | [optional]
**sourceStatus** | **string** | Returns the current status of summary generation.  &#x60;missing&#x60;: the input for a summary is not present. &#x60;waiting&#x60; : the input video is being processed and a summary will be generated. &#x60;failed&#x60;: a technical issue prevented summary generation. &#x60;completed&#x60;: the summary is generated. &#x60;unprocessable&#x60;: the API rules the source video to be unsuitable for summary generation. An example for this is an input video that has no audio. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
