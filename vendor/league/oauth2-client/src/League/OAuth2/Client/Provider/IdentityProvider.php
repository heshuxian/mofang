<?php

namespace League\OAuth2\Client\Provider;

use \HTTP_Request2 as HTTP_Request2;
use League\OAuth2\Client\Token\AccessToken as AccessToken;
use League\OAuth2\Client\Token\Authorize as AuthorizeToken;
use League\OAuth2\Client\Exception\IDPException as IDPException;

abstract class IdentityProvider {

    public $clientId = '';

    public $clientSecret = '';

    public $redirectUri = '';

    public $name;

    public $uidKey = 'uid';

    public $scopes = array();

    public $method = 'post';

    public $scopeSeperator = ',';

    public $responseType = 'json';

    public function __construct($options = array())
    {
        foreach ($options as $option => $value) {
            if (isset($this->{$option})) {
                $this->{$option} = $value;
            }
        }
    }

    abstract public function urlAuthorize();

    abstract public function urlAccessToken();

    abstract public function urlUserDetails(\OAuth2\Client\Token\AccessToken $token);

    abstract public function userDetails($response, \OAuth2\Client\Token\AccessToken $token);

    public function authorize($options = array())
    {
        $state = md5(uniqid(rand(), true));
        setcookie($this->name.'_authorize_state', $state);

        $params = array(
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'state' => $state,
            'scope' => is_array($this->scopes) ? implode($this->scopeSeperator, $this->scopes) : $this->scopes,
            'response_type' => isset($options['response_type']) ? $options['response_type'] : 'code',
            'approval_prompt' => 'force' // - google force-recheck
        );
        header('Location: ' . $this->urlAuthorize().'?'.http_build_query($params));
    //    exit;
    }

    public function getAccessToken($grant = 'authorization_code', $params = array())
    {
        if (is_string($grant)) {
            $grantPath = 'League\\OAuth2\\Client\\Grant\\'.ucfirst(str_replace('_', '', $grant));
            if ( ! class_exists($grantPath)) {
                throw new \InvalidArgumentException('Unknown grant "'.$grant.'"');
            }
            
            $grantObj = new $grantPath;
        } elseif ( ! $grant instanceof Grant\GrantInterface) {
            throw new \InvalidArgumentException($grant.' is not an instance of \OAuth2\Client\Grant\GrantInterface');
        }
       
        $defaultParams = array(
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri'  => $this->redirectUri,
            'grant_type'    => $grant,
        	'scope' => ''
        );

        $requestParams = $grantObj->prepRequestParams($defaultParams, $params);
      
        try {
            switch ($this->method) {
                case 'get':
                	$request = new HTTP_Request2($this->urlAccessToken() . '?' . http_build_query($requestParams), HTTP_Request2::METHOD_GET);
                    $response = $request->send()->getBody();
                    break;
                case 'post': 
                	$request = new HTTP_Request2($this->urlAccessToken(), HTTP_Request2::METHOD_POST);
                	$request->addPostParameter($requestParams); 
                    $response = $request->send()->getBody();
                    break;
            }
        } catch (HTTP_Request2_Exception $e) {
			return 'Error: ' . $e->getMessage();
		}
        switch ($this->responseType) {
            case 'json':
                $result = json_decode($response, true);
                break;
            case 'string':
                parse_str($response, $result);
                break;
        }
        if (isset($result['error']) && ! empty($result['error'])) {
            throw new IDPException($result);
        }

        return $grantObj->handleResponse($result);
    }

    public function getUserDetails(AccessToken $token)
    {
    }

}