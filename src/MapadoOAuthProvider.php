<?php

namespace Mapado\LeagueOAuth2Provider;

use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class MapadoOAuthProvider extends AbstractProvider
{
    public function getBaseAuthorizationUrl()
    {
        return '';
    }

    public function getBaseAccessTokenUrl(array $params)
    {
        return 'https://oauth2.mapado.com/oauth/v2/token';
    }

    public function getResourceOwnerDetailsUrl(AccessToken $token)
    {
        return '';
    }

    protected function getDefaultScopes()
    {
        return '';
    }

    protected function checkResponse(ResponseInterface $response, $data)
    {
        if ($response->getStatusCode() >= 400) {
            throw new IdentityProviderException($data['error_description'], $response->getStatusCode(), $data);
        }
    }

    protected function createResourceOwner(array $response, AccessToken $token)
    {
        return null;
    }
}
