<?php

namespace App\Http\Controllers;

use ApiVideo\Client\Client;
use ApiVideo\Client\Model\VideoCreationPayload;
use Illuminate\Http\Request;
use Symfony\Component\HttpClient\Psr18Client;

class UploadController extends Controller
{
    public function upload()
    {
        $httpClient = new Psr18Client();
        $client = new Client(
            'https://ws.api.video',
             env('APP_APIVIDEO'),
            $httpClient
        );
        $file = request()->file('video');
        $fileName = request()->title;
        $payload = (new VideoCreationPayload())->setTitle($fileName);
        if (isset(request()->description))
        {
            $payload->setDescription(request()->description);
        }
        if(isset(request()->public))
        {
            $payload->setPublic(False);
        }
        if(isset(request()->mp4support))
        {
            $payload->setMp4support(False);
        }
        $video = $client->videos()->create($payload);
        $filePath = request()->file('video')->getRealPath();

        $response = $client->videos()->upload(
            $video->getVideoId(),
            new \SplFileObject($filePath)
        );

        return redirect('/response');
    }
}
