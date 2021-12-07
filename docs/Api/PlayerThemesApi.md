# ApiVideo\Client\Api\PlayerThemesApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](PlayerThemesApi.md#delete) | **DELETE** `/players/{playerId}` | Delete a player
[**deleteLogo()**](PlayerThemesApi.md#deleteLogo) | **DELETE** `/players/{playerId}/logo` | Delete logo
[**list()**](PlayerThemesApi.md#list) | **GET** `/players` | List all player themes
[**get()**](PlayerThemesApi.md#get) | **GET** `/players/{playerId}` | Show a player
[**update()**](PlayerThemesApi.md#update) | **PATCH** `/players/{playerId}` | Update a player
[**create()**](PlayerThemesApi.md#create) | **POST** `/players` | Create a player
[**uploadLogo()**](PlayerThemesApi.md#uploadLogo) | **POST** `/players/{playerId}/logo` | Upload a logo


## delete()


Delete a player if you no longer need it. You can delete any player that you have the player ID for.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to delete. | `pl45d5vFFGrfdsdsd156dGhh` |




### Return type

void (empty response body)




## deleteLogo()




### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. | `pl14Db6oMJRH6SRVoOwORacK` |




### Return type

void (empty response body)




## list()


Retrieve a list of all the player themes you created, as well as details about each one. Tutorials that use the [player endpoint](https://api.video/blog/endpoints/player).


### Arguments





Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `sortBy` | **string**| createdAt is the time the player was created. updatedAt is the time the player was last updated. The time is presented in ISO-8601 format. | `createdAt` | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones. | `asc` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\PlayerThemesListResponse**](../Model/PlayerThemesListResponse.md)




## get()


Use a player ID to retrieve details about the player and display it for viewers.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to retrieve. | `pl45d5vFFGrfdsdsd156dGhh` |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)




## update()


Use a player ID to update specific details for a player. NOTE: It may take up to 10 min before the new player configuration is available from our CDN.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. | `pl45d5vFFGrfdsdsd156dGhh` |
 `playerThemeUpdatePayload` | [**\ApiVideo\Client\Model\PlayerThemeUpdatePayload**](../Model/PlayerThemeUpdatePayload.md)|  | `new \ApiVideo\Client\Model\PlayerThemeUpdatePayload()` |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)




## create()


Create a player for your video, and customise it.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerThemeCreationPayload` | [**\ApiVideo\Client\Model\PlayerThemeCreationPayload**](../Model/PlayerThemeCreationPayload.md)|  | `new \ApiVideo\Client\Model\PlayerThemeCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)




## uploadLogo()


The uploaded image maximum size should be 200x100 and its weight should be 100KB.  It will be scaled down to 30px height and converted to PNG to be displayed in the player.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. | `pl14Db6oMJRH6SRVoOwORacK` |
 `file` | **\SplFileObject**| The name of the file you want to use for your logo. | `new \SplFileObject('path')` |
 `link` | **string**| A public link that you want to advertise in your player. For example, you could add a link to your company. When a viewer clicks on your logo, they will be taken to this address. | `'link_example'` | [optional]




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)



