# instagramwrapper



// Step1: Initialize redirect call with API settings params
$instagramWr = new InstagramWrapper(array(
    'cid'      => 'b0940040034c49319c0e543fb94034da',
    'secret'   => 'a96bc4b032544df88506f81b52597b1c',
    'redirect' => 'http://dev.tapetickets.com/public/'
));


// create redirect URL
$redirectTransfer = $instagramWr->userRedirect();

//Step 2: curl oauth instagram api auhtentication using hard coded response code in localhost not in public domain to test connect with chain response and authentication with get server code

$authcode = "9855f77856d044c5aff558549755ef46"; // or $_GET['code'] 


// response code is unique 
$userdata = $instagramWr->userAuthToken($authcode);
var_dump($userdata);

