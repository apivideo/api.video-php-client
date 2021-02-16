# OpenAPI\Client\PlayersApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](PlayersApi.md#delete) | **DELETE** /players/{playerId} | Delete a player
[**deleteLogo()**](PlayersApi.md#deleteLogo) | **DELETE** /players/{playerId}/logo | Delete logo
[**list()**](PlayersApi.md#list) | **GET** /players | List all players
[**get()**](PlayersApi.md#get) | **GET** /players/{playerId} | Show a player
[**update()**](PlayersApi.md#update) | **PATCH** /players/{playerId} | Update a player
[**create()**](PlayersApi.md#create) | **POST** /players | Create a player
[**uploadLogo()**](PlayersApi.md#uploadLogo) | **POST** /players/{playerId}/logo | Upload a logo


## `delete()`

```php
delete($player_id)
```

Delete a player

Delete a player if you no longer need it. You can delete any player that you have the player ID for.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PlayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$player_id = pl45d5vFFGrfdsdsd156dGhh; // string | The unique identifier for the player you want to delete.

try {
    $apiInstance->delete($player_id);
} catch (Exception $e) {
    echo 'Exception when calling PlayersApi->delete: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **player_id** | **string**| The unique identifier for the player you want to delete. |

### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteLogo()`

```php
deleteLogo($player_id): object
```

Delete logo

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PlayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$player_id = pl14Db6oMJRH6SRVoOwORacK; // string | The unique identifier for the player.

try {
    $result = $apiInstance->deleteLogo($player_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlayersApi->deleteLogo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **player_id** | **string**| The unique identifier for the player. |

### Return type

**object**

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `list()`

```php
list($sort_by, $sort_order, $current_page, $page_size): \OpenAPI\Client\Model\PlayersListResponse
```

List all players

Retrieve a list of all the players you created, as well as details about each one.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PlayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['sort_by'] = createdAt; // string | createdAt is the time the player was created. updatedAt is the time the player was last updated. The time is presented in ISO-8601 format.
$associate_array['sort_order'] = asc; // string | Allowed: asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones.
$associate_array['current_page'] = 2; // int | Choose the number of search results to return per page. Minimum value: 1
$associate_array['page_size'] = 30; // int | Results per page. Allowed values 1-100, default is 25.

try {
    $result = $apiInstance->list($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlayersApi->list: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **sort_by** | **string**| createdAt is the time the player was created. updatedAt is the time the player was last updated. The time is presented in ISO-8601 format. | [optional]
 **sort_order** | **string**| Allowed: asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones. | [optional]
 **current_page** | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 **page_size** | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]

### Return type

[**\OpenAPI\Client\Model\PlayersListResponse**](../Model/PlayersListResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `get()`

```php
get($player_id): \OpenAPI\Client\Model\Player
```

Show a player

Use a player ID to retrieve details about the player and display it for viewers.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PlayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$player_id = pl45d5vFFGrfdsdsd156dGhh; // string | The unique identifier for the player you want to retrieve.

try {
    $result = $apiInstance->get($player_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlayersApi->get: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **player_id** | **string**| The unique identifier for the player you want to retrieve. |

### Return type

[**\OpenAPI\Client\Model\Player**](../Model/Player.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `update()`

```php
update($player_id, $player_update_payload): \OpenAPI\Client\Model\Player
```

Update a player

Use a player ID to update specific details for a player. NOTE: It may take up to 10 min before the new player configuration is available from our CDN.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PlayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$player_id = pl45d5vFFGrfdsdsd156dGhh; // string | The unique identifier for the player.
$player_update_payload = new \OpenAPI\Client\Model\PlayerUpdatePayload(); // \OpenAPI\Client\Model\PlayerUpdatePayload

try {
    $result = $apiInstance->update($player_id, $player_update_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlayersApi->update: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **player_id** | **string**| The unique identifier for the player. |
 **player_update_payload** | [**\OpenAPI\Client\Model\PlayerUpdatePayload**](../Model/PlayerUpdatePayload.md)|  |

### Return type

[**\OpenAPI\Client\Model\Player**](../Model/Player.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `create()`

```php
create($player_creation_payload): \OpenAPI\Client\Model\Player
```

Create a player

Create a player for your video, and customise it.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PlayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$player_creation_payload = new \OpenAPI\Client\Model\PlayerCreationPayload(); // \OpenAPI\Client\Model\PlayerCreationPayload

try {
    $result = $apiInstance->create($player_creation_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlayersApi->create: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **player_creation_payload** | [**\OpenAPI\Client\Model\PlayerCreationPayload**](../Model/PlayerCreationPayload.md)|  |

### Return type

[**\OpenAPI\Client\Model\Player**](../Model/Player.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `uploadLogo()`

```php
uploadLogo($player_id, $file, $link): \OpenAPI\Client\Model\Player
```

Upload a logo

The uploaded image maximum size should be 200x100 and its weight should be 200KB.  It will be scaled down to 30px height and converted to PNG to be displayed in the player.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\PlayersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$player_id = pl14Db6oMJRH6SRVoOwORacK; // string | The unique identifier for the player.
$file = "/path/to/file.txt"; // \SplFileObject | The name of the file you want to use for your logo.
$link = 'link_example'; // string | The path to the file you want to upload and use as a logo.

try {
    $result = $apiInstance->uploadLogo($player_id, $file, $link);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PlayersApi->uploadLogo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **player_id** | **string**| The unique identifier for the player. |
 **file** | **\SplFileObject****\SplFileObject**| The name of the file you want to use for your logo. |
 **link** | **string**| The path to the file you want to upload and use as a logo. |

### Return type

[**\OpenAPI\Client\Model\Player**](../Model/Player.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: `multipart/form-data`
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
