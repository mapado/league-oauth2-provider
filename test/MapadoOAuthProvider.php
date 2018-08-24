<?php

namespace Mapado\LeagueOAuth2Provider\Tests\Units;

use Mapado\LeagueOAuth2Provider\MapadoOAuthProvider as Provider;
use PHPUnit\Framework\TestCase;

/**
 * Class MapadoOAuthProvider
 * @author Julien Deniau <julien.deniau@mapado.com>
 */
class MapadoOAuthProvider extends TestCase
{
    protected $provider;

    protected function setUp()
    {
        $this->provider = new Provider([
            'clientId' => 'mock_client_id',
            'clientSecret' => 'mock_secret',
        ]);
    }

    public function testAuthorizationUrl()
    {
        $url = $this->provider->getAuthorizationUrl();
        $uri = parse_url($url);
        parse_str($uri['query'], $query);
        $this->assertArrayHasKey('client_id', $query);
        $this->assertArrayHasKey('state', $query);
        $this->assertArrayHasKey('scope', $query);
        $this->assertArrayHasKey('response_type', $query);
        $this->assertArrayHasKey('approval_prompt', $query);
        $this->assertNotNull($this->provider->getState());
    }
}
