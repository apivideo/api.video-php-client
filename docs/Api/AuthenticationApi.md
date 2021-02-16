# OpenAPI\Client\AuthenticationApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**authenticate()**](AuthenticationApi.md#authenticate) | **POST** /auth/api-key | Authenticate
[**refresh()**](AuthenticationApi.md#refresh) | **POST** /auth/refresh | Refresh token


## `authenticate()`

```php
authenticate($authenticate_payload): \OpenAPI\Client\Model\AccessToken
```

Authenticate

To get started, submit your API key in the body of your request. api.video returns an access token that is valid for one hour (3600 seconds). A refresh token is also returned. View a [tutorial](https://api.video/blog/tutorials/authentication-tutorial) on authentication.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authenticate_payload = new \OpenAPI\Client\Model\AuthenticatePayload(); // \OpenAPI\Client\Model\AuthenticatePayload

try {
    $result = $apiInstance->authenticate($authenticate_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->authenticate: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authenticate_payload** | [**\OpenAPI\Client\Model\AuthenticatePayload**](../Model/AuthenticatePayload.md)|  | [optional]

### Return type

[**\OpenAPI\Client\Model\AccessToken**](../Model/AccessToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `refresh()`

```php
refresh($refresh_token_payload): \OpenAPI\Client\Model\AccessToken
```

Refresh token

Use the refresh endpoint with the refresh token you received when you first authenticated using the api-key endpoint. Send the refresh token in the body of your request. The api.video API returns a new access token that is valid for one hour (3600 seconds) and a new refresh token.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new OpenAPI\Client\Api\AuthenticationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$refresh_token_payload = new \OpenAPI\Client\Model\RefreshTokenPayload(); // \OpenAPI\Client\Model\RefreshTokenPayload

try {
    $result = $apiInstance->refresh($refresh_token_payload);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AuthenticationApi->refresh: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **refresh_token_payload** | [**\OpenAPI\Client\Model\RefreshTokenPayload**](../Model/RefreshTokenPayload.md)|  | [optional]

### Return type

[**\OpenAPI\Client\Model\AccessToken**](../Model/AccessToken.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
