# # AccessToken

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**accessToken** | **string** | The access token containing security credentials allowing you to acccess the API. The token lasts for one hour. | [optional]
**tokenType** | **string** | The type of token you have. | [optional] [default to 'bearer']
**refreshToken** | **string** | A token you can use to get the next access token when your current access token expires. | [optional]
**expiresIn** | **int** | Lists the time in seconds when your access token expires. It lasts for one hour. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
