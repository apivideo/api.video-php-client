<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use ApiVideo\Client\Model\Video;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Client\ClientExceptionInterface;
use SplFileObject;

final class VideoUploader
{
    /**
     * @var BaseClient
     */
    private $client;

    /**
     * @param BaseClient $client
     */
    public function __construct(BaseClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string        $videoId
     * @param SplFileObject $file
     * @param string|null   $contentRange
     *
     * @return Video
     * @throws ClientExceptionInterface
     */
    public function upload(string $videoId, SplFileObject $file, string $contentRange = null): Video
    {
        return $this->execute(
            sprintf('/videos/%s/source', $videoId),
            $file,
            $this->getChunkSize($contentRange)
        );
    }

    /**
     * @param string        $token
     * @param SplFileObject $file
     * @param string|null   $contentRange
     * @param string|null   $videoId
     *
     * @return Video
     *
     */
    public function uploadWithUploadToken(string $token, \SplFileObject $file, string $contentRange = null, string $videoId = null): Video
    {
        return $this->execute(
            '/upload?token='.$token,
            $file,
            $this->getChunkSize($contentRange)
        );
    }

    /**
     * @param string        $path
     * @param SplFileObject $file
     * @param int           $chunkSize
     *
     * @return Video
     * @throws ClientExceptionInterface
     */
    private function execute(string $path, \SplFileObject $file, int $chunkSize): Video
    {
        $start = 0;
        $fileSize = filesize($file->getRealPath());
        $handle = fopen($file->getRealPath(), 'r');

        $response = null;
        $videoId = null;
        while ($start < $fileSize) {
            $contents = fread($handle, $chunkSize);

            $builder = new MultipartStreamBuilder($this->client->getStreamFactory());
            $builder->addResource('file', $contents, [
                'filename' => basename($file->getRealPath()),
                'headers' => ['Content-Type' => 'application/octet-stream'],
            ]);

            if ($videoId) {
                $builder->addResource('videoId', $videoId);
            }

            $request = new Request(
                'POST',
                $path,
                [
                    'Accept' => 'application/json',
                    'Content-Type' => sprintf('multipart/form-data; boundary="%s"', $builder->getBoundary()),
                    'Content-Range' => sprintf('bytes %s-%s/%s', $start, $start + strlen($contents) - 1, $fileSize),
                ]
            );
            $request->setStream($builder->build());

            $response = $this->client->request($request);

            $videoId = $response['videoId'] ?? null;

            $start += strlen($contents);
            fseek($handle, $start);
        }

        fclose($handle);

        return new Video($response);
    }

    /**
     * @param string|null $contentRange
     *
     * @return int
     */
    private function getChunkSize(?string $contentRange): int
    {
        if (!$contentRange) {
            return $this->client->getChunkSize();
        }

        preg_match('/^bytes ([0-9]*)-([0-9]*)\/[0-9]*$/', $contentRange, $matches);

        return (int) $matches[2] - (int) $matches[1];
    }
}
