<?php
/*
// @author:sathish
// class warpper for instagram APi redirect authorization (access token) using ouath method and user details API
*/
class InstagramWrapper {
  // cosntants to connect and autorize api and error abbreviations
  const authorizationURL = 'https://api.instagram.com/oauth/authorize/';
  const authTokenURL = 'https://api.instagram.com/oauth/access_token';
  const csrfstate = 'csrfstate';
  const error = 'access_denied';
  const errorReason = 'user_denied';
  const errorDescription = 'The user denied your request';
  const errorType = 'OAuthAccessTokenError';
  // scope limited variables to hold scope, clientid, secret code, authoirzatin code and redirect url
  private $clientId;
  private $clientSecret;
  private $redirectURL = 'dev.tapetickets.com';
  private $authorizationCode;
  private $scopes = array('basic');

  public function __construct($settings){
    // initialaizing clinet and secret
      $this->clientId = $settings['cid'];
      $this->clientSecret = $settings['secret'];
      $this->redirectURL = $settings['redirect'];
  }

  public function userRedirect($scope = null){
    // return response handles failover and pass over test cases and below are list of failover test cases on omission of any url params
    // {"code": 400, "error_type": "OAuthException", "error_message": "Redirect URI does not match registered redirect URI"
    // {"code": 400, "error_type": "OAuthException", "error_message": "Invalid scope field(s): basicstate=csrfstate"}
    // {"code": 400, "error_type": "OAuthException", "error_message": "You must include a valid client_id, response_type, and redirect_uri parameters"}
    // $scope and state is optional by default scope has basic and can be extended to 'basic,likes' and state is csrf validation
    if (isset($this->clientId) && !empty($this->clientId) && isset($this->redirectURL) && !empty($this->redirectURL)){
        return "https://api.instagram.com/oauth/authorize/?client_id=".$this->clientId."&redirect_uri=".$this->redirectURL.
        "&scope=".((isset($scope)&& !empty($scope)) ? $scope : implode("+",$this->scopes))."&state=".self::csrfstate.
        "&response_type=code";
    } else {
      // Handles invlid or null client id and secret mandatory to connect to initiate and connect API
      throw new Exception("Invalid Client Id and Secret Token Supplied");
    }
    
  }

}

$instagramWr = new InstagramWrapper(array(
    'cid'      => '9d5d2b0944434b0d9ecc23b910fadde9',
    'secret'   => 'bdb22bbe77434a668c78144c9af69520',
    'redirect' => 'dev.tapetickets.com/public/'
));
echo $redirectTransfer = $instagramWr->userRedirect();
echo "<a href='$redirectTransfer'>Login with Instagram</a>";