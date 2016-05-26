<?php
/*
// @author:sathish
*/
class InstagramWrapper {
  const authorizationURL = 'https://api.instagram.com/oauth/authorize/';
  const authTokenURL = 'https://api.instagram.com/oauth/access_token';
  const redirectURL = 'dev.tapetickets.com';

  private $clientId;
  private $clientSecret;
  private $authorizationCode;
  private $scopes = array('basic');

  const state = 'csrfstate';
  const error = 'access_denied';
  const errorReason = 'user_denied';
  const errorDescription = 'The user denied your request';
  const errorType = 'OAuthAccessTokenError';

  public function __construct($settings){
      $this->clientId = $settings['key']);
      $this->clientSecret = $settings['secret']);
  }

  public function userRedirect($scope = null){

    if (isset($this->clientId) && !empty($this->clientId)){
      return "https://api.instagram.com/oauth/authorize/?client_id=".$this->clientId.
              "&redirect_uri=".redirectURL."scope=".(isset($scope)&& !empty($scope)) ? $scope : $this->scopes."&state=".state."&response_type=code";
    } else {
      return false;
    }
    
  }



}