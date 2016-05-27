<?php
/*
// @author:sathish
// class warpper for instagram APi redirect authorization (access token) using ouath method and user details API
*/
class InstagramWrapper {

  // constants to connect and autohrize api and error abbreviations
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
  private $redirectURL = 'http://dev.tapetickets.com';
  private $authorizationCode;
  private $scopes = array('basic');

  public function __construct($settings){
      // initialaizing client , secret and redirect URL
      $this->clientId = $settings['cid'];
      $this->clientSecret = $settings['secret'];
      $this->redirectURL = (isset($settings['redirect']) && !empty($settings['redirect'])) ? $settings['redirect']:$this->redirectURL;
  }
  
  /* 
  // @function handles the failand pass test cases and below are list of failover test cases on omission of any url params
  // {"code": 400, "error_type": "OAuthException", "error_message": "Redirect URI does not match registered redirect URI"
  // {"code": 400, "error_type": "OAuthException", "error_message": "Invalid scope field(s): basicstate=csrfstate"}
  // {"code": 400, "error_type": "OAuthException", "error_message": "You must include a valid client_id, response_type, and redirect_uri parameters"}
  // @params:$scope and state is optional by default scope has basic and can be extended to 'basic,likes' and state is csrf validation
  */
  public function userRedirect($scope = null){
   
    if (isset($this->clientId) && !empty($this->clientId) && isset($this->redirectURL) && !empty($this->redirectURL)){
        return "https://api.instagram.com/oauth/authorize/?client_id=".$this->clientId."&redirect_uri=".$this->redirectURL.
        "&scope=".((isset($scope)&& !empty($scope)) ? $scope : implode("+",$this->scopes))."&state=".self::csrfstate.
        "&response_type=code";
    } else {
      // Handles invlid or null client id and secret mandatory to connect to initiate and connect API
      throw new Exception("Invalid Client Id and Secret Token Supplied");
    }
    return;
  }

}
// initialize more on read me
$instagramWr = new InstagramWrapper(array(
    'cid'      => 'b0940040034c49319c0e543fb94034da',
    'secret'   => 'a96bc4b032544df88506f81b52597b1c',
    'redirect' => 'http://dev.tapetickets.com/public/'
));
echo $redirectTransfer = $instagramWr->userRedirect();
echo "<a href='$redirectTransfer'>Login with Instagram</a>";