# # Webhook

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**webhookId** | **string** | A unique identifier of the webhook you subscribed to. | [optional]
**createdAt** | [**\DateTime**](\DateTime.md) | The time and date when you created this webhook subscription, in ATOM UTC format. | [optional]
**events** | **string[]** | A list of events that you subscribed to. When these events occur, the API triggers a webhook call to the URL you provided. | [optional]
**url** | **string** | The URL where the API sends the webhook. | [optional]
**signatureSecret** | **string** | A secret key for the webhook you subscribed to. You can use it to verify the origin of the webhook call that you receive. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
