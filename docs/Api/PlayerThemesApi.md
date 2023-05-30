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

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$playerThemeCreationPayload = (new \ApiVideo\Client\Model\PlayerThemeCreationPayload())
    ->setText("rgba(255, 255, 255, 1)") // RGBA color for timer text. Default: rgba(255, 255, 255, 1))
    ->setLink("rgba(255, 255, 255, 1)") // RGBA color for all controls. Default: rgba(255, 255, 255, 1))
    ->setLinkHover("rgba(255, 255, 255, 1)") // RGBA color for all controls when hovered. Default: rgba(255, 255, 255, 1))
    ->setTrackPlayed("rgba(255, 255, 255, 1)") // RGBA color playback bar: played content. Default: rgba(88, 131, 255, .95))
    ->setTrackUnplayed("rgba(255, 255, 255, 1)") // RGBA color playback bar: downloaded but unplayed (buffered) content. Default: rgba(255, 255, 255, .35))
    ->setTrackBackground("rgba(255, 255, 255, 1)") // RGBA color playback bar: background. Default: rgba(255, 255, 255, .2))
    ->setBackgroundTop("rgba(255, 255, 255, 1)") // RGBA color: top 50% of background. Default: rgba(0, 0, 0, .7))
    ->setBackgroundBottom("rgba(255, 255, 255, 1)") // RGBA color: bottom 50% of background. Default: rgba(0, 0, 0, .7))
    ->setBackgroundText("rgba(255, 255, 255, 1)") // RGBA color for title text. Default: rgba(255, 255, 255, 1))
    ->setEnableApi(true) // enable/disable player SDK access. Default: true)
    ->setEnableControls(true) // enable/disable player controls. Default: true)
    ->setForceAutoplay(true) // enable/disable player autoplay. Default: false)
    ->setHideTitle(true) // enable/disable title. Default: false)
    ->setForceLoop(true); // enable/disable looping. Default: false)

$playerTheme = $client->playerThemes()->create($playerThemeCreationPayload); 
```




## **`get()` - Retrieve a player**



Retreive a player theme by player id.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to retrieve. |




### Return type

[**\ApiVideo\Client\Model\PlayerTheme**](../Model/PlayerTheme.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$playerId = 'pl45d5vFFGrfdsdsd156dGhh'; // The unique identifier for the player you want to retrieve. 
$playerTheme = $client->playerThemes()->get($playerId);  
```




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

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';


$playerId = 'pl45d5vFFGrfdsdsd156dGhh'; // The unique identifier for the player.
$playerThemeUpdatePayload = (new \ApiVideo\Client\Model\PlayerThemeUpdatePayload())
    ->setText("rgba(255, 255, 255, 1)") // RGBA color for timer text. Default: rgba(255, 255, 255, 1))
    ->setLink("rgba(255, 255, 255, 1)") // RGBA color for all controls. Default: rgba(255, 255, 255, 1))
    ->setLinkHover("rgba(255, 255, 255, 1)") // RGBA color for all controls when hovered. Default: rgba(255, 255, 255, 1))
    ->setTrackPlayed("rgba(255, 255, 255, 1)") // RGBA color playback bar: played content. Default: rgba(88, 131, 255, .95))
    ->setTrackUnplayed("rgba(255, 255, 255, 1)") // RGBA color playback bar: downloaded but unplayed (buffered) content. Default: rgba(255, 255, 255, .35))
    ->setTrackBackground("rgba(255, 255, 255, 1)") // RGBA color playback bar: background. Default: rgba(255, 255, 255, .2))
    ->setBackgroundTop("rgba(255, 255, 255, 1)") // RGBA color: top 50% of background. Default: rgba(0, 0, 0, .7))
    ->setBackgroundBottom("rgba(255, 255, 255, 1)") // RGBA color: bottom 50% of background. Default: rgba(0, 0, 0, .7))
    ->setBackgroundText("rgba(255, 255, 255, 1)") // RGBA color for title text. Default: rgba(255, 255, 255, 1))
    ->setEnableApi(true) // enable/disable player SDK access. Default: true)
    ->setEnableControls(true) // enable/disable player controls. Default: true)
    ->setForceAutoplay(true) // enable/disable player autoplay. Default: false)
    ->setHideTitle(true) // enable/disable title. Default: false)
    ->setForceLoop(true); // enable/disable looping. Default: false)


$playerTheme = $client->playerThemes()->update($playerId, $playerThemeUpdatePayload); 
```




## **`delete()` - Delete a player**



Delete a player if you no longer need it. You can delete any player that you have the player ID for.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player you want to delete. |




### Return type

void (empty response body)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$playerId = 'pl45d5vFFGrfdsdsd156dGhh'; // The unique identifier for the player you want to delete.
$client->playerThemes()->delete($playerId);  
```




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

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$playerThemes = $client->playerThemes()->list(array(
    'sortBy' => 'createdAt', // createdAt is the time the player was created. updatedAt is the time the player was last updated. The time is presented in ISO-8601 format.
    'sortOrder' => 'asc', // ->setAllowed(asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones.)
    'currentPage' => 2, // Choose the number of search results to return per page. Minimum ->setvalue(1)
    'pageSize' => 30 // Results per page. Allowed values 1-100, default is 25.
)); 
```




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

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$playerId = 'pl14Db6oMJRH6SRVoOwORacK'; // The unique identifier for the player.
$file = new SplFileObject(__DIR__ . '/company-logo.jpg'); // The name of the file you want to use for your logo.
$link = 'https://my-company.org'; // A public link that you want to advertise in your player. For example, you could add a link to your company. When a viewer clicks on your logo, they will be taken to this address.

$playerTheme = $client->playerThemes()->uploadLogo($playerId, $file, $link); 
```




## **`deleteLogo()` - Delete logo**



Delete the logo associated to a player.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `playerId` | **string**| The unique identifier for the player. |




### Return type

void (empty response body)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$playerId = 'pl45d5vFFGrfdsdsd156dGhh'; // The unique identifier for the player whose logo you want to delete.
$client->playerThemes()->deleteLogo($playerId); 
```



