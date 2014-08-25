<?php

namespace League\OAuth2\Client\Grant;

use League\OAuth2\Client\Token\AccessToken as AccessToken;

class Refreshtoken implements GrantInterface {

    public function __toString()
    {
        return 'refresh_code';
    }

    public function prepRequestParams($defaultParams, $params)
    {
        return array_merge($defaultParams, $params);
    }

    public function handleResponse($response = array())
    {
        return new AccessToken($response);
    }
}