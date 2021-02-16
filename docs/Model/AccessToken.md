# # AccessToken

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**access_token** | **string** | The access token containing security credentials allowing you to acccess the API. The token lasts for one hour. | [optional]
**token_type** | **string** | The type of token you have. | [optional] [default to 'bearer']
**refresh_token** | **string** | A token you can use to get the next access token when your current access token expires. | [optional]
**expires_in** | **int** | Lists the time in seconds when your access token expires. It lasts for one hour. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
