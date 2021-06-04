<?php declare(strict_types = 1);

namespace ApiVideo\Client\Exception;

/**
 * This exception is thrown when an expired auth token error occurs
 */
class ExpiredAuthTokenException extends \Exception implements ExceptionInterface
{

}
