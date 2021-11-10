# ApiVideo\Client\Api\UploadTokensApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteToken()**](UploadTokensApi.md#deleteToken) | **DELETE** `/upload-tokens/{uploadToken}` | Delete an upload token
[**list()**](UploadTokensApi.md#list) | **GET** `/upload-tokens` | List all active upload tokens.
[**getToken()**](UploadTokensApi.md#getToken) | **GET** `/upload-tokens/{uploadToken}` | Show upload token
[**createToken()**](UploadTokensApi.md#createToken) | **POST** `/upload-tokens` | Generate an upload token


## deleteToken()


Delete an existing upload token. This is especially useful for tokens you may have created that do not expire.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `uploadToken` | **string**| The unique identifier for the upload token you want to delete. Deleting a token will make it so the token can no longer be used for authentication. | `to1tcmSFHeYY5KzyhOqVKMKb` |




### Return type

void (empty response body)




## list()


A delegated token is used to allow secure uploads without exposing your API key. Use this endpoint to retrieve a list of all currently active delegated tokens. Tutorials using [delegated upload](https://api.video/blog/endpoints/delegated-upload).


### Arguments





Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `sortBy` | **string**| Allowed: createdAt, ttl. You can use these to sort by when a token was created, or how much longer the token will be active (ttl - time to live). Date and time is presented in ISO-8601 format. | `ttl` | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. Ascending is 0-9 or A-Z. Descending is 9-0 or Z-A. | `asc` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\TokenListResponse**](../Model/TokenListResponse.md)




## getToken()


You can retrieve details about a specific upload token if you have the unique identifier for the upload token. Add it in the path of the endpoint. Details include time-to-live (ttl), when the token was created, and when it will expire.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `uploadToken` | **string**| The unique identifier for the token you want information about. | `to1tcmSFHeYY5KzyhOqVKMKb` |




### Return type

[**\ApiVideo\Client\Model\UploadToken**](../Model/UploadToken.md)




## createToken()


Use this endpoint to generate an upload token. You can use this token to authenticate video uploads while keeping your API key safe. Tutorials using [delegated upload](https://api.video/blog/endpoints/delegated-upload).


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `tokenCreationPayload` | [**\ApiVideo\Client\Model\TokenCreationPayload**](../Model/TokenCreationPayload.md)|  | `new \ApiVideo\Client\Model\TokenCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\UploadToken**](../Model/UploadToken.md)



