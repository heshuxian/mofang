<?php

namespace League\OAuth2\Client\Provider;

class Weidan extends IdentityProvider
{
	public $scopeSeperator = ' ';

	public $scopes = array(
	);

	public function urlAuthorize()
	{
		return 'http://api.weidan365.com/oauth2';
	}

	public function urlAccessToken()
	{
		return 'http://api.weidan365.com/oauth2/token';
	}

	public function urlUserDetails(\OAuth2\Client\Token\AccessToken $token)
	{
	}
	public function userDetails($response, \OAuth2\Client\Token\AccessToken $token)
	{
	}

}

?>
