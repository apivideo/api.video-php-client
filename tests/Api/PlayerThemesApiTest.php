<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Model\PlayerCreationPayload;
use ApiVideo\Client\Model\PlayerThemeCreationPayload;
use ApiVideo\Client\Model\PlayerThemeUpdatePayload;
use ApiVideo\Client\Model\PlayerUpdatePayload;
use SplFileObject;

class PlayerThemesApiTest extends AbstractApiTest
{
    /**
     * Removes existing data
     */
    public function setUp(): void
    {
        parent::setUp();

        $playerThemes = $this->client->playerThemes()->list();
        foreach ($playerThemes->getData() as $playerTheme) {
            $this->client->playerThemes()->delete($playerTheme->getPlayerId());
        }
    }

    public function testList()
    {
        $playerThemes = $this->client->playerThemes()->list();
        $this->assertCount(0, $playerThemes->getData());

        for ($i = 0; $i < 5; $i++) {
            $this->client->playerThemes()->create(new PlayerThemeCreationPayload());
        }

        $playerThemes = $this->client->playerThemes()->list();
        $this->assertCount(5, $playerThemes->getData());
    }

    /**
     * @covers \ApiVideo\Client\Api\PlayerThemesApi::create
     * @covers \ApiVideo\Client\Api\PlayerThemesApi::get
     * @covers \ApiVideo\Client\Api\PlayerThemesApi::update
     * @covers \ApiVideo\Client\Api\PlayerThemesApi::uploadLogo
     * @covers \ApiVideo\Client\Api\PlayerThemesApi::deleteLogo
     * @covers \ApiVideo\Client\Api\PlayerThemesApi::delete
     */
    public function testCreate()
    {
        $payload = (new PlayerThemeCreationPayload());
        $playerTheme = $this->client->playerThemes()->create($payload);
        $playerThemeId = $playerTheme->getPlayerId();

        $this->assertNotNull($playerTheme->getPlayerId());
        $this->assertNull($playerTheme->getAssets()->getLogo());

        // Get

        $playerTheme = $this->client->playerThemes()->get($playerThemeId);
        $this->assertEquals($playerTheme->getPlayerId(), $playerThemeId);

        // Update

        $this->assertEquals('rgba(255, 255, 255, 1)', $playerTheme->getText());

        $payload = (new PlayerThemeUpdatePayload())->setText('rgba(0, 0, 0, 1)');
        $playerTheme = $this->client->playerThemes()->update($playerThemeId, $payload);

        $this->assertEquals('rgba(0, 0, 0, 1)', $playerTheme->getText());

        // Upload logo

        $playerTheme = $this->client->playerThemes()->uploadLogo(
            $playerThemeId,
            new SplFileObject(__DIR__ . '/../resources/logo.png'),
            __DIR__ . '/../resources/logo.png',
        );

        $this->assertNotNull($playerTheme->getAssets()->getLogo());

        // Delete logo

        $this->client->playerThemes()->deleteLogo($playerThemeId);
        $playerTheme = $this->client->playerThemes()->get($playerThemeId);

        $this->assertNull($playerTheme->getAssets()->getLogo());

        // Delete

        $playerThemes = $this->client->playerThemes()->list();
        $this->assertCount(1, $playerThemes->getData());

        $this->client->playerThemes()->delete($playerThemeId);

        $playerThemes = $this->client->playerThemes()->list();
        $this->assertCount(0, $playerThemes->getData());
    }
}
