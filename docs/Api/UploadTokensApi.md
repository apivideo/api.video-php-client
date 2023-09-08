# ApiVideo\Client\Api\UploadTokensApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**createToken()**](UploadTokensApi.md#createToken) | Generate an upload token | **POST** `/upload-tokens`
[**getToken()**](UploadTokensApi.md#getToken) | Retrieve upload token | **GET** `/upload-tokens/{uploadToken}`
[**deleteToken()**](UploadTokensApi.md#deleteToken) | Delete an upload token | **DELETE** `/upload-tokens/{uploadToken}`
[**list()**](UploadTokensApi.md#list) | List all active upload tokens | **GET** `/upload-tokens`


## **`createToken()` - Generate an upload token**



Generates an upload token that can be used to replace the API Key. More information can be found [here](https://docs.api.video/reference/upload-tokens)

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `tokenCreationPayload` | [**\ApiVideo\Client\Model\TokenCreationPayload**](../Model/TokenCreationPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\UploadToken**](../Model/UploadToken.md)





## **`getToken()` - Retrieve upload token**



Retrieve details about a specific upload token by id.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `uploadToken` | **string**| The unique identifier for the token you want information about. |




### Return type

[**\ApiVideo\Client\Model\UploadToken**](../Model/UploadToken.md)





## **`deleteToken()` - Delete an upload token**



Delete an existing upload token. This is especially useful for tokens you may have created that do not expire.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `uploadToken` | **string**| The unique identifier for the upload token you want to delete. Deleting a token will make it so the token can no longer be used for authentication. |




### Return type

void (empty response body)





## **`list()` - List all active upload tokens**



Retrieve a list of all currently active delegated tokens.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `sortBy` | **string**| Allowed: createdAt, ttl. You can use these to sort by when a token was created, or how much longer the token will be active (ttl - time to live). Date and time is presented in ISO-8601 format. | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. Ascending is 0-9 or A-Z. Descending is 9-0 or Z-A. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\TokenListResponse**](../Model/TokenListResponse.md)




