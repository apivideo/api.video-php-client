<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use ApiVideo\Client\Model\Video;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Client\ClientExceptionInterface;
use SplFileObject;

final class ProgressiveUploadSession
{
    /**
     * @var BaseClient
     */
    private $client;
    private $currentPart;
    private $endpoint;
    private $videoId;

    /**
     * @param BaseClient $client
     * @param string $endpoint
     * @param string|null $videoId
     */
    public function __construct(BaseClient $client, string $endpoint, string $videoId = null)
    {
        $this->client = $client;
        $this->endpoint = $endpoint;
        $this->currentPart = 1;
        $this->videoId = $videoId;
    }

    /**
     * @param SplFileObject $file
     * @param bool $isLastPart
     * @return Video
     */
    public function uploadPart(SplFileObject $file, $isLastPart = false): Video
    {
        return $this->execute(
            $this->endpoint,
            $file,
            $isLastPart
        );
    }

    /**
     * @param SplFileObject $file
     * @return Video
     */
    public function uploadLastPart(SplFileObject $file): Video
    {
        return $this->uploadPart(
            $file,
            true
        );
    }

    /**
     * @param string $path
     * @param SplFileObject $file
     * @param bool $isLast
     * @return Video
     */
    private function execute(string $path, \SplFileObject $file, bool $isLast): Video
    {
        $fileSize = filesize($file->getRealPath());
        $handle = fopen($file->getRealPath(), 'r');
        $response = null;

        $builder = new MultipartStreamBuilder($this->client->getStreamFactory());
        $builder->addResource('file', $handle, [
            'filename' => basename($file->getRealPath()),
            'headers' => ['Content-Type' => 'application/octet-stream'],
        ]);

        if ($this->videoId) {
            $builder->addResource('videoId', $this->videoId);
        }

        $request = new Request(
            'POST',
            $path,
            [
                'Accept' => 'application/json',
                'Content-Type' => sprintf('multipart/form-data; boundary="%s"', $builder->getBoundary()),
                'Content-Range' => sprintf('part %s/%s', $this->currentPart, $isLast ? $this->currentPart : "*"),
            ]
        );
        $request->setStream($builder->build());

        $response = $this->client->request($request);

        $this->videoId = $response['videoId'] ?? null;

        $this->currentPart++;

        fclose($handle);

        return new Video($response);
    }

}
