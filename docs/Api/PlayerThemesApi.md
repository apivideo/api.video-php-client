# ApiVideo\Client\Api\PlayerThemesApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](PlayerThemesApi.md#create) | Create a player | **POST** `/players`
[**get()**](PlayerThemesApi.md#get) | Retrieve a player | **GET** `/players/{playerId}`
[**update()**](PlayerThemesApi.md#update) | Update a player | **PATCH** `/players/{playerId}`
[**delete()**](PlayerThemesApi.md#delete) | Delete a player | **DELETE** `/players/{playerId}`
[**list()**](PlayerThemesApi.md#list) | List all player themes | **GET** `/players`
[**uploadLogo()**](PlayerThemesApi.md#uploadLogo) | Upload a logo | **POST** `/players/{playerId}/logo`
[**deleteLogo()**](PlayerThemesApi.md#deleteLogo) | Delete logo | **DELETE** `/players/{playerId}/logo`


## **`create()` - Create a player**



Create a player for your video, and customise it.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerThemeCreationPayload` | [**\ApiVideo\Client\Model\PlayerThemeCreationPayload**](../Model/PlayerThemeCreationPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)





## **`get()` - Retrieve a player**



Retreive a player theme by player id.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to retrieve. |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)





## **`update()` - Update a player**



Use a player ID to update specific details for a player. 

NOTE: It may take up to 10 min before the new player configuration is available from our CDN.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. |
 `playerThemeUpdatePayload` | [**\ApiVideo\Client\Model\PlayerThemeUpdatePayload**](../Model/PlayerThemeUpdatePayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)





## **`delete()` - Delete a player**



Delete a player if you no longer need it. You can delete any player that you have the player ID for.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to delete. |




### Return type

void (empty response body)





## **`list()` - List all player themes**



Retrieve a list of all the player themes you created, as well as details about each one.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `sortBy` | **string**| createdAt is the time the player was created. updatedAt is the time the player was last updated. The time is presented in ISO-8601 format. | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\PlayerThemesListResponse**](../Model/PlayerThemesListResponse.md)





## **`uploadLogo()` - Upload a logo**



Upload an image logo for a player.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. |
 `file` | **\SplFileObject**| The name of the file you want to use for your logo. |
 `link` | **string**| A public link that you want to advertise in your player. For example, you could add a link to your company. When a viewer clicks on your logo, they will be taken to this address. | [optional]




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)





## **`deleteLogo()` - Delete logo**



Delete the logo associated to a player.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. |




### Return type

void (empty response body)




