<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use Psr\Http\Message\StreamInterface;

class Request
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var string|null
     */
    private $body;

    /**
     * @var StreamInterface|null
     */
    private $stream;

    public function __construct(string $method, string $path, ?array $headers = [], ?string $body = null)
    {
        $this->method = $method;
        $this->path = $path;
        $this->headers = $headers ?? [];
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param StreamInterface $stream
     *
     * @return $this
     */
    public function setStream(StreamInterface $stream): self
    {
        $this->stream = $stream;

        return $this;
    }

    /**
     * @return StreamInterface|null
     */
    public function getStream(): ?StreamInterface
    {
        return $this->stream;
    }

    /**
     * @param string $name
     * @param string $value
     *
     * @return $this
     */
    public function setHeader(string $name, string $value): self
    {
        $this->headers[$name] = $value;

        return $this;
    }
}
