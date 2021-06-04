<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

class UploadTokensApiTest extends AbstractApiTest
{
    /**
     * Removes existing data
     */
    public function setUp(): void
    {
        parent::setUp();

        $tokens = $this->client->uploadTokens()->list();
        foreach ($tokens->getData() as $token) {
            $this->client->uploadTokens()->deleteToken($token->getToken());
        }
    }

    public function testDeleteToken()
    {
        $tokens = $this->client->uploadTokens()->list();
        $this->assertCount(0, $tokens->getData());

        $createdToken = (new Helper($this->client))->createUploadToken();

        $tokens = $this->client->uploadTokens()->list();
        $this->assertCount(1, $tokens->getData());

        $this->client->uploadTokens()->deleteToken($createdToken->getToken());

        $tokens = $this->client->uploadTokens()->list();
        $this->assertCount(0, $tokens->getData());
    }

    public function testList()
    {
        for ($i = 0; $i < 5; $i++) {
            (new Helper($this->client))->createUploadToken(50);
        }

        $tokens = $this->client->uploadTokens()->list();

        $this->assertCount(5, $tokens->getData());
    }

    public function testGetToken()
    {
        $tokenProp = (new Helper($this->client))->createUploadToken(50)->getToken();

        $token = $this->client->uploadTokens()->getToken($tokenProp);

        $this->assertEquals($tokenProp, $token->getToken());
        $this->assertEquals(50, $token->getTtl());
    }

    public function testCreateToken()
    {
        $token = (new Helper($this->client))->createUploadToken(100);

        $this->assertNotNull($token->getToken());
        $this->assertEquals(100, $token->getTtl());
    }
}
