<?php declare(strict_types = 1);

namespace ApiVideo\Client\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * This exception is thrown when an HTTP error occured
 */
class HttpException extends \Exception implements ExceptionInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(RequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;

        $code = $response->getStatusCode();
        $message = sprintf('HTTP %d returned. %s', $code, $response->getBody()->getContents());

        parent::__construct($message, $code);
    }

    /**
     * @return RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
