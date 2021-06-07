# ApiVideo\Client\Api\PlayerThemesApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](PlayerThemesApi.md#delete) | **DELETE** `/players/{playerId}` | Delete a player
[**deleteLogo()**](PlayerThemesApi.md#deleteLogo) | **DELETE** `/players/{playerId}/logo` | Delete logo
[**list()**](PlayerThemesApi.md#list) | **GET** `/players` | List all players
[**get()**](PlayerThemesApi.md#get) | **GET** `/players/{playerId}` | Show a player
[**update()**](PlayerThemesApi.md#update) | **PATCH** `/players/{playerId}` | Update a player
[**create()**](PlayerThemesApi.md#create) | **POST** `/players` | Create a player
[**uploadLogo()**](PlayerThemesApi.md#uploadLogo) | **POST** `/players/{playerId}/logo` | Upload a logo


## delete()


Delete a player if you no longer need it. You can delete any player that you have the player ID for.

```php
delete(string $playerId): void
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to delete. | `pl45d5vFFGrfdsdsd156dGhh` |




### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## deleteLogo()



```php
deleteLogo(string $playerId): void
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. | `pl14Db6oMJRH6SRVoOwORacK` |




### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## list()


Retrieve a list of all the players you created, as well as details about each one.

```php
list(array $queryParams = []): \ApiVideo\Client\Model\PlayerThemesListResponse
```

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

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## get()


Use a player ID to retrieve details about the player and display it for viewers.

```php
get(string $playerId): \ApiVideo\Client\Model\PlayerTheme
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to retrieve. | `pl45d5vFFGrfdsdsd156dGhh` |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## update()


Use a player ID to update specific details for a player. NOTE: It may take up to 10 min before the new player configuration is available from our CDN.

```php
update(string $playerId, \ApiVideo\Client\Model\PlayerThemeUpdatePayload $playerThemeUpdatePayload): \ApiVideo\Client\Model\PlayerTheme
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. | `pl45d5vFFGrfdsdsd156dGhh` |
 `playerThemeUpdatePayload` | [**\ApiVideo\Client\Model\PlayerThemeUpdatePayload**](../Model/PlayerThemeUpdatePayload.md)|  | `new \ApiVideo\Client\Model\PlayerThemeUpdatePayload()` |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## create()


Create a player for your video, and customise it.

```php
create(\ApiVideo\Client\Model\PlayerThemeCreationPayload $playerThemeCreationPayload): \ApiVideo\Client\Model\PlayerTheme
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerThemeCreationPayload` | [**\ApiVideo\Client\Model\PlayerThemeCreationPayload**](../Model/PlayerThemeCreationPayload.md)|  | `new \ApiVideo\Client\Model\PlayerThemeCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## uploadLogo()


The uploaded image maximum size should be 200x100 and its weight should be 200KB. It will be scaled down to 30px height and converted to PNG to be displayed in the player.

```php
uploadLogo(string $playerId, \SplFileObject $file, string $link): \ApiVideo\Client\Model\PlayerTheme
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. | `pl14Db6oMJRH6SRVoOwORacK` |
 `file` | **\SplFileObject**| The name of the file you want to use for your logo. | `new \SplFileObject('path')` |
 `link` | **string**| The path to the file you want to upload and use as a logo. | `'link_example'` |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
